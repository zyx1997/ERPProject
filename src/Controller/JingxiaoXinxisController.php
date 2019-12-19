<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class JingxiaoXinxisController extends AppController
    {
        public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [ 
				'JingxiaoXinxis.isjitiao'  =>  'asc',
				'JingxiaoXinxis.isshenpi'  =>  'asc',
				'JingxiaoXinxis.id'  =>  'desc' //按自增ID倒序即创建时间，顺序asc
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
			$jingxiaoXinxis = $this->JingxiaoXinxis->find();
			$this->set('jingxiaoXinxis', $this->paginate($jingxiaoXinxis));
			$this->loadModel("Users");
			$jingxiaoUsers = array();
			$jiaoxiaoShenpis = array();
			
			foreach($jingxiaoXinxis as $jingxiaoXinxi){
				if($jingxiaoXinxi->user!=NULL){
				$user = $this->Users->findByGonghao($jingxiaoXinxi->user)->firstOrFail();
				$jingxiaoUsers[$jingxiaoXinxi->id] = $user->name;
				}else{
					$jingxiaoUsers[$jingxiaoXinxi->id] = "";
				}
				if($jingxiaoXinxi->isshenpi==1){
					$user = $this->Users->findByGonghao($jingxiaoXinxi->shenpiren)->firstOrFail();
					$jiaoxiaoShenpis[$jingxiaoXinxi->id] = $user->name;
				}
			}

			$this->set('jingxiaoUsers', $jingxiaoUsers);
			$this->set('jiaoxiaoShenpis', $jiaoxiaoShenpis);
        }
		public function add(){
			$this->loadComponent('Paginator');
			$jingxiaoXinxi = $this->JingxiaoXinxis->newEntity();
			if ($this->request->is('post')) {
					$jingxiaoXinxi = $this->JingxiaoXinxis->patchEntity($jingxiaoXinxi, $this->request->getData());
					// Hardcoding the user is temporary, and will be removed later
					// when we build authentication out.
					$user = $this->request->getSession()->read('user'); 
					$jingxiaoXinxi->user = $user->gonghao; 
					//判断文件是否上传到临时文件
					$upload = $_FILES['fileUpload'];
					//if( $upload['error'] == 0){ // 如果没有错误发生，文件上传成功
					if( is_uploaded_file($upload['tmp_name'])){ // 如果没有错误发生，文件上传成功
						//检测文件扩展名
						$name = $upload['name']; //文件名
						$num = strrpos($name, '.');
						//var_dump($name);
						if($num === false){ //没有扩展名显示错误信息
							return $this->redirect(['action' => 'add']);
						}else{
							$allowType = array('.doc','.pdf','.png','.docx','.jpg');
							//截取文件扩展名
							$extension = substr($name, $num);
							//var_dump($extension);
						
							if(  !in_array($extension, $allowType) ){
								return $this->redirect(['action' => 'add']);
							}else{
								echo $upload['size'];
								//时间戳加密文件名
								$fileName = date('Y-m-d').'-'.mt_rand();
								//拼接文件路径
								$path = '..\webroot\jingxiaoxieyi'.DIRECTORY_SEPARATOR.$fileName.$extension;
								//$pathname = 'G:\Software\Apache\htdocs\zhouhe\app\webroot\photos\as\\';
				
								//mkdir($pathname);
								//获取临时文件名
								$temp = $upload['tmp_name'];
								//var_dump($temp);
								//var_dump($path);
								//上传文件
								if(move_uploaded_file($temp, $path)){
									//文件上传成功后组合文件下载地址
									$jingxiaoXinxi->xieyi = $fileName.$extension;
									//写入数据库
									//if ($this->JingxiaoXinxis->save($jingxiaoXinxi)) {
									//	$this->Flash->success(__('新增数据成功！'));
									//	return $this->redirect(['action' => 'index']);
									//}
								}else{
									return $this->redirect(['action' => 'add']);
								}
							}
						}
					}
				
					//写入数据库
					$result = $this->JingxiaoXinxis->getorderid();
					$date = date("Y-m-d");
					$order_id = 1;
					if($date==$result[0]['date']){
						$order_id  = (int)$result[0]['order_id'] +1;
					}
					if($order_id>=100){
						$jxid = "JX".str_replace('-','',$date).$order_id;
					}else if($order_id>=10){
						$jxid = "JX".str_replace('-','',$date)."0".$order_id;
					}else{
						$jxid = "JX".str_replace('-','',$date)."00".$order_id;
					}
					$jingxiaoXinxi->jxid = $jxid;
					if ($this->JingxiaoXinxis->save($jingxiaoXinxi)) {
						$this->JingxiaoXinxis->updateorderid($order_id,$date);
						//$this->Flash->success(__('新增数据成功！'));
						return $this->redirect(['action' => 'modify',$jingxiaoXinxi->id]);
					}
			}
		}
		
		public function addzizhi($jxid)
        {
			$this->loadComponent('Paginator');
			$this->loadModel("JingxiaoZizhis");
			$this->set('jxid',$jxid);
			$jingxiaoZizhi = $this->JingxiaoZizhis->newEntity();
			$jingxiaoXinxi = $this->JingxiaoXinxis->findByJxid($jxid)->firstOrFail();
			if ($this->request->is('post')) {
					
					$jingxiaoZizhi = $this->JingxiaoZizhis->patchEntity($jingxiaoZizhi, $this->request->getData());
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
							return $this->redirect(['action' => 'addzizhi',$jingxiaoXinxi->id]);
						}else{
							$allowType = array('.doc','.pdf','.png','.docx','.jpg');
							//截取文件扩展名
							$extension = substr($name, $num);
							//var_dump($extension);
						
							if(  !in_array($extension, $allowType) ){
								return $this->redirect(['action' => 'addzizhi',$jingxiaoXinxi->id]);
							}else{
								echo $upload['size'];
								//时间戳加密文件名
								$fileName = date('Y-m-d').'-'.mt_rand();
								//拼接文件路径
								$path = '..\webroot\jingxiaozizhi'.DIRECTORY_SEPARATOR.$fileName.$extension;
								//$pathname = 'G:\Software\Apache\htdocs\zhouhe\app\webroot\photos\as\\';
				
								//mkdir($pathname);
								//获取临时文件名
								$temp = $upload['tmp_name'];
								//var_dump($temp);
								//var_dump($path);
								//上传文件
								if(move_uploaded_file($temp, $path)){
									//文件上传成功后组合文件下载地址
									$jingxiaoZizhi->fujian = $fileName.$extension;
									//写入数据库
									//if ($this->JingxiaoXinxis->save($jingxiaoXinxi)) {
									//	$this->Flash->success(__('新增数据成功！'));
									//	return $this->redirect(['action' => 'index']);
									//}
								}else{
									return $this->redirect(['action' => 'addzizhi',$jingxiaoXinxi->id]);
								}
							}
						}
					}
				
					//写入数据库
					
					$jingxiaoZizhi->jxid = $jxid;
					if ($this->JingxiaoZizhis->save($jingxiaoZizhi)) {
						$this->Flash->success(__('新增数据成功！'));
						$user = $this->request->getSession()->read('user'); 
						$jingxiaoXinxi->user = $user->gonghao;
						$this->JingxiaoXinxis->save($jingxiaoXinxi);
						return $this->redirect(['action' => 'modify',$jingxiaoXinxi->id]);
					}
			}
			$this->set('jingxiaoZizhi', $jingxiaoZizhi);
		
        }
		public function modify($id)
        {
			$jingxiaoXinxi = $this->JingxiaoXinxis->findById($id)->firstOrFail();
			$this->loadModel("JingxiaoZizhis");
			$jingxiaoZizhis = $this->JingxiaoZizhis->findByJxid($jingxiaoXinxi->jxid);
			$this->set('jingxiaoXinxi', $jingxiaoXinxi);
			$this->set('jingxiaoZizhis', $jingxiaoZizhis);
			$this->loadModel("JingxiaoPeitaos");
			$jingxiaoPeitaos = $this->JingxiaoPeitaos->findByJxid($jingxiaoXinxi->jxid);
			$this->set('jingxiaoPeitaos', $jingxiaoPeitaos);
			if ($this->request->is(['post', 'put'])) {
				//写入数据库
				$jingxiaoXinxi->istijiao = 1;
				$jingxiaoXinxi->isshenpi = 0;
				$user = $this->request->getSession()->read('user'); 
				$jingxiaoXinxi->user = $user->gonghao;
				if ($this->JingxiaoXinxis->save($jingxiaoXinxi)) {
					//$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$peitaos = array();
			$peitaoitems = array();
			foreach($jingxiaoPeitaos as $jingxiaoPeitao){
				$this->loadModel("ChengpinPeitaos");
				$this->loadModel("ChengpinPeitaoitems");
				$chengpinPeitao = $this->ChengpinPeitaos->findByPtid($jingxiaoPeitao->ptid)->firstOrFail();
				$chengpinPeitaoitems = $this->ChengpinPeitaoitems->findByPtid($jingxiaoPeitao->ptid);
				$peitaos[$jingxiaoPeitao->ptid] = $chengpinPeitao;
				$peitaoitems[$jingxiaoPeitao->ptid] = $chengpinPeitaoitems;
			}
			$this->set('peitaoitems', $peitaoitems);
			$this->set('peitaos', $peitaos);
					
        }
		public function view($id)
        {
			$jingxiaoXinxi = $this->JingxiaoXinxis->findById($id)->firstOrFail();
			$this->loadModel("JingxiaoZizhis");
			$jingxiaoZizhis = $this->JingxiaoZizhis->findByJxid($jingxiaoXinxi->jxid);
			$this->set('jingxiaoXinxi', $jingxiaoXinxi);
			$this->set('jingxiaoZizhis', $jingxiaoZizhis);
			$this->loadModel("JingxiaoPeitaos");
			$jingxiaoPeitaos = $this->JingxiaoPeitaos->findByJxid($jingxiaoXinxi->jxid);
			$this->set('jingxiaoPeitaos', $jingxiaoPeitaos);
			$peitaos = array();
			$peitaoitems = array();
			foreach($jingxiaoPeitaos as $jingxiaoPeitao){
				$this->loadModel("ChengpinPeitaos");
				$this->loadModel("ChengpinPeitaoitems");
				$chengpinPeitao = $this->ChengpinPeitaos->findByPtid($jingxiaoPeitao->ptid)->firstOrFail();
				$chengpinPeitaoitems = $this->ChengpinPeitaoitems->findByPtid($jingxiaoPeitao->ptid);
				$peitaos[$jingxiaoPeitao->ptid] = $chengpinPeitao;
				$peitaoitems[$jingxiaoPeitao->ptid] = $chengpinPeitaoitems;
			}
			$this->set('peitaoitems', $peitaoitems);
			$this->set('peitaos', $peitaos);
        }
		public function edit($id)
        {
			$jingxiaoXinxi = $this->JingxiaoXinxis->findById($id)->firstOrFail();
			$this->set('jingxiaoXinxi', $jingxiaoXinxi);
			if ($this->request->is(['post', 'put'])){
				
				$this->JingxiaoXinxis->patchEntity($jingxiaoXinxi, $this->request->getData());
				//写入数据库
				$user = $this->request->getSession()->read('user'); 
				$jingxiaoXinxi->user = $user->gonghao;
				if ($this->JingxiaoXinxis->save($jingxiaoXinxi)) {
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'modify',$id]);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}	
        }
		public function delete($id)
		{
			$this->request->allowMethod(['post', 'delete']);

			$jingxiaoXinxi = $this->JingxiaoXinxis->findById($id)->firstOrFail();
			if ($this->JingxiaoXinxis->delete($jingxiaoXinxi)) {
				$this->Flash->success(__('删除成功'));
				return $this->redirect(['action' => 'index']);
			}
		}
		public function zizhidelete($id,$xinxiid)
		{
			$this->loadModel("JingxiaoZizhis");
			$this->request->allowMethod(['post', 'delete']);

			$jingxiaoZizhi = $this->JingxiaoZizhis->findById($id)->firstOrFail();
			if ($this->JingxiaoZizhis->delete($jingxiaoZizhi)) {
				$this->Flash->success(__('删除成功'));
				$jingxiaoXinxi = $this->JingxiaoXinxis->findByJxid($jingxiaoZizhi->jxid)->firstOrFail();
				$user = $this->request->getSession()->read('user'); 
				$jingxiaoXinxi->user = $user->gonghao;
				$this->JingxiaoXinxis->save($jingxiaoXinxi);
				return $this->redirect(['action' => 'modify',$xinxiid]);
			}
		}

		public function searchpeitao($jxid,$results=NULL)
        {
			$this->loadModel("ChengpinPeitaos");
			$this->set('jxid', $jxid);
			//$result = json_decode($results);
			if ($this->request->is('post')) {
				$name = $this->request->getData('searchname');
				
				$sqls = $this->ChengpinPeitaos->find(
						'all', array('conditions'=>array("ChengpinPeitaos.name LIKE '%".$name."%'"))
				);
				if($sqls){
					$results = json_encode($sqls, JSON_UNESCAPED_UNICODE);
					
				}else{
					return $this->redirect(['action' => 'searchpeitao',$jxid]);
				}
			}
			$this->set('results', json_decode($results));
        }
		public function addpeitao($jxid,$ptid){
			$this->loadModel("JingxiaoPeitaos");
			$this->loadModel("ChengpinPeitaos");
			$this->loadModel("ChengpinPeitaoitems");
			$jingxiaoXinxi = $this->JingxiaoXinxis->findByJxid($jxid)->firstOrFail();
			$chengpinPeitao = $this->ChengpinPeitaos->findByPtid($ptid)->firstOrFail();
			$chengpinPeitaoitems = $this->ChengpinPeitaoitems->findByPtid($ptid);
			$this->set('chengpinPeitao', $chengpinPeitao);
			$this->set('chengpinPeitaoitems', $chengpinPeitaoitems);
			$this->set('jxid',$jxid);
			$this->set('ptid',$ptid);
			$jingxiaoPeitao = $this->JingxiaoPeitaos->newEntity();
			if ($this->request->is('post')) {
				$jingxiaoPeitao = $this->JingxiaoPeitaos->patchEntity($jingxiaoPeitao, $this->request->getData());
				//写入数据库
				$jingxiaoPeitao->jxid = $jxid;
				$jingxiaoPeitao->ptid = $ptid;
				$jingxiaoPeitao->peitaoname = $chengpinPeitao->name;
				if ($this->JingxiaoPeitaos->save($jingxiaoPeitao)) {
					//$this->Flash->success(__('新增数据成功！'));
					$user = $this->request->getSession()->read('user'); 
					$jingxiaoXinxi->user = $user->gonghao;
					$this->JingxiaoXinxis->save($jingxiaoXinxi);
					return $this->redirect(['action' => 'modify',$jingxiaoXinxi->id]);
				}else{
					$this->Flash->error(__('添加失败'));
				}
			}
        }
		public function viewpeitao($id,$ptid){
			$this->loadModel("JingxiaoPeitaos");
			$this->loadModel("ChengpinPeitaos");
			$this->loadModel("ChengpinPeitaoitems");
			$chengpinPeitao = $this->ChengpinPeitaos->findByPtid($ptid)->firstOrFail();
			$chengpinPeitaoitems = $this->ChengpinPeitaoitems->findByPtid($ptid);
			$this->set('chengpinPeitao', $chengpinPeitao);
			$this->set('chengpinPeitaoitems', $chengpinPeitaoitems);
			$jingxiaoXinxi = $this->JingxiaoXinxis->findById($id)->firstOrFail();
			$this->set('jingxiaoXinxi', $jingxiaoXinxi);
        }
		public function peitaodelete($id,$xinxiid)
		{
			$this->loadModel("JingxiaoPeitaos");
			$this->request->allowMethod(['post', 'delete']);

			$jingxiaoPeitao = $this->JingxiaoPeitaos->findById($id)->firstOrFail();
			if ($this->JingxiaoPeitaos->delete($jingxiaoPeitao)) {
				$this->Flash->success(__('删除成功'));
				$jingxiaoXinxi = $this->JingxiaoXinxis->findByJxid($jingxiaoPeitao->jxid)->firstOrFail();
				$user = $this->request->getSession()->read('user'); 
				$jingxiaoXinxi->user = $user->gonghao;
				$this->JingxiaoXinxis->save($jingxiaoXinxi);
				return $this->redirect(['action' => 'modify',$xinxiid]);
			}
		}
		public function search(){
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$name = $this->request->getData('name');
				$lianxiren = $this->request->getData('lianxiren');
				$result = $this->JingxiaoXinxis->find(
						'all', array('conditions'=>array(
							"JingxiaoXinxis.name LIKE '%".$name."%'","JingxiaoXinxis.lianxiren LIKE '%".$lianxiren."%'"
						)));
				$this->set('result', $result);
				$this->loadModel("Users");
				$jingxiaoUsers = array();
				$jiaoxiaoShenpis = array();
				foreach($result as $jingxiaoXinxi){
					if($jingxiaoXinxi->user!=NULL){
					$user = $this->Users->findByGonghao($jingxiaoXinxi->user)->firstOrFail();
					$jingxiaoUsers[$jingxiaoXinxi->id] = $user->name;
					}else{
						$jingxiaoUsers[$jingxiaoXinxi->id] = "";
					}
					if($jingxiaoXinxi->isshenpi==1){
						$user = $this->Users->findByGonghao($jingxiaoXinxi->shenpiren)->firstOrFail();
						$jiaoxiaoShenpis[$jingxiaoXinxi->id] = $user->name;
					}
				}

				$this->set('jingxiaoUsers', $jingxiaoUsers);
				$this->set('jiaoxiaoShenpis', $jiaoxiaoShenpis);
				//$this->set('result', $this->paginate());//分页，用于在前端页面中显示
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}
		public function shouying($id){
			$jingxiaoXinxi = $this->JingxiaoXinxis->findById($id)->firstOrFail();
			$jingxiaoXinxi->isshouying = 1;
			$user = $this->request->getSession()->read('user'); 
			$jingxiaoXinxi->user = $user->gonghao;
			if ($this->JingxiaoXinxis->save($jingxiaoXinxi)) {
				//$this->Flash->success(__('删除成功'));
				return $this->redirect(['action' => 'index']);
			}
		}
    }
