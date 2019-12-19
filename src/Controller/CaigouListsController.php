<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class CaigouListsController extends AppController
    {
        public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			
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
			$this->set('caigouLists', $this->paginate());//用于在前端页面中显示
        }
		public function search()
		{
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$l_id = $this->request->getData('l_id');
				$p_name = $this->request->getData('p_name');
				$this->set('result', $this->paginate($this->CaigouLists->find(
					'all', array('conditions'=>array(
						"CaigouLists.l_id LIKE '%".$l_id."%'",
						"CaigouLists.p_name LIKE '%".$p_name."%'"
					))
				)));
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}
		public function searchM($l_id)
		{
			$this->loadModel("CaigouListAlls");
			$this->loadComponent('Paginator');	
			//采购单
			$caigouList = $this->CaigouLists->findByLId($l_id)->firstOrFail();	
			$this->set('caigouList', $caigouList);
			if ($this->request->is('post')) {
				$m_id = $this->request->getData('m_id');
				$name = $this->request->getData('name');
				$this->set('result', $this->paginate($this->CaigouListAlls->find(
					'all', array('conditions'=>array(
						"CaigouListAlls.l_id = ".$l_id." ",
						"CaigouListAlls.m_id LIKE '%".$m_id."%'",
						"CaigouListAlls.name LIKE '%".$name."%'"
					))
				)));
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
			$this->set('l_id', $l_id);
		}
		public function searchpname()
        {
			$this->loadModel("CaigouProviders");
			$this->loadComponent('Paginator');
			$this->set('decode_results', NULL);
			if ($this->request->is('post')) {
				$p_name = $this->request->getData('p_name');
				$this->set('decode_results', $this->CaigouProviders->find(
					'all', array('conditions'=>array(
					"CaigouProviders.p_name LIKE '%".$p_name."%'",
					'CaigouProviders.isshenhe'=>"1", 
					'CaigouProviders.shenheok'=>"1", 
					'CaigouProviders.isshenpi'=>"1", 
					'CaigouProviders.shenpiok'=>"1"
					))
				));
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', NULL);
			}
        }
		public function add($p_id)
        {
			//$msg = $this->Flash->error();
			//if($msg == "该编号已存在，添加失败.");
			$this->viewBuilder()->setLayout('error_id');
			$this->loadComponent('Paginator');
			//供货方公司
			$this->loadModel("CaigouProviders");
			$caigouProvider = $this->CaigouProviders->findByPId($p_id)->firstOrFail();
			//采购单信息
			$caigouList = $this->CaigouLists->newEntity();
			if ($this->request->is('post')) {
				$l_id = $this->request->getData('l_id');
				$result = $this->CaigouLists->getalid($l_id);
				if($result){
					$this->Flash->error('该编号已存在，添加失败.', [
						'key' => 'error_id'
					]);
				}else{
					$caigouList = $this->CaigouLists->patchEntity($caigouList, $this->request->getData());
					$caigouList->user = 'test'; // 临时的
					$caigouList->p_id = $p_id; // 供货方编码
					$caigouList->p_name = $caigouProvider->p_name; // 供货方名称
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
									$caigouList->fujian = $fileName.$extension;
								}else{
									return $this->redirect(['action' => 'index']);
								}
							}
						}
					}
					//写入数据库
					if ($this->CaigouLists->save($caigouList)) {
						$this->Flash->success(__('新增数据成功！'));
						return $this->redirect(['action' => 'searchmid',$l_id]);
					}
				}
			}
			$this->set('caigouProvider', $caigouProvider);
			$this->set('caigouList', $caigouList);
        }
		public function searchmid($l_id, $encode_results=NULL)
		{
			$this->loadComponent('Paginator');
			$this->loadModel("CaigouProviders");
			$this->loadModel("LailiaoInitials");
			$caigouList = $this->CaigouLists->findByLId($l_id)->firstOrFail();
			$p_id = $caigouList->p_id; // 供货方编码
			$caigouProvider = $this->CaigouProviders->findByPId($p_id)->firstOrFail();
			
			$this->set('decode_results', NULL);
			if ($this->request->is('post')) {
				$m_id = $this->request->getData('search_m_id');
				$this->set('decode_results', $this->LailiaoInitials->find(
					'all', array('conditions'=>array(
					"LailiaoInitials.m_id LIKE '%".$m_id."%'"
					))
				));
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', NULL);
			}
			$this->set('caigouProvider', $caigouProvider);
			$this->set('caigouList', $caigouList);
		}
		public function addM($l_id, $m_id)
        {
			$this->viewBuilder()->setLayout('error_id');
			$this->loadComponent('Paginator');
			//产品
			$this->loadModel("LailiaoInitials");
			$lailiaoInitial = $this->LailiaoInitials->findByMId($m_id)->firstOrFail();
			//采购单
			$caigouList = $this->CaigouLists->findByLId($l_id)->firstOrFail();
			//产品采购单
			$this->loadModel("CaigouListAlls");
			$caigouListAll = $this->CaigouListAlls->newEntity();
			if ($this->request->is('post')) {
				$result = $this->CaigouListAlls->getamid($l_id, $m_id);
				if($result){
					$this->Flash->error('该产品已存在采购单中，添加失败.', [
						'key' => 'error_id'
					]);
				}else{
					$this->CaigouListAlls->patchEntity($caigouListAll, $this->request->getData());
					$caigouListAll->user = 'test'; // 临时的
					$caigouListAll->l_id = $l_id; // 采购单编码
					$caigouListAll->m_id = $m_id; // 产品编码
					$caigouListAll->name = $lailiaoInitial->name; // 产品名称
					$caigouListAll->p_id = $caigouList->p_id; // 供货方编码
					$caigouListAll->p_name = $caigouList->p_name; // 供货方名称
					//以下为采购单冗余信息
					/*
					$caigouListAll->l_name = $caigouList->l_name; 
					$caigouListAll->caigoudate = $caigouList->caigoudate; 
					$caigouListAll->p_name = $caigouList->p_name; 
					$caigouListAll->fujian = $caigouList->fujian; 
					$caigouListAll->checked = $caigouList->checked; 
					$caigouListAll->shenheren = $caigouList->shenheren; 
					$caigouListAll->shenhe_beizhu = $caigouList->shenhe_beizhu; 
					$caigouListAll->shenhe_time = $caigouList->shenhe_time;
					*/
					//以下为产品冗余信息
					$caigouListAll->xinghao = $lailiaoInitial->xinghao;
					$caigouListAll->danwei = $lailiaoInitial->danwei;
					$caigouListAll->miaoshu = $lailiaoInitial->miaoshu;
					$caigouListAll->weizhi = $lailiaoInitial->weizhi;
					$caigouListAll->fenlei = $lailiaoInitial->fenlei;
					$caigouListAll->isban = $lailiaoInitial->isban;
					//写入数据库
					if ($this->CaigouListAlls->save($caigouListAll)) {
						//被驳回的审核，在修改之后，审核状态更新为“未审核”状态
						$caigouList->isshenhe = '0'; 
						$caigouList->shenheok = '0';
						$caigouList->shenheren = '';
						$caigouList->isshenpi = '0'; 
						$caigouList->shenpiok = '0'; 
						$caigouList->shenpiren = ''; 
						$this->CaigouLists->save($caigouList);
						
						$this->Flash->success(__('新增数据成功！'));
						return $this->redirect(['action' => 'see', $l_id]);
					}
				}
			}
			$this->set('lailiaoInitial', $lailiaoInitial);
			$this->set('caigouList', $caigouList);
        }
		//显示采购单编号为l_id的全部产品采购信息
		public function see($l_id)
        {
		    $this->loadModel("CaigouListAlls");
			$this->loadComponent('Paginator');	
			//采购单
			$caigouList = $this->CaigouLists->findByLId($l_id)->firstOrFail();	
			$this->set('caigouList', $caigouList);	
			//产品采购单
			$this->set('caigouListAlls', $this->paginate($this->CaigouListAlls->find('all', array('conditions' => array('CaigouListAlls.l_id'=>$l_id)))));//用于在前端页面中显示
        }
		
		public function modify($l_id)
        {
			$this->loadComponent('Paginator');
			$this->loadModel("CaigouProviders");
			//采购单
			$caigouList = $this->CaigouLists->findByLId($l_id)->firstOrFail();	
			//供货方公司
			$p_id = $caigouList->p_id;
			$caigouProvider = $this->CaigouProviders->findByPId($p_id)->firstOrFail();
			if ($this->request->is('post')) {
				$this->CaigouLists->patchEntity($caigouList, $this->request->getData());
				//被驳回的审核，在修改之后，审核状态更新为“未审核”状态
				$caigouList->isshenhe = '0'; 
				$caigouList->shenheok = '0';
				$caigouList->shenheren = '';
				$caigouList->isshenpi = '0'; 
				$caigouList->shenpiok = '0'; 
				$caigouList->shenpiren = ''; 
				//写入数据库
				if ($this->CaigouLists->save($caigouList)) {
					$this->Flash->success(__('新增数据成功！'));
					return $this->redirect(['action' => 'index']);
				}
			}
			$this->set('caigouProvider', $caigouProvider);
			$this->set('caigouList', $caigouList);
        }
		public function modifyM($id)
        {
			$this->loadModel("LailiaoInitials");
			$this->loadModel("CaigouListAlls");
			$this->loadComponent('Paginator');
			//产品采购单
			$caigouListAll = $this->CaigouListAlls->findById($id)->firstOrFail();
			//产品
			$m_id = $caigouListAll->m_id;
			$lailiaoInitial = $this->LailiaoInitials->findByMId($m_id)->firstOrFail();
			if ($this->request->is('post')) {
				$this->CaigouListAlls->patchEntity($caigouListAll, $this->request->getData());
				$caigouListAll->user = 'modify-test'; // 临时的
				
				//写入数据库
				if ($this->CaigouListAlls->save($caigouListAll)) {
					$caigouList = $this->CaigouLists->findByLId($caigouListAll->l_id)->firstOrFail();
					//被驳回的审核，在修改之后，审核状态更新为“未审核”状态
					$caigouList->isshenhe = '0'; 
					$caigouList->shenheok = '0';
					$caigouList->shenheren = '';
					$caigouList->isshenpi = '0'; 
					$caigouList->shenpiok = '0'; 
					$caigouList->shenpiren = ''; 
					$this->CaigouLists->save($caigouList);
					
					$this->Flash->success(__('新增数据成功！'));
					return $this->redirect(['action' => 'see', $caigouListAll->l_id]);
				}
			}
			$this->set('lailiaoInitial', $lailiaoInitial);
			$this->set('caigouListAll', $caigouListAll);
        }
		public function delete($id)
		{
			$this->request->allowMethod(['post', 'delete']);

			$caigouList = $this->CaigouLists->findById($id)->firstOrFail();
			if ($this->CaigouLists->delete($caigouList)) {
				$this->Flash->success(__('The {0} caigouList has been deleted.', $id));
				return $this->redirect(['action' => 'index']);
			}
		}
		public function deleteM($id)
        {
			$this->loadModel("CaigouListAlls");
			$this->loadComponent('Paginator');
			
			$caigouListAll = $this->CaigouListAlls->findById($id)->firstOrFail();
			$caigouList = $this->CaigouLists->findByLId($caigouListAll->l_id)->firstOrFail();
			if ($this->CaigouListAlls->delete($caigouListAll)) {
				//被驳回的审核，在修改之后，审核状态更新为“未审核”状态
				$caigouList->isshenhe = '0'; 
				$caigouList->shenheok = '0';
				$caigouList->shenheren = '';
				$caigouList->isshenpi = '0'; 
				$caigouList->shenpiok = '0'; 
				$caigouList->shenpiren = ''; 
				$this->CaigouLists->save($caigouList);
				
				$this->Flash->success(__('Succesfully deleted.', $id));
				return $this->redirect(['action' => 'see', $caigouListAll->l_id]);
			}
        }
    }
