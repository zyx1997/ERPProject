<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class CaigouProvidersController extends AppController
    {
        public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [ 
				'CaigouProviders.id'  =>  'desc' //按自增ID倒序即创建时间，顺序asc
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
		    $this->set('caigouProviders', $this->paginate());//用于在前端页面中显示
        }
		public function add()
		{
			//$msg = $this->Flash->error();
			//if($msg == "该编号已存在，添加失败.");
				$this->viewBuilder()->setLayout('error_id');
			$this->loadComponent('Paginator');
			$caigouProvider = $this->CaigouProviders->newEntity();
			if ($this->request->is('post')) {
				$p_id = $this->request->getData('p_id');
				$result = $this->CaigouProviders->getapid($p_id);
				
				if($result){
					$this->Flash->error('该编号已存在，添加失败.', [
						'key' => 'error_id'
					]);
					//$this->Flash->error(__('该编号已存在，添加失败.'));
				}else{
					$caigouProvider = $this->CaigouProviders->patchEntity($caigouProvider, $this->request->getData());
					// Hardcoding the user is temporary, and will be removed later
					// when we build authentication out.
					$caigouProvider->user = 'test'; // 临时的
					$caigouProvider->shenheren = 'tmp'; // 临时的
				
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
									$caigouProvider->fujian = $fileName.$extension;
									//写入数据库
									//if ($this->CaigouProviders->save($caigouProvider)) {
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
					if ($this->CaigouProviders->save($caigouProvider)) {
						$this->Flash->success(__('新增数据成功！'));
						return $this->redirect(['action' => 'index']);
					}
				}
			}
			$this->set('caigouProvider', $caigouProvider);
		}
		public function modify($id)
        {
			$caigouProvider = $this->CaigouProviders->findById($id)->firstOrFail();
			if ($this->request->is(['post', 'put'])) {
				$this->CaigouProviders->patchEntity($caigouProvider, $this->request->getData());
				//被驳回的审核，在修改之后，审核状态更新为“未审核”状态
				$caigouProvider->isshenhe = '0'; 
				$caigouProvider->shenheok = '0';
				$caigouProvider->shenheren = ''; 
				$caigouProvider->isshenpi = '0'; 
				$caigouProvider->shenpiok = '0'; 
				$caigouProvider->shenpiren = ''; 
				//写入数据库
				if ($this->CaigouProviders->save($caigouProvider)) {
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('caigouProvider', $caigouProvider);	
        }
		public function delete($id)
		{
			$this->request->allowMethod(['post', 'delete']);

			$caigouProvider = $this->CaigouProviders->findById($id)->firstOrFail();
			if ($this->CaigouProviders->delete($caigouProvider)) {
				$this->Flash->success(__('The {0} caigouProvider has been deleted.', $caigouProvider->p_name));
				return $this->redirect(['action' => 'index']);
			}
		}
		public function search(){
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$p_id = $this->request->getData('p_id');
				$p_name = $this->request->getData('p_name');
				$shuihao = $this->request->getData('shuihao');
				$this->set('result', $this->paginate($this->CaigouProviders->find(
					'all', array('conditions'=>array(
						"CaigouProviders.p_id LIKE '%".$p_id."%'",
						"CaigouProviders.p_name LIKE '%".$p_name."%'",
						"CaigouProviders.shuihao LIKE '%".$shuihao."%'"
					))
				)));
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}		
    }
