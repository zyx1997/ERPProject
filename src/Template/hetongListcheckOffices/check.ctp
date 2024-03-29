        <section class="content-header">
            <h1>
                合同审核（办公室）
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/hetongListcheckOffices/index"><i class="fa fa-dashboard"></i>合同评审</a></li>
                <li class="active">合同审核（办公室）</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
				<form method="post" class="box box-primary" accept-charset="utf-8" enctype="multipart/form-data" action="/projectERP/hetongListcheckOffices/check/<?= $hetongList['id']; ?>"  style="width: 95%; margin: 0px auto;">
                    <div class="box-body">
                        <div id="item_info" class="col-xs-12">
                            <div class="box-header">
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
									<?php if($hetongList->dh_type == 0){ ?>
									<td><a target="_blank" href="/projectERP/jingxiaoXinxis/view/<?= $hetongList['dh_id'] ?>"><?= $hetongList->dh_name ?></a></td>
									<?php }elseif($hetongList->dh_type == 1){ ?>
									<td><a href="/projectERP/yiyuanXinxis/view/<?= $hetongList['dh_id'] ?>"><?= $hetongList->dh_name ?></a></td>
									<?php }else{ ?>
									<td><a href="/projectERP/qitaXinxis/view/<?= $hetongList['dh_id'] ?>"><?= $hetongList->dh_name ?></a></td>
									<?php } ?>
									<td><?= $hetongList->delivery_addr?></td>
                                </tr>
                                </tfoot>
								<thead>
                                <tr>
                                    <th>交货方式</th>
                                    <th>质保期</th>
									<th>产品合计(元)</th>
									<th>审批状态</th>
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
									<?php if($hetongList->isshenhe_office==0){ ?>
										<td><span class="label label-warning">未审批</span></td>
									<?php } elseif($hetongList->shenheok_office==1){ ?> 
										<td><span class="label label-success">已审批</span></td> 
									<?php } elseif($hetongList->shenheok_office==0){ ?> 
										<td><span class="label label-danger">已驳回</span></td>
									<?php } ?>
                                </tr>
                                </tfoot>
                            </table>
							<table class="table table-bordered table-hover" style="margin-bottom: 30px;">
								<thead>
								<tr>
									<th>备注</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td><?= $hetongList->beizhu ?></td>
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
															<td><?= $chengpinPeitaos[$hetongListAll['ptid']]->mid ?></td>
															<td><?= $chengpinPeitaos[$hetongListAll['ptid']]->mname ?></td>
															<td><?= $chengpinPeitaos[$hetongListAll['ptid']]->mnumber ?></td>
														</tr>
														<tr>
															<td rowspan="<?= $peitaoitemsCount[$hetongListAll['ptid']]+1 ?>">附件</td>
														</tr>
														<?php foreach ($chengpinPeitaoitems[$hetongListAll['ptid']] as $chengpinPeitaoitem): ?>
														<tr class="editable">
															<td><?= $chengpinPeitaoitem->fujianid ?></td>
															<td><?= $chengpinPeitaoitem->fujianname ?></td>
															<td><?= $chengpinPeitaoitem->fujiannumber ?></td>
														</tr>
														<?php endforeach; ?><!-- /.列举完所有附件 -->
														<tr class="editable">
															<td>参考价格（套）</td>
															<td colspan="3"><?= $hetongListAll->peitaojiage ?></td>
														</tr>
													</tbody>
												</table><!-- /.table -->
											</div><!-- /.box-body -->
										</div><!-- /.col -->
									<?php endforeach; ?><!-- /.列举完所有配套 -->
									</div><!-- /.row -->
							
							<?php if( strstr($hetongList['pingshenbumen_target'],"2")!=false){ ?>
                            <div class="form-group" style="text-align: center;margin-top: 40px;">
                                <div style="margin: 10px auto;">
                                    <label>
                                        <input style="margin: 3px;" type="radio" name="shenheok_office" value="1" class="minimal" checked="" /> 通过
                                    </label>
                                    <label>
                                        <input style="margin: 3px;" type="radio" name="shenheok_office" value="0" class="minimal" />  驳回
                                    </label>
                                </div>
                            </div>
							<div class="box-header">
								<h3 class="box-title">审核备注</h3>
							</div>
							<div class="box-body"  style="width:90%;margin: auto;text-align: center">
								<textarea name="shenhe_beizhu_office" style="width:90%;margin: auto;"></textarea>
							</div>
							<?php } ?>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交" class="btn btn-primary btn-sm" style="margin: 45px auto"></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->