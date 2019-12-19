<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class ShengchanPaiqisController extends AppController
    {
        public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [ 
				'ShengchanPaiqis.id'  =>  'desc' //按自增ID倒序即创建时间，顺序asc
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
			$this->set('shengchanPaiqis', $this->paginate());
        }
		public function add($mid)
        {
			$this->loadModel("ChengpinInitials");
			$this->loadModel("ChengpinFirstlevels");
			$this->loadModel("ChengpinSecondlevels");
			$chengpinInitial = $this->ChengpinInitials->findByMid($mid)->firstOrFail();
			$this->set('chengpinInitial', $chengpinInitial);
			$chengpinFirstlevels = $this->ChengpinFirstlevels->findByMid($chengpinInitial->mid);
			$chengpinSecondlevels = array();// = $this->ChengpinSecondlevels->findByMid($chengpinInitial->mid);
			//二级分类查询
			//$this->Post->find('list', array('fields'=>array('Post.id', 'Post.title', 'Post.author_id')));
			//$conditions = array('and' => array('Field.id = 3', 'or' => array('Field.id = 1', 'Field.id = 2')));
			$results;
			foreach ($chengpinFirstlevels as $chengpinFirstlevel){
				$firstlevel = $chengpinFirstlevel['firstlevel'];
				$results = $this->ChengpinSecondlevels->find('all', array('conditions'=>array('ChengpinSecondlevels.mid'=>$mid, 'ChengpinSecondlevels.firstlevel'=>$firstlevel)));
				$chengpinSecondlevels[$firstlevel] = $results;
			}
			$this->set(compact('chengpinFirstlevels'));	
			$this->set(compact('chengpinSecondlevels'));
			$this->loadComponent('Paginator');
			
			
			$this->loadComponent('Paginator');
			$shengchanPaiqi = $this->ShengchanPaiqis->newEntity();
			if ($this->request->is('post')) {
				$result = $this->ShengchanPaiqis->getorderid();
				$date = date("Y-m-d");
				$order_id = 1;
				if($date==$result[0]['date']){
					$order_id  = (int)$result[0]['order_id'] +1;
				}
				if($order_id>=100){
					$jid = "J".str_replace('-','',$date).$order_id;
				}else if($order_id>=10){
					$jid = "J".str_replace('-','',$date)."0".$order_id;
				}else{
					$jid = "J".str_replace('-','',$date)."00".$order_id;
				}
				$shengchanPaiqi->user = 'test'; // 临时的
				$shengchanPaiqi->mid = $mid;
				$shengchanPaiqi->jid = $jid;
				$shengchanPaiqi->chengpinname = $chengpinInitial['name'];
				$shengchanPaiqi = $this->ShengchanPaiqis->patchEntity($shengchanPaiqi, $this->request->getData());
				//写入数据库
				if ($this->ShengchanPaiqis->save($shengchanPaiqi)) {
					$this->Flash->success(__('新增数据成功！'));
					$this->ShengchanPaiqis->updateorderid($order_id,$date);
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('添加失败！！'));
				}
				$this->set('shengchanPaiqi', $shengchanPaiqi);
			}			
        }
		public function modify($id)
        {
			$shengchanPaiqi = $this->ShengchanPaiqis->findById($id)->firstOrFail();
			if ($this->request->is(['post', 'put'])) {
				$this->ShengchanPaiqis->patchEntity($shengchanPaiqi, $this->request->getData());
				//写入数据库
				$shengchanPaiqi->isshenpi = 0;
				if ($this->ShengchanPaiqis->save($shengchanPaiqi)) {
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('shengchanPaiqi', $shengchanPaiqi);		
        }
		public function view($mid){
			$this->loadModel("ChengpinInitials");
			$this->loadModel("ChengpinFirstlevels");
			$this->loadModel("ChengpinSecondlevels");
			$chengpinInitial = $this->ChengpinInitials->findByMid($mid)->firstOrFail();
			$this->set('chengpinInitial', $chengpinInitial);
			$chengpinFirstlevels = $this->ChengpinFirstlevels->findByMid($mid);
			$chengpinSecondlevels = array();
			$results;
			foreach ($chengpinFirstlevels as $chengpinFirstlevel){
				$firstlevel = $chengpinFirstlevel['firstlevel'];
				$results = $this->ChengpinSecondlevels->find('all', array('conditions'=>array('ChengpinSecondlevels.mid'=>$mid, 'ChengpinSecondlevels.firstlevel'=>$firstlevel)));
				$chengpinSecondlevels[$firstlevel] = $results;
			}
			$this->set(compact('chengpinFirstlevels'));	
			$this->set(compact('chengpinSecondlevels'));
		}
		public function jieshu($mid,$id){
			$this->loadModel("ChengpinInitials");
			$chengpinInitial = $this->ChengpinInitials->findByMid($mid)->firstOrFail();
			$this->set('chengpinInitial', $chengpinInitial);
			$shengchanPaiqi = $this->ShengchanPaiqis->findById($id)->firstOrFail();
			$this->set('shengchanPaiqi', $shengchanPaiqi);		
			$this->set('id', $id);
			if ($this->request->is('post')) {
				//写入数据库
				$this->ShengchanPaiqis->patchEntity($shengchanPaiqi, $this->request->getData());
				$shengchanPaiqi->isjieshu = 1;
				if ($this->ShengchanPaiqis->save($shengchanPaiqi)) {
					$this->Flash->success(__('新增数据成功！'));
					
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('添加失败！！'));
				}
				$this->set('chengpinRuku', $chengpinRuku);
			}
		}
		public function searchname($results=NULL)
        {
			$this->loadModel("ChengpinInitials");
			//$result = json_decode($results);
			$this->set('results', json_decode($results));
			if ($this->request->is('post')) {
				$name = $this->request->getData('searchname');
				$sqls = $this->ShengchanPaiqis->searchname($name);
				if($sqls){
					$results = json_encode($sqls, JSON_UNESCAPED_UNICODE);
					return $this->redirect(['action' => 'searchname',$results]);
				}
			}
				
        }
		public function search(){
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$jid = $this->request->getData('jid');
				$name = $this->request->getData('name');
				$this->set('result', $this->ShengchanPaiqis->find(
						'all', array('conditions'=>array("ShengchanPaiqis.jid LIKE '%".$jid."%'",
							"ShengchanPaiqis.name LIKE '%".$name."%'"
						))
				));
				//$this->set('result', $this->paginate());//分页，用于在前端页面中显示
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}
		public function shishiindex($jid){
			$this->loadModel("ShengchanShishis");
			$this->set('jid' ,$jid);
			$this->set('shengchanShishis', $this->paginate($this->ShengchanShishis->findByJid($jid)));
			$shengchanPaiqi = $this->ShengchanPaiqis->findByJid($jid)->firstOrFail();
			$this->set('shengchanPaiqi',$shengchanPaiqi);
		}
		public function suigongdan($id){
			$this->loadModel("ShengchanShishis");
			$shengchanShishi = $this->ShengchanShishis->findById($id)->firstOrFail();
			$this->set('shengchanShishi',$shengchanShishi);
		}
		public function shishiadd($jid){
			$this->loadModel("ShengchanShishis");
			$shengchanPaiqi = $this->ShengchanPaiqis->findByJid($jid)->firstOrFail();
			$this->set('shengchanPaiqi' ,$shengchanPaiqi);
			$shengchanShishi = $this->ShengchanShishis->newEntity();
			if ($this->request->is('post')) {
					$shengchanShishi = $this->ShengchanShishis->patchEntity($shengchanShishi, $this->request->getData());
					// Hardcoding the user is temporary, and will be removed later
					// when we build authentication out.
					$shengchanShishi->user = 'test'; // 临时的
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
							$allowType = array('.png','.jpg');
							//截取文件扩展名
							$extension = substr($name, $num);
							//var_dump($extension);
						
							if(  !in_array($extension, $allowType) ){
								return $this->redirect(['action' => 'shishiadd',$jid]);
							}else{
								echo $upload['size'];
								//时间戳加密文件名
								$fileName = date('Y-m-d').'-'.mt_rand();
								//拼接文件路径
								$path = '..\webroot\suigongdan'.DIRECTORY_SEPARATOR.$fileName.$extension;
								//$pathname = 'G:\Software\Apache\htdocs\zhouhe\app\webroot\photos\as\\';
				
								//mkdir($pathname);
								//获取临时文件名
								$temp = $upload['tmp_name'];
								//var_dump($temp);
								//var_dump($path);
								//上传文件
								if(move_uploaded_file($temp, $path)){
									//文件上传成功后组合文件下载地址
									$shengchanShishi->fujian = $fileName.$extension;
									//写入数据库
									//if ($this->ShengchanShishis->save($shengchanShishi)) {
									//	$this->Flash->success(__('新增数据成功！'));
									//	return $this->redirect(['action' => 'index']);
									//}
								}else{
									return $this->redirect(['action' => 'shishiadd',$jid]);
								}
							}
						}
					}
				
					//写入数据库
					$shengchanShishi->jid = $shengchanPaiqi->jid;
					$shengchanShishi->mid = $shengchanPaiqi->mid;
					$shengchanShishi->mname = $shengchanPaiqi->chengpinname;
					if ($this->ShengchanShishis->save($shengchanShishi)) {
						$this->Flash->success(__('新增数据成功！'));
						return $this->redirect(['action' => 'shishiindex',$jid]);
					}
			}
		}
		public function shishizhijian($id){
			$this->loadModel("ShengchanShishis");
			$this->request->allowMethod(['post', 'shishizhijian']);
			$this->loadModel("ShengchanShishis");
			$shengchanShishi = $this->ShengchanShishis->findById($id)->firstOrFail();
			$shengchanShishi->isbaosong = 1;
			if ($this->ShengchanShishis->save($shengchanShishi)) {
				$this->Flash->success(__('删除成功'));
				return $this->redirect(['action' => 'shishiindex',$shengchanShishi->jid]);
			}
		}
		public function shishimodify($id){
			$this->loadModel("ShengchanShishis");
			$shengchanShishi = $this->ShengchanShishis->findById($id)->firstOrFail();
			$shengchanPaiqi = $this->ShengchanPaiqis->findByJid($shengchanShishi->jid)->firstOrFail();
			$this->set('shengchanPaiqi' ,$shengchanPaiqi);
			$this->set('shengchanShishi' ,$shengchanShishi);
			if ($this->request->is(['post', 'put'])) {
				$this->ShengchanShishis->patchEntity($shengchanShishi, $this->request->getData());
				//写入数据库
				if ($this->ShengchanShishis->save($shengchanShishi)) {
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'shishiindex',$shengchanPaiqi->jid]);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
		}
		public function shishidelete($id)
		{
			$this->request->allowMethod(['post', 'shishidelete']);
			$this->loadModel("ShengchanShishis");
			$shengchanShishi = $this->ShengchanShishis->findById($id)->firstOrFail();
			if ($this->ShengchanShishis->delete($shengchanShishi)) {
				$this->Flash->success(__('删除成功'));
				return $this->redirect(['action' => 'shishiindex',$shengchanShishi->jid]);
			}
		}
		public function delete($id)
		{
			$this->request->allowMethod(['post', 'delete']);

			$shengchanPaiqi = $this->ShengchanPaiqis->findById($id)->firstOrFail();
			if ($this->ShengchanPaiqis->delete($shengchanPaiqi)) {
				$this->Flash->success(__('删除成功'));
				return $this->redirect(['action' => 'index']);
			}
		}

    }
