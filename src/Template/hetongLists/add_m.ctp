        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                添加产品
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/hetongLists/index"><i class="fa fa-dashboard"></i>合同评审</a></li>
                <li class="active">合同评审管理</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
				<form method="post" action="/projectERP/hetongLists/addM/<?= $hetongList['id'] ?>/<?= $chengpinInitial['mid'] ?>" class="box box-primary" accept-charset="utf-8" enctype="multipart/form-data" style="width: 60%; margin: 0px auto;">
                    <div class="box-body">
                        <div class="box-body"  style="width:90%;margin: auto;" >
                            <div class="box-header">
                                <h3 class="box-title">产品信息</h3>
                            </div>
                            <table class="table table-bordered table-hover" style="margin-bottom: 10px;">
                                <thead>
                                <tr>
                                    <th>编号</th>
                                    <th>产品名称</th>
									<th>是否为附件</th>
                                    <th>规格型号</th>
                                    <th>单位</th>
                                    <th>物料描述</th>
                                    <th>位置</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
									<td><?= $chengpinInitial->mid ?></td>
									<td><?= $chengpinInitial->name?></td>	
									<td><?php if($chengpinInitial->isfujian==1){echo "是";} if($chengpinInitial->isfujian==0){echo "否";} ?></td>
									<td><?= $chengpinInitial->xinghao?></td>
									<td><?= $chengpinInitial->danwei?></td>
									<td><?= $chengpinInitial->miaoshu?></td>
									<td><?= $chengpinInitial->weizhi?></td>
                                </tr>
                                </tfoot>
                            </table>
							<div class="box-header">
                                <h3 class="box-title">填写合同信息</h3>
                            </div>
							<div class="form-group" >
                                <label>成品/附件价格:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input readonly="readonly" id="price" name="zhidaojia" type="text" class="form-control" value="<?= $chengpinInitial->zhidaojia ?>"/>
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
                            <div class="form-group" >
                                <label>数量:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input id="quantity" name="shuliang" type="text" class="form-control" />
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
							<div class="form-group">
                                <label>总价（元）:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input id="totalPrice" name="zongjia" onclick="getTotalPrice()" type="text" class="form-control" />
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
							<div class="form-group" >
                                <label>优惠（元）:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input id="youhui_price" name="youhui_price" type="text" class="form-control" />
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
							<div class="box-header">
								<h3 class="box-title">优惠备注</h3>
							</div>
							<div class="box-body"  style="width:90%;margin: auto;text-align: center">
								<textarea name="youhui_beizhu" style="width:90%;margin: auto;"></textarea>
							</div><!-- /.box-body -->
							<div class="form-group" >
                                <label>合计（元）:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input id="heji_price" name="heji_price" onclick="getHejiPrice()"  type="text" class="form-control" />
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input name="submit" type="submit" value="确认添加" class="btn btn-primary btn-sm" ></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->