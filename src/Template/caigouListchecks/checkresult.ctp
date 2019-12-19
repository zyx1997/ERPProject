                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        采购单审核意见
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/caigouListchecks/index"><i class="fa fa-dashboard"></i>采购管理</a></li>
                        <li class="active">采购单审核</li>
                    </ol>
                </section>

                <!-- Main content -->
				<section class="content">
					<div class="row">
							<div class="box-body">
								<div class="box-body"  style="width:90%;margin: auto;" >
									<div class="box-header">
										<h3 class="box-title">采购单信息</h3>
									</div>
									<table class="table table-bordered table-hover" style="margin-bottom: 10px;">
										<thead>
										<tr>
											<th>采购单编号</th>
											<th>采购单名称</th>
											<th>采购时间</th>
										</tr>
										</thead>
										<tbody>
										<tr>
											<td><?= $caigouList->l_id ?></td>
											<td><?= $caigouList->l_name ?></td>
											<?php if($caigouList->caigoudate != null){ ?> 
												<td><?= $caigouList->caigoudate->format('Y-m-d') ?></td>
											<?php }else{ ?> 
												<td></td>
											<?php } ?> 
										</tr>
										</tfoot>
										<thead>
										<tr>
											<th>供货方编码</th>
											<th>供货方名称</th>
										</tr>
										</thead>
										<tbody>
										<tr>
											<td><?= $caigouList->p_id ?></td>
											<td><?= $caigouList->p_name ?></td>
										</tr>
										</tfoot>
									</table>
									
									<!-- 采购单产品列举 -->
									<div class="box-header" style="margin-top: 40px;">
										<h3 class="box-title">产品清单</h3>
									</div>
									<table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
											<th>产品编号</th>
                                            <th>产品名称</th>
                                            <th>数量</th>
											<th>单价</th>
											<th>总价</th>
                                            <th>操作人</th>
                                            <th>操作时间</th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($caigouListAlls as $caigouListAll): ?>
										<tr>
										<td><?= $caigouListAll->m_id ?></td>	
										<td><?= $caigouListAll->name ?></td>
										<td><?= $caigouListAll->target_quantity ?></td>
										<td><?= $caigouListAll->target_price ?></td>
										<td><?= $caigouListAll->target_totalprice ?></td>
										<td><?= $caigouListAll->user?></td>
										<td><?= $caigouListAll->time->format('Y-m-d H:m:s')?></td>
										</tr>
										<?php endforeach; ?>
                                        </tbody>
                                    </table><!-- /.table -->
							
									<div class="box-header"  style="margin-top: 40px;" >
										<h3 class="box-title">审核结果</h3>
										<?php if($caigouList->shenheok==1){ ?> 
										<span class="label label-success">已审核</span>
										<?php } else { ?> 
										<span class="label label-danger">已驳回</span>
										<?php } ?>
									</div>
									<div class="box-header">
										<h3 class="box-title">审核人</h3>
										<span><?= $caigouList->shenheren ?></span>
									</div>
									<div class="box-header">
										<h3 class="box-title">审核时间</h3>
										<span><?= $caigouList->shenhe_time->format('Y-m-d H:m:s') ?></span>
									</div>
									<div class="box-header">
										<h3 class="box-title">审核备注</h3>
										<span><?= $caigouList->shenhe_beizhu ?></span>
									</div>
									<div class="box-footer clearfix no-border">
										<a href="/projectERP/caigouListchecks/index" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-backward"></i> 返回</a>
									</div>
								</div><!-- /.box-body-->
								
                            </div><!-- /.box-->
                        
                    </div>
                </section><!-- /.content -->