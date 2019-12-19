        <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        成品库附件质检
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/chengpinRukuchecks/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                        <li class="active">成品库附件质检</li>
                    </ol>
                </section>
        <section class="content">
            <div class="row">
                <form method="post" action="/projectERP/chengpinRukuchecks/check/<?= $chengpinRuku['id']; ?>" accept-charset="utf-8" enctype="multipart/form-data"  class="box box-primary"  style="width: 60%; margin: 0px auto;">

                    <div class="box-body">
                        <div id="item_info" class="col-xs-12">
                            <div class="box-header">
                                <h3 class="box-title">附件入库信息</h3>
                            </div>

                            <table class="table table-bordered table-hover" style="text-align: left;">
                                <thead>
                                <tr>
                                    <th>编号</th>
                                    <th>成品名称</th>
                                    <th>规格型号</th>
                                    <th>单位</th>
									<th>物料描述</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?= $chengpinRuku['mid'] ?></td>
                                    <td><?= $chengpinRuku['name'] ?></td>
                                    <td><?= $chengpinRuku['xinghao'] ?></td>
                                    <td><?= $chengpinRuku['danwei'] ?></td>
									<td><?= $chengpinRuku['miaoshu'] ?></td>
                                </tr>
                                </tfoot>
								<thead>
                                <tr>
									<th>生产批号</th>
									<th>生产日期</th>
									<th>入库日期</th>
									<th>入库数量</th>
									<th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
									<td><?= $chengpinRuku['shengchanid'] ?></td>
									<td><?= $chengpinRuku['shengchandate']->format('Y-m-d') ?></td>
									<td><?= $chengpinRuku['rukudate']->format('Y-m-d') ?></td>
									<td><?= $chengpinRuku['rukuquantity'] ?></td>
									<th></th>
                                </tr>
                                </tfoot>
                            </table>
							<input type="hidden" name="iszhijian" value="1"/>
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between; margin-top:20px;">
								<label style="width:10%;margin-top:5px;">合格数量</label>
								<div class="controls" style="width:90%;">
								<input type="text" name="hegequantity" class="form-control"/>
								</div>
							</div><!-- /.form group -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
								<label style="width:10%;margin-top:5px;">不合格数量</label>
								<div class="controls" style="width:90%;">
								<input type="text" name="nohegequantity" class="form-control"/>
								</div>
							</div><!-- /.form group -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
								<label style="width:10%;margin-top:5px;">其他数量</label>
								<div class="controls" style="width:90%;">
								<input type="text" name="qitaquantity" class="form-control"/>
								</div>
							</div><!-- /.form group -->
							<div class="box-header">
								<h3 class="box-title">备注</h3>
							</div>
							<div class="box-body"  style="width:90%;margin: auto;text-align: center">
								<textarea id="beizhu" name="beizhu"  style="width:90%;margin: auto;"  >
								</textarea>

							</div><!-- /.box-body -->

                        </div>
						
                    </div><!-- /.box-body -->
					
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->