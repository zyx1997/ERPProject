<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class XiaoshouListchecksController extends AppController
    {
		public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [ 
				'XiaoshouLists.isshenhe'  =>  'asc', //顺序 asc,倒序 desc
				'XiaoshouLists.time'  =>  'desc' //顺序 asc,倒序 desc
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
			$this->loadModel("XiaoshouLists");
			$this->loadComponent('Paginator');	
			$xiaoshouLists = $this->XiaoshouLists->find('all', array('conditions' => array('XiaoshouLists.istijiao'=>"1")));	
			$this->set('xiaoshouLists', $this->paginate($xiaoshouLists));//用于在前端页面中显示
        
			//以下为用户信息
			$this->loadModel("Users");
			$Shenpirens = array();//存储审批人名字
			foreach($xiaoshouLists as $xiaoshouList){
				if($xiaoshouList->shenheren!=NULL){
					$user = $this->Users->findByGonghao($xiaoshouList->shenheren)->firstOrFail();
					$Shenpirens[$xiaoshouList->id] = $user->name;
				}else{
					$Shenpirens[$xiaoshouList->id] = "";
				}
			}
			$this->set('Shenpirens', $Shenpirens);
		}
		public function check($id)
        {
			$this->loadModel("XiaoshouLists");
			$xiaoshouList = $this->XiaoshouLists->findById($id)->firstOrFail();
			if ($this->request->is(['post', 'put'])) {
				$this->XiaoshouLists->patchEntity($xiaoshouList, $this->request->getData());
				$user = $this->request->getSession()->read('user'); 
				$xiaoshouList->shenheren = $user->gonghao;
				$xiaoshouList->isshenhe = "1";
				//写入数据库
				if ($this->XiaoshouLists->save($xiaoshouList)) {
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('xiaoshouList', $xiaoshouList);	
			
			//以下是合同信息
			$this->loadModel("HetongLists");
			$this->loadModel("HetongListAlls");
			$this->loadModel("ChengpinInitials");
			$this->loadModel("ChengpinPeitaos");
			$this->loadModel("ChengpinPeitaoitems");
			$this->loadModel("JingxiaoPeitaos");
			$this->loadModel("JingxiaoXinxis");
			$this->loadComponent('Paginator');	
			
			$h_keyid = $xiaoshouList->h_keyid; // 合同评审自增id
			$hetongList = $this->HetongLists->findById($h_keyid)->firstOrFail();
			$hetongListAlls = $this->HetongListAlls->find('all', array('conditions' => array('HetongListAlls.h_keyid'=>$h_keyid)));
			$chengpinPeitaos = array();
			$chengpinPeitaoitems = array();
			$peitaoitemsCount = array();
			foreach ($hetongListAlls as $hetongListAll){
				$ptid = $hetongListAll->ptid;
				$chengpinPeitaos[$ptid] = $this->ChengpinPeitaos->findByPtid($ptid)->firstOrFail();
				$chengpinPeitaoitems[$ptid] = $this->ChengpinPeitaoitems->find(
					'all', array('conditions' => array(
						'ChengpinPeitaoitems.ptid'=>$ptid
					))
				);// 用 ->字段名 取值
				$peitaoitemsCount[$ptid] = $chengpinPeitaoitems[$ptid]->count();
			}
			$this->set('hetongList', $hetongList);
			$this->paginate($hetongListAlls);//用于在前端页面中显示
			$this->set(compact('hetongListAlls'));
			$this->set(compact('chengpinPeitaos'));
			$this->set(compact('chengpinPeitaoitems'));
			$this->set(compact('peitaoitemsCount'));
        }
		public function checkresult($id)
        {
			$this->loadModel("XiaoshouLists");
			$xiaoshouList = $this->XiaoshouLists->findById($id)->firstOrFail();
			$this->set('xiaoshouList', $xiaoshouList);	
			
			//以下是合同信息
			$this->loadModel("HetongLists");
			$this->loadModel("HetongListAlls");
			$this->loadModel("ChengpinInitials");
			$this->loadModel("ChengpinPeitaos");
			$this->loadModel("ChengpinPeitaoitems");
			$this->loadModel("JingxiaoPeitaos");
			$this->loadModel("JingxiaoXinxis");
			$this->loadComponent('Paginator');	
			
			$h_keyid = $xiaoshouList->h_keyid; // 合同评审自增id
			$hetongList = $this->HetongLists->findById($h_keyid)->firstOrFail();
			$hetongListAlls = $this->HetongListAlls->find('all', array('conditions' => array('HetongListAlls.h_keyid'=>$h_keyid)));
			$chengpinPeitaos = array();
			$chengpinPeitaoitems = array();
			$peitaoitemsCount = array();
			foreach ($hetongListAlls as $hetongListAll){
				$ptid = $hetongListAll->ptid;
				$chengpinPeitaos[$ptid] = $this->ChengpinPeitaos->findByPtid($ptid)->firstOrFail();
				$chengpinPeitaoitems[$ptid] = $this->ChengpinPeitaoitems->find(
					'all', array('conditions' => array(
						'ChengpinPeitaoitems.ptid'=>$ptid
					))
				);// 用 ->字段名 取值
				$peitaoitemsCount[$ptid] = $chengpinPeitaoitems[$ptid]->count();
			}
			$this->set('hetongList', $hetongList);
			$this->paginate($hetongListAlls);//用于在前端页面中显示
			$this->set(compact('hetongListAlls'));
			$this->set(compact('chengpinPeitaos'));
			$this->set(compact('chengpinPeitaoitems'));
			$this->set(compact('peitaoitemsCount'));
			//以下为用户信息
			$this->loadModel("Users");
			$user = $this->Users->findByGonghao($xiaoshouList->shenheren)->firstOrFail();
			$shenheren = $user->name;
			$this->set('shenheren', $shenheren);
        }
		public function search()
		{
			$this->loadModel("XiaoshouLists");
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$x_id = $this->request->getData('x_id');
				$hetong_id = $this->request->getData('hetong_id');
				$shouhuodanwei = $this->request->getData('shouhuodanwei');
				$this->set('result', $this->paginate($this->XiaoshouLists->find(
						'all', array('conditions'=>array(
							"XiaoshouLists.x_id LIKE '%".$x_id."%'",
							"XiaoshouLists.hetong_id LIKE '%".$hetong_id."%'",
							"XiaoshouLists.shouhuodanwei LIKE '%".$shouhuodanwei."%'"
						))
				)));
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}
		
    }
