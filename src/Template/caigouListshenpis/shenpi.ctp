        <section class="content-header">
            <h1>
                采购单审批
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/caigouListshenpis/index"><i class="fa fa-dashboard"></i>采购管理</a></li>
                <li class="active">采购单审批</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
				<form method="post" class="box box-primary" accept-charset="utf-8" enctype="multipart/form-data" action="/projectERP/caigouListshenpis/shenpi/<?= $caigouList['l_id']; ?>"  style="width: 90%; margin: 0px auto;">
                    <div class="box-body">
                        <div id="item_info" class="col-xs-12">
                            <div class="box-header">
                                <h3 class="box-title">采购单信息</h3>
                            </div>
                            <table class="table table-bordered table-hover" style="text-align: left;">
                                <thead>
                                <tr>
                                    <th>采购单编号</th>
                                    <th>采购单名称</th>
                                    <th>采购时间</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
									<td><?= $caigouList->l_id ?></td>
									<td><?= $caigouList->l_name ?></td>
									<?php if($caigouList->caigoudate != null){ ?> 
										<td><?= $caigouList->caigoudate->format('Y-m-d') ?></td>
									<?php }else{ ?> 
										<td></td>
									<?php } ?> 
                                </tr>
                                </tfoot>
								<thead>
                                <tr>
									<th>供货方编码</th>
									<th>供货方名称</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
									<td><?= $caigouList->p_id ?></td>
									<td><?= $caigouList->p_name ?></td>
                                </tr>
                                </tfoot>
                            </table>
							
							<!-- 采购单产品列举 -->
							<div class="box-header" style="margin-top: 20px;">
                                <h3 class="box-title">产品清单</h3>
                            </div>
									<table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
											<th>产品编号</th>
                                            <th>产品名称</th>
                                            <th>数量</th>
											<th>单价</th>
											<th>总价</th>
                                            <th>操作人</th>
                                            <th>操作时间</th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($caigouListAlls as $caigouListAll): ?>
										<tr>
										<td><?= $caigouListAll->m_id ?></td>	
										<td><?= $caigouListAll->name ?></td>
										<td><?= $caigouListAll->target_quantity ?></td>
										<td><?= $caigouListAll->target_price ?></td>
										<td><?= $caigouListAll->target_totalprice ?></td>
										<td><?= $caigouListAll->user?></td>
										<td><?= $caigouListAll->time->format('Y-m-d H:m:s')?></td>
										</tr>
										<?php endforeach; ?>
                                        </tbody>
                                    </table><!-- /.table -->
							
                            <div class="box-header" style="margin-top:30px">
                                <h3 class="box-title">审核意见</h3>
                            </div>
                            <table class="table table-bordered table-hover" style="text-align: left;">
                                <thead>
                                <tr>
                                    <th>审核结果</th>
                                    <th>审核人</th>
                                    <th>审核时间</th>
                                    <th>审核备注</th>
                                </tr>
                                </thead>
                                <tbody>
								<tr>
									<td>
									<?php if($caigouList->shenheok==1){ ?> 
									<span class="label label-success">已审核</span>
									<?php } else { ?> 
									<span class="label label-danger">已驳回</span>
									<?php } ?>
									</td>
									<td><?= $caigouList->shenheren ?></td>
									<td><?= $caigouList->shenhe_time->format('Y-m-d H:m:s') ?></td>	
									<td><?= $caigouList->shenhe_beizhu ?></td>
								</tr>
								</tfoot>
                            </table>
                            <div class="form-group" style="text-align: center;margin-top:50px">
                                <div style="margin: 10px auto;">
                                    <label>
                                        <input style="margin: 3px;" type="radio" name="shenpiok" value="1" class="minimal" checked/> 通过
                                    </label>
                                    <label>
                                        <input style="margin: 3px;" type="radio" name="shenpiok" value="0" class="minimal"/>  驳回
                                    </label>
                                </div>
                            </div>
							<div class="box-header">
								<h3 class="box-title">审批备注</h3>
							</div>
							<div class="box-body"  style="width:90%;margin: auto;text-align: center">
								<textarea id="shenhe_beizhu" name="shenpi_beizhu" style="width:90%;margin: auto;"></textarea>
							</div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center;">
                        <input type="submit" value="提交" class="btn btn-primary btn-sm" style="margin: 40px auto;"></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->