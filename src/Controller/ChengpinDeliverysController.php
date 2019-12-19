<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class ChengpinDeliverysController extends AppController
    {
        public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [ 
				'ChengpinDeliverys.id'  =>  'asc' //按自增ID倒序即创建时间，顺序asc
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
		    $chengpinDeliverys = $this->ChengpinDeliverys->find();	
			$this->set('chengpinDeliverys', $this->paginate($chengpinDeliverys));//用于在前端页面中显示
			$this->loadModel("Users");
			$chengpinUsers = array();
			$chengpinShenpis = array();
			foreach($chengpinDeliverys as $chengpinDelivery){
				if($chengpinDelivery->user!=NULL){
					$user = $this->Users->findByGonghao($chengpinDelivery->user)->firstOrFail();
					$chengpinUsers[$chengpinDelivery->id] = $user->name;
				}else{
					$chengpinUsers[$chengpinDelivery->id] = "";
				}
				if($chengpinDelivery->isshenpi==1){
					$user = $this->Users->findByGonghao($chengpinDelivery->shenpiren)->firstOrFail();
					$chengpinShenpis[$chengpinDelivery->id] = $user->name;
				}
			}
			$this->set('chengpinUsers', $chengpinUsers);
			$this->set('chengpinShenpis', $chengpinShenpis);
        }
		public function add()
        {
			
			$this->loadComponent('Paginator');
			$chengpinDelivery = $this->ChengpinDeliverys->newEntity();
			if ($this->request->is('post')) {
				$result = $this->ChengpinDeliverys->getorderid();
				$date = date("Y-m-d");
				$order_id = 1;
				if($date==$result[0]['date']){
					$order_id  = (int)$result[0]['order_id'] +1;
				}
				if($order_id>=100){
					$sid = "S".str_replace('-','',$date).$order_id;
				}else if($order_id>=10){
					$sid = "S".str_replace('-','',$date)."0".$order_id;
				}else{
					$sid = "S".str_replace('-','',$date)."00".$order_id;
				}
				$chengpinDelivery->sid = $sid;
				$user = $this->request->getSession()->read('user'); 
				$chengpinDelivery->user = $user->gonghao;
				$chengpinDelivery = $this->ChengpinDeliverys->patchEntity($chengpinDelivery, $this->request->getData());
				//写入数据库
				if($this->request->getData('submit')=="提交审批"){
					$chengpinDelivery->istijiao = 1;
				}
				if ($this->ChengpinDeliverys->save($chengpinDelivery)) {
					//$this->Flash->success(__('新增数据成功！'));
					$this->ChengpinDeliverys->updateorderid($order_id,$date);
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('添加失败！！'));
				}
				$this->set('chengpinDelivery', $chengpinDelivery);
			}
		
        }
		public function modify($id)
        {
			$chengpinDelivery = $this->ChengpinDeliverys->findById($id)->firstOrFail();
			if ($this->request->is(['post', 'put'])) {
				$this->ChengpinDeliverys->patchEntity($chengpinDelivery, $this->request->getData());
				//写入数据库
				$chengpinDelivery->isshenpi = 0;
				$user = $this->request->getSession()->read('user'); 
				$chengpinDelivery->user = $user->gonghao;
				if($this->request->getData('submit')=="提交审批"){
					$chengpinDelivery->istijiao = 1;
				}
				if ($this->ChengpinDeliverys->save($chengpinDelivery)) {
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('chengpinDelivery', $chengpinDelivery);		
        }
		public function view($id)
        {
			$chengpinDelivery = $this->ChengpinDeliverys->findById($id)->firstOrFail();
			
			$this->set('chengpinDelivery', $chengpinDelivery);		
        }
		public function print()
        {
				
        }
		public function delete($id)
		{
			$this->request->allowMethod(['post', 'delete']);

			$chengpinDelivery = $this->ChengpinDeliverys->findById($id)->firstOrFail();
			if ($this->ChengpinDeliverys->delete($chengpinDelivery)) {
				$this->Flash->success(__('删除成功'));
				return $this->redirect(['action' => 'index']);
			}
		}
		public function search(){
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$sid = $this->request->getData('sid');
				$hetongid = $this->request->getData('hetongid');
				$gdanwei = $this->request->getData('gdanwei');
				$result = $this->ChengpinDeliverys->find(
						'all', array('conditions'=>array("ChengpinDeliverys.sid LIKE '%".$sid."%'",
							"ChengpinDeliverys.hetongid LIKE '%".$hetongid."%'","ChengpinDeliverys.gdanwei LIKE '%".$gdanwei."%'"
						)));
				$this->set('result', $result);
				$this->loadModel("Users");
				$chengpinUsers = array();
				$chengpinShenpis = array();
				foreach($result as $chengpinDelivery){
					if($chengpinDelivery->user!=NULL){
						$user = $this->Users->findByGonghao($chengpinDelivery->user)->firstOrFail();
						$chengpinUsers[$chengpinDelivery->id] = $user->name;
					}else{
						$chengpinUsers[$chengpinDelivery->id] = "";
					}
					if($chengpinDelivery->isshenpi==1){
						$user = $this->Users->findByGonghao($chengpinDelivery->shenpiren)->firstOrFail();
						$chengpinShenpis[$chengpinDelivery->id] = $user->name;
					}
				}
				$this->set('chengpinUsers', $chengpinUsers);
				$this->set('chengpinShenpis', $chengpinShenpis);
				//$this->set('result', $this->paginate());//分页，用于在前端页面中显示
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}
    }
