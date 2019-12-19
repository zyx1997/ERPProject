       <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        领料
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/shengchanBuliaos/index"><i class="fa fa-dashboard"></i> 生产领料</a></li>
                        <li class="active">补料单</li>
                    </ol>
                </section>
        <section class="content">
            <div class="row">
                <form method="post" action="/projectERP/shengchanBuliaos/lingliao/<?= $shengchanBuliao['id'] ?>" accept-charset="utf-8" enctype="multipart/form-data"  class="box box-primary"  style="width: 60%; margin: 0px auto;">

                    <div class="box-body">
                        <div id="item_info" class="col-xs-12">
                            <div class="box-header">
                                <h3 class="box-title">补料单信息</h3>
                            </div>

                            <table class="table table-bordered table-hover" style="text-align: left;">
                                <thead>
                                <tr>
                                    <th>补料单编号</th>
                                    <th>生产计划单号</th>
                                    <th>物料编号</th>
                                    <th>物料名称</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?= $shengchanBuliao->bid ?></td>
                                    <td><?= $shengchanBuliao->jid ?></td>
                                    <td><?= $shengchanBuliao->mid ?></td>
                                    <td><?= $shengchanBuliao->mname ?></td>
                                </tr>
                                </tfoot>
								<thead>
                                <tr>
									<th>物料描述</th>
									<th>补料数量</th>
									<th>补料原因</th>
									<th>补料人</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
									<td><?= $shengchanBuliao->miaoshu ?></td>
									<td><?= $shengchanBuliao->buliaoquantity ?></td>
									<td><?= $shengchanBuliao->reason ?></td>
									<td><?= $shengchanBuliao->user ?></td>
                                </tr>
                                </tfoot>
                            </table>
								
							<div class="form-group" style="margin-top:20px; display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">领料人</label>
							<div class="controls" style="width:90%;">
								<input type="hidden" name="islingliao" value="1"/>
								<input type="text" name="lingliaoren" class="form-control"/>
							</div>
							</div><!-- /.box-body -->
                       </div><!-- /.form group -->
						
                    </div><!-- /.box-body -->
						
                            
					
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->