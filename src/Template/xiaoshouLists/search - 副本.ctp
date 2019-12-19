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
                                    <h3 class="box-title">查询结果</h3>
                                </div><!-- /.box-header -->
								<div class="box-body table-responsive">
									<!-- 分页下拉框 -->
									<div class="pull-left">
										<?php echo $this->Paginator->limitControl([2 => 2, 10 => 10, 20 => 20, 50 => 50, 100 => 100]); ?>
									</div><!-- ./分页下拉框 -->
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
											<th>销售订单编号</th>
                                            <th>合同评审编号</th>
											<th>合同编号</th>
                                            <th>交货方式</th>
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
										<?php foreach ($result as $xiaoshouList): ?>
										<tr>
										<td><?= $xiaoshouList['x_id'] ?></td>
										<td><?= $xiaoshouList['h_id']?></td>
										<td><?= $xiaoshouList['hetong_id']?></td>
										<td>
											<?= $xiaoshouList['jiaohuofangshi'] ?>
											<?php if($xiaoshouList['jiaohuofangshi'] == "款到发货(限天数)" ){ 
											echo ":".$xiaoshouList['jiaohuofangshi_tianshu']; 
											} elseif($xiaoshouList['jiaohuofangshi'] == "其他"  ){ 
											echo ":".$xiaoshouList['jiaohuofangshi_qita']; } ?>
										</td>
										<td><?php if($xiaoshouList['fahuodate']!=null){echo $xiaoshouList['fahuodate']->format('Y-m-d');}else{echo "";}?></td>
										<td><?= $xiaoshouList['shouhuodanwei'] ?></td>
										<?php if($xiaoshouList['isshenhe']==0){ ?>
											<td><span class="label label-warning">未审批</span></td>
											<td></td>
										<?php }elseif($xiaoshouList['shenheok']==1){ ?> 
											<td><span class="label label-success">已审批（<?php echo $xiaoshouList['shenheren'] ?>）</span></td> 
											<td><?= $xiaoshouList['shenhe_time']->format('Y-m-d H:m:s') ?></td>
										<?php }elseif($xiaoshouList['shenheok']==0){ ?> 
											<td><span class="label label-danger">已驳回（<?php echo $xiaoshouList['shenheren'] ?>）</span></td>
											<td><?= $xiaoshouList['shenhe_time']->format('Y-m-d H:m:s') ?></td>
										<?php } ?>
										<td><?= $xiaoshouList['user']?></td>
										<td><?= $xiaoshouList['time']->format('Y-m-d H:m:s')?></td>
										<td>
											<?= $this->Html->link('详情查看', ['action' => 'see', $xiaoshouList['id']]); ?>
											<?php if( $xiaoshouList['isshenhe']==0 || ( $xiaoshouList['isshenhe']==1 && $xiaoshouList['shenheok'] == 0) ){ 
												if( $xiaoshouList['hetong_id'] == NULL ){echo $this->Html->link(' 添加发货运输信息', ['action' => 'add', $xiaoshouList['id']]);}
												else{ echo $this->Html->link(' 修改发货运输信息', ['action' => 'modify', $xiaoshouList['id']]); } 
											} ?>
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
									<a href="/projectERP/xiaoshouLists/index" class="btn btn-warning pull-left"><i class="glyphicon glyphicon-backward"></i> 返回</a>
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->