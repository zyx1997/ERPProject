        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                添加补料单
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/shengchanBuliaos/index"><i class="fa fa-dashboard"></i> 生产领料</a></li>
                <li class="active">补料单</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form method="post" action="/projectERP/shengchanBuliaos/add/<?=$lailiaoinitial['m_id'] ?>/<?= $jid ?>" enctype="multipart/form-data"  class="box box-primary" style="width: 60%; margin: 0px auto;">
                    <div class="box-body">
                        <div id="item_info" class="col-xs-12">
							<div class="box-header">
                                <h3 class="box-title">生产计划信息</h3>
                            </div>
							<table class="table table-bordered table-hover" style="text-align: left;margin-bottom:20px;">
							<thead>
								<tr>
									<th>生产计划编号</th>
									<th>物料编号</th>
									<th>物料名称</th>
									<th>物料描述</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?= $jid ?></td>
									<td><?= $lailiaoinitial['m_id'] ?></td>
									<td><?= $lailiaoinitial['name'] ?></td>
									<td><?= $lailiaoinitial['miaoshu'] ?></td>
								</tr>
							</tfoot>
							</table>
							<div class="box-header">
                                <h3 class="box-title">补料单</h3>
                            </div>
							<!-- IP mask -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
								<label style="width:10%;margin-top:5px;">补料单编号</label>
								<div class="controls" style="width:90%;">
									<input type="text" value="<?=$bid ?>" name="bid" class="form-control" readonly="readonly"/>
								</div>
							</div><!-- /.form group -->
							<!-- IP mask -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
								<label style="width:10%;margin-top:5px;">补料数量</label>
								<div class="controls" style="width:90%;">
									<input type="text" name="buliaoquantity" class="form-control"/>
								</div>
							</div><!-- /.form group -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
								<label style="width:10%;margin-top:5px;">补料原因</label>
								<div class="controls" style="width:90%;">
									<input type="text" name="reason" class="form-control"/>
								</div>
							</div><!-- /.form group -->
						</div><!-- /.box-body -->
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input id="submit-q" type="submit" value="提交" class="btn btn-primary btn-sm" style="margin: 0px auto;"></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->