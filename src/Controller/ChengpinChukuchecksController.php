<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class ChengpinChukuchecksController extends AppController
    {
       public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [ 
				'ChengpinChukus.isshenpi'  =>  'asc',
				'ChengpinChukus.id'  =>  'asc' //按自增ID倒序即创建时间，顺序asc
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
			$this->loadModel("ChengpinChukus");
		    $this->loadComponent('Paginator');	
			$this->set('chengpinChukus', $this->paginate($this->ChengpinChukus->find()));//用于在前端页面中显示
        }
		public function check($oid)
        {
			$this->loadComponent('Paginator');	
			$this->loadModel("ChengpinChukus");
			$chengpinChuku = $this->ChengpinChukus->findByOid($oid)->firstOrFail();
			$this->set('chengpinChuku', $chengpinChuku);
			$this->loadModel("ChengpinChukuitems");
			$chengpinChukuitems = $this->ChengpinChukuitems->findByOid($oid);
			$this->set('chengpinChukuitems', $chengpinChukuitems);
			if ($this->request->is(['post', 'put'])) {
				$this->ChengpinChukus->patchEntity($chengpinChuku, $this->request->getData());
				//写入数据库
				if ($this->ChengpinChukus->save($chengpinChuku)) {
					$this->Flash->success(__('修改成功.'));
					if($this->request->getData('shenpiresult')==1){
					//若低于安全库存，则自动生成生产排期
						$this->loadModel("ChengpinInitials");
						$recorditems = array();
						foreach($chengpinChukuitems as $chengpinChukuitem){
							$chengpinInitial = $this->ChengpinInitials->findByMid($chengpinChukuitem->chanpinid)->firstOrFail();
							if(!in_array($chengpinInitial->mid,$recorditems)){
								array_push($recorditems,$chengpinInitial->mid);
								//生成排期
								if($chengpinInitial->number < $chengpinInitial->anquankucun){
									$this->loadModel("ShengchanPaiqis");
									$result = $this->ShengchanPaiqis->getorderid();
									$date = date("Y-m-d");
									$order_id = 1;
									if($date==$result[0]['date']){
										$order_id  = (int)$result[0]['order_id'] +1;
									}
									if($order_id>=100){
										$jid = "J".str_replace('-','',$date).$order_id;
									}else if($order_id>=10){
										$jid = "J".str_replace('-','',$date)."0".$order_id;
									}else{
										$jid = "J".str_replace('-','',$date)."00".$order_id;
									}
									$shengchanPaiqi = $this->ShengchanPaiqis->newEntity();
									$shengchanPaiqi->jid = $jid;
									$shengchanPaiqi->mid = $chengpinInitial->mid;
									$shengchanPaiqi->jihuaquantity = $chengpinInitial->anquankucun;
									$shengchanPaiqi->chengpinname = $chengpinInitial->name;
									$shengchanPaiqi->name = '自动';
									$this->ShengchanPaiqis->save($shengchanPaiqi);
								}
							}
						}
					}
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
        }
		public function search(){
			$this->loadModel("ChengpinChukus");
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$oid = $this->request->getData('oid');
				$hetongid = $this->request->getData('hetongid');
				$this->set('result', $this->ChengpinChukus->find(
						'all', array('conditions'=>array("ChengpinChukus.oid LIKE '%".$oid."%'",
							"ChengpinChukus.hetongid LIKE '%".$hetongid."%'"
						))
				));//分页，用于在前端页面中显示
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
			//$this->set('result', $this->paginate());
		}

    }
