        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                根据供应方新增采购
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/caigouLists/index"><i class="fa fa-dashboard"></i>采购管理</a></li>
                <li class="active">采购单管理</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
				<form method="post" class="box box-primary" accept-charset="utf-8" enctype="multipart/form-data" action="/projectERP/caigouLists/add/<?= $caigouProvider['p_id']; ?>" style="width: 60%; margin: 0px auto;">
					<div class="box-body">
                        <div class="box-body"  style="width:90%;margin: auto;" >
                            <div class="box-header">
                                <h3 class="box-title">供货方公司信息</h3>
                            </div>
                            <table class="table table-bordered table-hover" style="margin-bottom: 10px;">
                                <thead>
                                <tr>
                                    <th>编码</th>
                                    <th>公司名称</th>
                                    <th>税号</th>
                                    <th>联系人</th>
                                    <th>电话号码</th>
                                    <th>手机号码</th>
                                    <th>地址</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?=$caigouProvider->p_id ?></td>
									<td><?=$caigouProvider->p_name ?></td>
									<td><?=$caigouProvider->shuihao ?></td>
									<td><?=$caigouProvider->person ?></td>
									<td><?=$caigouProvider->dianhua ?></td>
									<td><?=$caigouProvider->shouji ?></td>
									<td><?=$caigouProvider->dizhi ?></td>
                                </tr>
                                </tfoot>
                            </table>
                            <div class="box-header">
                                <h3 class="box-title">填写采购单信息</h3>
                            </div>
                            <div class="form-group" >
                                <label>填写采购单编号:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input id="l_id" name="l_id" type="text" class="form-control"/>
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
                            <div class="form-group">
                                <label>填写采购单名称:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input id="l_name" name="l_name" type="text" class="form-control"/>
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
							<div class="form-group" >
                                <label>填写采购时间:</label>
								<div class="input-group">
									<div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
									<div class="controls" style="width:90%;">
										<input type="text" name="caigoudate" class="form-control datepicker"/>
									</div>
								</div><!-- /.input group -->
                            </div><!-- /.form group -->
							<div class="form-group">
                                <label>上传附件:</label>
                                <div class="input-group">
                                    <input type="file" name="fileUpload"/>
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
                        </div>
                    </div><!-- /.box-body -->
					<div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->