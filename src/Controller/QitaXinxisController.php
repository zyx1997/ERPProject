<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class QitaXinxisController extends AppController
    {
        public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [ 
				'QitaXinxis.istijiao'  =>  'asc',
				'QitaXinxis.isshenpi'  =>  'asc',
				'QitaXinxis.id'  =>  'desc' //按自增ID倒序即创建时间，顺序asc
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
			$qitaXinxis = $this->QitaXinxis->find();
			$this->set('qitaXinxis', $this->paginate($qitaXinxis));
			$this->loadModel("Users");
			$qitaUsers = array();
			$qitaShenpis = array();
			foreach($qitaXinxis as $qitaXinxi){
				if($qitaXinxi->user!=NULL){
				$user = $this->Users->findByGonghao($qitaXinxi->user)->firstOrFail();
				$qitaUsers[$qitaXinxi->id] = $user->name;
				}else{
					$qitaUsers[$qitaXinxi->id] = "";
				}
				if($qitaXinxi->isshenpi==1){
					$user = $this->Users->findByGonghao($qitaXinxi->shenpiren)->firstOrFail();
					$qitaShenpis[$qitaXinxi->id] = $user->name;
				}
			}

			$this->set('qitaUsers', $qitaUsers);
			$this->set('qitaShenpis', $qitaShenpis);
        }
		public function add()
        {
			$this->loadComponent('Paginator');
			$qitaXinxi = $this->QitaXinxis->newEntity();
			if ($this->request->is('post')) {
					$qitaXinxi = $this->QitaXinxis->patchEntity($qitaXinxi, $this->request->getData());
					// Hardcoding the user is temporary, and will be removed later
					// when we build authentication out.
					//判断文件是否上传到临时文件
					$upload = $_FILES['fileUpload'];
					//if( $upload['error'] == 0){ // 如果没有错误发生，文件上传成功
					if( is_uploaded_file($upload['tmp_name'])){ // 如果没有错误发生，文件上传成功
						//检测文件扩展名
						$name = $upload['name']; //文件名
						$num = strrpos($name, '.');
						//var_dump($name);
						if($num === false){ //没有扩展名显示错误信息
							return $this->redirect(['action' => 'index']);
						}else{
							$allowType = array('.doc','.pdf','.png','.docx','.jpg');
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
								$path = '..\webroot\qitaXinxi'.DIRECTORY_SEPARATOR.$fileName.$extension;
								//$pathname = 'G:\Software\Apache\htdocs\zhouhe\app\webroot\photos\as\\';
				
								//mkdir($pathname);
								//获取临时文件名
								$temp = $upload['tmp_name'];
								//var_dump($temp);
								//var_dump($path);
								//上传文件
								if(move_uploaded_file($temp, $path)){
									//文件上传成功后组合文件下载地址
									$qitaXinxi->fujian = $fileName.$extension;
									//写入数据库
									//if ($this->QitaXinxis->save($qitaXinxi)) {
									//	$this->Flash->success(__('新增数据成功！'));
									//	return $this->redirect(['action' => 'index']);
									//}
								}else{
									return $this->redirect(['action' => 'index']);
								}
							}
						}
					}
				
					//写入数据库
					$user = $this->request->getSession()->read('user'); 
					$qitaXinxi->user = $user->gonghao;
					if($this->request->getData('submit')=="提交审批"){
						$qitaXinxi->istijiao = 1;
					}
					if ($this->QitaXinxis->save($qitaXinxi)) {
						$this->Flash->success(__('新增数据成功！'));
						return $this->redirect(['action' => 'index']);
					}
			}
			$this->set('qitaXinxi', $qitaXinxi);
		
        }
		public function modify($id)
        {
			$qitaXinxi = $this->QitaXinxis->findById($id)->firstOrFail();
			if ($this->request->is(['post', 'put'])) {
				$this->QitaXinxis->patchEntity($qitaXinxi, $this->request->getData());
				//写入数据库
				$upload = $_FILES['fileUpload'];
					//if( $upload['error'] == 0){ // 如果没有错误发生，文件上传成功
					if( is_uploaded_file($upload['tmp_name'])){ // 如果没有错误发生，文件上传成功
						//检测文件扩展名
						$name = $upload['name']; //文件名
						$num = strrpos($name, '.');
						//var_dump($name);
						if($num === false){ //没有扩展名显示错误信息
							return $this->redirect(['action' => 'index']);
						}else{
							$allowType = array('.doc','.pdf','.png','.docx','.jpg');
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
								$path = '..\webroot\qitaXinxi'.DIRECTORY_SEPARATOR.$fileName.$extension;
								//$pathname = 'G:\Software\Apache\htdocs\zhouhe\app\webroot\photos\as\\';
				
								//mkdir($pathname);
								//获取临时文件名
								$temp = $upload['tmp_name'];
								//var_dump($temp);
								//var_dump($path);
								//上传文件
								if(move_uploaded_file($temp, $path)){
									//文件上传成功后组合文件下载地址
									$qitaXinxi->fujian = $fileName.$extension;
									//写入数据库
									//if ($this->QitaXinxis->save($qitaXinxi)) {
									//	$this->Flash->success(__('新增数据成功！'));
									//	return $this->redirect(['action' => 'index']);
									//}
								}else{
									return $this->redirect(['action' => 'index']);
								}
							}
						}
					}
				$user = $this->request->getSession()->read('user'); 
				$qitaXinxi->user = $user->gonghao;
				if($this->request->getData('submit')=="提交审批"){
					$qitaXinxi->istijiao = 1;
					$qitaXinxi->isshenpi = 0;
				}
				if ($this->QitaXinxis->save($qitaXinxi)) {
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('qitaXinxi', $qitaXinxi);		
        }
		public function view($id)
        {
			$qitaXinxi = $this->QitaXinxis->findById($id)->firstOrFail();
			$this->set('qitaXinxi', $qitaXinxi);		
        }
		public function delete($id)
		{
			$this->request->allowMethod(['post', 'delete']);

			$qitaXinxi = $this->QitaXinxis->findById($id)->firstOrFail();
			if ($this->QitaXinxis->delete($qitaXinxi)) {
				$this->Flash->success(__('删除成功'));
				return $this->redirect(['action' => 'index']);
			}
		}
		public function shouying($id){
			$qitaXinxi = $this->QitaXinxis->findById($id)->firstOrFail();
			$qitaXinxi->isshouying = 1;
			$user = $this->request->getSession()->read('user'); 
			$qitaXinxi->user = $user->gonghao;
			if ($this->QitaXinxis->save($qitaXinxi)) {
				//$this->Flash->success(__('删除成功'));
				return $this->redirect(['action' => 'index']);
			}
		}
		public function search(){
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$name = $this->request->getData('name');
				$lianxiren = $this->request->getData('lianxiren');
				$result = $this->QitaXinxis->find(
						'all', array('conditions'=>array(
							"QitaXinxis.name LIKE '%".$name."%'","QitaXinxis.lianxiren LIKE '%".$lianxiren."%'"
						)));
				$this->set('result', $result);
				$this->loadModel("Users");
				$qitaUsers = array();
				$qitaShenpis = array();
				foreach($result as $qitaXinxi){
					if($qitaXinxi->user!=NULL){
					$user = $this->Users->findByGonghao($qitaXinxi->user)->firstOrFail();
					$qitaUsers[$qitaXinxi->id] = $user->name;
					}else{
					$qitaUsers[$qitaXinxi->id] = "";
					}
					if($qitaXinxi->isshenpi==1){
						$user = $this->Users->findByGonghao($qitaXinxi->shenpiren)->firstOrFail();
						$qitaShenpis[$qitaXinxi->id] = $user->name;
					}
				}

				$this->set('qitaUsers', $qitaUsers);
				$this->set('qitaShenpis', $qitaShenpis);
				//$this->set('result', $this->paginate());//分页，用于在前端页面中显示
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}
    }
