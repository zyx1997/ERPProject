<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        医院基本信息
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/yiyuanXinxis/index"><i class="fa fa-dashboard"></i>销售商基本信息管理</a></li>
                        <li class="active">医院基本信息</li>
                    </ol>
                </section>


       <section class="content">
            <div class="row">
                <form method="post" action="/projectERP/yiyuanXinxis/modify/<?=$yiyuanXinxi->id ?>" class="box box-primary box-content" enctype="multipart/form-data" style="width: 60%; margin: 0px auto;">
                    <div class="box-header">
                        <h3 class="box-title">医院基本信息</h3>
                    </div>
					
                    <div class="box-body" style="width:90%;margin: auto;">
						<table class="table table-bordered table-hover">
							<tbody>
								<tr>
									<th>医院名称</th>
									<td><?=$yiyuanXinxi->name ?></td>
								</tr>
								<tr>
									<th>统一信用代码</th>
									<td><?=$yiyuanXinxi->daima ?></td>
								</tr>
								<tr>
									<th>医院地址</th>
									<td><?=$yiyuanXinxi->dizhi ?></td>
								</tr>
								<tr>
									<th>医院联系人</th>
									<td><?=$yiyuanXinxi->lianxiren ?></td>
								</tr>
								<tr>
									<th>医院联系电话</th>
									<td><?=$yiyuanXinxi->telephone ?></td>
								</tr>
								<tr>
									<th>证照过期时间</th>
									<td><?php if($yiyuanXinxi->guoqidate) echo $yiyuanXinxi->guoqidate->format('Y-m-d'); ?></td>
								</tr>
								
								<tr>
									<th>执业资格证书</th>
									<td><a download="默认" href="../../webroot/yiyuanxinxi/<?= $yiyuanXinxi->fujian ?>">下载</a></td>
								</tr>
							</tbody>
						</table><!-- /.table -->
						<!-- phone mask -->
                        
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <a href="javascript:history.back(-1)" class="btn btn-primary btn-sm" style="margin: 0px auto">返回</a>
                    </div>

                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->