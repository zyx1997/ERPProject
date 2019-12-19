                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        合同评审查看
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
                        <div class="col-xs-12">
                            <div class="box">
								<div class="table-responsive" style="width: 98%; margin: 10px auto;">
									<table class="table table-bordered table-hover" style="margin-bottom: 30px;">
										<thead>
										<tr>
											<th>评审对象</th>
                                            <th>编号</th>
											<th>订货单位</th>
                                            <th>发货地址</th>
                                            <th>交货方式</th>
                                            <th>质保期</th>
											<th>产品合计(元)</th>
											<th>审批状态</th>
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
											<td>
												<?= $hetongList->jiaohuofangshi ?>
												<?php if($hetongList->jiaohuofangshi == "款到发货(限天数)" ){ 
												echo ":".$hetongList->jiaohuofangshi_tianshu; 
												} elseif($hetongList->jiaohuofangshi == "其他"  ){ 
												echo ":".$hetongList->jiaohuofangshi_qita; } ?>
											</td>
											<td><?= $hetongList->zhibaoqi?></td>
											<td><?= $hetongList->heji_totalprice?></td>
											<?php if($hetongList->istijiao==0){ ?>
												<td><span class="label label-default">未提交审核</span></td>
											<?php } elseif($hetongList->isshenhe==0){ ?>
												<td><span class="label label-warning">已提交审核</span></td>
											<?php } elseif($hetongList->isshenhe==1 && $hetongList->pingshenbumen_diss == NULL ){ ?> 
												<td><span class="label label-primary">正在审核</span></td> 
											<?php } elseif($hetongList->isshenhe==1 && $hetongList->pingshenbumen_diss != NULL ){ ?> 
												<td><span class="label label-primary">正在审核（有驳回）</span></td> 
											<?php } elseif($hetongList->isshenhe==2 && $hetongList->shenheok==1 && $hetongList->pingshenbumen_diss == NULL){ ?> 
												<td><span class="label label-success">审核通过</span></td> 
											<?php } elseif($hetongList->isshenhe==2 && $hetongList->pingshenbumen_diss != NULL ){ ?> 
												<td><span class="label label-danger">已驳回</span></td>
											<?php } else{ ?> 
												<td></td>
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
								</div><!-- /.box-body-->
								<div class="box-header">
                                    <h3 class="box-title">
									配套产品清单
									</h3>
                                </div><!-- /.box-header -->
                                <div class="table-responsive" style="width: 98%; margin: 10px auto;">
									<!-- 分页下拉框 -->
									<div class="pull-left">
										<?php echo $this->Paginator->limitControl([2 => 2, 10 => 10, 20 => 20, 50 => 50, 100 => 100]); ?>
									</div><!-- ./分页下拉框 -->
                                    <div class="search-form margin">
                                        
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <div class="btn-group">
														<div>
														</div>
                                                    </div>
                                                </div>
                                            </div>
										
                                    </div>
									<?php foreach ($hetongListAlls as $hetongListAll): ?>
									<div class="row" style="width: 100%; margin: 10px auto;">
										<div class="box box-primary">
											<div class="box-header" data-widget="collapse" data-toggle="tooltip">
												<h3 class="box-title"><?= $hetongListAll->peitaoname ?></h3>
												<div class="box-tools pull-right">
													<button class="btn btn-primary btn-sm" ><i class="fa fa-minus"></i></button>
												</div>
											</div>
											<div class="box-body">
												<table id="<?= $hetongListAll->id ?>" class="box-body table table-bordered table-hover" style="text-align:center;margin-bottom:20px;">
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
															<td>配套价格</td>
															<td colspan="3"><?= $hetongListAll->peitaojiage ?></td>
														</tr>
													</tbody>
												</table><!-- /.table -->
											</div><!-- /.box-body -->
										</div><!-- /.box -->
									</div><!-- /.row -->
									<?php endforeach; ?><!-- /.列举完所有配套 -->
                                </div><!-- /.box-body-->
								<!-- 分页导航 -->
								<div>
									<?= $this->paginator->counter([
										'format' => '  显示 {{start}} 到 {{end}} 项，共 {{count}} 项'
									]) ?>
									<div style="float:right">
										<ul class="pagination">
											<li><?php echo $this->paginator->prev('上一页'); ?></li> 
											<li><?php echo $this->paginator->numbers(array('modulus' => 3)); ?></li>
											<li><?php echo $this->paginator->next('下一页'); ?></li>
										</ul>
									</div>
								</div><!-- /.分页导航 -->
								<div class="clearfix no-border"  style="margin-left: 40%;">
									<a href="/projectERP/hetongLists/index" class="btn btn-warning btn-sm " style="color:white;" ><i class="glyphicon glyphicon-backward"></i> 返回</a>
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->