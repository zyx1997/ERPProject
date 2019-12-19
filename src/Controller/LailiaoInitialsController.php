<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class LailiaoInitialsController extends AppController
    {
		public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [ 
				'LailiaoInitials.id'  =>  'desc' //按自增ID倒序即创建时间，顺序asc
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
		    $lailiaoInitials = $this->LailiaoInitials->find();
		    //$this->set(compact('lailiaoInitials'));			
			$this->set('lailiaoInitials', $this->paginate($lailiaoInitials));//用于在前端页面中显示
			$this->loadModel("Users");
			$lailiaoUsers = array();
			
			foreach($lailiaoInitials as $lailiaoInitial){
				if($lailiaoInitial->user!=NULL){
					$user = $this->Users->findByGonghao($lailiaoInitial->user)->firstOrFail();
					$lailiaoUsers[$lailiaoInitial->id] = $user->name;
				}else{
					$lailiaoUsers[$lailiaoInitial->id] = "";
				}
			}
			$this->set('lailiaoUsers', $lailiaoUsers);
        }
		public function add()
		{
			//$msg = $this->Flash->error();
			//if($msg == "该编号已存在，添加失败.");
				$this->viewBuilder()->setLayout('error_id');
			$this->loadComponent('Paginator');
			$lailiaoInitial = $this->LailiaoInitials->newEntity();
			if ($this->request->is('post')) {
				$m_id = $this->request->getData('m_id');
				$result = $this->LailiaoInitials->getamid($m_id);
				
				if($result){
					$this->Flash->error('该编号已存在，添加失败.', [
						'key' => 'error_id'
					]);
					//$this->Flash->error(__('该编号已存在，添加失败.'));
				}else{
					$lailiaoInitial = $this->LailiaoInitials->patchEntity($lailiaoInitial, $this->request->getData());

				
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
									$lailiaoInitial->fujian = $fileName.$extension;
									//写入数据库
									//if ($this->LailiaoInitials->save($lailiaoInitial)) {
										//$this->Flash->success(__('新增数据成功！'));
										//return $this->redirect(['action' => 'index']);
									//}
								}else{
									return $this->redirect(['action' => 'index']);
								}
							}
						}
					}
				
					//写入数据库
					$user = $this->request->getSession()->read('user'); 
					$lailiaoInitial->user = $user->gonghao;
					if ($this->LailiaoInitials->save($lailiaoInitial)) {
						$this->Flash->success(__('新增数据成功！'));
						return $this->redirect(['action' => 'index']);
					}
				}
			}
			$this->set('lailiaoInitial', $lailiaoInitial);
		}
		public function modify($id)
        {
			$lailiaoInitial = $this->LailiaoInitials->findById($id)->firstOrFail();
			if ($this->request->is(['post', 'put'])) {
				$this->LailiaoInitials->patchEntity($lailiaoInitial, $this->request->getData());
				//写入数据库
				$user = $this->request->getSession()->read('user'); 
				$lailiaoInitial->user = $user->gonghao;
				if ($this->LailiaoInitials->save($lailiaoInitial)) {
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('lailiaoInitial', $lailiaoInitial);	
        }
		public function modify111($id)
        {
			$lailiaoInitial = $this->LailiaoInitials->findById($id)->firstOrFail();
			if ($this->request->is(['post', 'put'])) {
				$this->LailiaoInitials->patchEntity($lailiaoInitial, $this->request->getData());
				//判断文件是否上传到临时文件
				$upload = $_FILES['fileUpload'];
				if($upload['error'] == 0){
					//检测文件扩展名
					$name = $upload['name'];
					$num = strrpos($name, '.');
					//var_dump($name);
				
					//没有扩展名显示错误信息
					if($num === false){
						return $this->redirect(['action' => 'index']);
					}else{
						//截取文件扩展名
						$allowType = array('.doc','.pdf');
						$extension = substr($name, $num);
						//var_dump($extension);
						if( !in_array($extension, $allowType) ){
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
							   $lailiaoInitial->fujian = $fileName.$extension;
								//写入数据库
								if ($this->LailiaoInitials->save($lailiaoInitial)) {
									return $this->redirect(['action' => 'index']);
								}
							}else{
								return $this->redirect(['action' => 'index']);
							}
						}
					}
				}
				if ($this->LailiaoInitials->save($lailiaoInitial)) {
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'index']);
				}
				$this->Flash->error(__('修改失败.'));
			}
			$this->set('lailiaoInitial', $lailiaoInitial);	
        }
		public function delete($id)
		{
			$this->request->allowMethod(['post', 'delete']);

			$lailiaoInitial = $this->LailiaoInitials->findById($id)->firstOrFail();
			if ($this->LailiaoInitials->delete($lailiaoInitial)) {
				$this->Flash->success(__('The {0} lailiaoInitial has been deleted.', $lailiaoInitial->kechengmingcheng));
				return $this->redirect(['action' => 'index']);
			}
		}
		public function search(){
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$m_id = $this->request->getData('m_id');
				$name = $this->request->getData('name');
				$xinghao = $this->request->getData('xinghao');
				$result = $this->LailiaoInitials->find(
					'all', array('conditions'=>array(
						"LailiaoInitials.m_id LIKE '%".$m_id."%'",
						"LailiaoInitials.name LIKE '%".$name."%'",
						"LailiaoInitials.xinghao LIKE '%".$xinghao."%'"
					)));
				$this->set('result', $this->paginate($result));
				$this->loadModel("Users");
				$lailiaoUsers = array();
			
				foreach($result as $lailiaoInitial){
					if($lailiaoInitial->user!=NULL){
						$user = $this->Users->findByGonghao($lailiaoInitial->user)->firstOrFail();
						$lailiaoUsers[$lailiaoInitial->id] = $user->name;
					}else{
						$lailiaoUsers[$lailiaoInitial->id] = "";
					}
				}
				$this->set('lailiaoUsers', $lailiaoUsers);
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}
    }
