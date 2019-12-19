                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        退换货通知单
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/chengpinReturns/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                        <li class="active">退换货通知单</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">明细汇总表</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
									<?php if($result==NULL){ echo "没有匹配结果"; }
									else{ ?>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>订单编号</th>
                                            <th>退换货申请人</th>
                                            <th>退换明细</th>
                                            <th>数量</th>
                                            <th>单价</th>
                                            <th>总价</th>
                                            <th>审批人</th>
											<th>审批时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($result as $chengpinReturn): ?>
										<tr class="editable">
											<td><?= $chengpinReturn['tid'] ?></td>
                                            <td><?= $chengpinReturn['fuzeren'] ?></td>
                                            <td><?= $chengpinReturn['mingxi'] ?></td>
                                            <td><?= $chengpinReturn['quantity'] ?></td>
                                            <td><?= $chengpinReturn['price'] ?></td>
                                            <td><?= $chengpinReturn['totalprice'] ?></td>
											<td>
											<?php 
												if($chengpinReturn->isshenpi==0){echo "<span class='label label-warning'>未审批</span>";}
												if($chengpinReturn->isshenpi==1){
													if($chengpinReturn->shenpiresult==1)
														echo "<span class='label label-success'>已审批(".$chengpinShenpis[$chengpinReturn->id].")</span>";
													else
														echo "<span class='label label-danger'>已驳回(".$chengpinShenpis[$chengpinReturn->id].")</span>";
												}
											?>
                                            </td>
											<td>
											<?php 
												if($chengpinReturn['isshenpi']==1){echo $chengpinReturn['shenpitime'];}
											?>
											<td>
												<?php 
													if($chengpinReturn['isshenpi']==0){
														echo $this->Html->link('审批', ['action' => 'check', $chengpinReturn['id']]);
													}else{
														echo $this->Html->link('查看', ['action' => 'check', $chengpinReturn->id]);
													}
												?>
											</td>
                                        </tr>
										<?php endforeach; ?>
                                        </tbody>
                                    </table><!-- /.table -->
									<?php } ?>
                                </div><!-- /.box-body-->
								<div class="box-footer clearfix no-border">
									<a href="/projectERP/chengpinReturnchecks/index" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-backward"></i> 返回</a>
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->