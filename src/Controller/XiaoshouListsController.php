<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class XiaoshouListsController extends AppController
    {
		public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [ 
				'XiaoshouLists.istijiao'  =>  'asc', //顺序 asc,倒序 desc
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
			$this->loadComponent('Paginator');		
			$xiaoshouLists = $this->XiaoshouLists->find();
			$this->set('xiaoshouLists', $this->paginate($xiaoshouLists));//用于在前端页面中显示
			
			//以下为用户信息
			$this->loadModel("Users");
			$Users = array(); //存储操作人名字
			$Shenpirens = array();//存储审批人名字
			foreach($xiaoshouLists as $xiaoshouList){
				if($xiaoshouList->user!=NULL){
					$user = $this->Users->findByGonghao($xiaoshouList->user)->firstOrFail();
					$Users[$xiaoshouList->id] = $user->name;
				}else{
					$Users[$xiaoshouList->id] = "";
				}
				if($xiaoshouList->shenheren!=NULL){
					$user = $this->Users->findByGonghao($xiaoshouList->shenheren)->firstOrFail();
					$Shenpirens[$xiaoshouList->id] = $user->name;
				}else{
					$Shenpirens[$xiaoshouList->id] = "";
				}
			}
			$this->set('Users', $Users);
			$this->set('Shenpirens', $Shenpirens);
        }
		public function add($id)
		{
			$this->loadModel("CaigouProviders");
			$this->loadComponent('Paginator');
			$xiaoshouList = $this->XiaoshouLists->findById($id)->firstOrFail();
			$wuliucompanys = $this->CaigouProviders->find(
				'all', array('conditions' => array(
					'CaigouProviders.iswuliu'=>"1",
					'CaigouProviders.isshenhe'=>"1",
					'CaigouProviders.shenheok'=>"1",
					'CaigouProviders.isshenpi'=>"1",
					'CaigouProviders.shenpiok'=>"1"
				))
			);
			if ($this->request->is('post')) {
				$this->XiaoshouLists->patchEntity($xiaoshouList, $this->request->getData());
				$user = $this->request->getSession()->read('user'); 
				$xiaoshouList->user = $user->gonghao; 
				//判断文件是否上传到临时文件
				$upload = $_FILES['fileUpload'];
				if( is_uploaded_file($upload['tmp_name'])){ // 如果没有错误发生，文件上传成功
					//检测文件扩展名
					$name = $upload['name']; //文件名
					$num = strrpos($name, '.');
					//var_dump($name);
					if($num === false){ //没有扩展名显示错误信息
						return $this->redirect(['action' => 'index']);
					}else{
						$allowType = array('.doc','.pdf');
						//截取文件扩展名
						$extension = substr($name, $num);
						//var_dump($extension);
						if(  !in_array($extension, $allowType) ){
							return $this->redirect(['action' => 'index']);
						}else{
							echo $upload['size'];
							//时间戳加密文件名
							$fileName = date('Y-m-d').'-'.mt_rand();
							//拼接文件路径
							$path = '..\webroot'.DIRECTORY_SEPARATOR.$fileName.$extension;
							//$pathname = 'G:\Software\Apache\htdocs\zhouhe\app\webroot\photos\as\\';
							//mkdir($pathname);
							//获取临时文件名
							$temp = $upload['tmp_name'];
							//var_dump($temp);
							//var_dump($path);
							//上传文件
							if(move_uploaded_file($temp, $path)){
								//文件上传成功后组合文件下载地址
								$xiaoshouList->hetongfujian = $fileName.$extension;
							}else{
								$this->redirect(['action' => 'manage', $id]);
							}
						}
					}
				}
				//被驳回的审核，在修改之后，审核状态更新
				$xiaoshouList->istijiao = '0'; 
				$xiaoshouList->isshenhe = '0'; 
				$xiaoshouList->shenheok = '0'; 
				$xiaoshouList->shenheren = NULL; 
				//写入数据库
				if ($this->XiaoshouLists->save($xiaoshouList)) {
					$this->Flash->success(__('新增数据成功！'));
					$this->redirect(['action' => 'manage', $id]);
				}
			}
			$this->set('xiaoshouList', $xiaoshouList);
			$this->set('wuliucompanys', $wuliucompanys);
		}
		public function modify($id)
		{
			$this->loadModel("CaigouProviders");
			$this->loadComponent('Paginator');
			$xiaoshouList = $this->XiaoshouLists->findById($id)->firstOrFail();
			$wuliucompanys = $this->CaigouProviders->find(
				'all', array('conditions' => array(
					'CaigouProviders.iswuliu'=>"1",
					'CaigouProviders.isshenhe'=>"1",
					'CaigouProviders.shenheok'=>"1",
					'CaigouProviders.isshenpi'=>"1",
					'CaigouProviders.shenpiok'=>"1"
				))
			);
			if ($this->request->is('post')) {
				$this->XiaoshouLists->patchEntity($xiaoshouList, $this->request->getData());
				$user = $this->request->getSession()->read('user'); 
				$xiaoshouList->user = $user->gonghao; 
				//被驳回的审核，在修改之后，审核状态更新
				$xiaoshouList->istijiao = '0'; 
				$xiaoshouList->isshenhe = '0'; 
				$xiaoshouList->shenheok = '0'; 
				$xiaoshouList->shenheren = NULL; 
				//写入数据库
				if ($this->XiaoshouLists->save($xiaoshouList)) {
					$this->Flash->success(__('修改数据成功！'));
					return $this->redirect(['action' => 'manage', $id]);
				}else{
					$this->Flash->error(__('修改失败！！'));
				}
			}
			$this->set('xiaoshouList', $xiaoshouList);
			$this->set('wuliucompanys', $wuliucompanys);
		}
		public function search()
		{
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$x_id = $this->request->getData('x_id');
				$hetong_id = $this->request->getData('hetong_id');
				$shouhuodanwei = $this->request->getData('shouhuodanwei');
				$xiaoshouLists = $this->XiaoshouLists->find(
						'all', array('conditions'=>array(
							'XiaoshouLists.x_id LIKE "%'.$x_id.'%"',
							'XiaoshouLists.hetong_id LIKE "%'.$hetong_id.'%"',
							'XiaoshouLists.shouhuodanwei LIKE "%'.$shouhuodanwei.'%"'
						))
				);
				$this->set('result', $this->paginate($xiaoshouLists));
				//以下为用户信息
				$this->loadModel("Users");
				$Users = array(); //存储操作人名字
				//$Shenpirens = array();//存储审批人名字
				foreach($xiaoshouLists as $xiaoshouList){
					if($xiaoshouList->user!=NULL){
						$user = $this->Users->findByGonghao($xiaoshouList->user)->firstOrFail();
						$Users[$xiaoshouList->id] = $user->name;
					}else{
						$Users[$xiaoshouList->id] = "";
					}
				}
				$this->set('Users', $Users);
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}
		//显示合同表自增编号为id的全部产品信息,管理
		public function manage($id)
        {
		    $xiaoshouList = $this->XiaoshouLists->findById($id)->firstOrFail();
			$this->set('xiaoshouList', $xiaoshouList);	
			
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
			if($xiaoshouList->isshenhe==1){
				$user = $this->Users->findByGonghao($xiaoshouList->shenheren)->firstOrFail();
				$shenheren = $user->name;
				$this->set('shenheren', $shenheren);
			}
		}
		//显示合同表自增编号为id的全部产品信息，只能读取
		public function view($id)
        {
		    $xiaoshouList = $this->XiaoshouLists->findById($id)->firstOrFail();
			$this->set('xiaoshouList', $xiaoshouList);	
			
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
			if( $xiaoshouList->isshenhe == 1 ){
				$user = $this->Users->findByGonghao($xiaoshouList->shenheren)->firstOrFail();
				$shenheren = $user->name;
				$this->set('shenheren', $shenheren);
			}
		}
		//自增编号为id的审核提交
		public function tijiaoshenhe($id)
        {
			$xiaoshouList = $this->XiaoshouLists->findById($id)->firstOrFail();
			$xiaoshouList->istijiao = 1;
			$user = $this->request->getSession()->read('user'); 
			$xiaoshouList->user = $user->gonghao; 
			//写入数据库
			if ($this->XiaoshouLists->save($xiaoshouList)) {
				$this->Flash->success(__('提交审核成功！'));
				return $this->redirect(['action' => 'view', $id]);
			}
		}
    }
