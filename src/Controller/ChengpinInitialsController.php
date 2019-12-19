<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class ChengpinInitialsController extends AppController
    {
        public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [ 
				'ChengpinInitials.id'  =>  'desc' //按自增ID倒序即创建时间，顺序asc
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
			$chengpinInitials = $this->ChengpinInitials->find();
			$this->set('chengpinInitials', $this->paginate($chengpinInitials));//用于在前端页面中显示
			$this->loadModel("Users");
			$chengpinUsers = array();
			
			foreach($chengpinInitials as $chengpinInitial){
				if($chengpinInitial->user!=NULL){
					$user = $this->Users->findByGonghao($chengpinInitial->user)->firstOrFail();
					$chengpinUsers[$chengpinInitial->id] = $user->name;
				}else{
					$chengpinUsers[$chengpinInitial->id] = "";
				}
			}
			$this->set('chengpinUsers', $chengpinUsers);
        }
		public function add()
		{
			$this->viewBuilder()->setLayout('error_id');
			$this->loadComponent('Paginator');
			$chengpinInitial = $this->ChengpinInitials->newEntity();
			if ($this->request->is('post')) {
				$mid = $this->request->getData('mid');
				$result = $this->ChengpinInitials->getamid($mid);
				if($result){
					$this->Flash->error('该编号已存在，添加失败.', [
						'key' => 'error_id'
					]);
				}else{
					$chengpinInitial = $this->ChengpinInitials->patchEntity($chengpinInitial, $this->request->getData());
					// Hardcoding the user is temporary, and will be removed later
					// when we build authentication out.
					$chengpinInitial->user = 'test'; // 临时的
					$mid = $this->request->getData('mid');
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
									$chengpinInitial->fujian = $fileName.$extension;
									//写入数据库
									//if ($this->ChengpinInitials->save($chengpinInitial)) {
									//	$this->Flash->success(__('新增数据成功！'));
									//	return $this->redirect(['action' => 'index']);
									//}
								}else{
									return $this->redirect(['action' => 'addfirstlevel',$mid]);
								}
							}
						}
					}
				
					//写入数据库
					$user = $this->request->getSession()->read('user'); 
					$chengpinInitial->user = $user->gonghao;
					if ($this->ChengpinInitials->save($chengpinInitial)) {
						$this->Flash->success(__('新增数据成功！'));
						return $this->redirect(['action' => 'addfirstlevel',$mid]);
					}
				}
			}
			$this->set('chengpinInitial', $chengpinInitial);
		}
		public function modify($id)
        {
			$chengpinInitial = $this->ChengpinInitials->findById($id)->firstOrFail();
			if ($this->request->is(['post', 'put'])) {
				$this->ChengpinInitials->patchEntity($chengpinInitial, $this->request->getData());
				//写入数据库
				$user = $this->request->getSession()->read('user'); 
				$chengpinInitial->user = $user->gonghao;
				if ($this->ChengpinInitials->save($chengpinInitial)) {
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'addfirstlevel',$chengpinInitial->mid]);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('chengpinInitial', $chengpinInitial);	
        }
		public function delete($id)
		{
			$this->request->allowMethod(['post', 'delete']);

			$chengpinInitial = $this->ChengpinInitials->findById($id)->firstOrFail();
			if ($this->ChengpinInitials->delete($chengpinInitial)) {
				$this->Flash->success(__('The {0} chengpinInitial has been deleted.', $chengpinInitial->kechengmingcheng));
				return $this->redirect(['action' => 'index']);
			}
		}
		public function search(){
			$this->loadModel("ChengpinInitials");
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$mid = $this->request->getData('mid');
				$name = $this->request->getData('name');
				$xinghao = $this->request->getData('xinghao');
				$isfujian = $this->request->getData('isfujian');
	
				$result = $this->ChengpinInitials->find(
						'all', array('conditions'=>array("ChengpinInitials.mid LIKE '%".$mid."%'",
							"ChengpinInitials.name LIKE '%".$name."%'","ChengpinInitials.xinghao LIKE '%".$xinghao."%'",
							"ChengpinInitials.isfujian LIKE '%".$isfujian."%'"
						)));
				$this->set('result', $result);//分页，用于在前端页面中显示
				$this->loadModel("Users");
				$chengpinUsers = array();
			
				foreach($result as $chengpinInitial){
					if($chengpinInitial->user!=NULL){
						$user = $this->Users->findByGonghao($chengpinInitial->user)->firstOrFail();
						$chengpinUsers[$chengpinInitial->id] = $user->name;
					}else{
						$chengpinUsers[$chengpinInitial->id] = "";
					}
				}
				$this->set('chengpinUsers', $chengpinUsers);
				
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
			//$this->set('result', $this->paginate());
		}
		public function addfirstlevel($mid){
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
			//$this->set(compact('results'));
			$this->loadComponent('Paginator');
			$chengpinFirstlevel = $this->ChengpinFirstlevels->newEntity();
			if ($this->request->is('post')) {
				$chengpinFirstlevel->user = 'test'; // 临时的
				$chengpinFirstlevel = $this->ChengpinFirstlevels->patchEntity($chengpinFirstlevel, $this->request->getData());
				
				if ($this->ChengpinFirstlevels->save($chengpinFirstlevel)) {
					$this->Flash->success(__('新增数据成功！'));
					$user = $this->request->getSession()->read('user'); 
					$chengpinInitial->user = $user->gonghao;
					$this->ChengpinInitials->save($chengpinInitial);
					return $this->redirect(['action' => 'addfirstlevel',$mid]);
				}else{
					$this->Flash->error(__('添加失败！！'));
				}
				$this->set('chengpinFirstlevel', $chengpinFirstlevel);
			}
		}
		public function addsecondlevel($mid,$firstlevel,$results=NULL){
			$this->loadComponent('Paginator');
			$this->loadModel("ChengpinSecondlevels");
			if($results=="no"){
				$this->set('results', $results);
			}
			else{
				$this->set('results', json_decode($results));
			}
			$this->set('mid', $mid);
			$this->set('firstlevel', $firstlevel);
			$chengpinSecondlevel = $this->ChengpinSecondlevels->newEntity();
			if ($this->request->is('post')) {
				//return $this->redirect(['action' => 'index']);
				if($this->request->getData('submit')=="搜索"){
					$name = $this->request->getData('searchname');
					$results = $this->ChengpinSecondlevels->searchname($name);
					if($results){
						//应该返回一个数组
						$sqls = json_encode($results, JSON_UNESCAPED_UNICODE);
						$search = "search";
						return $this->redirect(['action' => 'addsecondlevel',$mid,$firstlevel, $sqls ]);
					}else{
						$results = "no";
						return $this->redirect(['action' => 'addsecondlevel',$mid,$firstlevel, $results]);
					}
				}
			}
		}
		public function save($mid,$firstlevel,$secondlevel, $m_id){
			$this->request->allowMethod(['post','save']);
			$this->loadModel("ChengpinSecondlevels");
			$chengpinSecondlevel = $this->ChengpinSecondlevels->newEntity();
			$chengpinSecondlevel->user = 'test'; // 临时的
			$chengpinSecondlevel->mid = $mid;
			$chengpinSecondlevel->firstlevel = $firstlevel;
			$chengpinSecondlevel->secondlevel = $secondlevel;
			$chengpinSecondlevel->secondid = $m_id;
			if ($this->ChengpinSecondlevels->save($chengpinSecondlevel)) {
				$this->Flash->success(__('新增数据成功！'));
				$chengpinInitial = $this->ChengpinInitials->findByMid($mid)->firstOrFail();
				$user = $this->request->getSession()->read('user'); 
				$chengpinInitial->user = $user->gonghao;
				$this->ChengpinInitials->save($chengpinInitial);
				return $this->redirect(['action' => 'addfirstlevel',$mid]);
			}else{
				$this->Flash->error(__('添加失败！'));
			}
			$this->set('chengpinSecondlevel', $chengpinSecondlevel);
		}
		public function addnumber($id,$mid){
			$this->loadModel("ChengpinSecondlevels");
			$this->set('mid', $mid);
			$chengpinSecondlevel = $this->ChengpinSecondlevels->findById($id)->firstOrFail();
			if ($this->request->is(['post', 'put'])) {
				$this->ChengpinSecondlevels->patchEntity($chengpinSecondlevel, $this->request->getData());
				//写入数据库
				if ($this->ChengpinSecondlevels->save($chengpinSecondlevel)) {
					$this->Flash->success(__('修改成功.'));
					$chengpinInitial = $this->ChengpinInitials->findByMid($mid)->firstOrFail();
					$user = $this->request->getSession()->read('user'); 
					$chengpinInitial->user = $user->gonghao;
					$this->ChengpinInitials->save($chengpinInitial);
					return $this->redirect(['action' => 'addfirstlevel',$mid]);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('chengpinSecondlevel', $chengpinSecondlevel);	
		}
    }
