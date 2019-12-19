<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class ManageDuanliaosController extends AppController
    {
        public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [ 
				'ShengchanWuliaoduanques.id'  =>  'desc' //按自增ID倒序即创建时间，顺序asc
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
			$this->loadModel("ShengchanWuliaoduanques");
			$this->set('shengchanWuliaoduanques', $this->paginate($this->ShengchanWuliaoduanques->find()));//用于在前端页面中显示
        }
		public function addduanliao($id)
        {
			$this->loadModel("ShengchanWuliaoduanques");
			$this->loadModel("LailiaoInitials"); //原材料表
			$this->loadComponent('Paginator');
			$shengchanWuliaoduanque = $this->ShengchanWuliaoduanques->findById($id)->firstOrFail();
			$lailiaoInitial = $this->LailiaoInitials->findByMId($shengchanWuliaoduanque->m_id)->firstOrFail();
			if ($this->request->is('post')) {
				$this->ShengchanWuliaoduanques->patchEntity($shengchanWuliaoduanque, $this->request->getData());
				//if( $real_quantity == null ) 
				//	return $this->redirect(['action' => 'index']);
				//写入数据库
				if ($this->ShengchanWuliaoduanques->save($shengchanWuliaoduanque)) {
					$this->Flash->success(__('添加成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('shengchanWuliaoduanque', $shengchanWuliaoduanque);
			$this->set('lailiaoInitial', $lailiaoInitial);
        }
		public function see($id)
        {
			$this->loadModel("ShengchanWuliaoduanques");
			$this->loadModel("LailiaoInitials"); //原材料表
			$this->loadComponent('Paginator');
			$shengchanWuliaoduanque = $this->ShengchanWuliaoduanques->findById($id)->firstOrFail();
			$lailiaoInitial = $this->LailiaoInitials->findByMId($shengchanWuliaoduanque->m_id)->firstOrFail();
			
			$this->set('shengchanWuliaoduanque', $shengchanWuliaoduanque);
			$this->set('lailiaoInitial', $lailiaoInitial);
        }
		public function search(){
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$jid = $this->request->getData('jid');
				$m_id = $this->request->getData('m_id');
				
				$result = $this->ManageDuanliaos->searchdb($jid, $m_id);
				$this->set('result', $result);
				//$this->set('result', $this->paginate());//分页，用于在前端页面中显示
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}
    }
