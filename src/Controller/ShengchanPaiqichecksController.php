<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class ShengchanPaiqichecksController extends AppController
    {
		public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [ 
				'ShengchanPaiqis.isshenpi'  =>  'asc',
				'ShengchanPaiqis.id'  =>  'asc' //按自增ID倒序即创建时间，顺序asc
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
			$this->set('shengchanPaiqis', $this->paginate($this->ShengchanPaiqis->find()));		
        }
		public function check($id)
        {
			$this->loadModel("ShengchanPaiqis");
			$shengchanPaiqi = $this->ShengchanPaiqis->findById($id)->firstOrFail();
			$this->loadModel("ChengpinInitials");
			$this->loadModel("ChengpinFirstlevels");
			$this->loadModel("ChengpinSecondlevels");
			$chengpinInitial = $this->ChengpinInitials->findByMid($shengchanPaiqi->mid)->firstOrFail();
			//$this->set('chengpinInitial', $chengpinInitial);
			$chengpinFirstlevels = $this->ChengpinFirstlevels->findByMid($chengpinInitial->mid);
			$chengpinSecondlevels = array();// = $this->ChengpinSecondlevels->findByMid($chengpinInitial->mid);
			//二级分类查询
			//$this->Post->find('list', array('fields'=>array('Post.id', 'Post.title', 'Post.author_id')));
			//$conditions = array('and' => array('Field.id = 3', 'or' => array('Field.id = 1', 'Field.id = 2')));
			$results;
			foreach ($chengpinFirstlevels as $chengpinFirstlevel){
				$firstlevel = $chengpinFirstlevel['firstlevel'];
				$results = $this->ChengpinSecondlevels->find('all', array('conditions'=>array('ChengpinSecondlevels.mid'=>$shengchanPaiqi->mid, 'ChengpinSecondlevels.firstlevel'=>$firstlevel)));
				$chengpinSecondlevels[$firstlevel] = $results;
			}
			$this->set(compact('chengpinFirstlevels'));	
			$this->set(compact('chengpinSecondlevels'));
			if ($this->request->is(['post', 'put'])) {
				$reason = $shengchanPaiqi->shenpireason;
				$this->ShengchanPaiqis->patchEntity($shengchanPaiqi, $this->request->getData());
				
				//写入数据库
				$result = $this->request->getData('shenpiresult');
				$shengchanPaiqi->shenpireason = $reason.date("Y-m-d").": ".$this->request->getData('shenpireason')."\r\n";
				if ($this->ShengchanPaiqis->save($shengchanPaiqi)) {
					$this->Flash->success(__('修改成功.'));
					//如果审核通过，以下为建立齐料相关的表单
					if($result==1){ 
						//$this->loadModel("ShengchanQiliaos");
						$this->loadModel("ShengchanQiliaoFirsts");
						$this->loadModel("ShengchanQiliaoSeconds");
						$yiji_number = 0;
						//齐料单一级分类表单建立
						foreach($chengpinFirstlevels as $chengpinFirstlevel){
							$yiji_number++;
							$erji_number = 0;
							$shengchanQiliaoFirst = $this->ShengchanQiliaoFirsts->newEntity();
							$shengchanQiliaoFirst->jid = $shengchanPaiqi->jid;
							$shengchanQiliaoFirst->mid = $shengchanPaiqi->mid;
							$shengchanQiliaoFirst->firstlevel = $chengpinFirstlevel->firstlevel;
							$shengchanQiliaoFirst->user = '李四';
							//齐料单二级分类表单建立
							foreach($chengpinSecondlevels[$chengpinFirstlevel->firstlevel] as $chengpinSecondlevel){
								$erji_number++;
								$shengchanQiliaoSecond = $this->ShengchanQiliaoSeconds->newEntity();
								$shengchanQiliaoSecond->jid = $shengchanPaiqi->jid;
								$shengchanQiliaoSecond->mid = $shengchanPaiqi->mid;
								$shengchanQiliaoSecond->firstlevel = $chengpinFirstlevel->firstlevel;
								$shengchanQiliaoSecond->secondlevel = $chengpinSecondlevel['secondlevel'];
								$shengchanQiliaoSecond->secondid = $chengpinSecondlevel['secondid'];
								$shengchanQiliaoSecond->number = $chengpinSecondlevel['number']; //每个一级需要几个二级（数量）
								$shengchanQiliaoSecond->shijiquantity = $shengchanPaiqi->shijiquantity;//实际生产数量（排期的成品个数）
								$shengchanQiliaoSecond->allNeedNum = $shengchanQiliaoSecond->number*$shengchanQiliaoSecond->shijiquantity;//所需二级的总数量=number*shijiquantity，与原材料库的库存数比较
								//$shengchanQiliaoSecond->isduanque = 0; 数据库默认为0
								$this->ShengchanQiliaoSeconds->save($shengchanQiliaoSecond);
							}
							//此一级分类所包含的二级数量
							$shengchanQiliaoFirst->erji_number = $erji_number; 
							$this->ShengchanQiliaoFirsts->save($shengchanQiliaoFirst);
						}
						//一级分类总数
						$shengchanPaiqi->yiji_number = $yiji_number; 
						$this->ShengchanPaiqis->save($shengchanPaiqi);
					}
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('shengchanPaiqi', $shengchanPaiqi);	
        }
		public function search(){
			$this->loadModel("ShengchanPaiqis");
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$jid = $this->request->getData('jid');
				$name = $this->request->getData('name');
				$this->set('result', $this->ShengchanPaiqis->find(
						'all', array('conditions'=>array("ShengchanPaiqis.jid LIKE '%".$jid."%'",
							"ShengchanPaiqis.name LIKE '%".$name."%'"
						))
				));
				//$this->set('result', $this->paginate());//分页，用于在前端页面中显示
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}
    }
