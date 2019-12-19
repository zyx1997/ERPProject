<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class ChengpinPeitaosController extends AppController
    {
		public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [ 
				'ChengpinPeitaos.id'  =>  'desc' //按自增ID倒序即创建时间，顺序asc
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
		    $chengpinPeitaos = $this->ChengpinPeitaos->find();
			$this->set('chengpinPeitaos', $this->paginate($chengpinPeitaos));
			$this->loadModel("Users");
			$chengpinUsers = array();
			
			foreach($chengpinPeitaos as $chengpinPeitao){
				if($chengpinPeitao->user!=NULL){
				$user = $this->Users->findByGonghao($chengpinPeitao->user)->firstOrFail();
				$chengpinUsers[$chengpinPeitao->id] = $user->name;
				}else{
					$chengpinUsers[$chengpinPeitao->id] = "";
				}
			}

			$this->set('chengpinUsers', $chengpinUsers);		
        }
		public function searchname($results=NULL)
        {
			$this->loadModel("ChengpinInitials");
			//$result = json_decode($results);
			
			if ($this->request->is('post')) {
				$name = $this->request->getData('searchname');
				//$sqls = $this->ChengpinInitials->searchname($name);
				$isfujian = 0;
				$sqls = $this->ChengpinInitials->find(
						'all', array('conditions'=>array("ChengpinInitials.name LIKE '%".$name."%'",
						"ChengpinInitials.isfujian LIKE '".$isfujian."'"))
				);
				if($sqls){
					$results = json_encode($sqls, JSON_UNESCAPED_UNICODE);
					
				}else{
					return $this->redirect(['action' => 'searchname']);
				}
			}
			$this->set('results', json_decode($results));
        }
		public function searchitem($id,$type,$results=NULL)
        {
			$this->loadModel("ChengpinInitials");
			$this->set('id', $id);
			$this->set('type', $type);
			//$result = json_decode($results);
			$chengpinPeitao = $this->ChengpinPeitaos->findByPtid($id)->firstOrFail();
			$this->set('chengpinPeitao', $chengpinPeitao);
			
			if ($this->request->is('post')) {
				$isfujian = 0;
				if($type==2){
					$isfujian = 1;
				}
				$name = $this->request->getData('searchname');
				$sqls = $this->ChengpinInitials->find(
						'all', array('conditions'=>array("ChengpinInitials.name LIKE '%".$name."%'",
						"ChengpinInitials.isfujian LIKE '".$isfujian."'"))
				);
				if($sqls){
					$results = json_encode($sqls, JSON_UNESCAPED_UNICODE);
				}else{
					return $this->redirect(['action' => 'searchitem',$id,$type]);
				}
			}
			$this->set('results', json_decode($results));
        }
		public function add($mid){
			$this->loadModel("ChengpinInitials");
			$chengpinInitial = $this->ChengpinInitials->findByMid($mid)->firstOrFail();
			$this->set('chengpinInitial', $chengpinInitial);
			$chengpinPeitao = $this->ChengpinPeitaos->newEntity();
			if ($this->request->is('post')) {
				$result = $this->ChengpinPeitaos->getorderid();
				$date = date("Y-m-d");
				$order_id = 1;
				if($date==$result[0]['date']){
					$order_id  = (int)$result[0]['order_id'] +1;
				}
				if($order_id>=100){
					$ptid = "PT".str_replace('-','',$date).$order_id;
				}else if($order_id>=10){
					$ptid = "PT".str_replace('-','',$date)."0".$order_id;
				}else{
					$ptid = "PT".str_replace('-','',$date)."00".$order_id;
				}
				$user = $this->request->getSession()->read('user'); 
				$chengpinPeitao->user = $user->gonghao;
				$chengpinPeitao->ptid = $ptid;
				$chengpinPeitao = $this->ChengpinPeitaos->patchEntity($chengpinPeitao, $this->request->getData());
				//写入数据库
				$mnumber = $this->request->getData('mnumber');
				$mjiage = $this->request->getData('mjiage');
				$chengpinPeitao->cankaojiage = $mnumber*$mjiage;
				$chengpinPeitao->mid = $chengpinInitial->mid;
				$chengpinPeitao->mname = $chengpinInitial->name;
				if ($this->ChengpinPeitaos->save($chengpinPeitao)) {
					$this->Flash->success(__('新增数据成功！'));
					$this->ChengpinPeitaos->updateorderid($order_id,$date);
					return $this->redirect(['action' => 'modify',$chengpinPeitao->id]);
				}else{
					$this->Flash->error(__('添加失败'));
				}
				$this->set('chengpinPeitao', $chengpinPeitao);
			}
        }
		public function additem($id,$mid,$type){
			$this->loadModel("ChengpinInitials");
			$chengpinInitial = $this->ChengpinInitials->findByMid($mid)->firstOrFail();
			$this->set('chengpinInitial', $chengpinInitial);
			$this->set('type', $type);
			$this->set('id', $id);
			$chengpinPeitao = $this->ChengpinPeitaos->findByPtid($id)->firstOrFail();
			if ($this->request->is(['post', 'put'])) {
				//写入数据库
				$user = $this->request->getSession()->read('user'); 
				$chengpinPeitao->user = $user->gonghao;
				if($type==1){
					$mnumber = $this->request->getData('mnumber');
					$mjiage = $this->request->getData('mjiage');
					$chengpinPeitao->cankaojiage -= $chengpinPeitao->mnumber*$chengpinPeitao->mjiage;
					$chengpinPeitao->cankaojiage += $mnumber*$mjiage;
					$chengpinPeitao->mid = $chengpinInitial->mid;
					$chengpinPeitao->mname = $chengpinInitial->name;
					$chengpinPeitao->mnumber = $mnumber;
					$chengpinPeitao->mjiage = $mjiage;
					
					if ($this->ChengpinPeitaos->save($chengpinPeitao)) {
						//$this->Flash->success(__('新增数据成功！'));
						return $this->redirect(['action' => 'modify',$chengpinPeitao->id]);
					}else{
						$this->Flash->error(__('修改失败'));
					}
				}else if($type==2){
					$this->loadModel("ChengpinPeitaoitems");
					$chengpinPeitaoitem = $this->ChengpinPeitaoitems->newEntity();
					$mnumber = $this->request->getData('mnumber');
					$mjiage = $this->request->getData('mjiage');
					$chengpinPeitaoitem->ptid = $id;
					$chengpinPeitaoitem->fujianid = $chengpinInitial->mid;
					$chengpinPeitaoitem->fujianname = $chengpinInitial->name;
					$chengpinPeitaoitem->fujiannumber = $mnumber;
					$chengpinPeitaoitem->fujianjiage = $mjiage;
					if($this->ChengpinPeitaoitems->save($chengpinPeitaoitem)){
						$chengpinPeitao->cankaojiage += $mnumber*$mjiage;
						$this->ChengpinPeitaos->save($chengpinPeitao);
						return $this->redirect(['action' => 'modify',$chengpinPeitao->id]);
					}
				}
			}
			$this->set('chengpinPeitao', $chengpinPeitao);
			
        }
		public function delete($id)
		{
			$this->request->allowMethod(['post', 'delete']);

			$chengpinPeitao = $this->ChengpinPeitaos->findById($id)->firstOrFail();
			if ($this->ChengpinPeitaos->delete($chengpinPeitao)) {
				$this->Flash->success(__('删除成功'));
				return $this->redirect(['action' => 'index']);
			}
		}
		public function deleteitem($id)
		{
			$this->request->allowMethod(['post', 'deleteitem']);
			$this->loadModel("ChengpinPeitaoitems");
			$chengpinPeitaoitem = $this->ChengpinPeitaoitems->findById($id)->firstOrFail();
			if ($this->ChengpinPeitaoitems->delete($chengpinPeitaoitem)) {
				$chengpinPeitao = $this->ChengpinPeitaos->findByPtid($chengpinPeitaoitem->ptid)->firstOrFail();
				$chengpinPeitao->cankaojiage -= $chengpinPeitaoitem->fujiannumber*$chengpinPeitaoitem->fujianjiage;
				$user = $this->request->getSession()->read('user'); 
				$chengpinPeitao->user = $user->gonghao;
				$this->ChengpinPeitaos->save($chengpinPeitao);
				//$this->Flash->success(__('删除成功'));
				return $this->redirect(['action' => 'modify',$chengpinPeitao->id]);
			}
		}
		public function modify($id){
			$this->loadModel("ChengpinPeitaoitems");
			$chengpinPeitao = $this->ChengpinPeitaos->findById($id)->firstOrFail();
			$this->set('chengpinPeitao', $chengpinPeitao);
			$chengpinPeitaoitems = $this->ChengpinPeitaoitems->findByPtid($chengpinPeitao->ptid);
			$this->set('chengpinPeitaoitems', $chengpinPeitaoitems);
			
		}
		public function edit($id){
			$chengpinPeitao = $this->ChengpinPeitaos->findById($id)->firstOrFail();
			$this->set('chengpinPeitao', $chengpinPeitao);
			if ($this->request->is(['post', 'put'])) {
				$this->ChengpinPeitaos->patchEntity($chengpinPeitao, $this->request->getData());
				//写入数据库
				$user = $this->request->getSession()->read('user'); 
				$chengpinPeitao->user = $user->gonghao;
				if ($this->ChengpinPeitaos->save($chengpinPeitao)) {
					//$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'modify',$id]);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
		}
		
		public function search(){
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$name = $this->request->getData('name');
				$mname = $this->request->getData('mname');
				$result = $this->ChengpinPeitaos->find(
						'all', array('conditions'=>array("ChengpinPeitaos.name LIKE '%".$name."%'",
						"ChengpinPeitaos.mname LIKE '%".$mname."%'")));
				$this->set('result', $result);
				$this->loadModel("Users");
				$chengpinUsers = array();
			
				foreach($result as $chengpinPeitao){
					if($chengpinPeitao->user!=NULL){
					$user = $this->Users->findByGonghao($chengpinPeitao->user)->firstOrFail();
					$chengpinUsers[$chengpinPeitao->id] = $user->name;
					}else{
						$chengpinUsers[$chengpinPeitao->id] = "";
					}
				}

				$this->set('chengpinUsers', $chengpinUsers);
			}else{
				$this->Flash->error(__('输入有误，没有查询到结果。'));
				$this->set('result', $result=NULL);
			}
		}
       
    }
