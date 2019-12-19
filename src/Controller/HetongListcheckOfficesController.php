<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class HetongListcheckOfficesController extends AppController
    {
		public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
			'order'  =>  [ 
				'HetongLists.isshenhe_office'  =>  'asc', //顺序asc,倒序desc
				'HetongLists.time'  =>  'desc' //按创建时间，顺序asc,倒序desc
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
		    $this->loadModel("HetongLists");
			$this->loadComponent('Paginator');
			$hetongLists = $this->HetongLists->find('all', array('conditions' => array('HetongLists.istijiao'=>"1",'HetongLists.targetshenhe_office'=>"1")));
			$this->set('hetongLists', $this->paginate($hetongLists));//用于在前端页面中显示
			
			//以下为用户信息
			$this->loadModel("Users");
			$Shenpirens = array();//存储审批人名字
			foreach($hetongLists as $hetongList){
				if($hetongList->shenheren_office!=NULL){
					$user = $this->Users->findByGonghao($hetongList->shenheren_office)->firstOrFail();
					$Shenpirens[$hetongList->id] = $user->name;
				}else{
					$Shenpirens[$hetongList->id] = "";
				}
			}
			$this->set('Shenpirens', $Shenpirens);
		}
		public function check($id)
        {
			$this->loadModel("HetongLists");
			$this->loadModel("HetongListAlls");
			$this->loadModel("ChengpinPeitaos");
			$this->loadModel("ChengpinPeitaoitems");
			//合同表单
			//$hetongList = $this->HetongLists->findByHId($h_id)->firstOrFail();	
			$hetongList = $this->HetongLists->findById($id)->firstOrFail();
			$h_id = $hetongList->h_id;
			//合同产品详情表 显示合同表编号为h_id的全部产品信息
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
			if ($this->request->is(['post', 'put'])) {
				$hetongList->shenheok_office = $this->request->getData('shenheok_office');
				$hetongList->shenhe_beizhu_office = $this->request->getData('shenhe_beizhu_office');
				$user = $this->request->getSession()->read('user'); 
				$hetongList->shenheren_office = $user->gonghao;
				$hetongList->isshenhe_office = "1"; 
				
				//isshenhe: 
				//0 未审核 "未审核"
				//1 正在审核 "正在审核" / "正在审核（有驳回）" 通过pingshenbumen_diss是否为空来辅助判断
				//2 审核结束 "审核通过" / "xx部门、xx部门驳回" 通过pingshenbumen_diss是否为空来辅助判断
				$bumen_num = "2";
				if( $hetongList->shenheok_office == 1 ){ //当前为审核
					//更新已审核通过的部门，注意正序排序
					$str = $bumen_num.$hetongList->pingshenbumen_ok;
					$arr = str_split($str); //把字符串分割到数组中
					sort($arr); //数组排序
					$str = implode('',$arr);//将数组变成字符串
					$hetongList->pingshenbumen_ok = $str;
					//判断平级是否全部审核通过，总经理是否可以开始审核
					if(strcmp( $hetongList->pingshenbumen_target, (($hetongList->pingshenbumen_ok)."6") ) == 0 )
						$hetongList->keyishenhe_manager = 1;
					//判断待审核的部门是否全部审核通过
					if(strcmp($hetongList->pingshenbumen_target,$hetongList->pingshenbumen_ok) == 0 ){
						$hetongList->shenheok = 1;
						$this->newXiaoshouList($id); // 为审核通过的合同评审单，添加对应的销售订单
					}
				}else{//当前为驳回
					//更新已驳回的部门，注意正序排序
					$str = $bumen_num.$hetongList->pingshenbumen_diss;
					$arr = str_split($str); //把字符串分割到数组中
					sort($arr); //数组排序
					$str = implode('',$arr);//将数组变成字符串
					$hetongList->pingshenbumen_diss = $str;
				}
				//更新已审核的部门，注意正序排序
				$str = $bumen_num.$hetongList->pingshenbumen_real;
				$arr = str_split($str); //把字符串分割到数组中
				sort($arr); //数组排序
				$str = implode('',$arr);//将数组变成字符串
				$hetongList->pingshenbumen_real = $str;
				//判断待审核的部门是否全部审核完毕
				$hetongList->isshenhe = 1;//正在审核
				if(strcmp($hetongList->pingshenbumen_target,$hetongList->pingshenbumen_real) == 0 || ( (strcmp($hetongList->pingshenbumen_target,($hetongList->pingshenbumen_real).'6')==0)&& $hetongList->pingshenbumen_diss != NULL  ) ){
					$hetongList->isshenhe = 2;//审核结束
					//集合所有审核意见
					$hetongList->shenhebeizh = ''; // 清除上一次的审核意见
					if( strstr($hetongList['pingshenbumen_target'],"1")!=false )
						$hetongList->shenhebeizhu .= '营销中心：'.$hetongList->shenhe_beizhu_yingxiao."\r\n";
					if( strstr($hetongList['pingshenbumen_target'],"2")!=false )
						$hetongList->shenhebeizhu .= '办公室：'.$hetongList->shenhe_beizhu_office."\r\n";
					if( strstr($hetongList['pingshenbumen_target'],"3")!=false )
						$hetongList->shenhebeizhu .= '质检部：'.$hetongList->shenhe_beizhu_zhijian."\r\n";
					if( strstr($hetongList['pingshenbumen_target'],"4")!=false )
						$hetongList->shenhebeizhu .= '生产部：'.$hetongList->shenhe_beizhu_shengchan."\r\n";
					if( strstr($hetongList['pingshenbumen_target'],"5")!=false )
						$hetongList->shenhebeizhu .= '采购部：'.$hetongList->shenhe_beizhu_caigou."\r\n";
					if( strstr($hetongList['pingshenbumen_target'],"6")!=false )
						$hetongList->shenhebeizhu .= '总经理：'.$hetongList->shenhe_beizhu_manager."\r\n";
					//对每个配套产品（单个成品以及多个附件）来说，待出库数量增加
					//即合同评审审批通过但是没有出库的数
					$this->loadModel("ChengpinInitials");
					$hetongListAlls = $this->HetongListAlls->find('all', array('conditions' => array('HetongListAlls.h_keyid'=>$id)));
					foreach ($hetongListAlls as $hetongListAll){ //进入单套
						//成品
						$ptid = $hetongListAll->ptid;
						$chengpinPeitao = $this->ChengpinPeitaos->findByPtid($ptid)->firstOrFail();
						$chengpin = $this->ChengpinInitials->findByMid($chengpinPeitao->mid)->firstOrFail();
						$chengpin->daichuku_num += $hetongListAll->mnumber;
						$this->ChengpinInitials->save($chengpin);//写入数据库
						//附件们
						$chengpinPeitaoitems = $this->ChengpinPeitaoitems->find(
							'all', array('conditions' => array(
								'ChengpinPeitaoitems.ptid'=>$ptid
							))
						); 
						foreach ($chengpinPeitaoitems as $chengpinPeitaoitem){ //进入每个附件
							$fujian = $this->ChengpinInitials->findByMid($chengpinPeitaoitem->fujianid)->firstOrFail();
							$fujian->daichuku_num += $chengpinPeitaoitem->fujiannumber;
							$this->ChengpinInitials->save($fujian);//写入数据库
						}
					}
				}
				
				//写入数据库
				if ($this->HetongLists->save($hetongList)) {
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			
			$this->set('hetongList', $hetongList);
			$this->set(compact('hetongListAlls'));
			$this->set(compact('chengpinPeitaos'));
			$this->set(compact('chengpinPeitaoitems'));
			$this->set(compact('peitaoitemsCount'));
        }
		//显示合同表自增编号为id的审核意见
		public function checkresult($id)
        {
			$this->loadModel("HetongLists");
			$this->loadModel("HetongListAlls");
			$this->loadModel("ChengpinPeitaos");
			$this->loadModel("ChengpinPeitaoitems");
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
			$this->set(compact('hetongListAlls'));
			$this->set(compact('chengpinPeitaos'));
			$this->set(compact('chengpinPeitaoitems'));
			$this->set(compact('peitaoitemsCount'));
			//以下为用户信息
			$this->loadModel("Users");
			$user = $this->Users->findByGonghao($hetongList->shenheren_office)->firstOrFail();
			$shenheren_office = $user->name;
			$this->set('shenheren_office', $shenheren_office);
        }
		public function search()
		{
			$this->loadModel("HetongLists");
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$duixiang = $this->request->getData('duixiang');
				$h_id = $this->request->getData('h_id');
				$dh_name = $this->request->getData('dh_name');
				$hetongLists = $this->HetongLists->find(
					'all', array('conditions'=>array(
						'HetongLists.istijiao'=>"1",
						"HetongLists.targetshenhe_office = 1 ",
						"HetongLists.duixiang LIKE '%".$duixiang."%'",
						"HetongLists.h_id LIKE '%".$h_id."%'",
						"HetongLists.dh_name LIKE '%".$dh_name."%'"
					))
				);
				$this->set('result', $this->paginate($hetongLists));//用于在前端页面中显示
				//以下为用户信息
				$this->loadModel("Users");
				$Shenpirens = array();//存储审批人名字
				foreach($hetongLists as $hetongList){
					if($hetongList->shenheren_yingxiao!=NULL){
						$user = $this->Users->findByGonghao($hetongList->shenheren_yingxiao)->firstOrFail();
						$Shenpirens[$hetongList->id] = $user->name;
					}else{
						$Shenpirens[$hetongList->id] = "";
					}
				}
				$this->set('Shenpirens', $Shenpirens);
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}
		/*
		public function updateShenhe($h_id, $bumen_num){ //更新整体审核状态
			$this->loadModel("HetongLists");
			$hetongList = $this->HetongLists->findByHId($h_id)->firstOrFail();
			
			//更新已审核的部门，注意正序排序
			$str = $bumen_num.$hetongList->pingshenbumen_real;
			$arr = str_split($str); //把字符串分割到数组中
			sort($arr); //数组排序
			$str = implode('',$arr);//将数组变成字符串
			$hetongList->pingshenbumen_real = $str;
			//更新已审核通过的部门，注意正序排序
			$str = $bumen_num.$hetongList->pingshenbumen_ok;
			$arr = str_split($str); //把字符串分割到数组中
			sort($arr); //数组排序
			$str = implode('',$arr);//将数组变成字符串
			$hetongList->pingshenbumen_ok = $str;
			//判断待审核的部门是否全部审核完毕
			if(strcmp($hetongList->pingshenbumen_target,$hetongList->pingshenbumen_real) == 0 )
				$hetongList->isshenhe = 1;
			//判断平级是否全部审核通过，总经理是否可以开始审核
			if(strcmp( $hetongList->pingshenbumen_target, (($hetongList->pingshenbumen_ok)."6") ) == 0 )
				$hetongList->keyishenhe_manager = 1;
			//判断待审核的部门是否全部审核通过
			if(strcmp($hetongList->pingshenbumen_target,$hetongList->pingshenbumen_ok) == 0 )
				$hetongList->shenheok = 1;
			else
				$hetongList->shenheok = 0;//驳回
			
			$this->HetongLists->save($hetongList);
		}
		*/
    }
