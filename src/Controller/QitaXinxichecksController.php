<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class QitaXinxichecksController extends AppController
    {
        public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [
				'QitaXinxis.istijiao'  =>  'asc',
				'QitaXinxis.isshenpi'  =>  'asc',
				'QitaXinxis.id'  =>  'desc' //按自增ID倒序即创建时间，顺序asc
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
			$this->loadModel("QitaXinxis");
			$istijiao = 1;
			$qitaXinxis = $this->QitaXinxis->findByIstijiao($istijiao);
			$this->set('qitaXinxis', $this->paginate($qitaXinxis));
			$this->loadModel("Users");

			$qitaShenpis = array();
			foreach($qitaXinxis as $qitaXinxi){
				if($qitaXinxi->isshenpi==1){
					$user = $this->Users->findByGonghao($qitaXinxi->shenpiren)->firstOrFail();
					$qitaShenpis[$qitaXinxi->id] = $user->name;
				}
			}
			$this->set('qitaShenpis', $qitaShenpis);
        }
		
		public function view($id)
        {
			$this->loadComponent('Paginator');
			$this->loadModel("QitaXinxis");
			$qitaXinxi = $this->QitaXinxis->findById($id)->firstOrFail();
			$this->set('qitaXinxi', $qitaXinxi);		
        }
		public function checkshouying($id)
        {
			$this->loadComponent('Paginator');
			$this->loadModel("QitaXinxis");
			$qitaXinxi = $this->QitaXinxis->findById($id)->firstOrFail();
			$this->set('qitaXinxi', $qitaXinxi);
			if ($this->request->is('post')) {
				$result = $this->request->getData('result');
				if($result==0){
					$qitaXinxi->isshouying = 0;
				}else{
					$qitaXinxi->isshouying = 0;
					$qitaXinxi->istijiao = 0;
					$qitaXinxi->isshenpi = 0;
					$qitaXinxi->shenpiresult = 0;
				}
				if ($this->QitaXinxis->save($qitaXinxi)) {
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}			
        }
		public function check($id)
        {
			$this->loadComponent('Paginator');
			$this->loadModel("QitaXinxis");
			$qitaXinxi = $this->QitaXinxis->findById($id)->firstOrFail();
			$this->set('qitaXinxi', $qitaXinxi);
			if ($this->request->is('post')) {
				$reason = $qitaXinxi->shenpireason;
				$this->QitaXinxis->patchEntity($qitaXinxi, $this->request->getData());
				//写入数据库
				$qitaXinxi->shenpireason = $reason.date("Y-m-d").": ".$this->request->getData('shenpireason')."\r\n";
				$qitaXinxi->isshenpi = 1;
				$qitaXinxi->shenpitime = date("Y-m-d H:i:s");
				$user = $this->request->getSession()->read('user'); 
				$qitaXinxi->shenpiren = $user->gonghao;
				if ($this->QitaXinxis->save($qitaXinxi)) {
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}			
        }
		
		public function search(){
			$this->loadComponent('Paginator');
			$this->loadModel("QitaXinxis");
			if ($this->request->is('post')) {
				$name = $this->request->getData('name');
				$lianxiren = $this->request->getData('lianxiren');
				$istijiao = 1;
				$result = $this->QitaXinxis->find(
						'all', array('conditions'=>array(
							"QitaXinxis.name LIKE '%".$name."%'","QitaXinxis.lianxiren LIKE '%".$lianxiren."%'",
							"QitaXinxis.istijiao LIKE '%".$istijiao."%'"
						)));
				$this->set('result', $result);
				$this->loadModel("Users");
				$qitaShenpis = array();
				foreach($result as $qitaXinxi){
					if($qitaXinxi->isshenpi==1){
						$user = $this->Users->findByGonghao($qitaXinxi->shenpiren)->firstOrFail();
						$qitaShenpis[$qitaXinxi->id] = $user->name;
					}
				}

				$this->set('qitaShenpis', $qitaShenpis);
				//$this->set('result', $this->paginate());//分页，用于在前端页面中显示
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}
    }
