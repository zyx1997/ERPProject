<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class XusersController extends AppController
    {
		public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [ 
				'users.id'  =>  'asc' //按自增ID倒序即创建时间，顺序asc
			] 
		];
		public function initialize()
		{
			parent::initialize();
			$this->loadComponent('Paginator');
			$this->loadComponent('Flash'); // Include the FlashComponent
		}
		public function index(){
			$this->loadModel("Users");
		    $this->loadComponent('Paginator');
			$this->set('users', $this->paginate($this->Users->find()));
		}
		public function add(){
			$this->loadModel("Users");
			$this->viewBuilder()->setLayout('error_id');
			$this->loadComponent('Paginator');
			$this->loadModel("Roles");
			$this->set('roles', $this->Roles->find());
			$user = $this->Users->newEntity();
			if ($this->request->is('post')) {
				$gonghao = $this->request->getData('gonghao');
				$result = $this->Users->findByGonghao($gonghao);
				if($result->count()!=0){
					$this->Flash->error('该工号已存在，添加失败.', [
						'key' => 'error_id'
					]);
				}else{
					$user = $this->Users->patchEntity($user, $this->request->getData());
					// Hardcoding the user is temporary, and will be removed later
					// when we build authentication out.
					$user->password = md5($this->request->getData('password')); // 临时的

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
							$allowType = array('.jpg','.png');
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
								$path = '..\webroot\usersimg'.DIRECTORY_SEPARATOR.$fileName.$extension;
								//$pathname = 'G:\Software\Apache\htdocs\zhouhe\app\webroot\photos\as\\';
				
								//mkdir($pathname);
								//获取临时文件名
								$temp = $upload['tmp_name'];
								//var_dump($temp);
								//var_dump($path);
								//上传文件
								if(move_uploaded_file($temp, $path)){
									//文件上传成功后组合文件下载地址
									$user->img = $fileName.$extension;
									//写入数据库
									//if ($this->Users->save($user)) {
									//	$this->Flash->success(__('新增数据成功！'));
									//	return $this->redirect(['action' => 'index']);
									//}
								}else{
									return $this->redirect(['action' => 'index']);
								}
							}
						}
					}else{
						$user->img = "default.jpg";
					}
				
					//写入数据库
					if ($this->Users->save($user)) {
						$this->loadModel("UserRoles");
						$userRole = $this->UserRoles->newEntity();
						$userRole->gonghao = $this->request->getData('gonghao');
						$userRole->roleid = $this->request->getData('roleid');
						$this->UserRoles->save($userRole);
						return $this->redirect(['action' => 'index']);
					}
				}
			}
			$this->set('user', $user);
		}
		public function modify($id){
			$this->loadModel("Users");
			$user = $this->Users->findById($id)->firstOrFail();
			$this->set('user', $user);
			$this->loadModel("UserRoles");
			$this->loadModel("Roles");
			$this->set('roles', $this->Roles->find());;
			//$user = $this->Users->newEntity();
			$userRole = $this->UserRoles->findByGonghao($user->gonghao)->firstOrFail();
			if ($this->request->is(['post', 'put'])) {
				$pwd = $user->password;
				$this->Users->patchEntity($user, $this->request->getData());
				if($user->password!=$pwd){
					$user->password = md5($user->password);
				}
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
							$allowType = array('.jpg','.png');
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
								$path = '..\webroot\usersimg'.DIRECTORY_SEPARATOR.$fileName.$extension;
								//$pathname = 'G:\Software\Apache\htdocs\zhouhe\app\webroot\photos\as\\';
				
								//mkdir($pathname);
								//获取临时文件名
								$temp = $upload['tmp_name'];
								//var_dump($temp);
								//var_dump($path);
								//上传文件
								if(move_uploaded_file($temp, $path)){
									//文件上传成功后组合文件下载地址
									$user->img = $fileName.$extension;
									//写入数据库
									//if ($this->Users->save($user)) {
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
				if ($this->Users->save($user)) {
					$userRole->roleid = $this->request->getData('roleid');
					$this->UserRoles->save($userRole);
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			
			$this->set('userRole', $userRole);
		}
		public function delete($id)
		{
			$this->loadModel("Users");
			$this->request->allowMethod(['post', 'delete']);

			$user = $this->Users->findById($id)->firstOrFail();
			if ($this->Users->delete($user)) {
				$this->loadModel("UserRoles");
				$userRole = $this->UserRoles->findByGonghao($user->gonghao)->firstOrFail();
				$this->UserRoles->delete($userRole);
				return $this->redirect(['action' => 'index']);
			}
		}
		public function search(){
			$this->loadModel("Users");
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$gonghao = $this->request->getData('gonghao');
				$name = $this->request->getData('name');		
				$this->set('result', $this->Users->find(
						'all', array('conditions'=>array("Users.gonghao LIKE '%".$gonghao."%'",
							"Users.name LIKE '%".$name."%'"
						))
				));
				//$this->set('result', $this->paginate());//分页，用于在前端页面中显示
			}else{
				$this->set('result', $result=NULL);
			}
		}
    }
