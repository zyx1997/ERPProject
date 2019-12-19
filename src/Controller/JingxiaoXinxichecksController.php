<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class JingxiaoXinxichecksController extends AppController
    {
        public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [ 
				'JingxiaoXinxis.isjitiao'  =>  'asc',
				'JingxiaoXinxis.isshenpi'  =>  'asc',
				'JingxiaoXinxis.id'  =>  'desc'//按自增ID倒序即创建时间，顺序asc
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
			$this->loadModel("JingxiaoXinxis");
		    $this->loadComponent('Paginator');
			$this->loadModel("Users");
			$istijiao=1;
			$jingxiaoXinxis = $this->JingxiaoXinxis->findByIstijiao($istijiao);
			$jiaoxiaoShenpis = array();
			foreach($jingxiaoXinxis as $jingxiaoXinxi){
				if($jingxiaoXinxi->isshenpi==1){
					$user = $this->Users->findByGonghao($jingxiaoXinxi->shenpiren)->firstOrFail();
					$jiaoxiaoShenpis[$jingxiaoXinxi->id] = $user->name;
				}
			}
			$this->set('jingxiaoXinxis', $this->paginate($jingxiaoXinxis));
			$this->set('jiaoxiaoShenpis', $jiaoxiaoShenpis);
        }
		public function check($id)
        {
			$this->loadModel("JingxiaoXinxis");
			$jingxiaoXinxi = $this->JingxiaoXinxis->findById($id)->firstOrFail();
			$this->loadModel("JingxiaoZizhis");
			$jingxiaoZizhis = $this->JingxiaoZizhis->findByJxid($jingxiaoXinxi->jxid);
			
			$this->set('jingxiaoZizhis', $jingxiaoZizhis);
			$this->loadModel("JingxiaoPeitaos");
			$jingxiaoPeitaos = $this->JingxiaoPeitaos->findByJxid($jingxiaoXinxi->jxid);
			$this->set('jingxiaoPeitaos', $jingxiaoPeitaos);
			if ($this->request->is('post')) {
				$reason = $jingxiaoXinxi->shenpireason;
				$this->JingxiaoXinxis->patchEntity($jingxiaoXinxi, $this->request->getData());
				//写入数据库
				$jingxiaoXinxi->shenpireason = $reason.date("Y-m-d").": ".$this->request->getData('shenpireason')."\r\n";
				$jingxiaoXinxi->isshenpi = 1;
				$user = $this->request->getSession()->read('user'); 
				$jingxiaoXinxi->shenpiren = $user->gonghao;
				if ($this->JingxiaoXinxis->save($jingxiaoXinxi)) {
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('jingxiaoXinxi', $jingxiaoXinxi);	
			
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
			$this->loadModel("JingxiaoXinxis");
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
		public function viewpeitao($id,$ptid){
			$this->loadModel("JingxiaoXinxis");
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
		public function checkshouying($id)
        {
			$this->loadModel("JingxiaoXinxis");
			$jingxiaoXinxi = $this->JingxiaoXinxis->findById($id)->firstOrFail();
			$this->loadModel("JingxiaoZizhis");
			$jingxiaoZizhis = $this->JingxiaoZizhis->findByJxid($jingxiaoXinxi->jxid);
			
			$this->set('jingxiaoZizhis', $jingxiaoZizhis);
			$this->loadModel("JingxiaoPeitaos");
			$jingxiaoPeitaos = $this->JingxiaoPeitaos->findByJxid($jingxiaoXinxi->jxid);
			$this->set('jingxiaoPeitaos', $jingxiaoPeitaos);
			if ($this->request->is('post')) {
				$result = $this->request->getData('result');
				if($result==0){
					$jingxiaoXinxi->isshouying = 0;
				}else{
					$jingxiaoXinxi->isshouying = 0;
					$jingxiaoXinxi->istijiao = 0;
					$jingxiaoXinxi->isshenpi = 0;
					$jingxiaoXinxi->shenpiresult = 0;
				}
				if ($this->JingxiaoXinxis->save($jingxiaoXinxi)) {
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('jingxiaoXinxi', $jingxiaoXinxi);

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
		public function search(){
			$this->loadModel("JingxiaoXinxis");
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$name = $this->request->getData('name');
				$lianxiren = $this->request->getData('lianxiren');
				$istijiao = 1;
				$result = $this->JingxiaoXinxis->find(
						'all', array('conditions'=>array(
							"JingxiaoXinxis.name LIKE '%".$name."%'","JingxiaoXinxis.lianxiren LIKE '%".$lianxiren."%'",
							"JingxiaoXinxis.istijiao LIKE '%".$istijiao."%'"
						)));
				$this->set('result', $result);
				$this->loadModel("Users");
				$jingxiaoUsers = array();
				$jiaoxiaoShenpis = array();
				foreach($result as $jingxiaoXinxi){
					if($jingxiaoXinxi->isshenpi==1){
						$user = $this->Users->findByGonghao($jingxiaoXinxi->shenpiren)->firstOrFail();
						$jiaoxiaoShenpis[$jingxiaoXinxi->id] = $user->name;
					}
				}
				$this->set('jiaoxiaoShenpis', $jiaoxiaoShenpis);
				//$this->set('result', $this->paginate());//分页，用于在前端页面中显示
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}
		
    }
