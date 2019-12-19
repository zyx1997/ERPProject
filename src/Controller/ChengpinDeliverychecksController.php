<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class ChengpinDeliverychecksController extends AppController
    {
		public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [ 
				'ChengpinDeliverys.isshenpi'  =>  'asc',
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
			//$admin_users = ClassRegistry::init('ChengpinDeliverys');
			$this->loadModel("ChengpinDeliverys");
		    $this->loadComponent('Paginator');
		    //$chengpinDeliverys = $this->Paginator->paginate($this->ChengpinDeliverys->find());
			$istijiao = 1;
			//$this->set('chengpinDeliverys', $this->paginate($this->ChengpinDeliverys->findByIstijiao($istijiao)));
		    $chengpinDeliverys = $this->ChengpinDeliverys->findByIstijiao($istijiao);
			$this->set('chengpinDeliverys', $this->paginate($chengpinDeliverys));//用于在前端页面中显示
			$this->loadModel("Users");
			$chengpinShenpis = array();
			foreach($chengpinDeliverys as $chengpinDelivery){
				if($chengpinDelivery->isshenpi==1){
					$user = $this->Users->findByGonghao($chengpinDelivery->shenpiren)->firstOrFail();
					$chengpinShenpis[$chengpinDelivery->id] = $user->name;
				}
			}
			$this->set('chengpinShenpis', $chengpinShenpis);	
        }
		public function check($id)
        {
			$this->loadModel("ChengpinDeliverys");
			$chengpinDelivery = $this->ChengpinDeliverys->findById($id)->firstOrFail();
			if ($this->request->is(['post', 'put'])) {
				$this->ChengpinDeliverys->patchEntity($chengpinDelivery, $this->request->getData());
				//写入数据库
				$user = $this->request->getSession()->read('user'); 
				$chengpinDelivery->shenpiren = $user->gonghao;
				if ($this->ChengpinDeliverys->save($chengpinDelivery)) {
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('chengpinDelivery', $chengpinDelivery);	
        }
		public function search(){
			$this->loadModel("ChengpinDeliverys");
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$sid = $this->request->getData('sid');
				$hetongid = $this->request->getData('hetongid');
				$gdanwei = $this->request->getData('gdanwei');
				$istijiao = 1;
				$result = $this->ChengpinDeliverys->find(
						'all', array('conditions'=>array("ChengpinDeliverys.sid LIKE '%".$sid."%'",
							"ChengpinDeliverys.hetongid LIKE '%".$hetongid."%'","ChengpinDeliverys.gdanwei LIKE '%".$gdanwei."%'",
							"ChengpinDeliverys.istijiao LIKE '%".$istijiao."%'"
						)));
				$this->set('result', $result);
				$this->loadModel("Users");
				$chengpinShenpis = array();
				foreach($result as $chengpinDelivery){
					if($chengpinDelivery->isshenpi==1){
						$user = $this->Users->findByGonghao($chengpinDelivery->shenpiren)->firstOrFail();
						$chengpinShenpis[$chengpinDelivery->id] = $user->name;
					}
				}
				$this->set('chengpinShenpis', $chengpinShenpis);
				//$this->set('result', $this->paginate());//分页，用于在前端页面中显示
			}else{
				$this->Flash->error(__('输入有误，没有查询到结果。'));
				$this->set('result', $result=NULL);
			}
		}
    }
