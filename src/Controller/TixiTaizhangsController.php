<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class TixiTaizhangsController extends AppController
    {
        public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [ 
				'tixiTaizhangs.id'  =>  'asc' //按自增ID倒序即创建时间，顺序asc
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
			$this->set('tixiTaizhangs', $this->paginate());
        }
		public function add()
        {
			$this->loadComponent('Paginator');
			$tixiTaizhang = $this->TixiTaizhangs->newEntity();
			if ($this->request->is('post')) {
				$tixiTaizhang->user = 'test'; // 临时的
				$tixiTaizhang = $this->TixiTaizhangs->patchEntity($tixiTaizhang, $this->request->getData());
				//写入数据库
				if ($this->TixiTaizhangs->save($tixiTaizhang)) {
					$this->Flash->success(__('新增数据成功！'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('添加失败！！'));
				}
				$this->set('tixiTaizhang', $tixiTaizhang);
			}
		
        }
		public function modify($id)
        {
			$tixiTaizhang = $this->TixiTaizhangs->findById($id)->firstOrFail();
			if ($this->request->is(['post', 'put'])) {
				$this->TixiTaizhangs->patchEntity($tixiTaizhang, $this->request->getData());
				//写入数据库
				if ($this->TixiTaizhangs->save($tixiTaizhang)) {
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('tixiTaizhang', $tixiTaizhang);		
        }
		public function delete($id)
		{
			$this->request->allowMethod(['post', 'delete']);

			$tixiTaizhang = $this->TixiTaizhangs->findById($id)->firstOrFail();
			if ($this->TixiTaizhangs->delete($tixiTaizhang)) {
				$this->Flash->success(__('删除成功'));
				return $this->redirect(['action' => 'index']);
			}
		}
		public function search(){
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$sid = $this->request->getData('sid');
				$hetongid = $this->request->getData('hetongid');
				$gdanwei = $this->request->getData('gdanwei');
				$shenpiren = $this->request->getData('shenpiren');
				
				//$result = $this->TixiTaizhangs->searchdb($sid, $hetongid, $gdanwei, $shenpiren);
				$this->set('result', $result);
				//$this->set('result', $this->paginate());//分页，用于在前端页面中显示
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}
    }
