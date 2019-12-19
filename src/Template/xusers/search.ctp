                
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
									<?php if($result==NULL){ echo "没有匹配结果"; }
									else{ ?>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>账号</th>
                                            <th>工号</th>
                                            <th>姓名</th>
                                            <th>部门</th>
											<th>岗位</th>
											<th>电话</th>
                                            <th>邮箱</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($result as $user): ?>
										<tr class="editable">
											<td><?= $user->zhanghao ?></td>
                                            <td><?= $user->gonghao ?></td>
                                            <td><?= $user->name ?></td>
                                            <td><?= $user->bumen ?></td>
                                            <td><?= $user->gangwei ?></td>
                                            <td><?= $user->telephone ?></td>
                                            <td><?= $user->email ?></td>

											<td>
												
												<?= $this->Html->link('修改', ['action' => 'modify', $user->id]) ?>
												<?= $this->Form->postLink(
													'删除',
													['action' => 'delete', $user->id],
													['confirm' => '确认删除?'])
												?>
											</td>
                                        </tr>
										<?php endforeach; ?>
                                        </tbody>
                                    </table><!-- /.table -->
									<?php } ?>
                                </div><!-- /.box-body-->
								<div class="box-footer clearfix no-border">
									<a href="/projectERP/xusers/index" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-backward"></i> 返回</a>
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->