<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
?>
<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<?php $users = $this->request->getSession()->read('user'); 
		$userRole = $this->request->getSession()->read('userRole'); 
		$roles = $this->request->getSession()->read('roles');
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>ERP管理系统</title>


    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="http://localhost/projectERP/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="http://localhost/projectERP/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="http://localhost/projectERP/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://localhost/projectERP/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="http://localhost/projectERP/css/AdminLTE.css" rel="stylesheet" type="text/css" />

    <!-- bootstrap wysihtml5 - text editor -->
    <link href="http://localhost/projectERP/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="http://localhost/projectERP/css/iCheck/minimal/blue.css" rel="stylesheet" type="text/css" />

    <!-- Morris chart -->
    <link href="http://localhost/projectERP/css/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="http://localhost/projectERP/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- fullCalendar -->
    <link href="http://localhost/projectERP/css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="http://localhost/projectERP/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!--<script src="js/html5shiv.js"></script>-->
    <!--<script src="js/respond.min.js"></script>-->
    
    <!-- jQuery 2.0.2 -->
    <script src="http://localhost/projectERP/js/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap -->
    <script src="http://localhost/projectERP/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    
     <script src="http://localhost/projectERP/js/projectERP.js" type="text/javascript"></script>
	 <link rel="stylesheet" href="http://localhost/projectERP/js/datepicker/jquery-ui.css">
	 <script src="http://localhost/projectERP/js/datepicker/jquery-1.12.4.js"></script>
    <script src="http://localhost/projectERP/js/datepicker/jquery-ui.js"></script>
	<script src="http://localhost/projectERP/js/AdminLTE/app.js" type="text/javascript"></script>
    <!--[endif]-->
	<style  type="text/css">
		div.message.error {
			font-size: 20px;
			background-color: #C3232D;
			color: #FFF;
			text-align: center;
		}
		div.message.hidden {
			height: 0;
		}
</style>
</head>
<body class="skin-blue">
    <?php 
		
	?>
    <header class="header">
    <a class="logo">
        <!-- Add the class icon to your logo image or logo icon to add the margining -->
        <img src="http://localhost/projectERP/webroot/logoshunbo.png" alt="Logo Image" style="width:70px;height:45px;" />
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
		<div class="navbar-left">
			<ul class="nav navbar-nav">
				<li>
                    <a href="#">
                        <span style="font-size:20px;letter-spacing:1px;">ERP管理系统</span>
                    </a>
                </li>
			</ul>
		</div>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#">
                        <i class="glyphicon glyphicon-user"></i>
                        <span><?=$users['name']?></span>
                    </a>
                </li>
				<?php if($users){?>
				<li>
					<a href="http://localhost/projectERP/users/logout" class="dropdown-toggle">注销</a>
				</li>
				 <?php }else{ ?>
				 <li>
					<a href="http://localhost/projectERP/users/login" class="dropdown-toggle">登录</a>
				</li>
				 <?php } ?>
            </ul>
        </div>
    </nav>
</header> <!-- /.头部 -->
	<?php if($users){?>
	<div class="wrapper row-offcanvas row-offcanvas-left">
	
	<aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="http://localhost/projectERP/webroot/usersimg/<?=$users['img'] ?>" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p><?=$users['name']?></p>

                    <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
                </div>
            </div>
            <ul class="sidebar-menu">
				<?php if($userRole->roleid=="root"){ ?>
                <li class="treeview active">
                    <a href="#">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>原料库管理</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="http://localhost/projectERP/lailiaoInitials"><i class="fa fa-angle-double-right"></i> 原材料初始化登记</a></li>
						<li><a href="http://localhost/projectERP/lailiaoBulus"><i class="fa fa-angle-double-right"></i> 原材料补录</a></li>
						<li><a href="http://localhost/projectERP/lailiaoIQCs"><i class="fa fa-angle-double-right"></i> 来料质检</a></li>
                        <li><a href="http://localhost/projectERP/lailiaoInforms"><i class="fa fa-angle-double-right"></i> 通知采购</a></li>
                    </ul>
                </li>
				<?php } ?>
				<?php if($userRole->roleid=="root"){ ?>
                <li class="treeview active">
                    <a href="#">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>生产领料</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="http://localhost/projectERP/shengchanPaiqis"><i class="fa fa-angle-double-right"></i> 生产计划</a></li>
                        <li><a href="http://localhost/projectERP/shengchanPaiqichecks"><i class="fa fa-angle-double-right"></i> 生产计划审批</a></li>
						<li><a href="http://localhost/projectERP/shengchanBuheges"><i class="fa fa-angle-double-right"></i> 生产不合格品</a></li>
						<li><a href="http://localhost/projectERP/shengchanQiliaos"><i class="fa fa-angle-double-right"></i> 齐料单</a></li>
						<li><a href="http://localhost/projectERP/shengchanQiliaoreads"><i class="fa fa-angle-double-right"></i> 齐料单（查看）</a></li>
                        <li><a href="http://localhost/projectERP/shengchanBuliaos"><i class="fa fa-angle-double-right"></i> 补料单</a></li>
						<li><a href="http://localhost/projectERP/shengchanBuliaochecks"><i class="fa fa-angle-double-right"></i> 补料单审批</a></li>
                    </ul>
                </li>
				<?php } ?>
				<?php if($userRole->roleid=="root"){ ?>
                <li class="treeview active">
                    <a href="#">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>生产管理</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <!--<li><a href="http://localhost/projectERP/manageWuliaos"><i class="fa fa-angle-double-right"></i> 物料短缺表</a></li>-->
                        <li><a href="http://localhost/projectERP/manageDuanliaos"><i class="fa fa-angle-double-right"></i> 短料交付计划</a></li>
                    </ul>
                </li>
				<?php } ?>
				<?php if($userRole->roleid=="root"){ ?>
                <li class="treeview active">
                    <a href="#">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>成品库管理</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
					<ul class="treeview-menu">
                        <li><a href="http://localhost/projectERP/chengpinInitials"><i class="fa fa-angle-double-right"></i> 成品初始化登记</a></li>
                        <li><a href="http://localhost/projectERP/chengpinBulus"><i class="fa fa-angle-double-right"></i> 成品库补录</a></li>
						<li><a href="http://localhost/projectERP/chengpinSuigongdans"><i class="fa fa-angle-double-right"></i> 随工单</a></li>
						<li><a href="http://localhost/projectERP/chengpinRukus"><i class="fa fa-angle-double-right"></i> 成品库附件入库</a></li>
                        <li><a href="http://localhost/projectERP/chengpinRukuchecks"><i class="fa fa-angle-double-right"></i> 成品库附件质检</a></li>
						<li><a href="http://localhost/projectERP/chengpinShengchanrukuchecks"><i class="fa fa-angle-double-right"></i> 成品质检</a></li>
                        <li><a href="http://localhost/projectERP/chengpinWeishous"><i class="fa fa-angle-double-right"></i> 成品查看(未售)</a></li>
						<li><a href="http://localhost/projectERP/chengpinYishous"><i class="fa fa-angle-double-right"></i> 成品查看(已售)</a></li>
						<li><a href="http://localhost/projectERP/chengpinChukus"><i class="fa fa-angle-double-right"></i> 成品出库</a></li>
						<li><a href="http://localhost/projectERP/chengpinChukuchecks"><i class="fa fa-angle-double-right"></i> 成品出库审批</a></li>
						<li><a href="http://localhost/projectERP/chengpinZhuangxiangs"><i class="fa fa-angle-double-right"></i> 装箱单</a></li>
						<li><a href="http://localhost/projectERP/chengpinZhuangxiangchecks"><i class="fa fa-angle-double-right"></i> 装箱单审批</a></li>
						<li><a href="http://localhost/projectERP/chengpinDeliverys"><i class="fa fa-angle-double-right"></i> 发货通知单</a></li>
						<li><a href="http://localhost/projectERP/chengpinDeliverychecks"><i class="fa fa-angle-double-right"></i> 发货通知单审批</a></li>
						<li><a href="http://localhost/projectERP/chengpinReturns"><i class="fa fa-angle-double-right"></i> 退换货通知单</a></li>
						<li><a href="http://localhost/projectERP/chengpinReturnchecks"><i class="fa fa-angle-double-right"></i> 退换货通知单审批</a></li>
                    </ul>
                </li>
				<?php } ?>
				<?php if($userRole->roleid=="root"){ ?>
                <li class="treeview active">
                    <a href="#">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>供货方管理</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="http://localhost/projectERP/caigouProviders"><i class="fa fa-angle-double-right"></i> 供应方管理</a></li>
						<li><a href="http://localhost/projectERP/caigouProviderchecks"><i class="fa fa-angle-double-right"></i> 供应方审核</a></li>
						<li><a href="http://localhost/projectERP/caigouProvidershenpis"><i class="fa fa-angle-double-right"></i> 供应方审批</a></li>
                        <li><a href="http://localhost/projectERP/caigouRisks"><i class="fa fa-angle-double-right"></i> 供货方风险评估</a></li>
                    </ul>
                </li>
				<?php } ?>
				<?php if($userRole->roleid=="root"){ ?>
				<li class="treeview active">
                    <a href="#">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>采购管理</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="http://localhost/projectERP/caigouLists"><i class="fa fa-angle-double-right"></i> 采购单管理</a></li>
						<li><a href="http://localhost/projectERP/caigouListchecks"><i class="fa fa-angle-double-right"></i> 采购单审核</a></li>
						<li><a href="http://localhost/projectERP/caigouListshenpis"><i class="fa fa-angle-double-right"></i> 采购单审批</a></li>
                    </ul>
                </li>
				<?php } ?>
				<?php if($userRole->roleid=="root"||$userRole->roleid=="xiaoshouzhuanyuan"||$userRole->roleid=="officeManager"||$userRole->roleid=="zhijianManager"||$userRole->roleid=="shengchanManager"||$userRole->roleid=="caigouManeger"||$userRole->roleid=="manager"){ ?>
				<li class="treeview active">
                    <a href="#">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>合同评审</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
						<?php if($userRole->roleid=="root"||in_array("HetongLists",$roles)){ ?>
                        <li><a  href="http://localhost/projectERP/hetongLists"><i class="fa fa-angle-double-right"></i> 合同评审管理</a></li>
						<?php } ?>
						<?php if($userRole->roleid=="root"||in_array("HetongListcheckYingxiaos",$roles)){ ?>
						<li><a  href="http://localhost/projectERP/hetongListcheckYingxiaos"><i class="fa fa-angle-double-right"></i> 合同审核（营销中心）</a></li>
						<?php } ?>
						<?php if($userRole->roleid=="root"||in_array("HetongListcheckOffices",$roles)){ ?>
						<li><a href="http://localhost/projectERP/hetongListcheckOffices"><i class="fa fa-angle-double-right"></i> 合同审核（办公室）</a></li>
						<?php } ?>
						<?php if($userRole->roleid=="root"||in_array("HetongListcheckZhijians",$roles)){ ?>
						<li><a href="http://localhost/projectERP/hetongListcheckZhijians"><i class="fa fa-angle-double-right"></i> 合同审核（质检部）</a></li>
						<?php } ?>
						<?php if($userRole->roleid=="root"||in_array("HetongListcheckShengchans",$roles)){ ?>
						<li><a href="http://localhost/projectERP/hetongListcheckShengchans"><i class="fa fa-angle-double-right"></i> 合同审核（生产部）</a></li>
						<?php } ?>
						<?php if($userRole->roleid=="root"||in_array("HetongListcheckCaigous",$roles)){ ?>
						<li><a href="http://localhost/projectERP/hetongListcheckCaigous"><i class="fa fa-angle-double-right"></i> 合同审核（采购部）</a></li>
						<?php } ?>
						<?php if($userRole->roleid=="root"||in_array("HetongListcheckManagers",$roles)){ ?>
						<li><a href="http://localhost/projectERP/hetongListcheckManagers"><i class="fa fa-angle-double-right"></i> 合同审核（总经理）</a></li>			
						<?php } ?>
					</ul>
                </li>
				<?php } ?>
				<?php if($userRole->roleid=="root"||$userRole->roleid=="shichangbujl"||$userRole->roleid=="shichangbuzy"||$userRole->roleid=="manager"){ ?>
				<li class="treeview active">
                    <a href="#">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>销售管理</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
						<?php if($userRole->roleid=="root"||in_array("XiaoshouLists",$roles)){ ?>
						<li><a href="http://localhost/projectERP/xiaoshouLists"><i class="fa fa-angle-double-right"></i> 销售订单管理</a></li>
						<?php } ?>
						<?php if($userRole->roleid=="root"||in_array("XiaoshouListchecks",$roles)){ ?>
						<li><a href="http://localhost/projectERP/xiaoshouListchecks"><i class="fa fa-angle-double-right"></i> 销售订单审核</a></li>
						<?php } ?>
						<?php if($userRole->roleid=="root"||in_array("TixiTaizhangs",$roles)){ ?>
						<li><a href="http://localhost/projectERP/tixiTaizhangs"><i class="fa fa-angle-double-right"></i> 销售台账</a></li>
						<?php } ?>
					</ul>
                </li>
				<?php } ?>
				<?php if($userRole->roleid=="root"||$userRole->roleid=="shichangbujl"||$userRole->roleid=="shichangbuzy"||$userRole->roleid=="manager"){ ?>
				<li class="treeview active">
                    <a href="#">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>销售商管理</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
						<?php if($userRole->roleid=="root"||in_array("JingxiaoXinxis",$roles)){ ?>
						<li><a href="http://localhost/projectERP/jingxiaoXinxis"><i class="fa fa-angle-double-right"></i> 经销商基本信息</a></li>
						<?php } ?>
						<?php if($userRole->roleid=="root"||in_array("JingxiaoXinxichecks",$roles)){ ?>
						<li><a href="http://localhost/projectERP/jingxiaoXinxichecks"><i class="fa fa-angle-double-right"></i> 经销商基本信息审批</a></li>
						<?php } ?>
						<?php if($userRole->roleid=="root"||in_array("YiyuanXinxis",$roles)){ ?>
						<li><a href="http://localhost/projectERP/yiyuanXinxis"><i class="fa fa-angle-double-right"></i> 医院基本信息</a></li>
						<?php } ?>
						<li><a href="http://localhost/projectERP/yiyuanXinxichecks"><i class="fa fa-angle-double-right"></i> 医院基本信息审核</a></li>
						<?php if($userRole->roleid=="root"||in_array("QitaXinxis",$roles)){ ?>
						<li><a href="http://localhost/projectERP/qitaXinxis"><i class="fa fa-angle-double-right"></i> 其他基本信息</a></li>
						<?php } ?>
						<li><a href="http://localhost/projectERP/qitaXinxichecks"><i class="fa fa-angle-double-right"></i> 其他基本信息审核</a></li>
						<?php if($userRole->roleid=="root"||in_array("ChengpinPeitaos",$roles)){ ?>
						<li><a href="http://localhost/projectERP/chengpinPeitaos"><i class="fa fa-angle-double-right"></i> 销售标准配置清单</a></li>
						<?php } ?>
					</ul>
                </li>
				<?php } ?>
				<?php if($userRole->roleid!=NULL){ ?>
				<li class="treeview active">
                    <a href="#">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>账号管理</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
						<?php if($userRole->roleid=="root"||in_array("Users",$roles)){ ?>
						<li><a href="http://localhost/projectERP/users"><i class="fa fa-angle-double-right"></i> 用户账户</a></li>
						<?php } ?>
						<?php if($userRole->roleid=="root"||in_array("Xusers",$roles)){ ?>
						<li><a href="http://localhost/projectERP/xusers"><i class="fa fa-angle-double-right"></i> 管理员账号</a></li>
						<?php } ?>
					</ul>
                </li>
				<?php } ?>
				<?php if($userRole->roleid=="root"){ ?>
				<li class="treeview active">
                    <a href="#">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>角色管理</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
						<li><a href="http://localhost/projectERP/roles"><i class="fa fa-angle-double-right"></i> 系统角色管理</a></li>
					</ul>
                </li>
				<?php } ?>
            </ul>
		</section>
    </aside> <!-- /.左部侧边栏-->
	<aside class="right-side">
		<div class="message error" onclick="this.classList.add('hidden');"><?= $this->Flash->render('error_id') ?>
		</div>
        <?= $this->fetch('content') ?>
    </aside>
	</div>
	<?php } ?>
</body>
</html>

