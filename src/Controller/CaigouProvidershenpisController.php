<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class CaigouProvidershenpisController extends AppController
    {
        public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
		];
		public function initialize()
		{
			parent::initialize();
			$this->loadComponent('Paginator');
			$this->loadComponent('Flash'); // Include the FlashComponent
		}
		public function index()
        {
		    $this->loadModel("CaigouProviders");
			$this->loadComponent('Paginator');			
			$this->set('caigouProviders', $this->paginate($this->CaigouProviders->find(
				'all', array('conditions' => array(
				'CaigouProviders.isshenhe'=>"1", 
				'CaigouProviders.shenheok'=>"1"
				))
			)));//用于在前端页面中显示
        }
		public function checkresult($id)
        {
			$this->loadModel("CaigouProviders");
			$caigouProvider = $this->CaigouProviders->findById($id)->firstOrFail();
			$this->set('caigouProvider', $caigouProvider);	
        }
		public function shenpi($id)
        {
			$this->loadModel("CaigouProviders");
			$caigouProvider = $this->CaigouProviders->findById($id)->firstOrFail();
			if ($this->request->is(['post', 'put'])) {
				$this->CaigouProviders->patchEntity($caigouProvider, $this->request->getData());
				$caigouProvider->shenpiren = "shenpiren-test";
				$caigouProvider->isshenpi = "1";
				//写入数据库
				if ($this->CaigouProviders->save($caigouProvider)) {
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('caigouProvider', $caigouProvider);	
        }
		public function shenpiresult($id)
        {
			$this->loadModel("CaigouProviders");
			$caigouProvider = $this->CaigouProviders->findById($id)->firstOrFail();
			$this->set('caigouProvider', $caigouProvider);	
        }
		public function search(){
			$this->loadModel("CaigouProviders");
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$p_id = $this->request->getData('p_id');
				$p_name = $this->request->getData('p_name');
				$shuihao = $this->request->getData('shuihao');
				$shenheren = $this->request->getData('shenheren');
				$this->set('result', $this->paginate($this->CaigouProviders->find(
					'all', array('conditions'=>array(
						'CaigouProviders.isshenhe'=>"1", 
						'CaigouProviders.shenheok'=>"1",
						"CaigouProviders.p_id LIKE '%".$p_id."%'",
						"CaigouProviders.p_name LIKE '%".$p_name."%'",
						"CaigouProviders.shuihao LIKE '%".$shuihao."%'",
						"CaigouProviders.shenheren LIKE '%".$shenheren."%'"
					))
				)));
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}
    }
