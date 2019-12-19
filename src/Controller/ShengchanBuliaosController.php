<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class ShengchanBuliaosController extends AppController
    {
        public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [ 
				'shengchanBuliaos.id'  =>  'desc' //按自增ID倒序即创建时间，顺序asc
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
		    $this->loadComponent('Paginator');
			$shengchanBuliaos = $this->ShengchanBuliaos->find();
			$this->set('shengchanBuliaos', $this->paginate($shengchanBuliaos));
			$this->loadModel("LailiaoInitials");
			$kucunquantitys = array();
			foreach ($shengchanBuliaos as $shengchanBuliao){
				$lailiaoinitial = $this->LailiaoInitials->findByMId($shengchanBuliao->mid)->firstOrFail();
				$kucunquantitys[$shengchanBuliao->mid] = $lailiaoinitial->number;
			}
			$this->set('kucunquantitys', $kucunquantitys);
			
        }
		public function addform()
        {
			$this->loadModel("ShengchanPaiqis");
		    $this->loadComponent('Paginator');
			$this->set('shengchanPaiqis', $this->paginate($this->ShengchanPaiqis->find()));		
			
        }
		public function additem($mid,$jid)
        {
			$this->loadModel("ChengpinSecondlevels");
			$chengpinSecondlevels = $this->ChengpinSecondlevels->findByMid($mid);
			$this->set(compact('chengpinSecondlevels'));
			$this->set('jid', $jid);
        }
		public function add($mid,$jid)
        {
			$this->loadModel("LailiaoInitials");
			$lailiaoinitial = $this->LailiaoInitials->findByMId($mid)->firstOrFail();
			$this->set('lailiaoinitial', $lailiaoinitial);
			$this->set('jid', $jid);
			//自动生成补料单号
			$this->loadComponent('Paginator');
			$result = $this->ShengchanBuliaos->getorderid();
			$date = date("Y-m-d");
			$order_id = 1;
			if($date==$result[0]['date']){
				$order_id  = (int)$result[0]['order_id'] +1;
			}
			if($order_id>=100){
				$bid = "B".str_replace('-','',$date).$order_id;
			}else if($order_id>=10){
				$bid = "B".str_replace('-','',$date)."0".$order_id;
			}else{
				$bid = "B".str_replace('-','',$date)."00".$order_id;
			}
			$this->set('bid', $bid);
			$shengchanBuliao = $this->ShengchanBuliaos->newEntity();
			if ($this->request->is('post')) {
				$shengchanBuliao->user = 'test'; // 临时的
				$shengchanBuliao->jid = $jid;
				$shengchanBuliao->mid = $lailiaoinitial->m_id;
				$shengchanBuliao->mname = $lailiaoinitial->name;
				$shengchanBuliao->miaoshu = $lailiaoinitial->miaoshu;
				$shengchanBuliao = $this->ShengchanBuliaos->patchEntity($shengchanBuliao, $this->request->getData());
				//写入数据库
				if ($this->ShengchanBuliaos->save($shengchanBuliao)) {
					$this->Flash->success(__('新增数据成功！'));
					$this->ShengchanBuliaos->updateorderid($order_id,$date);
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('添加失败！！'));
				}
				$this->set('shengchanBuliao', $shengchanBuliao);
			}
        }
		public function modify($id)
        {
			$shengchanBuliao = $this->ShengchanBuliaos->findById($id)->firstOrFail();
			if ($this->request->is(['post', 'put'])) {
				$this->ShengchanBuliaos->patchEntity($shengchanBuliao, $this->request->getData());
				//写入数据库
				$shengchanBuliao->isshenpi = 0;
				if ($this->ShengchanBuliaos->save($shengchanBuliao)) {
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('shengchanBuliao', $shengchanBuliao);			
        }
		public function lingliao($id)
        {
			$shengchanBuliao = $this->ShengchanBuliaos->findById($id)->firstOrFail();
			if ($this->request->is(['post', 'put'])) {
				$this->ShengchanBuliaos->patchEntity($shengchanBuliao, $this->request->getData());
				//写入数据库
				if ($this->ShengchanBuliaos->save($shengchanBuliao)) {
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('shengchanBuliao', $shengchanBuliao);			
        }
		public function search()
        {
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$bid = $this->request->getData('bid');
				$jid = $this->request->getData('jid');
				$mname = $this->request->getData('mname');
				$this->set('result', $this->ShengchanBuliaos->find(
						'all', array('conditions'=>array("ShengchanBuliaos.bid LIKE '%".$bid."%'",
							"ShengchanBuliaos.jid LIKE '%".$jid."%'","ShengchanBuliaos.mname LIKE '%".$mname."%'"
						))
				));
				//$this->set('result', $this->paginate());//分页，用于在前端页面中显示
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
        }
		public function delete($id)
		{
			$this->request->allowMethod(['post', 'delete']);

			$shengchanBuliao = $this->ShengchanBuliaos->findById($id)->firstOrFail();
			if ($this->ShengchanBuliaos->delete($shengchanBuliao)) {
				$this->Flash->success(__('删除成功'));
				return $this->redirect(['action' => 'index']);
			}
		}
		public function beiliao($id)
		{
			$this->request->allowMethod(['post', 'beiliao']);
			$shengchanBuliao = $this->ShengchanBuliaos->findById($id)->firstOrFail();
			$this->loadModel("LailiaoInitials");
			$lailiaoinitial = $this->LailiaoInitials->findByMId($shengchanBuliao->mid)->firstOrFail();
			//修改备料标志位为已备料
			$shengchanBuliao->isbeiliao = 1;
			if ($this->ShengchanBuliaos->save($shengchanBuliao)) {
				$this->Flash->success(__('修改成功'));
				//减原材料库存
				$lailiaoinitial->number -= $shengchanBuliao->buliaoquantity;
				$this->LailiaoInitials->save($lailiaoinitial);
				return $this->redirect(['action' => 'index']);
			}
		}
		public function quxiaobeiliao($id)
		{
			$this->request->allowMethod(['post', 'beiliao']);
			$shengchanBuliao = $this->ShengchanBuliaos->findById($id)->firstOrFail();
			$this->loadModel("LailiaoInitials");
			$lailiaoinitial = $this->LailiaoInitials->findByMId($shengchanBuliao->mid)->firstOrFail();
			//修改备料标志位为未备料
			$shengchanBuliao->isbeiliao = 0;
			if ($this->ShengchanBuliaos->save($shengchanBuliao)) {
				$this->Flash->success(__('修改成功'));
				//加原材料库存
				$lailiaoinitial->number += $shengchanBuliao->buliaoquantity;
				$this->LailiaoInitials->save($lailiaoinitial);
				return $this->redirect(['action' => 'index']);
			}
		}
		public function duanque($id)
        {
			$this->loadComponent('Paginator');
			//齐料二级数据单
			$shengchanBuliao = $this->ShengchanBuliaos->findById($id)->firstOrFail();
			$jid = $shengchanBuliao->jid; //生产计划单号
			$mid = $shengchanBuliao->mid; // 物料编号
			//生产排期
			$this->loadModel("ShengchanPaiqis");
			$shengchanPaiqi = $this->ShengchanPaiqis->findByJid($jid)->firstOrFail();
			//物料
			$this->loadModel("LailiaoInitials"); //原材料表
			$this->loadModel("ShengchanWuliaoduanques"); //物料短缺表
			$lailiaoInitial = $this->LailiaoInitials->findByMId($mid)->firstOrFail();
			if ($this->request->is(['post', 'put'])) {
				$shengchanWuliaoduanque = $this->ShengchanWuliaoduanques->newEntity();
				$this->ShengchanWuliaoduanques->patchEntity($shengchanWuliaoduanque, $this->request->getData());
				//写入数据库
				if ($this->ShengchanWuliaoduanques->save($shengchanWuliaoduanque)) {
					//修改齐料二级数据单对应数据的isduanque
					$shengchanBuliao->isduanque = 1;
					$this->ShengchanBuliaos->save($shengchanBuliao);
				
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('shengchanPaiqi', $shengchanPaiqi);
			$this->set('shengchanBuliao', $shengchanBuliao);
			$this->set('lailiaoInitial', $lailiaoInitial);
        }

    }
