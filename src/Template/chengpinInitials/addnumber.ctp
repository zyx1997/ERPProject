        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                添加二级分类数量
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/chengpinInitials/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                <li class="active">成品初始化登记</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form method="post" action="/projectERP/chengpinInitials/addnumber/<?= $chengpinSecondlevel['id']; ?>/<?=$mid ?>" class="box box-primary" enctype="multipart/form-data" class="box box-primary" style="width: 60%; margin: 0px auto;">
                    <div class="box-header">
                        <h3 class="box-title">二级分类信息</h3>
                    </div>
                    <div class="box-body" style="width:90%;margin: auto">
                        <!-- Date dd/mm/yyyy -->
                        <div class="form-group">
                            <label>二级分类编号:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input name="secondid" readonly="readonly" value="<?= $chengpinSecondlevel['secondid'] ?>" type="text" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <!-- phone mask -->
                        <div class="form-group">
                            <label>二级分类名称:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input name="secondlevel" value="<?= $chengpinSecondlevel['secondlevel'] ?>" type="text" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        <!-- phone mask -->
                        <div class="form-group">
                            <label>添加数量:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input name="number" type="text" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交登记" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>

                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->