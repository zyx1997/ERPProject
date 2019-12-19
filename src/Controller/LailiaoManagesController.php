<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class LailiaoManagesController extends AppController
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
		    $this->loadModel("CaigouListAlls");
			$this->loadComponent('Paginator');
		    //$lailiaoInitials = $this->Paginator->paginate($this->CaigouProviders->find());
		    //$this->set(compact('lailiaoInitials'));
			$this->set('caigouListAlls', $this->paginate($this->CaigouListAlls->find('all', array('conditions' => array('CaigouListAlls.zhuangtai >='=>'0')))));//用于在前端页面中显示
		}
		public function addquantity($id)
        {
			$this->loadModel("CaigouListAlls");
			$this->loadComponent('Paginator');
			$caigouListAll = $this->CaigouListAlls->findById($id)->firstOrFail();
			if ($this->request->is('post')) {
				$real_quantity = $this->request->getData('real_quantity');
				if( $real_quantity == null ) 
					return $this->redirect(['action' => 'index']);
				$caigouListAll->real_quantity = $real_quantity; 
				$caigouListAll->zhuangtai = '1'; //产品状态更新：待填写价格
				//写入数据库
				if ($this->CaigouListAlls->save($caigouListAll)) {
					$this->Flash->success(__('添加成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('caigouListAll', $caigouListAll);
        }
		public function see($id)
        {
			$this->loadModel("CaigouListAlls");
			$this->loadComponent('Paginator');
			$caigouListAll = $this->CaigouListAlls->findById($id)->firstOrFail();
			$this->set('caigouListAll', $caigouListAll);
        }
		public function search(){
			$this->loadModel("CaigouListAlls");
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$l_id = $this->request->getData('l_id');
				$m_id = $this->request->getData('m_id');
				$zhuangtai = $this->request->getData('zhuangtai');
				
				$result = $this->LailiaoManages->searchdb($l_id, $m_id, $zhuangtai);
				$this->set('result', $result);
				//$this->set('result', $this->paginate());//分页，用于在前端页面中显示
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}
    }
