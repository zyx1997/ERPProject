<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        其他基本信息审批
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/qitaXinxichecks/index"><i class="fa fa-dashboard"></i>销售商基本信息管理</a></li>
                        <li class="active">其他基本信息审批</li>
                    </ol>
                </section>


       <section class="content">
            <div class="row">
                <form method="post" action="/projectERP/qitaXinxichecks/check/<?=$qitaXinxi->id ?>" class="box box-primary box-content" enctype="multipart/form-data" style="width: 60%; margin: 0px auto;">
                    <div class="box-header">
                        <h3 class="box-title">其他基本信息</h3>
                    </div>
					
                    <div class="box-body" style="width:90%;margin: auto;">
						<table class="table table-bordered table-hover">
							<tbody>
								<tr>
									<th>名称</th>
									<td><?=$qitaXinxi->name ?></td>
								</tr>
								<tr>
									<th>身份证号</th>
									<td><?=$qitaXinxi->daima ?></td>
								</tr>
								<tr>
									<th>地址</th>
									<td><?=$qitaXinxi->dizhi ?></td>
								</tr>
								<tr>
									<th>联系人</th>
									<td><?=$qitaXinxi->lianxiren ?></td>
								</tr>
								<tr>
									<th>联系电话</th>
									<td><?=$qitaXinxi->telephone ?></td>
								</tr>
								<tr>
									<th>证照过期时间</th>
									<td><?php if($qitaXinxi->guoqidate) echo $qitaXinxi->guoqidate->format('Y-m-d'); ?></td>
								</tr>
								
								<tr>
									<th>执业资格证书</th>
									<td><a download="默认" href="../../webroot/qitaXinxi/<?= $qitaXinxi->fujian ?>">下载</a></td>
								</tr>
							</tbody>
						</table><!-- /.table -->
						<!-- phone mask -->
                        <div class="form-group" style="text-align: center;">
                        <div style="margin: 10px auto;">
                            <label>
								<input style="margin: 3px;" type="radio" name="shenpiresult" value="1" class="minimal" checked/> 通过
                            </label>
                            <label>
                                <input style="margin: 3px;" type="radio" name="shenpiresult" value="0" class="minimal"/>  驳回
                            </label>
                        </div>
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">审批意见</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="shenpireason" class="form-control" placeholder="驳回必填"/>
							</div>
						</div><!-- /.form group -->
						<div  class="box-body"  style="width:90%;margin: auto;text-align: center">
							<input type="submit" value="提交" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
						</div>
					</div>

                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->