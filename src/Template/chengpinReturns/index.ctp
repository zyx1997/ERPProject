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
									<!-- 分页下拉框 -->
									<div class="pull-left">
										<?php echo $this->Paginator->limitControl([2 => 2, 10 => 10, 20 => 20, 50 => 50, 100 => 100]); ?>
									</div><!-- ./分页下拉框 -->
                                    <!-- search form -->
                                    <div class="search-form margin">
                                        <form method="post" action="/projectERP/chengpinReturns/search" class="text-right">
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <div class="btn-group">
														<div>
															订单编号：<input type="text" name="tid" />
															退换货申请人：<input type="text" name="fuzeren" />
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
                                            <th>退换货申请人</th>
                                            <th>退换明细</th>
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
										<?php foreach ($chengpinReturns as $chengpinReturn): ?>
										<tr class="editable">
											<td><?= $chengpinReturn->tid ?></td>
                                            <td><?= $chengpinReturn->fuzeren ?></td>
                                            <td><?= $chengpinReturn->mingxi ?></td>
                                            <td><?= $chengpinReturn->quantity ?></td>
                                            <td><?= $chengpinReturn->price ?></td>
                                            <td><?= $chengpinReturn->totalprice ?></td>
											<td>
											<?php
											if($chengpinReturn->istijiao==0){
												echo "<span class='label label-warning'>未提交审批</span>";
											}else{
												if($chengpinReturn->isshenpi==0){echo "<span class='label label-warning'>未审批</span>";}
												if($chengpinReturn->isshenpi==1){
													if($chengpinReturn->shenpiresult==1)
														echo "<span class='label label-success'>已审批(".$chengpinShenpis[$chengpinReturn->id].")</span>";
													else
														echo "<span class='label label-danger'>已驳回(".$chengpinShenpis[$chengpinReturn->id].")</span>";
												}
											}
											?>
                                            </td>
                                            <td><?= $chengpinUsers[$chengpinReturn->id] ?></td>
                                            <td><?= $chengpinReturn->time->format('Y-m-d H:m:s') ?></td>
											<td>
												<?php if($chengpinReturn->istijiao==0||($chengpinReturn->istijiao==1&&$chengpinReturn->isshenpi==1&&$chengpinReturn->shenpiresult==0)) { ?>
												<?= $this->Html->link('管理', ['action' => 'modify', $chengpinReturn->id]) ?>
												<?= $this->Form->postLink(
													'删除',
													['action' => 'delete', $chengpinReturn->id],
													['confirm' => '确认删除?'])
												?>
												<?php }else echo $this->Html->link('查看', ['action' => 'view', $chengpinReturn->id]); ?>
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
                                    <a href="/projectERP/chengpinReturns/add" class="btn btn-warning pull-left"><i class="fa fa-plus"></i> 新增退换货通知单</a>
                                </div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->