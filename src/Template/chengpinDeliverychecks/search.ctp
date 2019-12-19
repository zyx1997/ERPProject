                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        发货通知单审批
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/chengpinDeliverychecks/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                        <li class="active">发货通知单审批</li>
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
                                    <!-- 分页下拉框 -->
									<?php if($result==NULL){ echo "没有匹配结果"; }
									else{ ?>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
											<th>订单编号</th>
                                            <th>合同编号</th>
                                            <th>购方单位名称</th>
                                            <th>订单明细</th>
                                            <th>数量</th>
                                            <th>单价</th>
                                            <th>总价</th>
											<th>审批人</th>
											<th>审批时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($result as $chengpinDelivery): ?>
										<tr class="editable">
											<td><?= $chengpinDelivery->sid ?></td>
                                            <td><?= $chengpinDelivery->hetongid ?></td>
                                            <td><?= $chengpinDelivery->gdanwei ?></td>
                                            <td><?= $chengpinDelivery->mingxi ?></td>
                                            <td><?= $chengpinDelivery->quantity ?></td>
                                            <td><?= $chengpinDelivery->price ?></td>
                                            <td><?= $chengpinDelivery->totalprice ?></td>
											<td>
											<?php 
												if($chengpinDelivery->isshenpi==0){echo "<span class='label label-warning'>未审批</span>";}
												if($chengpinDelivery->isshenpi==1){
													if($chengpinDelivery->shenpiresult==1)
														echo "<span class='label label-success'>已审批(".$chengpinShenpis[$chengpinDelivery->id].")</span>";
													else
														echo "<span class='label label-danger'>已驳回(".$chengpinShenpis[$chengpinDelivery->id].")</span>";
												}
											?>
                                            </td>
											<td>
											<?php 
												if($chengpinDelivery->isshenpi==1){echo $chengpinDelivery->shenpitime->format('Y-m-d H:m:s');}
											?>
											</td>
											<td>
												<?php 
													if($chengpinDelivery->isshenpi==0){
														echo $this->Html->link('审批', ['action' => 'check', $chengpinDelivery->id]);
													}else{
														echo $this->Html->link('查看', ['action' => 'check', $chengpinDelivery->id]);
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
									<a href="/projectERP/chengpinDeliverychecks/index" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-backward"></i> 返回</a>
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->