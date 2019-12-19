                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        成品出库质检
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/chengpinChukuchecks/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                        <li class="active">成品出库质检</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">出库单</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>编号</th>
											<th>销售订单编号</th>
											<th>合同编号</th>
                                            <th>审批人</th>
                                            <th>审批时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($result as $chengpinChuku): ?>
										<tr>
										<td>
											<?= $chengpinChuku->oid ?>
										</td>
										<td><?= $chengpinChuku->dingdanid?></td>
										<td>
											<?= $chengpinChuku->hetongid?>
										</td>
										<td>
											<?php 
												if($chengpinChuku->isshenpi==0){echo "<span class='label label-warning'>未审批</span>";}
												if($chengpinChuku->isshenpi==1){
													if($chengpinChuku->shenpiresult==1)
														echo "<span class='label label-success'>已审批($chengpinChuku->shenpiren)</span>";
													else
														echo "<span class='label label-danger'>已驳回($chengpinChuku->shenpiren)</span>";
												}
											?>
										</td>
										<td>
											<?php 
												if($chengpinChuku->isshenpi==1){echo $chengpinChuku->shenpitime->format('Y-m-d H:m:s');}
											?>
										</td>
										<td>
											<?php 
												if($chengpinChuku->isshenpi==0){
													echo $this->Html->link('审批', ['action' => 'check', $chengpinChuku->oid]);
												}else{
														echo $this->Html->link('查看', ['action' => 'check', $chengpinChuku->oid]);
													}
											?>
										</td>
										</tr>
										<?php endforeach; ?>
                                        </tbody>
                                    </table><!-- /.table -->
                                </div><!-- /.box-body-->
                                <div class="box-footer clearfix no-border">
									<a href="/projectERP/chengpinChukuchecks/index" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-backward"></i> 返回</a>
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->