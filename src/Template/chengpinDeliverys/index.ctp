                
				<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        发货通知单
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/chengpinDeliverys/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                        <li class="active">发货通知单</li>
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
									<div class="pull-left">
										<?php echo $this->Paginator->limitControl([2 => 2, 10 => 10, 20 => 20, 50 => 50, 100 => 100]); ?>
									</div><!-- ./分页下拉框 -->
									<!-- search form -->
                                    <div class="search-form margin">
                                        <form method="post" action="/projectERP/chengpinDeliverys/search" class="text-right">
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <div class="btn-group">
														<div>
															订单编号：<input type="text" name="sid" />
															合同编号：<input type="text" name="hetongid" />
															购方单位名称：<input type="text" name="gdanwei" />
															<button type="submit" name="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>
														</div>
                                                    </div><!-- ./btn-group -->
                                                </div>
                                            </div>
                                        </form>
                                    </div><!-- /.search-form -->
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
                                            <th>操作人</th>
                                            <th>操作时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($chengpinDeliverys as $chengpinDelivery): ?>
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
											if($chengpinDelivery->istijiao==0){
												echo "<span class='label label-warning'>未提交审批</span>";
											}else{
												if($chengpinDelivery->isshenpi==0){echo "<span class='label label-warning'>未审批</span>";}
												if($chengpinDelivery->isshenpi==1){
													if($chengpinDelivery->shenpiresult==1)
														echo "<span class='label label-success'>已审批(".$chengpinShenpis[$chengpinDelivery->id].")</span>";
													else
														echo "<span class='label label-danger'>已驳回(".$chengpinShenpis[$chengpinDelivery->id].")</span>";
												}
											}
											?>
                                            </td>
                                            <td><?= $chengpinUsers[$chengpinDelivery->id] ?></td>
                                            <td><?= $chengpinDelivery->time->format('Y-m-d H:m:s') ?></td>
											<td>
												<?php if($chengpinDelivery->istijiao==0||($chengpinDelivery->istijiao==1&&$chengpinDelivery->isshenpi==1&&$chengpinDelivery->shenpiresult==0)) { ?>
												<?= $this->Html->link('管理', ['action' => 'modify', $chengpinDelivery->id]) ?>
												<?= $this->Form->postLink(
													'删除',
													['action' => 'delete', $chengpinDelivery->id],
													['confirm' => '确认删除?'])
												?>
												<?php }else echo $this->Html->link('查看', ['action' => 'view', $chengpinDelivery->id]); ?>
											</td>
                                        </tr>
										<?php endforeach; ?>
                                        </tbody>
                                    </table><!-- /.table -->
                                </div><!-- /.box-body-->
								<!-- 分页导航 -->
								<div>
									<?= $this->paginator->counter([
										'format' => '  显示 {{start}} 到 {{end}} 项，共 {{count}} 项'
									]) ?>
									<div style="float:right">
										<ul class="pagination">
											<li><?php echo $this->paginator->prev('上一页'); ?></li> 
											<li><?php echo $this->paginator->numbers(array('modulus' => 3)); ?></li>
											<li><?php echo $this->paginator->next('下一页'); ?></li>
										</ul>
									</div>
								</div><!-- /.分页导航 -->
                                <div class="box-footer clearfix no-border">
                                    <a href="/projectERP/chengpinDeliverys/add" class="btn btn-warning pull-left"><i class="fa fa-plus"></i> 新增发货通知单</a>
                                </div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->