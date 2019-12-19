        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                添加角色权限
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
                <form method="post" action="/projectERP/roles/addcontroller/<?= $role['roleid']; ?>" class="box box-primary" enctype="multipart/form-data" style="width: 60%; margin: 0px auto;">
                    <div class="box-header">
                        <h3 class="box-title">角色信息</h3>
                    </div>
                    <table class="table table-bordered table-hover" style="width: 95%;margin: 0px auto;">
						<thead>
                        <tr>
                            <th>角色ID</th>
                            <th>角色名称</th>
							<th>简介</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
							<td><?= $role->roleid ?></td>
							<td><?= $role->rolename?></td>
							<td><?= $role->content?></td>
						</tr>
                        </tfoot>
                    </table>
					<div class="box-header" style="margin-top: 30px;">
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
					
					
					<div class="box-header" style="margin-top: 30px;">
                        <h3 class="box-title">添加权限</h3>
                    </div>
					<div class="box-body" style="width:90%;margin: auto">
                        <!-- Date dd/mm/yyyy -->
                        <div class="form-group">
                            <label>controllerid:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" class="form-control" name="controllerid" placeholder="例如：CaigouLists" />
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <!-- phone mask -->
                        <div class="form-group">
                            <label>action:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" class="form-control" name="action" placeholder="例如：searchM" />
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
						<div class="box-header">
							<h3 class="box-title">简要说明</h3>
						</div>
						<div class="box-body"  style="width:90%;margin: auto;text-align: center">
							<textarea name="content" style="width:90%;margin: auto;" placeholder="例如：采购单管理-新增"></textarea>
						</div><!-- /.box-body -->
					</div>
					<!-- 
                    <div class="form-group" style="font-size:13pt;width: 95%;margin: 0px auto;">
						<label style="margin-right:15px;font-weight:bold;">controller:</label>
						<label style="margin-right:15px;font-weight:normal;">
							<select id="controllerid" name="controllerid">
								<option value="default">下拉选择</option>
								<?php foreach ($roles as $rol): ?>
								<option value="<?= $rol->roleid ?>"><?= $rol->roleid ?></option>
								<?php endforeach; ?>
							</select>
						</label>
					</div>
					-->
					<div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="添加" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->