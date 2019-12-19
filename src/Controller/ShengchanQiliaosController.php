<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class ShengchanQiliaosController extends AppController
    {
        public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [ 
				'ShengchanPaiqis.id'  =>  'desc' //按自增ID倒序即创建时间，顺序asc
			] 
		];
		public function initialize()
		{
			parent::initialize();
			$this->loadComponent('Paginator');
			$this->loadComponent('Flash'); // Include the FlashComponent
		}
        public function index()
        {
		    $this->loadModel("ShengchanPaiqis");
			$this->loadComponent('Paginator');
			//$isfujian = 1;
			$this->set('shengchanPaiqis', $this->paginate($this->ShengchanPaiqis->find('all', array('conditions' => array('ShengchanPaiqis.shenpiresult'=>"1")))));//用于在前端页面中显示
        }
		public function qiliaodan($jid)
        {
			//生产排期
			$this->loadModel("ShengchanPaiqis");
			$shengchanPaiqi = $this->ShengchanPaiqis->findByJid($jid)->firstOrFail();
			$mid = $shengchanPaiqi->mid; // 成品编号
			$this->set('shengchanPaiqi', $shengchanPaiqi);
			//$this->loadModel("LailiaoInitials"); //原材料表
			//物料清单
			$shengchanQiliaoFirsts = $this->ShengchanQiliaos->searchFirstlevels($jid); // 返回的是数组，用 ['字段名'] 取值
			//$chengpinFirstlevels = $this->ChengpinFirstlevels->findByMid($mid);// 用 ->字段名 取值
			$shengchanQiliaoSeconds = array();
			foreach ($shengchanQiliaoFirsts as $shengchanQiliaoFirst){
				$firstlevel = $shengchanQiliaoFirst['firstlevel'];
				$shengchanQiliaoSeconds[$firstlevel] = $this->ShengchanQiliaos->searchSecondlevels($jid, $firstlevel);//获取齐料二级单
			}
			$this->set(compact('shengchanQiliaoFirsts'));	
			$this->set(compact('shengchanQiliaoSeconds'));			
        }
		public function duanque($id)
        {
			$this->loadComponent('Paginator');
			//齐料二级数据单
			$this->loadModel("ShengchanQiliaoSeconds");
			$shengchanQiliaoSecond = $this->ShengchanQiliaoSeconds->findById($id)->firstOrFail();
			$jid = $shengchanQiliaoSecond->jid;
			$mid = $shengchanQiliaoSecond->mid;//成品编号
			$firstlevel = $shengchanQiliaoSecond->firstlevel;
			$secondid = $shengchanQiliaoSecond->secondid;//原材料编号
			//生产排期
			$this->loadModel("ShengchanPaiqis");
			$shengchanPaiqi = $this->ShengchanPaiqis->findByJid($jid)->firstOrFail();
			//物料
			$this->loadModel("LailiaoInitials"); //原材料表
			$this->loadModel("ShengchanWuliaoduanques"); //物料短缺表
			$lailiaoInitial = $this->LailiaoInitials->findByMId($secondid)->firstOrFail();
			if ($this->request->is(['post', 'put'])) {
				$shengchanWuliaoduanque = $this->ShengchanWuliaoduanques->newEntity();
				$this->ShengchanWuliaoduanques->patchEntity($shengchanWuliaoduanque, $this->request->getData());
				//写入数据库
				if ($this->ShengchanWuliaoduanques->save($shengchanWuliaoduanque)) {
					//修改齐料二级数据单对应数据的isduanque
					$shengchanQiliaoSecond->isduanque = 1;
					$this->ShengchanQiliaoSeconds->save($shengchanQiliaoSecond);
				
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'qiliaodan',$jid]);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('shengchanPaiqi', $shengchanPaiqi);
			$this->set('shengchanQiliaoSecond', $shengchanQiliaoSecond);
			$this->set('lailiaoInitial', $lailiaoInitial);
        }
		public function beiliao($id)
		{
			$this->request->allowMethod(['post', 'beiliao']);
			$this->loadModel("ShengchanQiliaoFirsts");
			$this->loadModel("LailiaoInitials");
			$this->loadModel("ShengchanQiliaoSeconds");
			//$this->loadModel("ShengchanQiliaos");
			$this->loadModel("ShengchanPaiqis");
			
			$shengchanQiliaoFirst = $this->ShengchanQiliaoFirsts->findById($id)->firstOrFail();
			$jid = $shengchanQiliaoFirst->jid;
			$firstlevel = $shengchanQiliaoFirst->firstlevel;
			//修改备料标志位为已备料
			$shengchanQiliaoFirst->isbeiliao = 1;
			if ($this->ShengchanQiliaoFirsts->save($shengchanQiliaoFirst)) {
				$this->Flash->success('修改成功');
				//减原材料库存:遍历当前齐料单为jid,一级为firstlevel的所有二级单
				$shengchanQiliaoSeconds = $this->ShengchanQiliaoSeconds->find('all', array('conditions' => array('ShengchanQiliaoSeconds.jid'=>$jid, 'ShengchanQiliaoSeconds.firstlevel'=>$firstlevel)));
				foreach ($shengchanQiliaoSeconds as $shengchanQiliaoSecond){
					$lailiaoinitial = $this->LailiaoInitials->findByMId($shengchanQiliaoSecond['secondid'])->firstOrFail();
					$lailiaoinitial->number -= $shengchanQiliaoSecond['allNeedNum'];
					$this->LailiaoInitials->save($lailiaoinitial);
				}
				//更新已备料个数
				$shengchanPaiqi = $this->ShengchanPaiqis->findByJid($jid)->firstOrFail();
				$shengchanPaiqi->beiliao_number += 1;
				$this->ShengchanPaiqis->save($shengchanPaiqi);
				return $this->redirect(['action' => 'qiliaodan',$jid]);
			}
		}
		public function cancelBeiliao($id)
		{
			$this->request->allowMethod(['post', 'cancelBeiliao']);
			$this->loadModel("ShengchanQiliaoFirsts");
			$this->loadModel("LailiaoInitials");
			$this->loadModel("ShengchanQiliaoSeconds");
			//$this->loadModel("ShengchanQiliaos");
			$this->loadModel("ShengchanPaiqis");
			
			$shengchanQiliaoFirst = $this->ShengchanQiliaoFirsts->findById($id)->firstOrFail();
			$jid = $shengchanQiliaoFirst->jid;
			$firstlevel = $shengchanQiliaoFirst->firstlevel;
			//修改备料标志位为未备料
			$shengchanQiliaoFirst->isbeiliao = 0; 
			if ($this->ShengchanQiliaoFirsts->save($shengchanQiliaoFirst)) {
				$this->Flash->success('修改成功');
				//加原材料库存:遍历当前齐料单为jid,一级为firstlevel的所有二级单
				$shengchanQiliaoSeconds = $this->ShengchanQiliaoSeconds->find('all', array('conditions' => array('ShengchanQiliaoSeconds.jid'=>$jid, 'ShengchanQiliaoSeconds.firstlevel'=>$firstlevel)));
				foreach ($shengchanQiliaoSeconds as $shengchanQiliaoSecond){
					$lailiaoinitial = $this->LailiaoInitials->findByMId($shengchanQiliaoSecond->secondid)->firstOrFail();
					$lailiaoinitial->number += $shengchanQiliaoSecond->allNeedNum;
					$this->LailiaoInitials->save($lailiaoinitial);
				}
				//更新已备料个数
				$shengchanPaiqi = $this->ShengchanPaiqis->findByJid($jid)->firstOrFail();
				$shengchanPaiqi->beiliao_number -= 1;
				$this->ShengchanPaiqis->save($shengchanPaiqi);
				return $this->redirect(['action' => 'qiliaodan',$jid]);
			}
		}
		public function lingliao($id)
		{
			$this->loadModel("ShengchanPaiqis");
			$this->loadModel("ShengchanQiliaoFirsts"); //齐料一级表单
			$this->loadModel("ShengchanQiliaoSeconds");//齐料二级表单
			//齐料单信息
			$shengchanQiliaoFirst = $this->ShengchanQiliaoFirsts->findById($id)->firstOrFail();
			$jid = $shengchanQiliaoFirst->jid; // 齐料单编号
			$firstlevel = $shengchanQiliaoFirst->firstlevel; // 一级分类名称
			$shengchanPaiqi = $this->ShengchanPaiqis->findByJid($jid)->firstOrFail();
			//物料信息
			//$shengchanQiliaoSeconds = $this->ShengchanQiliaoSeconds->find('all', array('conditions' => array('ShengchanQiliaoSeconds.jid'=>$jid, 'ShengchanQiliaoSeconds.firstlevel'=>$firstlevel)));
			$shengchanQiliaoSeconds= $this->ShengchanQiliaos->searchSecondlevels($jid, $firstlevel);//获取齐料二级单
			//提交表单
			if ($this->request->is(['post', 'put'])) {
				$shengchanQiliaoFirst->lingliaoren = $this->request->getData('lingliaoren'); //领料人
				$shengchanQiliaoFirst->islingliao = 1;//修改标志位
				//写入数据库
				if ($this->ShengchanQiliaoFirsts->save($shengchanQiliaoFirst)) {
					//更新已领料个数
					$shengchanPaiqi = $this->ShengchanPaiqis->findByJid($jid)->firstOrFail();
					$shengchanPaiqi->lingliao_number += 1;
					$this->ShengchanPaiqis->save($shengchanPaiqi);
					
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'qiliaodan',$jid]);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('shengchanQiliaoFirst', $shengchanQiliaoFirst);	
			$this->set('shengchanPaiqi', $shengchanPaiqi);	
			$this->set('shengchanQiliaoSeconds', $shengchanQiliaoSeconds);	
		}
		public function search()
        {
			$this->loadModel("ShengchanPaiqis");
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$jid = $this->request->getData('jid');
				$name = $this->request->getData('name');
				$this->set('result', $this->paginate($this->ShengchanPaiqis->find(
						'all', array('conditions'=>array('ShengchanPaiqis.shenpiresult'=>"1","ShengchanPaiqis.jid LIKE '%".$jid."%'",
							"ShengchanPaiqis.name LIKE '%".$name."%'"
						))
				)));
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
        }
    }
