                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        供货方管理审核
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/caigouProviderchecks/index"><i class="fa fa-dashboard"></i>供货方管理</a></li>
                        <li class="active">供货方管理审核</li>
                    </ol>
                </section>

                <!-- Main content -->
				<section class="content">
					<div class="row">
							<div class="box-body">
								<div class="box-body"  style="width:90%;margin: auto;" >
									<div class="box-header">
										<h3 class="box-title">供货方信息</h3>
									</div>
									<table class="table table-bordered table-hover" style="margin-bottom: 10px;">
										<thead>
										<tr>
											<th>编码</th>
											<th>公司名称</th>
											<th>税号</th>
											<th>联系人</th>
										</tr>
										</thead>
										<tbody>
										<tr>
											<td><?= $caigouProvider->p_id ?></td>
											<td><?= $caigouProvider->p_name ?></td>
											<td><?= $caigouProvider->shuihao ?></td>	
											<td><?= $caigouProvider->person ?></td>
										</tr>
										</tfoot>
										<thead>
										<tr>
                                            <th>电话号码</th>
											<th>手机号码</th>
											<th>地址</th>
											<th>是否为物流</th>
										</tr>
										</thead>
										<tbody>
										<tr>
											<td><?= $caigouProvider->dianhua ?></td>
											<td><?= $caigouProvider->shouji ?></td>
											<td><?= $caigouProvider->dizhi ?></td>
											<td><?php if($caigouProvider->iswuliu==1){echo "是";} if($caigouProvider->iswuliu==0){echo "否";} ?></td>
										</tr>
										</tfoot>
									</table>
									
									<div class="box-header">
										<h3 class="box-title">审核结果</h3>
										<?php if($caigouProvider->shenheok==1){ ?> 
										<span class="label label-success">已审核</span>
										<?php } else { ?> 
										<span class="label label-danger">已驳回</span>
										<?php } ?>
									</div>
									<div class="box-header">
										<h3 class="box-title">审核人</h3>
										<span><?= $caigouProvider->shenheren ?></span>
									</div>
									<div class="box-header">
										<h3 class="box-title">审核时间</h3>
										<span><?= $caigouProvider->shenhe_time->format('Y-m-d H:m:s') ?></span>
									</div>
									<div class="box-header">
										<h3 class="box-title">审核备注</h3>
										<span><?= $caigouProvider->shenhe_beizhu ?></span>
									</div>
									<div class="box-footer clearfix no-border">
										<a href="/projectERP/caigouProviderchecks/index" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-backward"></i> 返回</a>
									</div>
								</div><!-- /.box-body-->
                            </div><!-- /.box-->
                    </div>
                </section><!-- /.content -->