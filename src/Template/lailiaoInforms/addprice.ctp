        <section class="content-header">
            <h1>
                原材料单价登记
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/lailiaoInforms/index"><i class="fa fa-dashboard"></i>原料库管理</a></li>
                <li class="active">通知采购</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
				<form method="post" action="/projectERP/lailiaoInforms/addprice/<?= $caigouListAll->id ?>" class="box box-primary" accept-charset="utf-8" enctype="multipart/form-data" style="width: 60%; margin: 0px auto;">
                    <div class="box-body">
                        <div class="box-body"  style="width:90%;margin: auto;" >
                            <div class="box-header">
                                <h3 class="box-title">原材料信息</h3>
                            </div>
                            <table class="table table-bordered table-hover" style="margin-bottom: 10px;">
                                <thead>
                                <tr>
									<th>采购单编号</th>
									<th>产品编号</th>
									<th>产品分类</th>
                                    <th>产品名称</th>
									<th>是否半成品</th>
                                    <th>规格型号</th>
                                    <th>单位</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
									<td><?= $caigouListAll->l_id ?></td>
									<td><?= $caigouListAll->m_id ?></td>
									<td><?= $caigouListAll->fenlei?></td>
									<td><?= $caigouListAll->name?></td>	
									<td><?php if($caigouListAll->isban==1){echo "是";} if($caigouListAll->isban==0){echo "否";} ?></td>
									<td><?= $caigouListAll->xinghao?></td>
									<td><?= $caigouListAll->danwei?></td>
                                </tr>
                                </tfoot>
								<thead>
                                <tr>
									<th>物料描述</th>
                                    <th>位置</th>
									<th>采购单数量</th>
									<th>采购单单价</th>
									<th>采购单总价</th>
									<th>状态</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
									<td><?= $caigouListAll->miaoshu?></td>
									<td><?= $caigouListAll->weizhi?></td>
									<td><?= $caigouListAll->target_quantity?></td>
									<td><?= $caigouListAll->target_price?></td>
									<td><?= $caigouListAll->target_totalprice?></td>
									<td><span class="label label-warning">已入库待填价</span></td>
                                </tr>
                                </tfoot>
                            </table>
							<div class="form-group" >
                                <label>来料数量:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input readonly="readonly" id="real_quantity" name="real_quantity" type="text" class="form-control" value="<?= $caigouListAll->real_quantity ?>"/>
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
							<div class="form-group" >
                                <label>填写赠送数量:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input id="zengsong_quantity" name="zengsong_quantity" type="text" class="form-control" />
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
                            <div class="form-group">
                                <label>填写价格:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input id="real_price" name="real_price" type="text" class="form-control" />
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
							<div class="form-group">
                                <label>产品总价:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input id="real_totalprice" name="real_totalprice" onclick="getLailiaoTotalPrice()" type="text" class="form-control" />
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input name="submit" type="submit" value="提交" class="btn btn-primary btn-sm" ></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->