<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class LailiaoInformsController extends AppController
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
			$this->set('caigouListAlls', $this->paginate($this->CaigouListAlls->find('all', array('conditions' => array('CaigouListAlls.zhuangtai  >='=>'0')))));//用于在前端页面中显示
		}
		public function addprice($id)
        {
			$this->loadModel("CaigouListAlls");
			$this->loadComponent('Paginator');
			$caigouListAll = $this->CaigouListAlls->findById($id)->firstOrFail();
			if ($this->request->is('post')) {
				$this->CaigouListAlls->patchEntity($caigouListAll, $this->request->getData());
				$caigouListAll->zhuangtai = '2'; //产品状态更新：已归档
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
			$caigouListAll = $this->CaigouListAlls->findById($id)->firstOrFail();
			$this->set('caigouListAll', $caigouListAll);	
        }
		public function search(){
			$this->loadModel("CaigouListAlls");
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$m_id = $this->request->getData('m_id');
				$name = $this->request->getData('name');
				$this->set('result', $this->paginate($this->CaigouListAlls->find(
					'all', array('conditions'=>array(
						'CaigouListAlls.zhuangtai  >='=>'0',
						"CaigouListAlls.m_id LIKE '%".$m_id."%'",
						"CaigouListAlls.name LIKE '%".$name."%'"
					))
				)));
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}
    }
