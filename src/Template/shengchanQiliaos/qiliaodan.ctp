                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        齐料清单
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/shengchanQiliaos/index"><i class="fa fa-dashboard"></i> 生产领料</a></li>
                        <li class="active">齐料单</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
								<div class="box-body table-responsive">
									<table class="table table-bordered table-hover" style="margin-bottom: 30px;">
										<thead>
										<tr>
											<th>生产排期单号</th>
                                            <th>生产排期名称</th>
											<th>计划开始时间</th>
											<th>实际开始时间</th>
											<th>计划结束时间</th>
											<th>实际结束时间</th>
											<th>计划生产数量</th>
											<th>实际生产数量</th>
											<th>审批人</th>
											<th>审批时间</th>
										</tr>
										</thead>
										<tbody>
										<tr>
											<td><?= $shengchanPaiqi->jid ?></td>
											<td><?= $shengchanPaiqi->name?></td>
											<?php if($shengchanPaiqi->jihuakaishidate != null){ ?> 
												<td><?= $shengchanPaiqi->jihuakaishidate->format('Y-m-d') ?></td>
											<?php }else{ ?> 
												<td></td>
											<?php } ?> 
											<?php if($shengchanPaiqi->shijikaishidate != null){ ?> 
												<td><?= $shengchanPaiqi->shijikaishidate->format('Y-m-d') ?></td>
											<?php }else{ ?> 
												<td></td>
											<?php } ?> 
											<?php if($shengchanPaiqi->jihuajieshudate != null){ ?> 
												<td><?= $shengchanPaiqi->jihuajieshudate->format('Y-m-d') ?></td>
											<?php }else{ ?> 
												<td></td>
											<?php } ?> 
											<?php if($shengchanPaiqi->shijijieshudate != null){ ?> 
												<td><?= $shengchanPaiqi->shijijieshudate->format('Y-m-d') ?></td>
											<?php }else{ ?> 
												<td></td>
											<?php } ?> 
											<td><?= $shengchanPaiqi->jihuaquantity ?></td>
											<td><?= $shengchanPaiqi->shijiquantity ?></td>
											<td><?= $shengchanPaiqi->shenpiren ?></td>
											<td><?= $shengchanPaiqi->shenpitime->format('Y-m-d H:m:s') ?></td>
										</tr>
										</tfoot>
									</table>
								</div><!-- /.box-body-->
								<div class="box-header">
                                    <h3 class="box-title">物料清单</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
									<table class="table table-bordered table-hover">
										<thead>
										<tr>
											<th  style="text-align:center">编号</th>
											<th  style="text-align:center">产品名称</th>
										</tr>
										</thead>
										<tbody>
										<tr>
											<td><?= $shengchanPaiqi->mid ?></td>
											<td><?= $shengchanPaiqi->chengpinname ?></td>
										</tr>
										</tfoot>
									</table>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
											<th>一级分类名称</th>
                                            <th>二级分类名称</th>
                                            <th>所需数量</th>
											<th>原材料库存</th>
											<th>短缺</th>
											<th>备料 / 领料</th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($shengchanQiliaoFirsts as $shengchanQiliaoFirst): ?>
											<?php 
											$count = 0;
											$cur = 0;
											$canBeiliao = true;
											$isbeiliao = $shengchanQiliaoFirst['isbeiliao'];
											$islingliao = $shengchanQiliaoFirst['islingliao'];
											foreach ($shengchanQiliaoSeconds[$shengchanQiliaoFirst['firstlevel']] as $shengchanQiliaoSecond): 
											$count++;
											endforeach; 
											?>
											
											<tr>
												<td rowspan="<?= $count+1 ?>"><?= $shengchanQiliaoFirst['firstlevel'] ?></td>
											</tr>
											<?php
											foreach ($shengchanQiliaoSeconds[$shengchanQiliaoFirst['firstlevel']] as $shengchanQiliaoSecond): ?>
											<tr>
												<td><?= '( '.$shengchanQiliaoSecond['secondid'].' ) '.$shengchanQiliaoSecond['secondlevel']?></td>
												<?php 
												$cur++;
												$singleConsumeNum = $shengchanQiliaoSecond['singleConsumeNum'];
												$consumeGeshu = $shengchanQiliaoSecond['shijiquantity'];
												$allNeedNum = $shengchanQiliaoSecond['allNeedNum'];
												$currentKucun = $shengchanQiliaoSecond['currentKucun'];
												$afterKucun = $currentKucun - $allNeedNum;
												$isduanque = $shengchanQiliaoSecond['isduanque'];
												$styleNegative = '<span style="color:red;">';
												$stylePositive = '<span style="color:green;">';
												
												// 所需数量
												echo '<td>'.$allNeedNum.' = '.$singleConsumeNum.' * '.$consumeGeshu.'</td>';
												
												// 原材料库存
												if( $islingliao == 1 || $isbeiliao == 1 ) { 
													echo '<td>'.$currentKucun.' ( 已备料 '.$allNeedNum.' )</td>'; 
												}else{
													if( $afterKucun < 0 ) { 
														$canBeiliao = false;
														echo '<td>'.$styleNegative.$currentKucun.'</span>'.$styleNegative.' ( 若备料 '.$afterKucun.' )</span></td>'; 
													} elseif( $afterKucun == 0 ) { 
														echo '<td>'.$stylePositive.$currentKucun.'</span>'.$styleNegative.' ( 若备料 '.$afterKucun.' )</span></td>'; 
													} else { 
														echo '<td>'.$stylePositive.$currentKucun.'</span>'.$stylePositive.' ( 若备料 '.$afterKucun.' )</span></td>'; 
													}
												}
												?>
												
												<!-- /.短缺 -->	
												<?php if( $isduanque == 0 ) { ?>
												<td><?= $this->Html->link('短缺', ['action' => 'duanque', $shengchanQiliaoSecond['id'] ]) ?></td>
												<?php } else { ?>
												<td>已申请</td>
												<?php } ?>
												
												<!-- /.备料领料 -->	
												<?php if( $cur == $count ) { ?>
													<td>
													<?php if( $islingliao == 1 ) { 
														echo '已领料( 领料人：'.$shengchanQiliaoFirst['lingliaoren'].' ) </td>';
													} elseif( $isbeiliao == 1 ) {
														echo $this->Form->postLink('取消备料', ['action' => 'cancelBeiliao', $shengchanQiliaoFirst['id'] ]);
														echo $this->Html->link(' 领料', ['action' => 'lingliao', $shengchanQiliaoFirst['id'] ]);
													} elseif( $canBeiliao == true ){ 
														echo $this->Form->postLink('备料', ['action' => 'beiliao', $shengchanQiliaoFirst['id'] ]);
													} else { 
														echo '短缺，无法备料';
													} ?>
													</td>
												<?php } ?>
											</tr>
											<?php endforeach; ?><!-- /.列举完所有二级分类 -->
										<?php endforeach; ?><!-- /.列举完所有一级分类 -->
                                        </tbody>
                                    </table><!-- /.table -->
                                </div><!-- /.box-body-->
								<div class="box-footer clearfix no-border">
									<a href="/projectERP/shengchanQiliaos/index" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-backward"></i> 返回</a>
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->