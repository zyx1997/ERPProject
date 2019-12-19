<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class ChengpinBulusController extends AppController
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
			$this->loadModel("ChengpinInitials");
		    $this->loadComponent('Paginator');
			
		    $chengpinInitials = $this->ChengpinInitials->find();
			$this->set('chengpinInitials', $this->paginate($chengpinInitials));//用于在前端页面中显示
			$this->loadModel("Users");
			$chengpinUsers = array();
			
			foreach($chengpinInitials as $chengpinInitial){
				if($chengpinInitial->user!=NULL){
					$user = $this->Users->findByGonghao($chengpinInitial->user)->firstOrFail();
					$chengpinUsers[$chengpinInitial->id] = $user->name;
				}else{
					$chengpinUsers[$chengpinInitial->id] = "";
				}
			}
			$this->set('chengpinUsers', $chengpinUsers);
        }
		public function add($id)
        {
			$this->loadModel("ChengpinInitials");
			$this->loadModel("ChengpinDictionarys");
			$this->loadComponent('Paginator');
			$chengpinInitial = $this->ChengpinInitials->findById($id)->firstOrFail();
			if ($this->request->is(['post', 'put'])) {
				if($chengpinInitial->isonlyid==1){
				//$num = $this->request->getData('number');
					$guize = $this->request->getData('guize');
					$qishi = $this->request->getData('qishi');
					$jieshu = $this->request->getData('jieshu');
					$chengpinInitial->number += $jieshu-$qishi+1;
					for($i=$qishi; $i<=$jieshu; $i++){
						$chengpinDictionary = $this->ChengpinDictionarys->newEntity();
						$chengpinDictionary->mid = $chengpinInitial->mid;
						$chengpinDictionary->name = $chengpinInitial->name;
						if($i>=100){
							$chengpinDictionary->onlyid = $guize.$i;
						}else if($i>=10){
							$chengpinDictionary->onlyid = $guize."0".$i;
						}else{
							$chengpinDictionary->onlyid = $guize."00".$i;
						}
						if ($this->ChengpinDictionarys->save($chengpinDictionary)) {
							$this->Flash->success(__('添加成功.'));
						}else{
							$this->Flash->error(__('添加失败.'));
						}
					}
				}else{
					$chengpinInitial->number += $this->request->getData('number');
				}
				//写入数据库
				$user = $this->request->getSession()->read('user'); 
				$chengpinInitial->user = $user->gonghao;
				if ($this->ChengpinInitials->save($chengpinInitial)) {
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('chengpinInitial', $chengpinInitial);
        }
		public function search(){
			$this->loadModel("ChengpinInitials");
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$mid = $this->request->getData('mid');
				$name = $this->request->getData('name');
				$xinghao = $this->request->getData('xinghao');
				$isfujian = $this->request->getData('isfujian');
				$result = $this->ChengpinInitials->find(
						'all', array('conditions'=>array("ChengpinInitials.mid LIKE '%".$mid."%'",
							"ChengpinInitials.name LIKE '%".$name."%'","ChengpinInitials.xinghao LIKE '%".$xinghao."%'",
							"ChengpinInitials.isfujian LIKE '%".$isfujian."%'"
						)));
				$this->set('result', $result);//分页，用于在前端页面中显示
				$this->loadModel("Users");
				$chengpinUsers = array();
			
				foreach($result as $chengpinInitial){
					if($chengpinInitial->user!=NULL){
						$user = $this->Users->findByGonghao($chengpinInitial->user)->firstOrFail();
						$chengpinUsers[$chengpinInitial->id] = $user->name;
					}else{
						$chengpinUsers[$chengpinInitial->id] = "";
					}
				}
				$this->set('chengpinUsers', $chengpinUsers);
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}

    }
