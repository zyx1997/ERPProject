<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class ChengpinChukusController extends AppController
    {
		public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [ 
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
		    $this->loadComponent('Paginator');
		    //$chengpinInitials = $this->Paginator->paginate($this->ChengpinInitials->find());
		    //$this->set(compact('chengpinInitials'));		
			$this->set('chengpinChukus', $this->paginate());//用于在前端页面中显示
        }
		public function additem($oid)
        {
			$chengpinChuku = $this->ChengpinChukus->findByOid($oid)->firstOrFail();
			$this->set('chengpinChuku', $chengpinChuku);
			$this->loadModel("ChengpinChukuitems");
			$chengpinChukuitems = $this->ChengpinChukuitems->findByOid($oid);
			$this->set('chengpinChukuitems', $chengpinChukuitems);
        }
		public function addform()
        {
			$this->loadModel("XiaoshouLists");
			$shenheok = 1;
			$this->set('xiaoshouLists', $this->paginate($this->XiaoshouLists->findByShenheok($shenheok)));
	
        }
		public function searchitem()
        {
			
			$this->loadModel("ChengpinInitials");
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$oid = $this->request->getData('oid');
				$name = $this->request->getData('name');
				$this->set('oid',$oid);
				$this->set('result', $this->ChengpinInitials->find(
						'all', array('conditions'=>array("ChengpinInitials.name LIKE '%".$name."%'"))
				));
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
	
        }
		public function add($dingdanid,$hetongid)
        {
			$this->set('dingdanid',$dingdanid);
			$this->set('hetongid',$hetongid);
			$this->loadComponent('Paginator');
			$result = $this->ChengpinChukus->getorderid();
			$date = date("Y-m-d");
			$order_id = 1;
			if($date==$result[0]['date']){
				$order_id  = (int)$result[0]['order_id'] +1;
			}
			if($order_id>=100){
				$oid = "O".str_replace('-','',$date).$order_id;
			}else if($order_id>=10){
				$oid = "O".str_replace('-','',$date)."0".$order_id;
			}else{
				$oid = "O".str_replace('-','',$date)."00".$order_id;
			}
			$this->set('oid', $oid);
			$this->loadComponent('Paginator');
			$chengpinChuku = $this->ChengpinChukus->newEntity();
			if ($this->request->is('post')) {
				$chengpinChuku->user = 'test'; // 临时的
				$chengpinChuku = $this->ChengpinChukus->patchEntity($chengpinChuku, $this->request->getData());
				//写入数据库
				if ($this->ChengpinChukus->save($chengpinChuku)) {
					$this->Flash->success(__('新增数据成功！'));
					$this->ChengpinChukus->updateorderid($order_id,$date);
					return $this->redirect(['action' => 'additem',$oid]);
				}else{
					$this->Flash->error(__('添加失败！！'));
				}
				$this->set('chengpinChuku', $chengpinChuku);
			}
	
        }
		public function modify($id)
        {
			$chengpinChuku = $this->ChengpinChukus->findById($id)->firstOrFail();
			if ($this->request->is(['post', 'put'])) {
				$this->ChengpinChukus->patchEntity($chengpinChuku, $this->request->getData());
				//写入数据库
				$chengpinChuku->isshenpi = 0;
				if ($this->ChengpinChukus->save($chengpinChuku)) {
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('chengpinChuku', $chengpinChuku);			
        }
		public function addonlyid($mid, $oid){
			$this->loadModel("ChengpinDictionarys");
			$this->set('oid',$oid);
			$this->set('chengpinDictionarys', $this->paginate($this->ChengpinDictionarys->find(
				'all', array('conditions'=>array('ChengpinDictionarys.mid'=>$mid, 'ChengpinDictionarys.orderid is NULL')))));
		}
		public function delete($id)
		{
			$this->request->allowMethod(['post', 'delete']);

			$chengpinChuku = $this->ChengpinChukus->findById($id)->firstOrFail();
			if ($this->ChengpinChukus->delete($chengpinChuku)) {
				$this->Flash->success(__('删除成功'));
				return $this->redirect(['action' => 'index']);
			}
		}
		public function addeachitem($mid,$name,$oid,$onlyid){
			$this->request->allowMethod(['post','addeachitem']);
			$this->loadModel("ChengpinChukuitems");
			$chengpinChukuitem = $this->ChengpinChukuitems->newEntity();
			$chengpinChukuitem->chanpinid = $mid;
			$chengpinChukuitem->oid = $oid;
			$chengpinChukuitem->chanpinname = $name;
			$chengpinChukuitem->onlyid = $onlyid;
			if ($this->ChengpinChukuitems->save($chengpinChukuitem)) {
				$this->Flash->success(__('新增数据成功！'));
				$chengpinChuku = $this->ChengpinChukus->findByOid($oid)->firstOrFail();
				$chengpinChuku->isshenpi = 0;
				$this->ChengpinChukus->save($chengpinChuku);
				//成品字典与订单id关联
				$this->loadModel("ChengpinDictionarys");
				$chengpinDictionary = $this->ChengpinDictionarys->findByOnlyid($onlyid)->firstOrFail();
				$chengpinDictionary->orderid = $oid;
				$this->ChengpinDictionarys->save($chengpinDictionary);
				//库存减一
				$this->loadModel("ChengpinInitials");
				$chengpinInitial = $this->ChengpinInitials->findByMid($mid)->firstOrFail();
				$chengpinInitial->number -= 1;
				$this->ChengpinInitials->save($chengpinInitial);
				return $this->redirect(['action' => 'additem',$oid]);
			}else{
				$this->Flash->error(__('添加失败！'));
			}
		}
		public function deleteonlyid($onlyid,$chanpinid,$oid)
		{
			$this->request->allowMethod(['post', 'deleteonlyid']);
			$this->loadModel("ChengpinChukuitems");
			
			$chengpinChukuitem = $this->ChengpinChukuitems->findByOnlyid($onlyid)->firstOrFail();
			if ($this->ChengpinChukuitems->delete($chengpinChukuitem)) {
				$this->Flash->success(__('删除成功'));
				$chengpinChuku = $this->ChengpinChukus->findByOid($oid)->firstOrFail();
				$chengpinChuku->isshenpi = 0;
				$this->ChengpinChukus->save($chengpinChuku);
				//产品字典删除订单id
				$this->loadModel("ChengpinDictionarys");
				$chengpinDictionary = $this->ChengpinDictionarys->findByOnlyid($onlyid)->firstOrFail();
				$chengpinDictionary->orderid = NULL;
				$this->ChengpinDictionarys->save($chengpinDictionary);
				//库存加一
				$this->loadModel("ChengpinInitials");
				$chengpinInitial = $this->ChengpinInitials->findByMid($chanpinid)->firstOrFail();
				$chengpinInitial->number += 1;
				$this->ChengpinInitials->save($chengpinInitial);
				return $this->redirect(['action' => 'additem',$oid]);
			}
		}
		public function search(){
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
