<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class ShengchanBuliaochecksController extends AppController
    {
		public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [ 
				'ShengchanBuliaos.isshenpi'  =>  'asc',
				'ShengchanBuliaos.id'  =>  'asc' //按自增ID倒序即创建时间，顺序asc
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
			$this->loadModel("ShengchanBuliaos");
		    $this->loadComponent('Paginator');
			$this->set('shengchanBuliaos', $this->paginate($this->ShengchanBuliaos->find()));		
        }
		public function check($id)
        {
			$this->loadModel("ShengchanBuliaos");
			$shengchanBuliao = $this->ShengchanBuliaos->findById($id)->firstOrFail();
			if ($this->request->is(['post', 'put'])) {
				$this->ShengchanBuliaos->patchEntity($shengchanBuliao, $this->request->getData());
				//写入数据库
				if ($this->ShengchanBuliaos->save($shengchanBuliao)) {
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('shengchanBuliao', $shengchanBuliao);	
        }
		public function search(){
			$this->loadModel("ShengchanBuliaos");
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$bid = $this->request->getData('bid');
				$jid = $this->request->getData('jid');
				$mname = $this->request->getData('mname');
				$this->set('result', $this->ShengchanBuliaos->find(
						'all', array('conditions'=>array("ShengchanBuliaos.bid LIKE '%".$bid."%'",
							"ShengchanBuliaos.jid LIKE '%".$jid."%'","ShengchanBuliaos.mname LIKE '%".$mname."%'"
						))
				));
				//$this->set('result', $this->paginate());//分页，用于在前端页面中显示
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}
    }
