                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        销售订单管理
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/xiaoshouLists/index"><i class="fa fa-dashboard"></i>销售管理</a></li>
                        <li class="active">销售订单管理</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
								<div class="box-header">
									<h3 class="box-title">
									销售订单信息
									<?php if( $xiaoshouList->hetong_id == NULL ){ ?>
									<a href="/projectERP/xiaoshouLists/add/<?= $xiaoshouList['id'] ?>" class="btn btn-primary btn-sm" style="margin-left:10px;color:white;"><i class="fa fa-plus"></i> 添加发货运输信息</a>
									<?php }else{ ?>
									<a href="/projectERP/xiaoshouLists/modify/<?= $xiaoshouList['id'] ?>" class="btn btn-primary btn-sm" style="margin-left:10px;color:white;"><i class="fa fa-plus"></i> 修改发货运输信息</a>
									<?php } ?>
									</h3>
								</div>
								<div class="table-responsive" style="width: 98%; margin: 10px auto;">
									<table class="table table-bordered table-hover" style="margin-bottom: 10px;">
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
											<th>审批人</th>
											<th>审批时间</th>
										</tr>
										</thead>
										<tbody>
										<tr>
											<td><?= $xiaoshouList->shouhuodizhi ?></td>
											<td><?= $xiaoshouList->shouhuo_beizhu ?></td>
											<?php if($xiaoshouList->istijiao==0){ ?>
												<td><span class="label label-default">未提交审核</span></td>
												<td></td>
											<?php } elseif($xiaoshouList->isshenhe == 0){ ?>
												<td><span class="label label-warning">已提交审核</span></td>
												<td></td>
											<?php } elseif($xiaoshouList->shenheok == 1){ ?> 
												<td><span class="label label-success">已审批（<?php echo $shenheren ?>）</span></td> 
												<td><?= $xiaoshouList->shenhe_time->format('Y-m-d H:m:s')?></td>
											<?php } elseif($xiaoshouList->shenheok == 0){ ?> 
												<td><span class="label label-danger">已驳回（<?php echo $shenheren ?>）</span></td>
												<td><?= $xiaoshouList->shenhe_time->format('Y-m-d H:m:s')?></td>
											<?php } ?>
										</tr>
										</tfoot>
									</table>
								</div><!-- /.box-body-->
								<div class="box-header" style="margin-top:30px;">
                                    <h3 class="box-title">合同评审信息</h3>
                                </div><!-- /.box-header -->
								<div class="table-responsive" style="width: 98%; margin: 10px auto;">
									<table class="table table-bordered table-hover" style="margin-bottom: 30px;">
										<thead>
										<tr>
											<th>评审对象</th>
                                            <th>合同评审编号</th>
											<th>订货单位</th>
                                            <th>发货地址</th>
                                            <th>交货方式</th>
                                            <th>质保期</th>
											<th>产品合计(元)</th>
										</tr>
										</thead>
										<tbody>
										<tr>
											<td><?= $hetongList->duixiang ?></td>
											<td><?= $hetongList->h_id?></td>
											<?php if($hetongList->dh_type == 0){ ?>
											<td><a target="_blank" target="_blank" href="/projectERP/jingxiaoXinxis/view/<?= $hetongList['dh_id'] ?>"><?= $hetongList->dh_name ?></a></td>
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
								<div class="box-header" style="margin-top:30px;">
                                    <h3 class="box-title">配套产品清单</h3>
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
									<a href="/projectERP/xiaoshouLists/index" class="btn btn-warning btn-sm " style="color:white;" ><i class="glyphicon glyphicon-backward"></i> 返回</a>
									<a href="/projectERP/xiaoshouLists/tijiaoshenhe/<?= $xiaoshouList['id'] ?>" class="btn btn-success" style="margin-left:20px;text-align:center"><i class="fa fa-check"></i> 提交审核</a>
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->