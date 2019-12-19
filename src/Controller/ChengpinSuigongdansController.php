<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class ChengpinSuigongdansController extends AppController
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
			$this->loadModel("ChengpinInitials");
		    $this->loadComponent('Paginator');
			$isonlyid = 1;
			$chengpinInitials = $this->ChengpinInitials->findByIsonlyid($isonlyid);
			$this->set('chengpinInitials', $this->paginate($chengpinInitials));
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
		public function view($mid)
        {
			$this->loadModel("ChengpinDictionarys");
		    $this->loadComponent('Paginator');
			$chengpinDictionarys = $this->ChengpinDictionarys->findByMid($mid);
			$this->set('mid',$mid);
		    //$chengpinInitials = $this->Paginator->paginate($this->ChengpinInitials->find());
		    //$this->set(compact('chengpinDictionarys'));		
			//$this->set('chengpinInitials', $this->paginate($this->ChengpinInitials->find()));
			$this->set('chengpinDictionarys', $this->paginate($this->ChengpinDictionarys->findByMid($mid)));
        }
		public function add($onlyid){
			$this->loadModel("ChengpinDictionarys");
			$this->loadModel("ChengpinInitials");
		    $this->loadComponent('Paginator');
			$chengpinDictionary = $this->ChengpinDictionarys->findByOnlyid($onlyid)->firstOrFail();
			if ($this->request->is(['post', 'put'])) {
				$this->ChengpinDictionarys->patchEntity($chengpinDictionary, $this->request->getData());
				//判断文件是否上传到临时文件
				if($_FILES['fileUpload']['error'] == 0)
				{
					//检测文件扩展名
					$name = $_FILES['fileUpload']['name'];
					$num = strrpos($name, '.');
					//var_dump($name);
		    
					//没有扩展名显示错误信息
					if($num === false)
					{
						return $this->redirect(['action' => 'view',$chengpinDictionary->mid]);
					}
					else
					{
						$allowType = array('.png','.jpg');
						//截取文件扩展名
						$extension = substr($name, $num);
						//var_dump($extension);
						if(!in_array($extension, $allowType))
						{
							return $this->redirect(['action' => 'view',$chengpinDictionary->mid]);
						}
						else
						{
							//时间戳加密文件名
							$fileName = date('Y-m-d').'-'.mt_rand();
							//拼接文件路径
							$path = '..\webroot\suigongdan'.DIRECTORY_SEPARATOR.$fileName.$extension;
							//$pathname = 'G:\Software\Apache\htdocs\zhouhe\app\webroot\photos\as\\';
		    
							//mkdir($pathname);
							//获取临时文件名
							$temp = $_FILES['fileUpload']['tmp_name'];
							//var_dump($temp);
							//var_dump($path);
							//上传文件
							if(move_uploaded_file($temp, $path))
							{
								//文件上传成功后组合文件下载地址
								$chengpinDictionary->suigongdan = $fileName.$extension;
								//写入数据库
								$user = $this->request->getSession()->read('user'); 
								$chengpinDictionary->user = $user->gonghao;
								if ($this->ChengpinDictionarys->save($chengpinDictionary)) {
									return $this->redirect(['action' => 'view',$chengpinDictionary->mid]);
								}
							}
							else
							{
								return $this->redirect(['action' => 'view',$chengpinDictionary->mid]);
							}
						}
					}
					
					
				}
			}
			
			$chengpinInitial = $this->ChengpinInitials->findByMid($chengpinDictionary->mid)->firstOrFail();
			$this->set('chengpinDictionary', $chengpinDictionary);
			$this->set('chengpinInitial', $chengpinInitial);
		}
		public function searchinitial(){
			$this->loadModel("ChengpinInitials");
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$mid = $this->request->getData('mid');
				$name = $this->request->getData('name');
				$xinghao = $this->request->getData('xinghao');
				$isfujian = $this->request->getData('isfujian');
				$isonlyid = 1;
				//$result = $this->ChengpinInitials->searchdb($mid, $name, $xinghao, $isfujian);
				//$this->set('result', $result);
				$result = $this->ChengpinInitials->find(
						'all', array('conditions'=>array("ChengpinInitials.mid LIKE '%".$mid."%'",
							"ChengpinInitials.name LIKE '%".$name."%'","ChengpinInitials.xinghao LIKE '%".$xinghao."%'",
							"ChengpinInitials.isfujian LIKE '%".$isfujian."%'","ChengpinInitials.isonlyid LIKE '%".$isonlyid."%'"
						)));
				$this->set('result', $result);
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
				$this->Flash->error(__('输入有误，没有查询到结果。'));
				$this->set('result', $result=NULL);
			}
		}
		public function searchdictionary(){
			$this->loadModel("ChengpinDictionarys");
		    $this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$onlyid = $this->request->getData('onlyid');
				$mid = $this->request->getData('mid');
				$this->set('mid', $mid);
				$this->set('onlyid', $onlyid);
				$result = $this->ChengpinDictionarys->searchdb($onlyid,$mid);
				$this->set('result', $result);
				//$this->set('result', $this->paginate());//分页，用于在前端页面中显示
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}
		public function eachview($onlyid){
			$this->loadModel("ChengpinDictionarys");
			$chengpinDictionary = $this->ChengpinDictionarys->findByOnlyid($onlyid)->firstOrFail();
			$this->set('onlyid', $onlyid);
			$this->set('chengpinDictionary', $chengpinDictionary);
		}
		
    }
