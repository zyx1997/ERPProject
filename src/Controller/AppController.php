<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
		
		

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }
	
	//测试已登录的用户是否拥有$controller的$action权限
	//返回true / false
	function hasController($controllerid, $action){
		$this->loadModel('UserRoles');
		$this->loadModel('RoleControllers');
        $users = $this->request->getSession()->read('user');
		if( $users ){ // 注意这里判断最终重定向的页面，否则会无限重定向
			$gonghao = $users['gonghao'];
			//用户角色
			$role = $this->UserRoles->findByGonghao($gonghao)->firstOrFail();
			//用户是否拥有权限
			$hasController = $this->RoleControllers->find(
				'all', array('conditions'=>array(
					'RoleControllers.roleid'=>$role->roleid, //caigou
					'RoleControllers.controllerid'=>$controllerid, //CaigouLists
					'RoleControllers.action'=>$action //index
				))
			); //find()函数返回的是一个query对象
			return ($hasController->count() >= 1);
		}
		return false;
	}
	//测试用户是否为root角色
	//返回true / false
	function isRoot(){
		$this->loadModel('UserRoles');
		$users = $this->request->getSession()->read('user');
		if( $users ){ // 注意这里判断最终重定向的页面，否则会无限重定向
			$gonghao = $users['gonghao'];
			//用户角色
			$role = $this->UserRoles->findByGonghao($gonghao)->firstOrFail();
			return $role->roleid=='root';
		}
		return false;
	}
	//beforeFilter函数会在每个页面加载之前自动调用
	function beforeFilter(Event $event) {
		$controllerid = $this->request->getParam('controller');
		$action = $this->request->getParam('action');
        $users = $this->request->getSession()->read('user');
		//检测用户是否登陆
		if(!$users&&$controllerid!='Users'){
			$this->Flash->error('请登陆');
			return $this->redirect(['action' => '../users/login']);
		}
		//测试用户是否拥有该页面权限
		if( $users && !$this->isRoot() && !$this->hasController($controllerid,$action) && $controllerid!='Errors' ){// 注意这里判断最终重定向的页面，否则会无限重定向
			return $this->redirect(['action' => '../errors/error404']);
		}
	}
	
	// 合同单被驳回后，一旦有修改
	// 就将当前的审核信息保存到各部门的数据库中永存 saveHetongListcheck()
	// 同时还原合同单的审核状态 initialShenhe()
	public function saveHetongListcheck($id) { // 保存各部门审核记录
		$this->loadModel("HetongLists");// 合同单
		$this->loadModel("HetongListAlls");// 合同产品单
		//$hetongList = $this->HetongLists->findByHId($h_id)->firstOrFail();
		$hetongList = $this->HetongLists->findById($id)->firstOrFail();
		$h_id = $hetongList->h_id;
			
		// 复制合同单信息，一条记录，返回新增合同单的编号 $h_keyid 
		$h_keyid = $this->HetongLists->copyHetongList($id, $h_id);
		// 之后需要存储合同单所包含产品的信息，数条记录，以合同单编号 $h_keyid 为联系
		$hetongListAlls = $this->HetongListAlls->find('all', array('conditions' => array('HetongListAlls.h_keyid'=>$id)));
		foreach( $hetongListAlls as $hetongListAll ){
			$newHetongListAll = $this->HetongListAlls->newEntity();
			$newHetongListAll->isrecord = 1;
			$newHetongListAll->h_keyid = $h_keyid;
			$newHetongListAll->h_id = $h_id;
			//以下为配套信息
			$newHetongListAll->ptid = $hetongListAll->ptid; // 配套id
			$newHetongListAll->name = $hetongListAll->name;// 配套名称
			$newHetongListAll->mid = $hetongListAll->mid;// 成品编号
			$newHetongListAll->mname = $hetongListAll->mname;// 成品名称
			$newHetongListAll->mnumber = $hetongListAll->mnumber;// 成品数量
			$newHetongListAll->mjiage = $hetongListAll->mjiage;// 成品价格
			$newHetongListAll->cankaojiage = $hetongListAll->cankaojiage;// 参考家里（套）
			/*
			//以下为单个产品添加信息
			$newHetongListAll->mid = $hetongListAll->mid;
			$newHetongListAll->name = $hetongListAll->name;
			$newHetongListAll->xinghao = $hetongListAll->xinghao;
			$newHetongListAll->shuliang = $hetongListAll->shuliang;
			$newHetongListAll->danwei = $hetongListAll->danwei;
			$newHetongListAll->miaoshu = $hetongListAll->miaoshu;
			$newHetongListAll->weizhi = $hetongListAll->weizhi;
			$newHetongListAll->isfujian = $hetongListAll->isfujian;
			*/
			$this->HetongListAlls->save($newHetongListAll);
		}
		return $h_keyid;
	}
	public function initialShenhe($id) // 还原审核状态
	{
		$this->loadModel("HetongLists");
		//$hetongList = $this->HetongLists->findByHId($h_id)->firstOrFail();	
		$hetongList = $this->HetongLists->findById($id)->firstOrFail();
		$h_id = $hetongList->h_id;
		//总审核状态
		$hetongList->istijiao = '0'; //未提交审核
		$hetongList->isshenhe = '0'; //审核状态:未审核
		$hetongList->shenheok = '0';
		$hetongList->pingshenbumen_real = '';//已评审部门
		$hetongList->pingshenbumen_ok = '';//已评审通过的部门
		$hetongList->pingshenbumen_diss = '';//已驳回的部门
		//各评审部门（1营销中心,2办公室,3质检部,4生产部,5采购部,6总经理）
		//是否需要审核
		//$hetongList->targetshenhe_yingxiao = '0'; 
		//$hetongList->targetshenhe_office = '0';
		//$hetongList->targetshenhe_zhijian = '0';
		//$hetongList->targetshenhe_shengchan = '0';
		//$hetongList->targetshenhe_caigou = '0';
		//$hetongList->targetshenhe_manager = '0';
		//审核状态
		$hetongList->isshenhe_yingxiao = '0'; 
		$hetongList->isshenhe_office = '0';
		$hetongList->isshenhe_zhijian = '0';
		$hetongList->isshenhe_shengchan = '0';
		$hetongList->isshenhe_caigou = '0';
		$hetongList->isshenhe_manager = '0';
		$hetongList->keyishenhe_manager = '0';
		//审核结果清空
		$hetongList->shenheok_yingxiao = '0'; 
		$hetongList->shenheok_office = '0';
		$hetongList->shenheok_zhijian = '0';
		$hetongList->shenheok_shengchan = '0';
		$hetongList->shenheok_caigou = '0';
		$hetongList->shenheok_manager = '0';
		//审核人清空
		$hetongList->shenheren_yingxiao = ''; 
		$hetongList->shenheren_office = ''; 
		$hetongList->shenheren_zhijian = ''; 
		$hetongList->shenheren_shengchan = ''; 
		$hetongList->shenheren_caigou = ''; 
		$hetongList->shenheren_manager = ''; 
		
		$this->HetongLists->save($hetongList);
	}
	// 为审核通过的合同评审单$id，添加对应的销售订单
	public function newXiaoshouList($id) { // 保存各部门审核记录
		$this->loadModel("HetongLists");// 合同单
		$this->loadModel("XiaoshouLists");
		$hetongList = $this->HetongLists->findById($id)->firstOrFail();
		$xiaoshouList = $this->XiaoshouLists->newEntity();
		//销售订单编号系统规则"X20190517001"
		$result = $this->XiaoshouLists->getorderid();//获取最新订单的日期和序号
		$date = date("Y-m-d");//当前日期
		$order_id = 1;
		if($date==$result[0]['date']){//如果最新订单的日期等于当天
			$order_id  = (int)$result[0]['order_id'] +1;//编号=最新编号+1
		}
		if($order_id>=100){
			$x_id = "L".str_replace('-','',$date).$order_id;
		}else if($order_id>=10){
			$x_id = "L".str_replace('-','',$date)."0".$order_id;
		}else{
			$x_id = "L".str_replace('-','',$date)."00".$order_id;
		}
		$xiaoshouList->x_id = $x_id; //销售订单编号
		$xiaoshouList->h_keyid = $hetongList->id; //合同评审在数据库中的自增id
		$xiaoshouList->h_id = $hetongList->h_id; //合同评审编号
		//合同评审冗余信息
		$xiaoshouList->duixiang = $hetongList->duixiang; 
		$xiaoshouList->dh_name = $hetongList->dh_name; 
		$xiaoshouList->delivery_addr = $hetongList->delivery_addr; 
		$xiaoshouList->jiaohuofangshi = $hetongList->jiaohuofangshi; 
		$xiaoshouList->jiaohuofangshi_tianshu = $hetongList->jiaohuofangshi_tianshu; 
		$xiaoshouList->jiaohuofangshi_qita = $hetongList->jiaohuofangshi_qita; 
		$xiaoshouList->zhibaoqi = $hetongList->zhibaoqi; 
		$xiaoshouList->beizhu = $hetongList->beizhu;
		
		$xiaoshouList->dh_type = $hetongList->dh_type; 
		$xiaoshouList->dh_id = $hetongList->dh_id; 
		$xiaoshouList->heji_totalprice = $hetongList->heji_totalprice;
		$user = $this->request->getSession()->read('user'); 
		$xiaoshouList->user = $user->gonghao; 
		//写入数据库
		if ($this->XiaoshouLists->save($xiaoshouList)) {
			$this->Flash->success(__('新增数据成功！'));
			$this->XiaoshouLists->updateorderid($order_id,$date);//更新最新订单的日期和序号
		}
	}
	
}
