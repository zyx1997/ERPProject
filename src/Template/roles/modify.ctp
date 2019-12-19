        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                系统角色管理修改
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
				<form method="post" class="box box-primary" accept-charset="utf-8" enctype="multipart/form-data" action="/projectERP/roles/modify/<?= $role['roleid']; ?>"  style="width: 60%; margin: 0px auto;">
                    <div class="box-header">
                        <h3 class="box-title">角色信息</h3>
                    </div>
                    <div class="box-body" style="width:90%;margin: auto">
                        <!-- Date dd/mm/yyyy -->
                        <div class="form-group">
                            <label>角色ID:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" class="form-control" name="roleid" value="<?= $role['roleid'] ?>" readonly="readonly" />
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <!-- phone mask -->
                        <div class="form-group">
                            <label>角色名称:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" class="form-control" name="rolename" value="<?= $role['rolename'] ?>" />
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                    <div class="box-header">
                        <h3 class="box-title">简介</h3>
                    </div>
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
						<textarea name="content" style="width:90%;margin: auto;"><?= $role['content'] ?></textarea>
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->