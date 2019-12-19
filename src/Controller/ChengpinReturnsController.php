<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class ChengpinReturnsController extends AppController
    {
        public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [ 
				'ChengpinReturns.id'  =>  'asc' //按自增ID倒序即创建时间，顺序asc
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
		    $chengpinReturns = $this->ChengpinReturns->find();	
			$this->set('chengpinReturns', $this->paginate($chengpinReturns));//用于在前端页面中显示
			$this->loadModel("Users");
			$chengpinUsers = array();
			$chengpinShenpis = array();
			foreach($chengpinReturns as $chengpinReturn){
				if($chengpinReturn->user!=NULL){
					$user = $this->Users->findByGonghao($chengpinReturn->user)->firstOrFail();
					$chengpinUsers[$chengpinReturn->id] = $user->name;
				}else{
					$chengpinUsers[$chengpinReturn->id] = "";
				}
				if($chengpinReturn->isshenpi==1){
					$user = $this->Users->findByGonghao($chengpinReturn->shenpiren)->firstOrFail();
					$chengpinShenpis[$chengpinReturn->id] = $user->name;
				}
			}
			$this->set('chengpinUsers', $chengpinUsers);
			$this->set('chengpinShenpis', $chengpinShenpis);
        }
		public function add()
        {
			$this->loadComponent('Paginator');

			$chengpinReturn = $this->ChengpinReturns->newEntity();
			if ($this->request->is('post')) {
				$result = $this->ChengpinReturns->getorderid();
				$this->set('result', $result[0]);
				$date = date("Y-m-d");
				$order_id = 1;
				if($date==$result[0]['date']){
					$order_id  = (int)$result[0]['order_id'] +1;
				}
				if($order_id>=100){
					$tid = "T".str_replace('-','',$date).$order_id;
				}else if($order_id>=10){
					$tid = "T".str_replace('-','',$date)."0".$order_id;
				}else{
					$tid = "T".str_replace('-','',$date)."00".$order_id;
				}
				
				
				$chengpinReturn = $this->ChengpinReturns->patchEntity($chengpinReturn, $this->request->getData());
				//写入数据库
				$chengpinReturn->tid = $tid;
				if($this->request->getData('submit')=="提交审批"){
					$chengpinReturn->istijiao = 1;
				}
				$user = $this->request->getSession()->read('user'); 
				$chengpinReturn->user = $user->gonghao;
				if ($this->ChengpinReturns->save($chengpinReturn)) {
					$this->Flash->success(__('新增数据成功！'));
					$this->ChengpinReturns->updateorderid($order_id,$date);
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('添加失败！！'));
				}
				$this->set('chengpinReturn', $chengpinReturn);
			}			
        }
		public function modify($id)
        {
			$chengpinReturn = $this->ChengpinReturns->findById($id)->firstOrFail();
			if ($this->request->is(['post', 'put'])) {
				$this->ChengpinReturns->patchEntity($chengpinReturn, $this->request->getData());
				$chengpinReturn->isshenpi = 0;
				$user = $this->request->getSession()->read('user'); 
				$chengpinReturn->user = $user->gonghao;
				if($this->request->getData('submit')=="提交审批"){
					$chengpinReturn->istijiao = 1;
				}
				//写入数据库
				if ($this->ChengpinReturns->save($chengpinReturn)) {
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('chengpinReturn', $chengpinReturn);	
        }
		public function view($id)
        {
			$chengpinReturn = $this->ChengpinReturns->findById($id)->firstOrFail();
			
			$this->set('chengpinReturn', $chengpinReturn);		
        }
		public function print()
        {
					
        }
		public function delete($id)
		{
			$this->request->allowMethod(['post', 'delete']);

			$chengpinReturn = $this->ChengpinReturns->findById($id)->firstOrFail();
			if ($this->ChengpinReturns->delete($chengpinReturn)) {
				$this->Flash->success(__('删除成功'));
				return $this->redirect(['action' => 'index']);
			}
		}

		public function search(){
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$tid = $this->request->getData('tid');
				$fuzeren = $this->request->getData('fuzeren');

				$result = $this->ChengpinReturns->find(
						'all', array('conditions'=>array("ChengpinReturns.tid LIKE '%".$tid."%'",
							"ChengpinReturns.fuzeren LIKE '%".$fuzeren."%'"
						)));
				$this->set('result', $result);
				$this->loadModel("Users");
				$chengpinUsers = array();
				$chengpinShenpis = array();
				foreach($result as $chengpinReturn){
					if($chengpinReturn->user!=NULL){
						$user = $this->Users->findByGonghao($chengpinReturn->user)->firstOrFail();
						$chengpinUsers[$chengpinReturn->id] = $user->name;
					}else{
						$chengpinUsers[$chengpinReturn->id] = "";
					}
					if($chengpinReturn->isshenpi==1){
						$user = $this->Users->findByGonghao($chengpinReturn->shenpiren)->firstOrFail();
						$chengpinShenpis[$chengpinReturn->id] = $user->name;
					}
				}
				$this->set('chengpinUsers', $chengpinUsers);
				$this->set('chengpinShenpis', $chengpinShenpis);
				//$this->set('result', $this->paginate());//分页，用于在前端页面中显示
			}else{
				$this->Flash->error(__('输入有误，没有查询到结果。'));
				$this->set('result', $result=NULL);
			}
		}
    }
