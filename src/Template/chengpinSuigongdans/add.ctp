        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                随工单上传
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/chengpinSuigongdans/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                <li class="active">成品库补录</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form method="post" action="/projectERP/chengpinSuigongdans/add/<?= $chengpinDictionary['onlyid']; ?>" accept-charset="utf-8" enctype="multipart/form-data"  class="box box-primary"  style="width: 60%; margin: 0px auto;">

                    <div class="box-body">
                        <div id="item_info" class="col-xs-12">
                            <div class="box-header">
                                <h3 class="box-title">成品信息</h3>
                            </div>

                            <table class="table table-bordered table-hover" style="text-align: left; margin-bottom: 20px;">
                                <thead>
                                <tr>
                                    <th>编号</th>
                                    <th>产品名称</th>
                                    <th>是否为附件</th>
                                    <th>规格型号</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?= $chengpinInitial['mid'] ?></td>
                                    <td><?= $chengpinInitial['name'] ?></td>
                                    <td><?php if($chengpinInitial->isfujian==1){echo "是";} if($chengpinInitial->isfujian==0){echo "否";} ?></td>
                                    <td><?= $chengpinInitial['xinghao'] ?></td>
                                </tr>
                                </tfoot>
								<thead>
                                <tr>
									<th>单位</th>
									<th>物料描述</th>
									<th>位置</th>
									<th>唯一编号</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
									<td><?= $chengpinInitial['danwei'] ?></td>
									<td><?= $chengpinInitial['miaoshu'] ?></td>
									<td><?= $chengpinInitial['weizhi'] ?></td>
									<td><?= $chengpinDictionary['onlyid'] ?></td>
                                </tr>
                                </tfoot>
                            </table>
							
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">上传随工单(.jpg .png)</label>
							<div class="controls" style="width:90%;">
								<input type="file" name="fileUpload"/>
							</div>
							</div><!-- /.form group -->
                        </div>
						
                    </div><!-- /.box-body -->
					
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->