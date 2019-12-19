        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                添加装箱单
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/chengpinZhuangxiangs/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                <li class="active">装箱单</li>
            </ol>
        </section>
		
		<!-- Main content -->
        <section class="content">
            <div class="row">
                <form method="post" action="/projectERP/chengpinZhuangxiangs/add/<?= $oid?>" class="box box-primary box-content" enctype="multipart/form-data" style="width: 60%; margin: 0px auto;">
                    <div class="box-header">
                        <h3 class="box-title">初始化装箱单</h3>
                    </div>
                    <div class="box-body" style="width:90%;margin: auto;">
                        <!-- Date dd/mm/yyyy -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">出库单编号</label>
							<div class="controls" style="width:90%;">
								<input type="text" class="form-control" name="oid" value="<?= $oid ?>" readonly="readonly"  placeholder="请输入(必填)"/>
							</div>
                        </div><!-- /.form group -->
                        <!-- phone mask -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">装箱单编号</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="zid" class="form-control" value="<?= $zid?>" readonly="readonly"  />
							</div>
                        </div><!-- /.form group -->
                        <!-- IP mask -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">装箱单名称</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="name" class="form-control" placeholder="请输入(必填)"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">出厂日期</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="date" class="form-control datepicker" placeholder="请选择(必填)"/>
							</div>
                        </div><!-- /.form group -->
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交登记" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>

                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->

        