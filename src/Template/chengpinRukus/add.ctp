        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                成品库附件入库登记
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/chengpinRukus/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                <li class="active">成品库附件入库</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form method="post" action="/projectERP/chengpinRukus/add/<?=$chengpinInitial['mid'] ?>" enctype="multipart/form-data"  class="box box-primary" style="width: 60%; margin: 0px auto;">

                    <div class="box-body">
                        <div id="item_info" class="col-xs-12">
                            <div class="box-header">
                                <h3 class="box-title">成品附件信息</h3>
                            </div>

                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>编号</th>
                                    <th>产品名称</th>
                                    <th>规格型号</th>
                                    <th>单位</th>
                                    <th>物料描述</th>
									<th>位置</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?= $chengpinInitial['mid'] ?></td>
                                    <td><?= $chengpinInitial['name'] ?></td>
                                    <td><?= $chengpinInitial['xinghao'] ?></td>
                                    <td><?= $chengpinInitial['danwei'] ?></td>
                                    <td><?= $chengpinInitial['miaoshu'] ?></td>
									<td><?= $chengpinInitial['weizhi'] ?></td>
                                </tr>
                                </tfoot>
                            </table>
							<!-- phone mask -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between; margin-top:20px;">
								<label style="width:10%;margin-top:5px;">生产批号</label>
								<div class="controls" style="width:90%;">
									<input type="text" name="shengchanid" class="form-control"/>
								</div>
							</div><!-- /.form group -->

							<!-- phone mask -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
								<label style="width:10%;margin-top:5px;">生产日期</label>
								<div class="controls" style="width:90%;">
									<input type="text" name="shengchandate" class="form-control datepicker"/>
								</div>
							</div><!-- /.form group -->
							<!-- phone mask -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
								<label style="width:10%;margin-top:5px;">入库日期</label>
								<div class="controls" style="width:90%;">
									<input type="text" name="rukudate" class="form-control datepicker"/>
								</div>
							</div><!-- /.form group -->
							<!-- IP mask -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
								<label style="width:10%;margin-top:5px;">入库数量</label>
								<div class="controls" style="width:90%;">
									<input type="text" name="rukuquantity" class="form-control"/>
								</div>
							</div><!-- /.form group -->
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" name="submit" value="提交质检" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                        <input type="submit" name="submit" value="提交保存" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->