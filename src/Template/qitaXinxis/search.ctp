<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        其他基本信息
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/qitaXinxis/index"><i class="fa fa-dashboard"></i>销售商基本信息管理</a></li>
                        <li class="active">其他基本信息</li>
                    </ol>
                </section>


                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">查询结果</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
									<?php if($result==NULL){ echo "没有匹配结果"; }
									else{ ?>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
											<th>名称</th>
                                            <th>身份证号</th>
                                            <th>联系人</th>
                                            <th>联系电话</th>
											<th>审批状态</th>
											<th>操作人</th>
											<th>操作时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($result as $qitaXinxi): ?>
										<tr class="editable">
											<td><?= $qitaXinxi->name ?></td>
                                            <td><?= $qitaXinxi->daima ?></td>
                                            <td><?= $qitaXinxi->lianxiren ?></td>
                                            <td><?= $qitaXinxi->telephone ?></td>
											<td>
											<?php
											if($qitaXinxi->istijiao==0){
												echo "<span class='label label-warning'>未提交审批</span>";
											}else{
												if($qitaXinxi->isshenpi==0){echo "<span class='label label-warning'>未审批</span>";}
												if($qitaXinxi->isshenpi==1){
													if($qitaXinxi->shenpiresult==1)
														echo "<span class='label label-success'>已审批(".$qitaShenpis[$qitaXinxi->id].")</span>";
													else
														echo "<span class='label label-danger'>已驳回(".$qitaShenpis[$qitaXinxi->id].")</span>";
												}
											}
											?>
											</td>
											<td><?=$qitaUsers[$qitaXinxi->id] ?></td>
											<td><?= $qitaXinxi->time->format('Y-m-d H:m:s')?></td>
											
											<td>
												<?php if($qitaXinxi->istijiao==0||($qitaXinxi->istijiao==1&&$qitaXinxi->isshenpi==1&&$qitaXinxi->shenpiresult==0)){ ?>
												<?= $this->Html->link('管理', ['action' => 'modify', $qitaXinxi->id]) ?>
												<?= $this->Form->postLink(
													'删除',
													['action' => 'delete', $qitaXinxi->id],
													['confirm' => '确认删除?'])
												?>
												<?php }else{ ?>
												<?= $this->Html->link('查看', ['action' => 'view', $qitaXinxi->id]) ?>
												<?php if($qitaXinxi->shenpiresult==1){
													if($qitaXinxi->isshouying==0){
												?>
												<?= $this->Form->postLink(
													'申请重新首营',
													['action' => 'shouying', $qitaXinxi->id],
													['confirm' => '确认申请重新首营?'])
												?>
												<?php } } } ?>
											</td>
                                        </tr>
										<?php endforeach; ?>
                                        </tbody>
                                    </table><!-- /.table -->
									<?php } ?>
                                </div><!-- /.box-body-->
								<div class="box-footer clearfix no-border">
									<a href="/projectERP/qitaXinxis/index" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-backward"></i> 返回</a>
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->