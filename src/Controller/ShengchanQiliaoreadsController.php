<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class ShengchanQiliaoreadsController extends AppController
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
		    $this->loadModel("ShengchanPaiqis");
			$this->loadComponent('Paginator');
			//$isfujian = 1;
			$this->set('shengchanPaiqis', $this->paginate($this->ShengchanPaiqis->find('all', array('conditions' => array('ShengchanPaiqis.shenpiresult'=>"1")))));//用于在前端页面中显示
        }
		public function qiliaodan($jid)
        {
			$this->loadModel("ShengchanQiliaos");
			//生产排期
			$this->loadModel("ShengchanPaiqis");
			$shengchanPaiqi = $this->ShengchanPaiqis->findByJid($jid)->firstOrFail();
			$mid = $shengchanPaiqi->mid; // 成品编号
			$this->set('shengchanPaiqi', $shengchanPaiqi);
			//$this->loadModel("LailiaoInitials"); //原材料表
			//物料清单
			$shengchanQiliaoFirsts = $this->ShengchanQiliaos->searchFirstlevels($jid); // 返回的是数组，用 ['字段名'] 取值
			//$chengpinFirstlevels = $this->ChengpinFirstlevels->findByMid($mid);// 用 ->字段名 取值
			$shengchanQiliaoSeconds = array();
			foreach ($shengchanQiliaoFirsts as $shengchanQiliaoFirst){
				$firstlevel = $shengchanQiliaoFirst['firstlevel'];
				$shengchanQiliaoSeconds[$firstlevel] = $this->ShengchanQiliaos->searchSecondlevels($jid, $firstlevel);//获取齐料二级单
			}
			$this->set(compact('shengchanQiliaoFirsts'));	
			$this->set(compact('shengchanQiliaoSeconds'));			
        }
		public function search()
        {
			$this->loadModel("ShengchanPaiqis");
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$jid = $this->request->getData('jid');
				$name = $this->request->getData('name');
				$this->set('result', $this->paginate($this->ShengchanPaiqis->find(
						'all', array('conditions'=>array('ShengchanPaiqis.shenpiresult'=>"1","ShengchanPaiqis.jid LIKE '%".$jid."%'",
							"ShengchanPaiqis.name LIKE '%".$name."%'"
						))
				)));
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
        }
    }
