<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class ChengpinRukusController extends AppController
    {
        public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [ 
				'ChengpinInitials.id'  =>  'desc' //按自增ID倒序即创建时间，顺序asc
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
			
		    //$chengpinInitials = $this->Paginator->paginate($this->ChengpinInitials->find());
		    //$this->set(compact('chengpinInitials'));
			$isfujian = 1;
			$chengpinRukus = $this->ChengpinRukus->findByIsfujian($isfujian);
			$this->set('chengpinRukus', $this->paginate($chengpinRukus));
			$this->loadModel("Users");
			$chengpinUsers = array();
			$chengpinShenpis = array();
			foreach($chengpinRukus as $chengpinRuku){
				if($chengpinRuku->user!=NULL){
					$user = $this->Users->findByGonghao($chengpinRuku->user)->firstOrFail();
					$chengpinUsers[$chengpinRuku->id] = $user->name;
				}else{
					$chengpinUsers[$chengpinRuku->id] = "";
				}
				if($chengpinRuku->iszhijian==1){
					$user = $this->Users->findByGonghao($chengpinRuku->zhijianren)->firstOrFail();
					$chengpinShenpis[$chengpinRuku->id] = $user->name;
				}
			}
			$this->set('chengpinUsers', $chengpinUsers);
			$this->set('chengpinShenpis', $chengpinShenpis);
        }
		public function searchname($results=NULL)
        {
			$this->loadModel("ChengpinInitials");
			//$result = json_decode($results);
			
			if ($this->request->is('post')) {
				$name = $this->request->getData('searchname');
				$sqls = $this->ChengpinRukus->searchname($name);
				if($sqls){
					$results = json_encode($sqls, JSON_UNESCAPED_UNICODE);
				}else{
					$this->redirect(['action' => 'searchname',$results]);
				}
			}
			$this->set('results', json_decode($results));
        }
		public function add($mid){
			$this->loadModel("ChengpinInitials");
			$chengpinInitial = $this->ChengpinInitials->findByMid($mid)->firstOrFail();
			$this->set('chengpinInitial', $chengpinInitial);
			$chengpinRuku = $this->ChengpinRukus->newEntity();
			if ($this->request->is('post')) {
				$chengpinRuku->user = 'test'; // 临时的
				$chengpinRuku->mid = $mid;
				$chengpinRuku->name = $chengpinInitial->name;
				$chengpinRuku->xinghao = $chengpinInitial->xinghao;
				$chengpinRuku->danwei = $chengpinInitial->danwei;
				$chengpinRuku->miaoshu = $chengpinInitial->miaoshu;
				$chengpinRuku->weizhi = $chengpinInitial->weizhi;
				$chengpinRuku->isfujian = 1;
				$chengpinRuku->fenlei = $chengpinInitial->fenlei;
				$chengpinRuku->zhuce = $chengpinInitial->zhuce;
				$chengpinRuku = $this->ChengpinRukus->patchEntity($chengpinRuku, $this->request->getData());
				$user = $this->request->getSession()->read('user'); 
				$chengpinRuku->user = $user->gonghao;
				//写入数据库
				if($this->request->getData('submit')=="提交质检"){
					$chengpinRuku->istijiao = 1;	
				}
				if ($this->ChengpinRukus->save($chengpinRuku)) {
					$this->Flash->success(__('新增数据成功！'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('添加失败！！'));
				}
				$this->set('chengpinRuku', $chengpinRuku);
			}
        }
		public function modify($id)
        {
			$chengpinRuku = $this->ChengpinRukus->findById($id)->firstOrFail();
			if ($this->request->is(['post', 'put'])) {
				$this->ChengpinRukus->patchEntity($chengpinRuku, $this->request->getData());
				//写入数据库
				$user = $this->request->getSession()->read('user'); 
				$chengpinRuku->user = $user->gonghao;
				if($this->request->getData('submit')=="提交质检"){
					$chengpinRuku->istijiao = 1;	
				}
				if ($this->ChengpinRukus->save($chengpinRuku)) {
					//$this->Flash->success(__('修改成功.'));
					
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('chengpinRuku', $chengpinRuku);		
	
        }
		public function view($id){
			$chengpinRuku = $this->ChengpinRukus->findById($id)->firstOrFail();
			$this->set('chengpinRuku', $chengpinRuku);
		}
		public function search(){
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$mid = $this->request->getData('mid');
				$name = $this->request->getData('name');
				$isfujian = 1;
				$result = $this->ChengpinRukus->find(
						'all', array('conditions'=>array("ChengpinRukus.mid LIKE '%".$mid."%'",
							"ChengpinRukus.name LIKE '%".$name."%'","ChengpinRukus.isfujian LIKE '%".$isfujian."%'"
						)));
				$this->set('result', $result);//分页，用于在前端页面中显示
				$this->loadModel("Users");
				$chengpinUsers = array();
				$chengpinShenpis = array();
				foreach($result as $chengpinRuku){
					if($chengpinRuku->user!=NULL){
						$user = $this->Users->findByGonghao($chengpinRuku->user)->firstOrFail();
						$chengpinUsers[$chengpinRuku->id] = $user->name;
					}else{
						$chengpinUsers[$chengpinRuku->id] = "";
					}
					if($chengpinRuku->iszhijian==1){
						$user = $this->Users->findByGonghao($chengpinRuku->zhijianren)->firstOrFail();
						$chengpinShenpis[$chengpinRuku->id] = $user->name;
					}
				}
				$this->set('chengpinUsers', $chengpinUsers);
				$this->set('chengpinShenpis', $chengpinShenpis);
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}
		public function delete($id)
		{
			$this->request->allowMethod(['post', 'delete']);

			$chengpinRuku = $this->ChengpinRukus->findById($id)->firstOrFail();
			if ($this->ChengpinRukus->delete($chengpinRuku)) {
				$this->Flash->success(__('删除成功'));
				return $this->redirect(['action' => 'index']);
			}
		}

    }
