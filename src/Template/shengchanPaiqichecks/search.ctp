                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        生产排期
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/shengchanPaiqichecks/index"><i class="fa fa-dashboard"></i> 生产领料</a></li>
                        <li class="active">生产排期审批</li>
                    </ol>
                </section>

                 <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">生产排期表</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>单号</th>
                                            <th>名称</th>
											<th>计划开始时间</th>
											<th>实际开始时间</th>
											<th>计划结束时间</th>
											<th>实际结束时间</th>
											<th>计划生产数量</th>
											<th>实际生产数量</th>
											<th>审批人</th>
											<th>审批时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($result as $shengchanPaiqi): ?>
										<tr>
										<td>
											<?= $shengchanPaiqi->jid ?>
										</td>
										<td>
											<?= $shengchanPaiqi->name?>
										</td>
										<td>
											<?php if($shengchanPaiqi->jihuakaishidate!=NULL)
												echo $shengchanPaiqi->jihuakaishidate->format('Y-m-d');
											?>
										</td>
										<td>
											<?php if($shengchanPaiqi->shijikaishidate!=NULL)
												echo $shengchanPaiqi->shijikaishidate->format('Y-m-d');
											?>
										</td>
										<td>
											<?php if($shengchanPaiqi->jihuajieshudate!=NULL)
												echo $shengchanPaiqi->jihuajieshudate->format('Y-m-d');
											?>
										</td>
										<td>
											<?php if($shengchanPaiqi->shijijieshudate!=NULL)
												echo $shengchanPaiqi->shijijieshudate->format('Y-m-d');
											?>
										</td>
										<td>
											<?= $shengchanPaiqi->jihuaquantity?>
										</td>
										<td>
											<?= $shengchanPaiqi->shijiquantity?>
										</td>
										<td>
											<?php 
												if($shengchanPaiqi->isshenpi==0){echo "<span class='label label-warning'>未审批</span>";}
												if($shengchanPaiqi->isshenpi==1){
													if($shengchanPaiqi->shenpiresult==1)
														echo "<span class='label label-success'>已审批($shengchanPaiqi->shenpiren)</span>";
													else
														echo "<span class='label label-danger'>已驳回($shengchanPaiqi->shenpiren)</span>";
												}
											?>
                                            </td>
											<td>
											<?php 
												if($shengchanPaiqi->isshenpi==1){echo $shengchanPaiqi->shenpitime->format('Y-m-d H:m:s');}
											?>
											</td>
											<td>
												<?php 
													if($shengchanPaiqi->isshenpi==0){
														echo $this->Html->link('审批', ['action' => 'check', $shengchanPaiqi->id]);
													}else{
														echo $this->Html->link('查看', ['action' => 'check', $shengchanPaiqi->id]);
													}
												?>
										</td>
										</tr>
										<?php endforeach; ?>
                                        </tbody>
                                    </table><!-- /.table -->
                                </div><!-- /.box-body-->
								
                                <div class="box-footer clearfix no-border">
									<a href="/projectERP/shengchanPaiqichecks/index" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-backward"></i> 返回</a>
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->