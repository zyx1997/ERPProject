                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        系统角色管理查看
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/roles/index"><i class="fa fa-dashboard"></i> 角色管理</a></li>
                        <li class="active">系统角色管理</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
								<div class="box-body table-responsive">
									<table class="table table-bordered table-hover" style="margin-bottom: 30px;">
										<thead>
										<tr>
											<th>角色ID</th>
											<th>角色名称</th>
											<th>简介</th>
											<th>操作时间</th>
										</tr>
										</thead>
										<tbody>
										<tr>
											<td><?= $role->roleid ?></td>
											<td><?= $role->rolename?></td>
											<td><?= $role->content?></td>
											<td><?= $role->time->format('Y-m-d H:m:s') ?></td>
										</tr>
										</tfoot>
									</table>
								</div><!-- /.box-body-->
								<div class="box-header">
                                    <h3 class="box-title">权限清单</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
									<table class="table table-bordered table-hover">
										<thead>
										<tr>
											<th  style="text-align:center">角色ID</th>
											<th  style="text-align:center">角色名称</th>
										</tr>
										</thead>
										<tbody>
										<tr>
											<td><?= $role->roleid ?></td>
											<td><?= $role->rolename?></td>
										</tr>
										</tfoot>
									</table>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
											<th>页面</th>
                                            <th>动作</th>
                                            <th>简介</th>
											<th>操作时间</th>
											<th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($rolecontrollers as $rolecontroller): ?>
											<?php 
											$count = 0;
											foreach ($rolecontrolleractions[$rolecontroller['controllerid']] as $rolecontrolleraction): $count++; endforeach; 
											?>
											<tr><td rowspan="<?= $count+1 ?>"><?= $rolecontroller['controllerid'] ?></td></tr>
											<?php foreach ($rolecontrolleractions[$rolecontroller['controllerid']] as $rolecontrolleraction): ?>
											<tr>
												<td><?= $rolecontrolleraction['action'] ?></td>
												<td><?= $rolecontrolleraction['content'] ?></td>
												<td><?= $rolecontrolleraction['time']->format('Y-m-d H:m:s') ?></td>
												<td><?= $this->Form->postLink(
													'删除',
													['action' => 'deleteController', $rolecontrolleraction->id],
													['confirm' => '确认删除?'])
												?></td>
											</tr>
											<?php endforeach; ?><!-- /.列举完所有action -->
										<?php endforeach; ?><!-- /.列举完所有controller -->
                                        </tbody>
                                    </table><!-- /.table -->
                                </div><!-- /.box-body-->
								<div class="box-footer clearfix no-border">
									<a href="/projectERP/roles/index" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-backward"></i> 返回</a>
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->