                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        用户管理
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/users/index"><i class="fa fa-dashboard"></i>账号管理</a></li>
                        <li class="active">用户管理</li>
                    </ol>
                </section>

                <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="box box-primary" style="width: 60%; margin: 0px auto;">
					<div class="box-header">
                        <h3 class="box-title">用户基本信息</h3>
                    </div>
                    <div class="box-body" style="width:90%;margin: auto">
						<table class="table table-bordered table-hover" style="text-align: left;margin-bottom:20px;">
							<thead>
								<tr>
									<th>姓名</th>
									<th>账号</th>
									<th>工号</th>
									<th>部门</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?= $users['name'] ?></td>
									<td><?= $users['zhanghao'] ?></td>
									<td><?= $users['gonghao'] ?></td>
									<td><?= $users['bumen'] ?></td>
								</tr>
							</tfoot>
							<thead>
								<tr>
									<th>岗位</th>
									<th>电话</th>
									<th>邮箱</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?= $users['gangwei'] ?></td>
									<td><?= $users['telephone'] ?></td>
									<td><?= $users['email'] ?></td>
									<td></td>
								</tr>
							</tfoot>
						</table>
					</div>
					
					<div class="box-body"  style="width:90%;margin: auto;text-align: center">
						<a href="/projectERP/users/modify" class="btn btn-primary btn-sm" style="margin: 0px auto">修改密码</a>
                        
                    </div>
                </div><!-- /.box -->
            </div>
        </section><!-- /.content -->