<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class ChengpinZhuangxiangsController extends AppController
    {
		public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [ 
				'chengpinZhuangxiangs.id'  =>  'asc' //按自增ID倒序即创建时间，顺序asc
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
			$this->set('chengpinZhuangxiangs', $this->paginate());//用于在前端页面中显示
        }
		public function additem($oid)
        {

        }
		public function addform()
        {
			$this->loadModel("chengpinChukus");
			$this->set('chengpinChukus', $this->paginate($this->chengpinChukus->find(
				'all', array('conditions'=>array(
				'chengpinChukus.iszhuangxiang'=>0,'chengpinChukus.shenpiresult'=>1
				)))));
        }
		public function add($oid)
        {
			$this->set('oid',$oid);
			$this->loadModel("chengpinChukus");
			$chengpinChuku=$this->chengpinChukus->findByOid($oid)->firstOrFail();
			$this->loadComponent('Paginator');
			$result = $this->ChengpinZhuangxiangs->getorderid();
			$date = date("Y-m-d");
			$order_id = 1;
			if($date==$result[0]['date']){
				$order_id  = (int)$result[0]['order_id'] +1;
			}
			if($order_id>=100){
				$zid = "Z".str_replace('-','',$date).$order_id;
			}else if($order_id>=10){
				$zid = "Z".str_replace('-','',$date)."0".$order_id;
			}else{
				$zid = "Z".str_replace('-','',$date)."00".$order_id;
			}
			$this->set('zid', $zid);
			$this->loadComponent('Paginator');
			$chengpinZhuangxiang = $this->ChengpinZhuangxiangs->newEntity();
			if ($this->request->is('post')) {
				$chengpinZhuangxiang->user = '李四'; // 临时的
				$chengpinZhuangxiang = $this->ChengpinZhuangxiangs->patchEntity($chengpinZhuangxiang, $this->request->getData());
				//写入数据库
				$chengpinZhuangxiang->dingdanid = $chengpinChuku->dingdanid;
				$chengpinZhuangxiang->hetongid = $chengpinChuku->hetongid;
				if ($this->ChengpinZhuangxiangs->save($chengpinZhuangxiang)) {
					$this->Flash->success(__('新增数据成功！'));
					$this->ChengpinZhuangxiangs->updateorderid($order_id,$date);
					//将装箱单成品初始化（出库单成品）
					$this->loadModel("ChengpinChukuitems");
					$this->loadModel("ChengpinZhuangxiangitems");
					$chengpinChukuitems = $this->ChengpinChukuitems->findByOid($chengpinZhuangxiang->oid);
					foreach ($chengpinChukuitems as $chengpinChukuitem){
						$chengpinZhuangxiangitem = $this->ChengpinZhuangxiangitems->newEntity();
						$chengpinZhuangxiangitem->zid = $chengpinZhuangxiang->zid;
						$chengpinZhuangxiangitem->chanpinid = $chengpinChukuitem->chanpinid;
						$chengpinZhuangxiangitem->chanpinname = $chengpinChukuitem->chanpinname;
						$chengpinZhuangxiangitem->onlyid = $chengpinChukuitem->onlyid;
						$this->ChengpinZhuangxiangitems->save($chengpinZhuangxiangitem);
					}
					//成品出库单记录已装箱
					$this->loadModel("ChengpinChukus");
					$chengpinChuku = $this->ChengpinChukus->findByOid($oid)->firstOrFail();
					$chengpinChuku->iszhuangxiang = 1;
					$this->ChengpinChukus->save($chengpinChuku);
					return $this->redirect(['action' => 'modify',$zid]);
				}else{
					$this->Flash->error(__('添加失败！！'));
				}
				$this->set('chengpinZhuangxiang', $chengpinZhuangxiang);
			}
        }
		public function modify($zid)
        {
			$chengpinZhuangxiang= $this->ChengpinZhuangxiangs->findByZid($zid)->firstOrFail();
			$this->loadModel("ChengpinZhuangxiangitems");
			$chengpinZhuangxiangitems= $this->ChengpinZhuangxiangitems->findByZid($chengpinZhuangxiang->zid);
			$this->set('chengpinZhuangxiangitems', $chengpinZhuangxiangitems);
			if ($this->request->is(['post', 'put'])) {
				if($this->request->getData('submit')=="提交登记"){
					$this->ChengpinZhuangxiangs->patchEntity($chengpinZhuangxiang, $this->request->getData());
					//写入数据库
					$chengpinZhuangxiang->isshenpi = 0;
					if ($this->ChengpinZhuangxiangs->save($chengpinZhuangxiang)) {
						$this->Flash->success(__('修改成功.'));
						return $this->redirect(['action' => 'index']);
					}else{
						$this->Flash->error(__('修改失败.'));
					}
				}else if($this->request->getData('submit')=="添加"){
					$this->loadModel("ChengpinZhuangxiangitems");
					$chengpinZhuangxiangitem = $this->ChengpinZhuangxiangitems->newEntity();
					$chengpinZhuangxiangitem->zid = $zid;
					$chengpinZhuangxiangitem->chanpinname = $this->request->getData('addname');
					if ($this->ChengpinZhuangxiangitems->save($chengpinZhuangxiangitem)) {
						$this->Flash->success(__('修改成功.'));
						return $this->redirect(['action' => 'modify',$zid]);
					}else{
						$this->Flash->error(__('修改失败.'));
					}
				}
			}
			$this->set('chengpinZhuangxiang', $chengpinZhuangxiang);			
        }
		public function delete($id)
		{
			$this->request->allowMethod(['post', 'delete']);

			$chengpinZhuangxiang = $this->ChengpinZhuangxiangs->findById($id)->firstOrFail();
			if ($this->ChengpinZhuangxiangs->delete($chengpinZhuangxiang)) {
				$this->Flash->success(__('删除成功'));
				return $this->redirect(['action' => 'index']);
			}
		}
		public function save($id,$zid)
		{
			$this->request->allowMethod(['post', 'save']);
			$this->loadModel("ChengpinZhuangxiangitems");
			$chengpinZhuangxiangitem = $this->ChengpinZhuangxiangitems->findById($id)->firstOrFail();
			if ($this->ChengpinZhuangxiangitems->delete($chengpinZhuangxiangitem)) {
				$this->Flash->success(__('删除成功'));
				return $this->redirect(['action' => 'modify',$zid]);
			}
		}
		public function search(){
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$oid = $this->request->getData('oid');
				$name = $this->request->getData('name');
				$zid = $this->request->getData('zid');
				$this->set('result', $this->ChengpinZhuangxiangs->find(
						'all', array('conditions'=>array("ChengpinZhuangxiangs.oid LIKE '%".$oid."%'",
							"ChengpinZhuangxiangs.name LIKE '%".$name."%'","ChengpinZhuangxiangs.zid LIKE '%".$zid."%'"
						))
				));//分页，用于在前端页面中显示
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
			//$this->set('result', $this->paginate());
		}

    }
