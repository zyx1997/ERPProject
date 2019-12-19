  <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        管理员管理
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/xusers/index"><i class="fa fa-dashboard"></i>账号管理</a></li>
                        <li class="active">管理员管理</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">用户列表</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
									<!-- 分页下拉框 -->
									<div class="pull-left">
										<?php echo $this->Paginator->limitControl([2 => 2, 10 => 10, 20 => 20, 50 => 50, 100 => 100]); ?>
									</div><!-- ./分页下拉框 -->
									<!-- search form -->
									<div class="search-form margin">
                                        <form method="post" action="/projectERP/xusers/search" class="text-right">
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <div class="btn-group">
														<div>
															工号：<input type="text" name="gonghao" />
															姓名：<input type="text" name="name" />
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
										<?php foreach ($users as $user): ?>
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
                                    <a href="/projectERP/xusers/add" class="btn btn-warning pull-left"><i class="fa fa-plus"></i> 新增用户</a>
                                </div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->