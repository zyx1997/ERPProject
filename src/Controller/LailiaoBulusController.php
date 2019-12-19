<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class LailiaoBulusController extends AppController
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
		    $this->loadModel("LailiaoInitials");
			$this->loadComponent('Paginator');
		    $lailiaoInitials = $this->LailiaoInitials->find();
		    //$this->set(compact('lailiaoInitials'));			
			$this->set('lailiaoInitials', $this->paginate($lailiaoInitials));//用于在前端页面中显示
			$this->loadModel("Users");
			$lailiaoUsers = array();
			
			foreach($lailiaoInitials as $lailiaoInitial){
				if($lailiaoInitial->user!=NULL){
					$user = $this->Users->findByGonghao($lailiaoInitial->user)->firstOrFail();
					$lailiaoUsers[$lailiaoInitial->id] = $user->name;
				}else{
					$lailiaoUsers[$lailiaoInitial->id] = "";
				}
			}
			$this->set('lailiaoUsers', $lailiaoUsers);
        }
		public function add($id)
        {
			$this->loadModel("LailiaoInitials");
			$this->loadModel("LailiaoDictionarys");
			$this->loadComponent('Paginator');
			$lailiaoInitial = $this->LailiaoInitials->findById($id)->firstOrFail();
			$isA = false;
			$weiyibianhao = array('A类');
			if( in_array($lailiaoInitial->fenlei, $weiyibianhao) )
				$isA = true;
			if ($this->request->is('post')) {
				 //库存数量更新
				//每个A类原材料都具有唯一性编号
				//编号规则由用户手动输入，数据库不进行判定，eg."abc"
				//唯一性编号暂定为编号规则+自增序号，eg."abc001"
				if( $isA ){ 
					$qishi = $this->request->getData('qishi');
					$jieshu = $this->request->getData('jieshu');
					$lailiaoInitial->number += $jieshu-$qishi+1;
					$guize = $this->request->getData('guize');
					for( $i=$qishi; $i<=$jieshu; $i++ ){
						$lailiaoDictionary = $this->LailiaoDictionarys->newEntity();
						$lailiaoDictionary->m_id = $lailiaoInitial->m_id;
						if($i>=100){
							$lailiaoDictionary->onlyid = $guize.$i;
						}else if($i>=10){
							$lailiaoDictionary->onlyid = $guize."0".$i;
						}else{
							$lailiaoDictionary->onlyid = $guize."00".$i;
						}
						//写入数据库：A类原材料唯一性编号
						$user = $this->request->getSession()->read('user'); 
						$lailiaoDictionary->user = $user->gonghao;
						if ($this->LailiaoDictionarys->save($lailiaoDictionary)) {
							$this->Flash->success(__('添加成功.'));
						}else{
							$this->Flash->error(__('添加失败.'));
						}
					}
				}else{
					$number = $this->request->getData('number');
					$lailiaoInitial->number += $number;
				}
				//写入数据库：原材料库存更新
				//$user = $this->request->getSession()->read('user'); 
				$lailiaoInitial->user = $user->gonghao;
				if ($this->LailiaoInitials->save($lailiaoInitial)) {
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('lailiaoInitial', $lailiaoInitial);
			$this->set('isA', $isA);
        }
		public function search(){
			$this->loadModel("LailiaoInitials");
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$m_id = $this->request->getData('m_id');
				$name = $this->request->getData('name');
				$xinghao = $this->request->getData('xinghao');
				$result = $this->LailiaoInitials->find(
					'all', array('conditions'=>array(
						"LailiaoInitials.m_id LIKE '%".$m_id."%'",
						"LailiaoInitials.name LIKE '%".$name."%'",
						"LailiaoInitials.xinghao LIKE '%".$xinghao."%'"
					)));
				$this->set('result', $this->paginate($result));
				$this->loadModel("Users");
				$lailiaoUsers = array();
			
				foreach($result as $lailiaoInitial){
					if($lailiaoInitial->user!=NULL){
						$user = $this->Users->findByGonghao($lailiaoInitial->user)->firstOrFail();
						$lailiaoUsers[$lailiaoInitial->id] = $user->name;
					}else{
						$lailiaoUsers[$lailiaoInitial->id] = "";
					}
				}
				$this->set('lailiaoUsers', $lailiaoUsers);
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}
    }
