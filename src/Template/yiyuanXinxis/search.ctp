<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        医院基本信息
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/yiyuanXinxis/index"><i class="fa fa-dashboard"></i>销售商基本信息管理</a></li>
                        <li class="active">医院基本信息</li>
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
											<th>医院名称</th>
                                            <th>组织机构代码</th>
                                            <th>医院联系人</th>
                                            <th>医院联系电话</th>
											<th>审批状态</th>
											<th>操作人</th>
											<th>操作时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($result as $yiyuanXinxi): ?>
										<tr class="editable">
											<td><?= $yiyuanXinxi->name ?></td>
                                            <td><?= $yiyuanXinxi->daima ?></td>
                                            <td><?= $yiyuanXinxi->lianxiren ?></td>
                                            <td><?= $yiyuanXinxi->telephone ?></td>
											<td>
											<?php
											if($yiyuanXinxi->istijiao==0){
												echo "<span class='label label-warning'>未提交审批</span>";
											}else{
												if($yiyuanXinxi->isshenpi==0){echo "<span class='label label-warning'>未审批</span>";}
												if($yiyuanXinxi->isshenpi==1){
													if($yiyuanXinxi->shenpiresult==1)
														echo "<span class='label label-success'>已审批(".$yiyuanShenpis[$yiyuanXinxi->id].")</span>";
													else
														echo "<span class='label label-danger'>已驳回(".$yiyuanShenpis[$yiyuanXinxi->id].")</span>";
												}
											}
											?>
											</td>
											<td><?=$yiyuanUsers[$yiyuanXinxi->id] ?></td>
											<td><?= $yiyuanXinxi->time->format('Y-m-d H:m:s')?></td>
											
											<td>
												<?php if($yiyuanXinxi->istijiao==0||($yiyuanXinxi->istijiao==1&&$yiyuanXinxi->isshenpi==1&&$yiyuanXinxi->shenpiresult==0)){ ?>
												<?= $this->Html->link('管理', ['action' => 'modify', $yiyuanXinxi->id]) ?>
												<?= $this->Form->postLink(
													'删除',
													['action' => 'delete', $yiyuanXinxi->id],
													['confirm' => '确认删除?'])
												?>
												<?php }else{ ?>
												<?= $this->Html->link('查看', ['action' => 'view', $yiyuanXinxi->id]) ?>
												<?php if($yiyuanXinxi->shenpiresult==1){
													if($yiyuanXinxi->isshouying==0){
												?>
												<?= $this->Form->postLink(
													'申请重新首营',
													['action' => 'shouying', $yiyuanXinxi->id],
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
									<a href="/projectERP/yiyuanXinxis/index" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-backward"></i> 返回</a>
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->