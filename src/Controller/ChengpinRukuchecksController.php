<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class ChengpinRukuchecksController extends AppController
    {
        public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [ 
				'ChengpinRukus.iszhijian'  =>  'asc',
				'ChengpinRukus.id'  =>  'asc' //按自增ID倒序即创建时间，顺序asc
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
			$this->loadModel("ChengpinRukus");
		    $this->loadComponent('Paginator');
		    //$chengpinInitials = $this->Paginator->paginate($this->ChengpinInitials->find());
		    //$this->set(compact('chengpinInitials'));
			$istijiao = 1;
			$chengpinRukus = $this->ChengpinRukus->findByIstijiao($istijiao);
			$this->set('chengpinRukus', $this->paginate($chengpinRukus));
			$this->loadModel("Users");
			$chengpinShenpis = array();
			foreach($chengpinRukus as $chengpinRuku){
				if($chengpinRuku->iszhijian==1){
					$user = $this->Users->findByGonghao($chengpinRuku->zhijianren)->firstOrFail();
					$chengpinShenpis[$chengpinRuku->id] = $user->name;
				}
			}
			$this->set('chengpinShenpis', $chengpinShenpis);
        }
		public function check($id)
        {
			$this->loadModel("ChengpinRukus");
			$this->loadModel("ChengpinInitials");
			
			$chengpinRuku = $this->ChengpinRukus->findById($id)->firstOrFail();
			$chengpinInitial = $this->ChengpinInitials->findByMid($chengpinRuku->mid)->firstOrFail();
			if ($this->request->is(['post', 'put'])) {
				$this->ChengpinRukus->patchEntity($chengpinRuku, $this->request->getData());
				//写入数据库
				$num = $this->request->getData('hegequantity');
				$user = $this->request->getSession()->read('user'); 
				$chengpinRuku->zhijianren = $user->gonghao;
				if ($this->ChengpinRukus->save($chengpinRuku)) {
					$this->Flash->success(__('修改成功.'));
					if($chengpinInitial->isonlyid==1){
						$this->loadModel("ChengpinDictionarys");
						$i=1;
						$orderid = $this->ChengpinRukus->getorderid();
						$date = date("Y-m-d");
						if($date==$orderid[0]['date']){
							$i  = (int)$orderid[0]['order_id']+1;
							$num = $num+$i-1;
						}
						$guize = "P".str_replace('-','',$date);
						for(; $i<=$num; $i++){
							$chengpinDictionary = $this->ChengpinDictionarys->newEntity();
							$chengpinDictionary->mid = $chengpinRuku->mid;
							$chengpinDictionary->name = $chengpinRuku->name;
							if($i>=100){
								$chengpinDictionary->onlyid = $guize.$i;
							}else if($i>=10){
								$chengpinDictionary->onlyid = $guize."0".$i;
							}else{
								$chengpinDictionary->onlyid = $guize."00".$i;
							}
							//$user = $this->request->getSession()->read('user'); 
							$chengpinDictionary->user = $user->gonghao;
							if ($this->ChengpinDictionarys->save($chengpinDictionary)) {
								$this->Flash->success(__('添加成功.'));
							}else{
								$this->Flash->error(__('添加失败.'));
							}
						}
						$this->ChengpinRukus->updateorderid($num,$date);
					}
					$this->ChengpinRukus->updatenum($chengpinRuku->mid,$this->request->getData('hegequantity'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('chengpinRuku', $chengpinRuku);	
        }
		public function search(){
			$this->loadModel("ChengpinRukus");
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$mid = $this->request->getData('mid');
				$name = $this->request->getData('name');		
				$isfujian = 1;
				$istijiao = 1;
				$result = $this->ChengpinRukus->find(
						'all', array('conditions'=>array("ChengpinRukus.mid LIKE '%".$mid."%'",
							"ChengpinRukus.name LIKE '%".$name."%'","ChengpinRukus.isfujian LIKE '%".$isfujian."%'",
							"ChengpinRukus.istijiao LIKE '%".$istijiao."%'"
						)));
				$this->set('result', $result);
				$this->loadModel("Users");
				$chengpinShenpis = array();
				foreach($result as $chengpinRuku){
					if($chengpinRuku->iszhijian==1){
						$user = $this->Users->findByGonghao($chengpinRuku->zhijianren)->firstOrFail();
						$chengpinShenpis[$chengpinRuku->id] = $user->name;
					}
				}
				$this->set('chengpinShenpis', $chengpinShenpis);
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}


    }
