<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class ChengpinZhuangxiangchecksController extends AppController
    {
       public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [ 
				'ChengpinZhuangxiangs.isshenpi'  =>  'asc',
				'ChengpinZhuangxiangs.id'  =>  'asc' //按自增ID倒序即创建时间，顺序asc
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
			$this->loadModel("ChengpinZhuangxiangs");
		    $this->loadComponent('Paginator');	
			$this->set('chengpinZhuangxiangs', $this->paginate($this->ChengpinZhuangxiangs->find()));//用于在前端页面中显示
        }
		public function check($zid)
        {
			$this->loadComponent('Paginator');	
			$this->loadModel("ChengpinZhuangxiangs");
			$chengpinZhuangxiang = $this->ChengpinZhuangxiangs->findByZid($zid)->firstOrFail();
			$this->set('chengpinZhuangxiang', $chengpinZhuangxiang);
			$this->loadModel("ChengpinZhuangxiangitems");
			$chengpinZhuangxiangitems = $this->ChengpinZhuangxiangitems->findByZid($zid);
			$this->set('chengpinZhuangxiangitems', $chengpinZhuangxiangitems);
			if ($this->request->is(['post', 'put'])) {
				$this->ChengpinZhuangxiangs->patchEntity($chengpinZhuangxiang, $this->request->getData());
				//写入数据库
				if ($this->ChengpinZhuangxiangs->save($chengpinZhuangxiang)) {
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
        }
		public function search(){
			$this->loadModel("ChengpinZhuangxiangs");
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
