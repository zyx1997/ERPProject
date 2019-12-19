        <section class="content-header">
            <h1>
                来料单价登记
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/lailiaoInforms/index"><i class="fa fa-dashboard"></i>原料库管理</a></li>
                <li class="active">来料管理</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
					<div class="box-body">
                        <div class="box-body"  style="width:90%;margin: auto;" >
                            <div class="box-header">
                                <h3 class="box-title">来料信息</h3>
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
									<?php if($caigouListAll->zhuangtai==0){ ?>
										<td><span class="label label-default">待填写数量</span></td>
									<?php } elseif($caigouListAll->zhuangtai==1){ ?> 
										<td><span class="label label-warning">待填写价格</span></td>
									<?php } elseif($caigouListAll->zhuangtai==2){ ?> 
										<td><span class="label label-primary">待IQC质检</span></td>
									<?php } elseif($caigouListAll->zhuangtai==3){ ?> 
										<td><span class="label label-success">物料已归档</span></td>
									<?php } ?>
                                </tr>
                                </tfoot>
                            </table>
							<div class="form-group" >
                                <label>来料数量:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input readonly="readonly" id="quantity" name="real_quantity" type="text" class="form-control" value="<?= $caigouListAll->real_quantity ?>" />
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
                            <div class="form-group">
                                <label>价格:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input readonly="readonly" id="price" name="real_price" type="text" class="form-control" value="<?= $caigouListAll->real_price ?>" />
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
							<div class="form-group">
                                <label>产品总价:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input readonly="readonly" id="totalPrice" name="real_totalprice" type="text" class="form-control" value="<?= $caigouListAll->real_totalprice ?>" />
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <a href="/projectERP/lailiaoManages/index" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-backward"></i> 返回</a>
                    </div>
            </div>
        </section><!-- /.content -->