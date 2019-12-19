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
                <form method="post" action="/projectERP/users/modify" accept-charset="utf-8" enctype="multipart/form-data" class="box box-primary" style="width: 60%; margin: 0px auto;">
					<div class="box-header">
                        <h3 class="box-title">修改密码</h3>
                    </div>
					
                    <div class="box-body" style="width:90%;margin: auto;">
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">旧密码</label>
							<div class="controls" style="width:90%;">
								<input type="password" name="old" class="form-control" />
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">新密码</label>
							<div class="controls" style="width:90%;">
								<input type="password" name="new1" class="form-control" />
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">确认密码</label>
							<div class="controls" style="width:90%;">
								<input type="password" name="new2" class="form-control" />
							</div>
                        </div><!-- /.form group -->
					<div>
					<div class="box-body"  style="width:90%;margin: auto;text-align: center">
						<input type="submit" value="提交修改" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->