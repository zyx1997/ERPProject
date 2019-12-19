<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class CaigouListshenpisController extends AppController
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
		    $this->loadModel("CaigouLists");
			$this->loadComponent('Paginator');
		    $this->set('caigouLists', $this->paginate($this->CaigouLists->find(
				'all', array('conditions' => array(
				'CaigouLists.isshenhe'=>"1", 
				'CaigouLists.shenheok'=>"1"
				))
			)));//用于在前端页面中显示
		}
		public function shenpi($l_id)
        {
			$this->loadModel("CaigouLists");
			$this->loadModel("CaigouListAlls");
			$caigouList = $this->CaigouLists->findByLId($l_id)->firstOrFail();
			$caigouListAlls = $this->CaigouListAlls->findByLId($l_id)->all();
			if ($this->request->is(['post', 'put'])) {
				$this->CaigouLists->patchEntity($caigouList, $this->request->getData());
				$caigouList->shenpiren = "shenpiren-test";
				$caigouList->isshenpi = "1"; 
				//写入数据库
				if ($this->CaigouLists->save($caigouList)) {
					//采购单审批通过时，里面的所有产品采购单的状态也应该更新，
					//更新为"待来料质检"的状态，以便能在原材料库的来料管理中显示
					if($caigouList->shenpiok==1){
						foreach($caigouListAlls as $caigouListAll){
							$caigouListAll->zhuangtai = 0;////更新为"待来料质检"的状态
							$this->CaigouListAlls->save($caigouListAll);
						}
					}
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('caigouList', $caigouList);	
			$this->set('caigouListAlls', $caigouListAlls);	
        }
		public function search()
		{
			$this->loadModel("CaigouLists");
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$l_id = $this->request->getData('l_id');
				$p_name = $this->request->getData('p_name');
				$this->set('result', $this->paginate($this->CaigouLists->find(
					'all', array('conditions'=>array(
						'CaigouLists.isshenhe'=>"1", 
						'CaigouLists.shenheok'=>"1",
						"CaigouLists.l_id LIKE '%".$l_id."%'",
						"CaigouLists.p_name LIKE '%".$p_name."%'"
					))
				)));
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}
		public function shenpiresult($l_id)
        {
			$this->loadModel("CaigouLists");
			$this->loadModel("CaigouListAlls");
			$caigouList = $this->CaigouLists->findByLId($l_id)->firstOrFail();
			$caigouListAlls = $this->CaigouListAlls->findByLId($l_id)->all();
			$this->set('caigouList', $caigouList);	
			$this->set('caigouListAlls', $caigouListAlls);
        }
    }
