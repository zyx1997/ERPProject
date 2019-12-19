        <section class="content-header">
            <h1>
                销售订单管理审核
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/xiaoshouListchecks/index"><i class="fa fa-dashboard"></i>销售管理</a></li>
                <li class="active">销售订单管理审核</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
				<form method="post" class="box box-primary" accept-charset="utf-8" enctype="multipart/form-data" action="/projectERP/xiaoshouListchecks/check/<?= $xiaoshouList['id']; ?>"  style="width: 100%; ">
                    <div class="box-body">
                        <div class="col-xs-12">
							<div class="box-body">
								<div class="box-body"  style="width:90%;margin: auto;" >
									<div class="box-header">margin: 0px auto;
                                <h3 class="box-title">合同表信息</h3>
                            </div>
                            <table class="table table-bordered table-hover" style="text-align: left;">
								<thead>
                                <tr>
                                    <th>评审对象</th>
                                    <th>编号</th>
									<th>订货单位</th>
                                    <th>发货地址</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
									<td><?= $hetongList->duixiang ?></td>
									<td><?= $hetongList->h_id?></td>
									<td><?= $hetongList->dh_name?></td>
									<td><?= $hetongList->delivery_addr?></td>
                                </tr>
                                </tfoot>
								<thead>
                                <tr>
                                    <th>交货方式</th>
                                    <th>质保期</th>
									<th>产品合计(元)</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
									<td>
										<?= $hetongList->jiaohuofangshi ?> 
										<?php if($hetongList->jiaohuofangshi_beizhu != NULL ){ echo ":".$hetongList->jiaohuofangshi_beizhu; } ?>
									</td>
									<td><?= $hetongList->zhibaoqi?></td>
									<td><?= $hetongList->heji_totalprice?></td>
                                </tr>
                                </tfoot>
                            </table>
							
							
							<!-- 合同单产品列举 -->
									<div class="box-header" style="margin-top: 20px;">
										<h3 class="box-title">产品清单</h3>
									</div>
									<div class="row">
									<?php foreach ($hetongListAlls as $hetongListAll): ?>
										<div class="col-md-5">
											<div class="box-body">
												<table class="table table-bordered table-hover" style="text-align:center;">
													<thead>
														<tr>
															<th colspan="4" style="text-align:center;"><?= $hetongListAll->name ?></th>
														</tr>
													</thead>
													<thead>
														<tr>
															<th style="text-align:center;">产品信息</th>
															<th style="text-align:center;">编号</th>
															<th style="text-align:center;">名称</th>
															<th style="text-align:center;">数量</th>
														</tr>
													</thead>
													<tbody>
														<tr class="editable">
															<td>成品</td>
															<td><?= $hetongListAll->mid ?></td>
															<td><?= $hetongListAll->mname ?></td>
															<td><?= $hetongListAll->mnumber ?></td>
														</tr>
														<tr>
															<td rowspan="<?= $peitaoitemsCount[$hetongListAll['peitaoid']]+1 ?>">附件</td>
														</tr>
														<?php foreach ($chengpinPeitaoitems[$hetongListAll['peitaoid']] as $chengpinPeitaoitem): ?>
														<tr class="editable">
															<td><?= $chengpinPeitaoitem->fujianid ?></td>
															<td><?= $chengpinPeitaoitem->fujianname ?></td>
															<td><?= $chengpinPeitaoitem->fujiannumber ?></td>
														</tr>
														<?php endforeach; ?><!-- /.列举完所有附件 -->
														<tr class="editable">
															<td>参考价格（套）</td>
															<td colspan="3"><?= $hetongListAll->cankaojiage ?></td>
														</tr>
													</tbody>
												</table><!-- /.table -->
											</div><!-- /.box-body -->
										</div><!-- /.col -->
									<?php endforeach; ?><!-- /.列举完所有配套 -->
									</div><!-- /.row -->
									
									
                            <div class="box-header">
                                <h3 class="box-title">销售订单信息</h3>
                            </div>
                            <table class="table table-bordered table-hover" style="text-align: left;">
                                <thead>
                                <tr>
                                    <th>销售订单编号</th>
                                    <th>合同评审编号</th>
									<th>合同编号</th>
                                    <th>交货方式</th>
                                </tr>
                                </thead>
                                <tbody>
								<tr>
									<td><?= $xiaoshouList->x_id ?></td>
									<td><?= $xiaoshouList->h_id?></td>
									<td><?= $xiaoshouList->hetong_id?></td>
									<td>
										<?= $xiaoshouList->jiaohuofangshi ?>
										<?php if($xiaoshouList->jiaohuofangshi == "款到发货(限天数)" ){ 
										echo ":".$xiaoshouList->jiaohuofangshi_tianshu; 
										} elseif($xiaoshouList->jiaohuofangshi == "其他"  ){ 
										echo ":".$xiaoshouList->jiaohuofangshi_qita; } ?>
									</td>
								</tr>
								</tfoot>
								<thead>
                                <tr>
									<th>发货日期</th>
									<th>发货地点</th>
									<th>发货人</th>
									<th>运输方式</th>
                                </tr>
                                </thead>
								<tbody>
								<tr>
									<td><?php if($xiaoshouList->fahuodate!=null){echo $xiaoshouList->fahuodate->format('Y-m-d');}else{echo "";}?></td>
									<td><?= $xiaoshouList->fahuoplace?></td>
									<td><?= $xiaoshouList->fahuoren?></td>
									<td>
										<?php 
										if($xiaoshouList->yuunshufangshi=="自提"){ echo "自提(".$xiaoshouList->tihuoren.")"; } 
										elseif ($xiaoshouList->yuunshufangshi=="送货"){ echo "送货(".$xiaoshouList->songhuoren.")"; }
										elseif ($xiaoshouList->yuunshufangshi=="物流"){ echo "物流(".$xiaoshouList->wuliucompany.$xiaoshouList->wuliudanhao.")"; }
										else { echo ""; } 
										?>
									</td>
								</tr>
								</tfoot>
								<thead>
                                <tr>
									<th>预计到货日期</th>
									<th>收货单位</th>
									<th>收货联系人</th>
									<th>收货联系电话</th>
                                </tr>
                                </thead>
								<tbody>
								<tr>
									<td><?php if($xiaoshouList->target_daohuodate!=null){echo $xiaoshouList->target_daohuodate->format('Y-m-d');}else{echo "";}?></td>
									<td><?= $xiaoshouList->shouhuodanwei ?></td>
									<td><?= $xiaoshouList->shouhuoren ?></td>
									<td><?= $xiaoshouList->shouhuodianhua ?></td>
								</tr>
								</tfoot>
								<thead>
                                <tr>
									<th>收货地址</th>
									<th>收货备注</th>
                                </tr>
                                </thead>
								<tbody>
								<tr>
									<td><?= $xiaoshouList->shouhuodizhi ?></td>
									<td><?= $xiaoshouList->shouhuo_beizhu ?></td>
								</tr>
								</tfoot>
                            </table>
                            <div class="form-group" style="text-align: center;">
                                <div style="margin: 10px auto;">
                                    <label>
                                        <input style="margin: 3px;" type="radio" name="shenheok" value="1" class="minimal" checked/> 通过
                                    </label>
                                    <label>
                                        <input style="margin: 3px;" type="radio" name="shenheok" value="0" class="minimal"/>  驳回
                                    </label>
                                </div>
                            </div>
							<div class="box-header">
								<h3 class="box-title">审核备注</h3>
							</div>
							<div class="box-body"  style="width:90%;margin: auto;text-align: center">
								<textarea id="shenhe_beizhu" name="shenhe_beizhu" style="width:90%;margin: auto;"></textarea>
							</div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->