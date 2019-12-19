                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
						系统角色管理
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/roles/index"><i class="fa fa-dashboard"></i>角色管理</a></li>
                        <li class="active">系统角色管理</li>
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
                                        <form method="post" action="/projectERP/roles/search" class="text-right">
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <div class="btn-group">
														<div>
															角色ID：<input type="text" name="roleid" />
															角色名称：<input type="text" name="rolename" />
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
                                            <th>角色ID</th>
                                            <th>角色名称</th>
											<th>简介</th>
											<th>操作时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
										<?php foreach ($roles as $role): ?>
										<tr>
										<td><?= $role->roleid?></td>
										<td><?= $role->rolename?></td>	
										<td><?= $role->content?></td>
										<td><?= $role->time->format('Y-m-d H:m:s')?></td>
										<td>
											<?= $this->Html->link('修改', ['action' => 'modify', $role->roleid]) ?>
											<?= $this->Html->link('查看', ['action' => 'seecontroller', $role->roleid]) ?>
											<?= $this->Html->link('添加权限', ['action' => 'addcontroller', $role->roleid]) ?>
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
                                    <a href="/projectERP/roles/add" class="btn btn-warning pull-left"><i class="fa fa-plus"></i> 新增</a>
                                </div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->