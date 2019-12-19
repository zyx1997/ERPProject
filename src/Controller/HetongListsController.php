<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class HetongListsController extends AppController
    {
		public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [ 
				'HetongLists.istijiao'  =>  'asc', //顺序 asc,倒序 desc
				'HetongLists.isshenhe'  =>  'asc', //顺序 asc,倒序 desc
				'HetongLists.time'  =>  'desc' //顺序 asc,倒序 desc
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
			$hetongLists = $this->HetongLists->find('all', array('conditions' => array('HetongLists.isrecord'=>"0")));
			$this->set('hetongLists', $this->paginate($hetongLists));//用于在前端页面中显示
			//以下为用户信息
			$this->loadModel("Users");
			$Users = array(); //存储操作人名字
			//$Shenpirens = array();//存储审批人名字
			foreach($hetongLists as $hetongList){
				if($hetongList->user!=NULL){
					$user = $this->Users->findByGonghao($hetongList->user)->firstOrFail();
					$Users[$hetongList->id] = $user->name;
				}else{
					$Users[$hetongList->id] = "";
				}
			}
			$this->set('Users', $Users);
		}
		public function searchdinghuo( $encode_results=NULL )
		{
			$this->loadComponent('Paginator');
			$this->loadModel("JingxiaoXinxis");
			$this->loadModel("YiyuanXinxis");
			$this->loadModel("QitaXinxis");
			
			/*
			$result = $this->HetongLists->getorderid();
			$date = date("Y-m-d");//当前日期
			$order_id = 1;
			if($date==$result[0]['date']){//如果最新订单的日期等于当天
				$order_id  = (int)$result[0]['order_id'] +1;//编号=最新编号+1
			}
			//编号规则"L20190517001"
			if($order_id>=100){
				$h_id = "L".str_replace('-','',$date).$order_id;
			}else if($order_id>=10){
				$h_id = "L".str_replace('-','',$date)."0".$order_id;
			}else{
				$h_id = "L".str_replace('-','',$date)."00".$order_id;
			}
			$this->set('h_id', $h_id);
			*/
			
			if ($this->request->is('post')) {
				$dh_type = $this->request->getData('dh_type');
				$dh_name = $this->request->getData('dh_name');
				if( $dh_type == 0 ){
					$results = $this->JingxiaoXinxis->find(
						'all', array('conditions'=>array(
							"JingxiaoXinxis.isshenpi = 1",
							"JingxiaoXinxis.shenpiresult = 1",
							"JingxiaoXinxis.name LIKE '%".$dh_name."%'"
						))
					);
				} else if( $dh_type == 1 ){
					$results = $this->YiyuanXinxis->find(
						'all', array('conditions'=>array(
							"YiyuanXinxis.name LIKE '%".$dh_name."%'"
						))
					);
				} else {
					$results = $this->QitaXinxis->find(
						'all', array('conditions'=>array(
							"QitaXinxis.name LIKE '%".$dh_name."%'"
						))
					);
				}
				if($results){
					//应该返回一个数组
					$encode_results = json_encode($results, JSON_UNESCAPED_UNICODE);
					$this->set('dh_type', $dh_type);
				}else{
					return $this->redirect(['action' => 'index']);
				}
			}else{
				$this->Flash->error(__('输入有误，没有查询到。'));
				$this->set('result', NULL);
			}
			$this->set('decode_results', json_decode($encode_results));
		}
		public function add( $dh_type, $dh_id, $dh_name )
        {
			$this->loadComponent('Paginator');
			
			$hetongList = $this->HetongLists->newEntity();
			if ($this->request->is('post')) {
				$user = $this->request->getSession()->read('user'); 
				$hetongList->user = $user->gonghao; 
				$hetongList->dh_id = $dh_id; 
				$this->HetongLists->patchEntity($hetongList, $this->request->getData());
				$hetongList->dh_type = $dh_type; //订货单位类型
				
				//待评审部门（1营销中心,2办公室,3质检部,4生产部,5采购部,6总经理）
				$checkboxArr = $_POST['checkbox'];
				$pingshenbumen_target = implode('',$checkboxArr);//将数组变成字符串
				$hetongList->pingshenbumen_target = $pingshenbumen_target;
				if( strstr($pingshenbumen_target,"1")!= false ) $hetongList->targetshenhe_yingxiao = 1;
				if( strstr($pingshenbumen_target,"2")!= false ) $hetongList->targetshenhe_office = 1;
				if( strstr($pingshenbumen_target,"3")!= false ) $hetongList->targetshenhe_zhijian = 1;
				if( strstr($pingshenbumen_target,"4")!= false ) $hetongList->targetshenhe_shengchan = 1;
				if( strstr($pingshenbumen_target,"5")!= false ) $hetongList->targetshenhe_caigou = 1;
				if( strstr($pingshenbumen_target,"6")!= false ) $hetongList->targetshenhe_manager = 1;
				//可能只勾选了总经理
				//判断平级是否全部审核通过，总经理是否可以开始审核
				if(strcmp( $hetongList->pingshenbumen_target, (($hetongList->pingshenbumen_ok)."6") ) == 0 )
					$hetongList->keyishenhe_manager = 1;
				else
					$hetongList->keyishenhe_manager = 0;
				
				//自动获取系统编号-合同评审编号
				$result = $this->HetongLists->getorderid();
				$date = date("Y-m-d");//当前日期
				$order_id = 1;
				if($date==$result[0]['date']){//如果最新订单的日期等于当天
					$order_id  = (int)$result[0]['order_id'] +1;//编号=最新编号+1
				}//编号规则"L20190517001"
				if($order_id>=100){
					$h_id = "L".str_replace('-','',$date).$order_id;
				}else if($order_id>=10){
					$h_id = "L".str_replace('-','',$date)."0".$order_id;
				}else{
					$h_id = "L".str_replace('-','',$date)."00".$order_id;
				}
				$hetongList->h_id = $h_id;
				//写入数据库
				if ($this->HetongLists->save($hetongList)) {
					$this->Flash->success(__('新增数据成功！'));
					$this->HetongLists->updateorderid($order_id,$date);
					return $this->redirect(['action' => 'searchpeitao',$hetongList->id]);
				}else{
					$this->Flash->error(__('添加失败！！'));
				}
			}
			//$this->set('h_id', $h_id);
			$this->set('dh_type', $dh_type);
			$this->set('dh_id', $dh_id);
			$this->set('dh_name', $dh_name);
        }
		public function searchpeitao($id, $jingxiaoPeitaos=NULL, $error=NULL)
		{
			$this->loadModel("JingxiaoXinxis");
			$this->loadModel("JingxiaoPeitaos");
			$this->loadModel("ChengpinPeitaos");
			$this->loadModel("ChengpinPeitaoitems");
			//$this->loadComponent('Paginator');
			$this->viewBuilder()->setLayout('error_id');
			
			//合同评审表
			$hetongList = $this->HetongLists->findById($id)->firstOrFail();
			//配套查询结果
			$this->set('gongyingPeitaos', NULL);
			//if( $error == '1'){
				//$this->Flash->error('该配套产品已存在，添加失败.', [
				//	'key' => 'error_id'
				//]);
			//}
			if ($this->request->is('post')) {
				$name = $this->request->getData('name');
				
				// $dh_type订货单位
				// 0经销商，1医院，2其他
				$gongyingPeitaojiages = array();
				if( $hetongList->dh_type == 0 ){ //如果订货单位是经销商，从经销商配套的库里查找
					//经销商可供产品(配套)
					$jingxiaoXinxi = $this->JingxiaoXinxis->findById($hetongList->dh_id)->firstOrFail();
					$gongyingPeitaos = $this->JingxiaoPeitaos->find(
						'all', array('conditions'=>array(
						"JingxiaoPeitaos.jxid "=>$jingxiaoXinxi->jxid,
						"JingxiaoPeitaos.peitaoname LIKE '%".$name."%'"
						))
					);
					//供应商配套价格
					foreach ($gongyingPeitaos as $gongyingPeitao){
						$ptid = $gongyingPeitao->ptid;
						$gongyingPeitaojiages[$ptid] = $gongyingPeitao->peitaojiage;
					}
					$this->set('jingxiaoXinxi', $jingxiaoXinxi);
				}else{ //否则，直接从成品配套的库查找
					$gongyingPeitaos = $this->ChengpinPeitaos->find(
						'all', array('conditions'=>array(
						"ChengpinPeitaos.name LIKE '%".$name."%'"
						))
					);
					//供应商配套价格
					foreach ($gongyingPeitaos as $gongyingPeitao){
						$ptid = $gongyingPeitao->ptid;
						$gongyingPeitaojiages[$ptid] = $gongyingPeitao->cankaojiage;
					}
				}
				$chengpinPeitaos = array();
				$chengpinPeitaoitems = array();
				$peitaoitemsCount = array();
				foreach ($gongyingPeitaos as $gongyingPeitao){
					if( $hetongList->dh_type == 0 )
						$ptid = $gongyingPeitao->ptid;
					else
						$ptid = $gongyingPeitao->ptid;
					$chengpinPeitaos[$ptid] = $this->ChengpinPeitaos->findByPtid($ptid)->firstOrFail();
					$chengpinPeitaoitems[$ptid] = $this->ChengpinPeitaoitems->find(
						'all', array('conditions' => array(
							'ChengpinPeitaoitems.ptid'=>$ptid
						))
					);// 用 ->字段名 取值
					$peitaoitemsCount[$ptid] = $chengpinPeitaoitems[$ptid]->count();
				}
				//$this->paginate($jingxiaoPeitaos);//用于在前端页面中显示
				$this->set(compact('gongyingPeitaos'));
				$this->set(compact('gongyingPeitaojiages'));
				$this->set(compact('chengpinPeitaos'));
				$this->set(compact('chengpinPeitaoitems'));
				$this->set(compact('peitaoitemsCount'));
			}else{
				$this->Flash->error(__('输入有误，没有查询到。'));
				$this->set('result', NULL);
			}
			$this->set('hetongList', $hetongList); 
			
		}
		public function addPeitao($hetongList_id, $ptid)
        {
			$this->loadModel("HetongListAlls");
			$this->loadModel("ChengpinInitials");
			$this->loadModel("ChengpinPeitaos");
			$this->loadModel("ChengpinPeitaoitems");
			$this->loadModel("JingxiaoPeitaos");
			$this->loadModel("JingxiaoXinxis");
			$this->loadComponent('Paginator');
			$this->viewBuilder()->setLayout('error_id');
			
			$hetongList = $this->HetongLists->findById($hetongList_id)->firstOrFail();//合同评审表
			$chengpinPeitao = $this->ChengpinPeitaos->findByPtid($ptid)->firstOrFail();//成品配套
			$chengpinPeitaoitems = $this->ChengpinPeitaoitems->findByPtid($ptid);//附件们
			$peitaoitemsCount = $chengpinPeitaoitems->count();
			
			if( $hetongList->dh_type == 0 ){ //如果订货单位是经销商，从经销商配套的库里查找
				$jingxiaoXinxi = $this->JingxiaoXinxis->findById($hetongList->dh_id)->firstOrFail();//经销商
				$gongyingPeitao = $this->JingxiaoPeitaos->find(
					'all', array('conditions'=>array(
					"JingxiaoPeitaos.jxid "=>$jingxiaoXinxi->jxid,
					"JingxiaoPeitaos.ptid "=>$ptid
					))
				)->firstOrFail();//经销商配套
				$gongyingPeitaojiage = $gongyingPeitao->peitaojiage;//供应商配套价格
			}else{ //否则，直接从成品配套的库查找
				$gongyingPeitao = $this->ChengpinPeitaos->findByPtid($ptid)->firstOrFail();//配套
				$gongyingPeitaojiage = $gongyingPeitao->cankaojiage;//供应商配套价格
			}
			//新增配套产品
			$hetongListAll = $this->HetongListAlls->newEntity();
			if ($this->request->is('post')) {
				$alreadyExists = $this->HetongListAlls->find(
					'all', array('conditions'=>array(
						'HetongListAlls.h_keyid'=>$hetongList_id,
						'HetongListAlls.ptid'=>$ptid
					))
				);
				if( $alreadyExists->count() >= 1 ){
					$this->Flash->error('该配套产品已存在，添加失败.', [
						'key' => 'error_id'
					]);
				}else{
					// 合同单被驳回后，一旦有修改
					// 就将当前的审核信息保存到各部门的数据库中永存
					// 同时还原合同单的审核状态
					if( $hetongList->isshenhe == 2 && $hetongList->shenheok == 0 ){
						$this->saveHetongListcheck($hetongList_id); // 保存各部门审核记录
						$this->initialShenhe($hetongList_id); // 还原审核状态
					}
					//以下为合同评审表信息
					$user = $this->request->getSession()->read('user'); 
					$hetongList->user = $user->gonghao; 
					$hetongListAll->user = $user->gonghao; 
					$hetongListAll->h_keyid = $hetongList_id; // 合同单在数据库中的自增编号
					$hetongListAll->h_id = $hetongList->h_id; // 合同评审编号
					//以下为配套信息
					$hetongListAll->peitaojiage = $this->request->getData('peitaojiage');// 配套参考价格（用户自己手输）
					$this->HetongListAlls->patchEntity($hetongListAll, $this->request->getData());
					$hetongListAll->ptid = $ptid; // 配套id
					$hetongListAll->peitaoname = $chengpinPeitao->name;// 配套名称
					//合同评审表的合计价格
					$hetongList->heji_totalprice += $hetongListAll->peitaojiage; 
					//写入数据库
					if ($this->HetongListAlls->save($hetongListAll) && $this->HetongLists->save($hetongList)) {
						$this->Flash->success(__('新增数据成功！'));
						return $this->redirect(['action' => 'manage', $hetongList_id]);
					}else{
						return $this->redirect(['action' => 'manage', $hetongList_id]);
					}
				}
			}
			$this->set('hetongList', $hetongList);
			$this->set('gongyingPeitao', $gongyingPeitao);
			$this->set('gongyingPeitaojiage', $gongyingPeitaojiage);
			$this->set('chengpinPeitao', $chengpinPeitao);
			$this->set('chengpinPeitaoitems', $chengpinPeitaoitems);
			$this->set('peitaoitemsCount', $peitaoitemsCount);
        }
		public function modify($id)
        {
			$hetongList = $this->HetongLists->findById($id)->firstOrFail();
			$h_id = $hetongList->h_id;
			//$hetongList = $this->HetongLists->findByHId($h_id)->where(['isrecord' => 0])->firstOrFail();
			if ($this->request->is(['post', 'put'])) {
				// 合同单被驳回后，一旦有修改
				// 就将当前的审核信息保存到各部门的数据库中永存
				// 同时还原合同单的审核状态
				if( $hetongList->isshenhe == 2 && $hetongList->shenheok == 0 ){
					$this->saveHetongListcheck($id); // 保存各部门审核记录
					$this->initialShenhe($id); // 还原审核状态
				}
				// 获取修改界面的信息
				$this->HetongLists->patchEntity($hetongList, $this->request->getData());
				$user = $this->request->getSession()->read('user'); 
				$hetongList->user = $user->gonghao; 
				//待评审部门（1营销中心,2办公室,3质检部,4生产部,5采购部,6总经理）
				$checkboxArr = $_POST['checkbox'];
				$pingshenbumen_target = implode('',$checkboxArr);//将数组变成字符串
				$hetongList->pingshenbumen_target = $pingshenbumen_target;
				if( strstr($pingshenbumen_target,"1")!= false ) $hetongList->targetshenhe_yingxiao = 1; else $hetongList->targetshenhe_yingxiao = 0;
				if( strstr($pingshenbumen_target,"2")!= false ) $hetongList->targetshenhe_office = 1; else $hetongList->targetshenhe_office = 0;
				if( strstr($pingshenbumen_target,"3")!= false ) $hetongList->targetshenhe_zhijian = 1; else $hetongList->targetshenhe_zhijian = 0;
				if( strstr($pingshenbumen_target,"4")!= false ) $hetongList->targetshenhe_shengchan = 1; else $hetongList->targetshenhe_shengchan = 0;
				if( strstr($pingshenbumen_target,"5")!= false ) $hetongList->targetshenhe_caigou = 1; else $hetongList->targetshenhe_caigou = 0;
				if( strstr($pingshenbumen_target,"6")!= false ) $hetongList->targetshenhe_manager = 1; else $hetongList->targetshenhe_manager = 0;
				//可能只勾选了总经理
				//判断平级是否全部审核通过，总经理是否可以开始审核
				if(strcmp( $hetongList->pingshenbumen_target, (($hetongList->pingshenbumen_ok)."6") ) == 0 )
					$hetongList->keyishenhe_manager = 1;
				else
					$hetongList->keyishenhe_manager = 0;
				//写入数据库
				if ($this->HetongLists->save($hetongList)) {
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'manage', $id]);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			//$this->set('h_id', $h_id);
			$this->set('hetongList', $hetongList);		
        }
		//显示合同表自增编号为id的全部产品信息,并且管理
		public function manage($id)
        {
		    $this->loadModel("HetongListAlls");
			$this->loadModel("ChengpinInitials");
			$this->loadModel("ChengpinPeitaos");
			$this->loadModel("ChengpinPeitaoitems");
			$this->loadModel("JingxiaoPeitaos");
			$this->loadModel("JingxiaoXinxis");
			$this->loadComponent('Paginator');	
			
			$hetongList = $this->HetongLists->findById($id)->firstOrFail();
			$hetongListAlls = $this->HetongListAlls->find('all', array('conditions' => array('HetongListAlls.h_keyid'=>$id)));
			$chengpinPeitaos = array();
			$chengpinPeitaoitems = array();
			$peitaoitemsCount = array();
			foreach ($hetongListAlls as $hetongListAll){
				$ptid = $hetongListAll->ptid;
				$chengpinPeitaos[$ptid] = $this->ChengpinPeitaos->findByPtid($ptid)->firstOrFail();
				$chengpinPeitaoitems[$ptid] = $this->ChengpinPeitaoitems->find(
					'all', array('conditions' => array(
						'ChengpinPeitaoitems.ptid'=>$ptid
					))
				);// 用 ->字段名 取值
				$peitaoitemsCount[$ptid] = $chengpinPeitaoitems[$ptid]->count();
			}
			$this->set('hetongList', $hetongList);
			$this->paginate($hetongListAlls);//用于在前端页面中显示
			$this->set(compact('hetongListAlls'));
			$this->set(compact('chengpinPeitaos'));
			$this->set(compact('chengpinPeitaoitems'));
			$this->set(compact('peitaoitemsCount'));
		}
		//显示合同表自增编号为id的全部产品信息，只能读取
		public function view($id)
        {
		    $this->loadModel("HetongListAlls");
			$this->loadModel("ChengpinInitials");
			$this->loadModel("ChengpinPeitaos");
			$this->loadModel("ChengpinPeitaoitems");
			$this->loadModel("JingxiaoPeitaos");
			$this->loadModel("JingxiaoXinxis");
			$this->loadComponent('Paginator');	
			
			$hetongList = $this->HetongLists->findById($id)->firstOrFail();
			$hetongListAlls = $this->HetongListAlls->find('all', array('conditions' => array('HetongListAlls.h_keyid'=>$id)));
			$chengpinPeitaos = array();
			$chengpinPeitaoitems = array();
			$peitaoitemsCount = array();
			foreach ($hetongListAlls as $hetongListAll){
				$ptid = $hetongListAll->ptid;
				$chengpinPeitaos[$ptid] = $this->ChengpinPeitaos->findByPtid($ptid)->firstOrFail();
				$chengpinPeitaoitems[$ptid] = $this->ChengpinPeitaoitems->find(
					'all', array('conditions' => array(
						'ChengpinPeitaoitems.ptid'=>$ptid
					))
				);// 用 ->字段名 取值
				$peitaoitemsCount[$ptid] = $chengpinPeitaoitems[$ptid]->count();
			}
			$this->set('hetongList', $hetongList);
			$this->paginate($hetongListAlls);//用于在前端页面中显示
			$this->set(compact('hetongListAlls'));
			$this->set(compact('chengpinPeitaos'));
			$this->set(compact('chengpinPeitaoitems'));
			$this->set(compact('peitaoitemsCount'));
		}
		//显示合同表自增编号为id的审核进度
		public function process($id)
        {
			$this->loadModel("HetongListAlls");
			$this->loadModel("ChengpinPeitaos");
			$this->loadModel("ChengpinPeitaoitems");
			$this->loadComponent('Paginator');	
			//合同表单
			$hetongList = $this->HetongLists->findById($id)->firstOrFail();
			$hetongListAlls = $this->HetongListAlls->find('all', array('conditions' => array('HetongListAlls.h_keyid'=>$id)));
			$chengpinPeitaos = array();
			$chengpinPeitaoitems = array();
			$peitaoitemsCount = array();
			foreach ($hetongListAlls as $hetongListAll){
				$ptid = $hetongListAll->ptid;
				$chengpinPeitaos[$ptid] = $this->ChengpinPeitaos->findByPtid($ptid)->firstOrFail();
				$chengpinPeitaoitems[$ptid] = $this->ChengpinPeitaoitems->find(
					'all', array('conditions' => array(
						'ChengpinPeitaoitems.ptid'=>$ptid
					))
				);// 用 ->字段名 取值
				$peitaoitemsCount[$ptid] = $chengpinPeitaoitems[$ptid]->count();
			}
			$this->set('hetongList', $hetongList);
			$this->set(compact('hetongListAlls'));
			$this->set(compact('chengpinPeitaos'));
			$this->set(compact('chengpinPeitaoitems'));
			$this->set(compact('peitaoitemsCount'));
			
			//以下为用户信息
			$this->loadModel("Users");
			if($hetongList->isshenhe_yingxiao==1){
				$user = $this->Users->findByGonghao($hetongList->shenheren_yingxiao)->firstOrFail();
				$shenheren_yingxiao = $user->name;
				$this->set('shenheren_yingxiao', $shenheren_yingxiao);
			}
			if($hetongList->isshenhe_office==1){
				$user = $this->Users->findByGonghao($hetongList->shenheren_office)->firstOrFail();
				$shenheren_office = $user->name;
				$this->set('shenheren_office', $shenheren_office);
			}
			if($hetongList->isshenhe_zhijian==1){
				$user = $this->Users->findByGonghao($hetongList->shenheren_zhijian)->firstOrFail();
				$shenheren_zhijian = $user->name;
				$this->set('shenheren_zhijian', $shenheren_zhijian);
			}
			if($hetongList->isshenhe_shengchan==1){
				$user = $this->Users->findByGonghao($hetongList->shenheren_shengchan)->firstOrFail();
				$shenheren_shengchan = $user->name;
				$this->set('shenheren_shengchan', $shenheren_shengchan);
			}
			if($hetongList->isshenhe_caigou==1){
				$user = $this->Users->findByGonghao($hetongList->shenheren_caigou)->firstOrFail();
				$shenheren_caigou = $user->name;
				$this->set('shenheren_caigou', $shenheren_caigou);
			}
			if($hetongList->isshenhe_manager==1){
				$user = $this->Users->findByGonghao($hetongList->shenheren_manager)->firstOrFail();
				$shenheren_manager = $user->name;
				$this->set('shenheren_manager', $shenheren_manager);
			}
		}
		public function search()
		{
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$duixiang = $this->request->getData('duixiang');
				$h_id = $this->request->getData('h_id');
				$dh_name = $this->request->getData('dh_name');
				$hetongLists = $this->HetongLists->find(
					'all', array('conditions'=>array(
						"HetongLists.isrecord = 0 ",
						"HetongLists.duixiang LIKE '%".$duixiang."%'",
						"HetongLists.h_id LIKE '%".$h_id."%'",
						"HetongLists.dh_name LIKE '%".$dh_name."%'"
					))
				);
				$this->set('result', $this->paginate($hetongLists));
				//以下为用户信息
				$this->loadModel("Users");
				$Users = array(); //存储操作人名字
				foreach($hetongLists as $hetongList){
					if($hetongList->user!=NULL){
						$user = $this->Users->findByGonghao($hetongList->user)->firstOrFail();
						$Users[$hetongList->id] = $user->name;
					}else{
						$Users[$hetongList->id] = "";
					}
				}
				$this->set('Users', $Users);
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}
		public function seesearch($id)
		{
			$this->loadModel("HetongListAlls");
			$this->loadModel("ChengpinPeitaoitems");
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				
				$name = $this->request->getData('name');
				$mid = $this->request->getData('mid');
				$mname = $this->request->getData('mname');
				
				$hetongList = $this->HetongLists->findById($id)->firstOrFail();
				$hetongListAlls = $this->HetongListAlls->find(
					'all', array('conditions' => array(
					'HetongListAlls.h_keyid'=>$id,
					"HetongListAlls.name LIKE '%".$name."%'",
					"HetongListAlls.mid LIKE '%".$mid."%'",
					"HetongListAlls.mname LIKE '%".$mname."%'"
					))
				);
				$chengpinPeitaoitems = array();
				$peitaoitemsCount = array();
				foreach ($hetongListAlls as $hetongListAll){
					$ptid = $hetongListAll->ptid;
					$chengpinPeitaoitems[$ptid] = $this->ChengpinPeitaoitems->find(
						'all', array('conditions' => array(
							'ChengpinPeitaoitems.ptid'=>$ptid
						))
					);// 用 ->字段名 取值
					$peitaoitemsCount[$ptid] = $chengpinPeitaoitems[$ptid]->count();
				}
				
				$this->set('hetongList', $hetongList);
				$this->paginate($hetongListAlls);//用于在前端页面中显示
				$this->set(compact('hetongListAlls'));
				$this->set(compact('chengpinPeitaoitems'));
				$this->set(compact('peitaoitemsCount'));
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}
		public function searchM($id)
		{
			$this->loadModel("HetongListAlls");
			$this->loadComponent('Paginator');	
			//采购单
			//$hetongList = $this->HetongLists->findByHId($h_id)->firstOrFail();	
			$hetongList = $this->HetongLists->findById($id)->firstOrFail();
			$h_id = $hetongList->h_id;
			if ($this->request->is('post')) {
				$mid = $this->request->getData('mid');
				$name = $this->request->getData('name');
				$xinghao = $this->request->getData('xinghao');
				$result = $this->HetongListAlls->searchdb($h_id, $mid, $name, $xinghao);
				$this->set('result', $result);
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
			//$this->set('h_id', $h_id);
			$this->set('hetongList', $hetongList);
		}
		//显示合同表自增编号为id的审核进度
		public function tijiaoshenhe($id)
        {
			$this->loadComponent('Paginator');	
			//合同表单
			$hetongList = $this->HetongLists->findById($id)->firstOrFail();
			$hetongList->istijiao = 1;
			$user = $this->request->getSession()->read('user'); 
			$hetongList->user = $user->gonghao; 
			//写入数据库
			if ($this->HetongLists->save($hetongList)) {
				$this->Flash->success(__('提交审核成功！'));
				return $this->redirect(['action' => 'view', $id]);
			}
		}
		public function deletePeitao($id)
		{
			$this->loadModel("HetongListAlls");
			//$this->request->allowMethod(['post', 'deletePeitao']);
			
			$hetongListAll = $this->HetongListAlls->findById($id)->firstOrFail();
			$hetongList = $this->HetongLists->findById($hetongListAll->h_keyid)->firstOrFail();
			//合同评审表的合计价格
			$hetongList->heji_totalprice -= $hetongListAll->peitaojiage; 
			//以下为用户信息
			$this->loadModel("Users");
			$user = $this->request->getSession()->read('user'); 
			$hetongList->user = $user->gonghao; 
			//写入数据库
			if ($this->HetongListAlls->delete($hetongListAll) && $this->HetongLists->save($hetongList) ) {
				$this->Flash->success(__('The {0} hetongListAll has been deleted.', $id));
				return $this->redirect(['action' => 'manage', $hetongListAll->h_keyid]);
			}
		}
		/*
		public function viewdhJingxiao($hengtong_id)
        {
			$hetongList = $this->HetongLists->findById($hengtong_id)->firstOrFail();
			$this->set('hetongList', $hetongList);
			
			$this->loadModel("JingxiaoXinxis");
			$dh_id = $hetongList->dh_id;
			$hetongList = $this->JingxiaoXinxis->findById($dh_id)->firstOrFail();
			$this->loadModel("JingxiaoZizhis");
			$jingxiaoZizhis = $this->JingxiaoZizhis->findByJxid($hetongList->jxid);
			$this->set('hetongList', $hetongList);
			$this->set('jingxiaoZizhis', $jingxiaoZizhis);
			$this->loadModel("JingxiaoPeitaos");
			$jingxiaoPeitaos = $this->JingxiaoPeitaos->findByJxid($hetongList->jxid);
			$this->set('jingxiaoPeitaos', $jingxiaoPeitaos);
			
        }
		*/
    }
