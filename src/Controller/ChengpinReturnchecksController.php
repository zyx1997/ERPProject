<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class ChengpinReturnchecksController extends AppController
    {
		public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [ 
				'ChengpinReturns.isshenpi'  =>  'asc',
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
			//$admin_users = ClassRegistry::init('ChengpinReturns');
			$this->loadModel("ChengpinReturns");
		    $this->loadComponent('Paginator');
			$istijiao = 1;
		    $chengpinReturns = $this->ChengpinReturns->findByIstijiao($istijiao);
			$this->set('chengpinReturns', $this->paginate($chengpinReturns));//用于在前端页面中显示
			$this->loadModel("Users");
			$chengpinShenpis = array();
			foreach($chengpinReturns as $chengpinReturn){
				if($chengpinReturn->isshenpi==1){
					$user = $this->Users->findByGonghao($chengpinReturn->shenpiren)->firstOrFail();
					$chengpinShenpis[$chengpinReturn->id] = $user->name;
				}
			}
			$this->set('chengpinShenpis', $chengpinShenpis);			
        }
		public function check($id)
        {
			$this->loadModel("ChengpinReturns");
			$chengpinReturn = $this->ChengpinReturns->findById($id)->firstOrFail();
			if ($this->request->is(['post', 'put'])) {
				$this->ChengpinReturns->patchEntity($chengpinReturn, $this->request->getData());
				//写入数据库
				$user = $this->request->getSession()->read('user'); 
				$chengpinReturn->shenpiren = $user->gonghao;
				if ($this->ChengpinReturns->save($chengpinReturn)) {
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('chengpinReturn', $chengpinReturn);	
        }
		public function search(){
			$this->loadModel("ChengpinReturns");
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$tid = $this->request->getData('tid');
				$fuzeren = $this->request->getData('fuzeren');
				$istijiao = 1;
				$result = $this->ChengpinReturns->find(
						'all', array('conditions'=>array("ChengpinReturns.tid LIKE '%".$tid."%'",
							"ChengpinReturns.fuzeren LIKE '%".$fuzeren."%'","ChengpinReturns.istijiao LIKE '%".$istijiao."%'"
						)));
				$this->set('result', $result);
				$this->loadModel("Users");
				$chengpinShenpis = array();
				foreach($result as $chengpinReturn){
					if($chengpinReturn->isshenpi==1){
						$user = $this->Users->findByGonghao($chengpinReturn->shenpiren)->firstOrFail();
						$chengpinShenpis[$chengpinReturn->id] = $user->name;
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
