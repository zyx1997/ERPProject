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
                                    <h3 class="box-title">销售订单</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
									<!-- 分页下拉框 -->
									<div class="pull-left">
										<?php echo $this->Paginator->limitControl([2 => 2, 10 => 10, 20 => 20, 50 => 50, 100 => 100]); ?>
									</div><!-- ./分页下拉框 -->
                                    <!-- search form -->
                                    <div class="search-form margin">
                                        <form method="post" action="/projectERP/xiaoshouLists/search" class="text-right">
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <div class="btn-group">
														<div>
															销售订单编号：<input type="text" name="x_id" />
															合同编号：<input type="text" name="hetong_id" />
															收货单位：<input type="text" name="shouhuodanwei" />
															<button type="submit" name="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>
														</div>
                                                    </div><!-- ./btn-group -->
                                                </div>
                                            </div>
                                        </form>
                                    </div><!-- /.search-form -->
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
											<th>销售订单编号</th>
                                            <th>合同评审编号</th>
											<th>合同编号</th>
											<th>订货单位名称</th>
											<th>发货日期</th>
											<th>收货单位</th>
											<th>审批人</th>
											<th>审批时间</th>
											<th>操作人</th>
											<th>操作时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
										<?php foreach ($xiaoshouLists as $xiaoshouList): ?>
										<tr>
										<td><?= $xiaoshouList->x_id ?></td>
										<td><?= $xiaoshouList->h_id?></td>
										<td><?= $xiaoshouList->hetong_id?></td>
										<?php if($xiaoshouList->dh_type == 0){ ?>
										<td><a target="_blank" href="/projectERP/jingxiaoXinxis/view/<?= $xiaoshouList['dh_id'] ?>"><?= $xiaoshouList->dh_name ?></a></td>
										<?php }elseif($xiaoshouList->dh_type == 1){ ?>
										<td><a href="/projectERP/yiyuanXinxis/view/<?= $xiaoshouList['dh_id'] ?>"><?= $xiaoshouList->dh_name ?></a></td>
										<?php }else{ ?>
										<td><a href="/projectERP/qitaXinxis/view/<?= $xiaoshouList['dh_id'] ?>"><?= $xiaoshouList->dh_name ?></a></td>
										<?php } ?>
										<td><?php if($xiaoshouList->fahuodate!=null){echo $xiaoshouList->fahuodate->format('Y-m-d');}else{echo "";}?></td>
										<td><?= $xiaoshouList->shouhuodanwei ?></td>
										<?php if($xiaoshouList->istijiao==0){ ?>
											<td><span class="label label-default">未提交审核</span></td>
											<td></td>
										<?php } elseif($xiaoshouList->isshenhe == 0){ ?>
											<td><span class="label label-warning">已提交审核</span></td>
											<td></td>
										<?php } elseif($xiaoshouList->shenheok == 1){ ?> 
											<td><span class="label label-success">已审批（<?= $Shenpirens[$xiaoshouList->id] ?>）</span></td> 
											<td><?= $xiaoshouList->shenhe_time->format('Y-m-d H:m:s')?></td>
										<?php } elseif($xiaoshouList->shenheok == 0){ ?> 
											<td><span class="label label-danger">已驳回（<?= $Shenpirens[$xiaoshouList->id] ?>）</span></td>
											<td><?= $xiaoshouList->shenhe_time->format('Y-m-d H:m:s')?></td>
										<?php } ?>
										<td><?=$Users[$xiaoshouList->id] ?></td>
										<td><?= $xiaoshouList->time->format('Y-m-d H:m:s')?></td>
										<td>
											<?php if( $xiaoshouList->istijiao==0 || ( $xiaoshouList->isshenhe == 1 && $xiaoshouList->shenheok == 0 ) ){ 
											echo $this->Html->link('销售订单管理', ['action' => 'manage', $xiaoshouList->id]); 
											}else{ 
											echo $this->Html->link(' 销售订单查看', ['action' => 'view', $xiaoshouList->id]); 
											}?>
										</td>
										</tr>
										<?php endforeach; ?>
                                        </tbody>
                                    </table><!-- /.table -->
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
								<div class="box-footer clearfix no-border">
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->