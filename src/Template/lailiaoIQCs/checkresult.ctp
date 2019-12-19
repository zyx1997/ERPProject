        <section class="content-header">
            <h1>
                来料质检结果
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/lailiaoIQCs/index"><i class="fa fa-dashboard"></i>原料库管理</a></li>
                <li class="active">来料质检</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
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
									<?php if($caigouListAll->zhuangtai==0){ ?>
										<td><span class="label label-default">待来料质检</span></td>
									<?php } elseif($caigouListAll->zhuangtai==1){ ?> 
										<td><span class="label label-warning">已入库待填价</span></td>
									<?php } elseif($caigouListAll->zhuangtai==2){ ?> 
										<td><span class="label label-success">已入库已填价</span></td>
									<?php } else { ?>
										<td></td>
									<?php } ?>
                                </tr>
                                </tfoot>
                            </table>
							<div class="form-group" >
                                <label>填写来料数量:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input readonly="readonly" name="real_quantity" type="text" class="form-control" value="<?= $caigouListAll->real_quantity ?>" />
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
							<div class="form-group" >
                                <label>合格数量:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input readonly="readonly" name="iqc_ok" type="text" class="form-control" value="<?= $caigouListAll->iqc_ok ?>"  />
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
							<div class="form-group" >
                                <label>不合格数量:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input readonly="readonly" name="iqc_wrong" type="text" class="form-control" value="<?= $caigouListAll->iqc_wrong ?>"  />
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
							<div class="form-group" >
                                <label>其他数量:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input readonly="readonly" name="iqc_else" type="text" class="form-control" value="<?= $caigouListAll->iqc_else ?>" />
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
							<div class="box-header">
								<h3 class="box-title">其他数量备注</h3>
								<span><?= $caigouListAll->iqc_else_beizhu ?></span>
							</div>
							<div class="box-header">
								<h3 class="box-title">质检人</h3>
								<span><?= $caigouListAll->zhijianren ?></span>
							</div>
							<div class="box-header">
								<h3 class="box-title">质检时间</h3>
								<span><?= $caigouListAll->zhijian_time ?></span>
							</div>
							<div class="box-header">
								<h3 class="box-title">质检备注</h3>
								<span><?= $caigouListAll->zhijian_beizhu ?></span>
							</div>
							<div class="box-footer clearfix no-border">
								<a href="/projectERP/lailiaoIQCs/index" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-backward"></i> 返回</a>
							</div>
                        </div>
                    </div><!-- /.box-body -->
            </div>
        </section><!-- /.content -->