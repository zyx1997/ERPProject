<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class YiyuanXinxichecksController extends AppController
    {
        public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [
				'YiyuanXinxis.istijiao'  =>  'asc',
				'YiyuanXinxis.isshenpi'  =>  'asc',
				'YiyuanXinxis.id'  =>  'desc' //按自增ID倒序即创建时间，顺序asc
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
			$this->loadModel("YiyuanXinxis");
			$istijiao = 1;
			$yiyuanXinxis = $this->YiyuanXinxis->findByIstijiao($istijiao);
			$this->set('yiyuanXinxis', $this->paginate($yiyuanXinxis));
			$this->loadModel("Users");

			$yiyuanShenpis = array();
			foreach($yiyuanXinxis as $yiyuanXinxi){
				if($yiyuanXinxi->isshenpi==1){
					$user = $this->Users->findByGonghao($yiyuanXinxi->shenpiren)->firstOrFail();
					$yiyuanShenpis[$yiyuanXinxi->id] = $user->name;
				}
			}
			$this->set('yiyuanShenpis', $yiyuanShenpis);
        }
		
		public function view($id)
        {
			$this->loadComponent('Paginator');
			$this->loadModel("YiyuanXinxis");
			$yiyuanXinxi = $this->YiyuanXinxis->findById($id)->firstOrFail();
			$this->set('yiyuanXinxi', $yiyuanXinxi);		
        }
		public function checkshouying($id)
        {
			$this->loadComponent('Paginator');
			$this->loadModel("YiyuanXinxis");
			$yiyuanXinxi = $this->YiyuanXinxis->findById($id)->firstOrFail();
			$this->set('yiyuanXinxi', $yiyuanXinxi);
			if ($this->request->is('post')) {
				$result = $this->request->getData('result');
				if($result==0){
					$yiyuanXinxi->isshouying = 0;
				}else{
					$yiyuanXinxi->isshouying = 0;
					$yiyuanXinxi->istijiao = 0;
					$yiyuanXinxi->isshenpi = 0;
					$yiyuanXinxi->shenpiresult = 0;
				}
				if ($this->YiyuanXinxis->save($yiyuanXinxi)) {
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
			$this->loadModel("YiyuanXinxis");
			$yiyuanXinxi = $this->YiyuanXinxis->findById($id)->firstOrFail();
			$this->set('yiyuanXinxi', $yiyuanXinxi);
			if ($this->request->is('post')) {
				$reason = $yiyuanXinxi->shenpireason;
				$this->YiyuanXinxis->patchEntity($yiyuanXinxi, $this->request->getData());
				//写入数据库
				$yiyuanXinxi->shenpireason = $reason.date("Y-m-d").": ".$this->request->getData('shenpireason')."\r\n";
				$yiyuanXinxi->isshenpi = 1;
				$yiyuanXinxi->shenpitime = date("Y-m-d H:i:s");
				$user = $this->request->getSession()->read('user'); 
				$yiyuanXinxi->shenpiren = $user->gonghao;
				if ($this->YiyuanXinxis->save($yiyuanXinxi)) {
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}			
        }
		
		public function search(){
			$this->loadComponent('Paginator');
			$this->loadModel("YiyuanXinxis");
			if ($this->request->is('post')) {
				$name = $this->request->getData('name');
				$lianxiren = $this->request->getData('lianxiren');
				$istijiao = 1;
				$result = $this->YiyuanXinxis->find(
						'all', array('conditions'=>array(
							"YiyuanXinxis.name LIKE '%".$name."%'","YiyuanXinxis.lianxiren LIKE '%".$lianxiren."%'",
							"YiyuanXinxis.istijiao LIKE '%".$istijiao."%'"
						)));
				$this->set('result', $result);
				$this->loadModel("Users");
				$yiyuanShenpis = array();
				foreach($result as $yiyuanXinxi){
					if($yiyuanXinxi->isshenpi==1){
						$user = $this->Users->findByGonghao($yiyuanXinxi->shenpiren)->firstOrFail();
						$yiyuanShenpis[$yiyuanXinxi->id] = $user->name;
					}
				}

				$this->set('yiyuanShenpis', $yiyuanShenpis);
				//$this->set('result', $this->paginate());//分页，用于在前端页面中显示
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}
    }
