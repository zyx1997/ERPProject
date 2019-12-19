                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        补料单
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/shengchanBuliaochecks/index"><i class="fa fa-dashboard"></i> 生产领料</a></li>
                        <li class="active">补料单审批</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">补料单</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>补料单编号</th>
                                            <th>生产计划单号</th>
											<th>物料名称</th>
											<th>补料数量</th>
											<th>补料原因</th>
											<th>审批人</th>
											<th>审批时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($result as $shengchanBuliao): ?>
										<tr>
										<td>
											<?= $shengchanBuliao->bid ?>
										</td>
										<td>
											<?= $shengchanBuliao->jid?>
										</td>
										<td>
											<?= $shengchanBuliao->mname?>
										</td>
										<td>
											<?= $shengchanBuliao->buliaoquantity?>
										</td>
										<td>
											<?= $shengchanBuliao->reason?>
										</td>
										<td>
											<?php 
												if($shengchanBuliao->isshenpi==0){echo "<span class='label label-warning'>未审批</span>";}
												if($shengchanBuliao->isshenpi==1){
													if($shengchanBuliao->shenpiresult==1)
														echo "<span class='label label-success'>已审批($shengchanBuliao->shenpiren)</span>";
													else
														echo "<span class='label label-danger'>已驳回($shengchanBuliao->shenpiren)</span>";
												}
											?>
                                            </td>
											<td>
											<?php 
												if($shengchanBuliao->isshenpi==1){echo $shengchanBuliao->shenpitime->format('Y-m-d H:m:s');}
											?>
											</td>
											<td>
												<?php 
													if($shengchanBuliao->isshenpi==0){
														echo $this->Html->link('审批', ['action' => 'check', $shengchanBuliao->id]);
													}
												?>
										</td>
										</tr>
										<?php endforeach; ?>
                                        </tbody>
                                    </table><!-- /.table -->
                                </div><!-- /.box-body-->
                                <div class="box-footer clearfix no-border">
									<a href="/projectERP/shengchanBuliaochecks/index" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-backward"></i> 返回</a>
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->
                 