<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class CaigouRisksController extends AppController
    {
        public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [ 
				'CaigouProviders.id'  =>  'desc' //按自增ID倒序即创建时间，顺序asc
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
		    $this->loadModel("CaigouProviders");
			$this->loadComponent('Paginator');
		    //$lailiaoInitials = $this->Paginator->paginate($this->CaigouProviders->find());
		    //$this->set(compact('lailiaoInitials'));			
			$this->set('caigouProviders', $this->paginate($this->CaigouProviders->find(
				'all', array('conditions' => array(
				'CaigouProviders.pinggu IS NOT NULL', 
				'CaigouProviders.isshenhe'=>"1", 
				'CaigouProviders.shenheok'=>"1", 
				'CaigouProviders.isshenpi'=>"1", 
				'CaigouProviders.shenpiok'=>"1"
				))
			)));//用于在前端页面中显示
        }
		public function searchpname($encode_results=NULL)
        {
			$this->loadModel("CaigouRisks");
			$this->loadModel("CaigouProviders");
			$this->loadComponent('Paginator');
			$this->set('decode_results', NULL);
			if ($this->request->is('post')) {
				$p_name = $this->request->getData('p_name');
				$this->set('decode_results', $this->CaigouProviders->find(
					'all', array('conditions'=>array(
					"CaigouProviders.p_name LIKE '%".$p_name."%'",
					'CaigouProviders.isshenhe'=>"1", 
					'CaigouProviders.shenheok'=>"1", 
					'CaigouProviders.isshenpi'=>"1", 
					'CaigouProviders.shenpiok'=>"1"
					))
				));
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', NULL);
			}
        }
		public function add($p_id)
		{
			$this->loadModel("CaigouProviders");
			$caigouProvider = $this->CaigouProviders->findByPId($p_id)->firstOrFail();
			$caigouRisk = $this->CaigouRisks->newEntity();
			if ($this->request->is('post')) {
				$this->CaigouProviders->patchEntity($caigouProvider, $this->request->getData());
				$caigouProvider->user = 'add-test'; // 临时的
				//写入数据库
				if ($this->CaigouProviders->save($caigouProvider)) {
					// 每次更新评估分数的同时，需要将新分数添加至provider_risks库
					$caigouRisk->p_id = $p_id;
					$caigouRisk->user = $caigouProvider->user;
					$caigouRisk->p_name = $caigouProvider->p_name;
					$caigouRisk->pinggu = $caigouProvider->pinggu;
					$caigouRisk->pg_beizhu = $caigouProvider->pg_beizhu;
					$this->CaigouRisks->save($caigouRisk);
					
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('caigouProvider', $caigouProvider);
        }
		public function modify($id)
        {
			$this->loadModel("CaigouProviders");
			$caigouProvider = $this->CaigouProviders->findById($id)->firstOrFail();
			$caigouRisk = $this->CaigouRisks->newEntity();
			if ($this->request->is(['post', 'put'])) {
				$this->CaigouProviders->patchEntity($caigouProvider, $this->request->getData());
				//写入数据库
				if ($this->CaigouProviders->save($caigouProvider)) {
					// 每次更新评估分数的同时，需要将新分数添加至provider_risks库
					$caigouRisk->p_id = $caigouProvider->p_id;
					$caigouRisk->user = $caigouProvider->user;
					$caigouRisk->p_name = $caigouProvider->p_name;
					$caigouRisk->pinggu = $caigouProvider->pinggu;
					$caigouRisk->pg_beizhu = $caigouProvider->pg_beizhu;
					$this->CaigouRisks->save($caigouRisk);
					
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('caigouProvider', $caigouProvider);	
        }
		public function search(){
			$this->loadModel("CaigouProviders");
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$p_id = $this->request->getData('p_id');
				$p_name = $this->request->getData('p_name');
				$shuihao = $this->request->getData('shuihao');
				$lowscore = $this->request->getData('lowscore');
				$highscore = $this->request->getData('highscore');
				if( $lowscore == "" ) 	$lowscore = 0;
				if( $highscore == "" ) 	$highscore = 100;
				$this->set('result', $this->paginate($this->CaigouProviders->find(
					'all', array('conditions'=>array(
						'CaigouProviders.pinggu IS NOT NULL',
						'CaigouProviders.isshenhe'=>"1", 
						'CaigouProviders.shenheok'=>"1", 
						'CaigouProviders.isshenpi'=>"1", 
						'CaigouProviders.shenpiok'=>"1",
						"CaigouProviders.p_id LIKE '%".$p_id."%'",
						"CaigouProviders.p_name LIKE '%".$p_name."%'",
						"CaigouProviders.pinggu >= ".$lowscore." ",
						"CaigouProviders.pinggu <= ".$highscore." "
					))
				)));
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}
		public function history($p_id)
        {
			$this->loadComponent('Paginator');
			$this->loadModel("CaigouProviders");
			$caigouProvider = $this->CaigouProviders->findByPId($p_id)->firstOrFail();
			//$history = $this->CaigouRisks->gethistoryrisk($p_id);//用于在前端页面中显示
			//$this->set('history', $history);
			$this->set('caigouProvider', $caigouProvider);	
			$this->set('history', $this->paginate($this->CaigouRisks->find('all', array('conditions' => array('CaigouRisks.p_id'=>$p_id)))));//用于在前端页面中显示
		}
    }
