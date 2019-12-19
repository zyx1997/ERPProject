<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class ChengpinShengchanrukuchecksController extends AppController
    {
        public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [ 
				'ShengchanShishis.iszhijian'  =>  'asc',
				'ShengchanShishis.id'  =>  'asc' //按自增ID倒序即创建时间，顺序asc
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
			$this->loadModel("ShengchanShishis");
		    $this->loadComponent('Paginator');
			$isbaosong = 1;
			$shengchanShishis = $this->ShengchanShishis->findByIsbaosong($isbaosong);
			$this->set('shengchanShishis', $this->paginate($shengchanShishis));
			$this->loadModel("Users");
			$shengchanShenpis = array();
			foreach($shengchanShishis as $shengchanShishi){
				if($shengchanShishi->iszhijian==1){
					$user = $this->Users->findByGonghao($shengchanShishi->zhijianren)->firstOrFail();
					$shengchanShenpis[$shengchanShishi->id] = $user->name;
				}
			}
			$this->set('shengchanShenpis', $shengchanShenpis);
        }
		public function check($id)
        {
			$this->loadModel("ShengchanShishis");
			$shengchanShishi = $this->ShengchanShishis->findById($id)->firstOrFail();
			
			if ($this->request->is(['post', 'put'])) {
				$reason = $shengchanShishi->zhijianreason;
				$this->ShengchanShishis->patchEntity($shengchanShishi, $this->request->getData());
				$shengchanShishi->zhijianreason = $reason.date("Y-m-d").": ".$this->request->getData('zhijianreason')."\r\n";
				//写入数据库
				$user = $this->request->getSession()->read('user'); 
				$shengchanShishi->zhijianren = $user->gonghao;
				if ($this->ShengchanShishis->save($shengchanShishi)) {
					$this->Flash->success(__('修改成功.'));
					if($this->request->getData('zhijianresult')==1){
						$this->loadModel("ChengpinDictionarys");
						$chengpinDictionary = $this->ChengpinDictionarys->newEntity();
						$chengpinDictionary->mid = $shengchanShishi->mid;
						$chengpinDictionary->name = $shengchanShishi->mname;
						$chengpinDictionary->onlyid = $shengchanShishi->onlyid;
						$chengpinDictionary->pihao = $shengchanShishi->pihao;
						$chengpinDictionary->suigongdan = $shengchanShishi->fujian; 
						$chengpinDictionary->user = $user->gonghao;
						if ($this->ChengpinDictionarys->save($chengpinDictionary)){
							$this->Flash->success(__('添加成功.'));
							$this->loadModel("ChengpinInitials");
							$chengpinInitial = $this->ChengpinInitials->findByMid($shengchanShishi->mid)->firstOrFail();
							$chengpinInitial->number += 1;
							$this->ChengpinInitials->save($chengpinInitial);
						}else{
							$this->Flash->error(__('添加失败.'));
						}
					}	
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('shengchanShishi', $shengchanShishi);	
        }
		public function search(){
			$this->loadModel("ShengchanShishis");
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$mid = $this->request->getData('mid');
				$name = $this->request->getData('name');
				$result = $this->ShengchanShishis->find(
						'all', array('conditions'=>array("ShengchanShishis.isbaosong"=>"1","ShengchanShishis.mid LIKE '%".$mid."%'",
							"ShengchanShishis.mname LIKE '%".$name."%'"
						)));
				$this->set('result', $result);
				$this->loadModel("Users");
				$shengchanShenpis = array();
				foreach($result as $shengchanShishi){
					if($shengchanShishi->iszhijian==1){
						$user = $this->Users->findByGonghao($shengchanShishi->zhijianren)->firstOrFail();
						$shengchanShenpis[$shengchanShishi->id] = $user->name;
					}
				}
				$this->set('shengchanShenpis', $shengchanShenpis);
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}


    }
