<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class ChengpinWeishousController extends AppController
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
			$this->set('chengpinInitials', $this->paginate($this->ChengpinInitials->find()));
			
        }
		public function view($mid)
        {
			$this->loadModel("ChengpinDictionarys");
		    $this->loadComponent('Paginator');
			$this->set('mid',$mid);
		    //$chengpinInitials = $this->Paginator->paginate($this->ChengpinInitials->find());
		    //$this->set(compact('chengpinDictionarys'));		
			//$this->set('chengpinInitials', $this->paginate($this->ChengpinInitials->find()));
			$this->set('chengpinDictionarys', $this->paginate($this->ChengpinDictionarys->find('all', array('conditions'=>array('ChengpinDictionarys.mid'=>$mid, 'ChengpinDictionarys.orderid is NULL')))));
        }
		public function eachview($onlyid){
			$this->loadModel("ChengpinDictionarys");
			$chengpinDictionary = $this->ChengpinDictionarys->findByOnlyid($onlyid)->firstOrFail();
			$this->set('onlyid', $onlyid);
			$this->set('chengpinDictionary', $chengpinDictionary);
		}
		public function searchinitial(){
			$this->loadModel("ChengpinInitials");
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$mid = $this->request->getData('mid');
				$name = $this->request->getData('name');
				$xinghao = $this->request->getData('xinghao');
				$isfujian = $this->request->getData('isfujian');
				$result = $this->ChengpinInitials->searchdb($mid, $name, $xinghao, $isfujian);
				$this->set('result', $result);
				//$this->set('result', $this->paginate());//分页，用于在前端页面中显示
			}else{
				$this->Flash->error(__('输入有误，没有查询到结果。'));
				$this->set('result', $result=NULL);
			}
		}
    }
