        <section class="content-header">
            <h1>
                IQC质检
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/lailiaoIQCs/index"><i class="fa fa-dashboard"></i>原料库管理</a></li>
                <li class="active">IQC质检</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
				<form method="post" action="/projectERP/lailiaoIQCs/check/<?= $caigouListAll->id ?>" class="box box-primary" accept-charset="utf-8" enctype="multipart/form-data" style="width: 60%; margin: 0px auto;">
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
                                    <input name="real_quantity" type="text" class="form-control" oninput="value=value.replace(/[^\d]/g,'')" />
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
							<div class="form-group" >
                                <label>合格数量:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input name="iqc_ok" type="text" class="form-control" oninput="value=value.replace(/[^\d]/g,'')" />
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
							<div class="form-group" >
                                <label>不合格数量:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input name="iqc_wrong" type="text" class="form-control" oninput="value=value.replace(/[^\d]/g,'')" />
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
							<div class="form-group" >
                                <label>其他数量:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input name="iqc_else" type="text" class="form-control" oninput="value=value.replace(/[^\d]/g,'')" />
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
							<div class="box-header">
								<h3 class="box-title">其他数量备注</h3>
							</div>
							<div class="box-body"  style="width:90%;margin: auto;text-align: center">
								<textarea name="iqc_else_beizhu"  style="width:90%;margin: auto;" ></textarea>
							</div><!-- /.box-body -->
							<div class="box-header">
								<h3 class="box-title">质检备注</h3>
							</div>
							<div class="box-body"  style="width:90%;margin: auto;text-align: center">
								<textarea name="zhijian_beizhu"  style="width:90%;margin: auto;" ></textarea>
							</div><!-- /.box-body -->
							<div class="form-group">
								<label>上传质检单附件:（.doc .pdf）</label>
								<div class="input-group">
									<input type="file" name="fileUpload"/>
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