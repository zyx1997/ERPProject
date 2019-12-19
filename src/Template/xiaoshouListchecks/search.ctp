                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        销售订单审核
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/xiaoshouListchecks/index"><i class="fa fa-dashboard"></i>销售管理</a></li>
                        <li class="active">销售订单审核</li>
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
											<th>订货单位名称</th>
											<th>发货日期</th>
											<th>收货单位</th>
											<th>审批人</th>
											<th>审批时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
										<?php foreach ($result as $xiaoshouList): ?>
										<tr>
										<td><?= $xiaoshouList['x_id'] ?></td>
										<td><?= $xiaoshouList['h_id']?></td>
										<td><?= $xiaoshouList['hetong_id']?></td>
										<?php if($xiaoshouList['dh_type'] == 0){ ?>
										<td><a target="_blank" href="/projectERP/jingxiaoXinxis/view/<?= $xiaoshouList['dh_id'] ?>"><?= $xiaoshouList['dh_name'] ?></a></td>
										<?php }elseif($xiaoshouList['dh_type'] == 1){ ?>
										<td><a href="/projectERP/yiyuanXinxis/view/<?= $xiaoshouList['dh_id'] ?>"><?= $xiaoshouList['dh_name'] ?></a></td>
										<?php }else{ ?>
										<td><a href="/projectERP/qitaXinxis/view/<?= $xiaoshouList['dh_id'] ?>"><?= $xiaoshouList['dh_name'] ?></a></td>
										<?php } ?>
										<td><?php if($xiaoshouList['fahuodate']!=null){echo $xiaoshouList['fahuodate']->format('Y-m-d');}else{echo "";}?></td>
										<td><?= $xiaoshouList['shouhuodanwei'] ?></td>
										<?php if($xiaoshouList['isshenhe']==0){ ?>
											<td><span class="label label-warning">未审核</span></td>
											<td></td>
										<?php }elseif($xiaoshouList['shenheok']==1){ ?> 
											<td><span class="label label-success">已审核（<?php echo $xiaoshouList['shenheren'] ?>）</span></td> 
											<td><?= $xiaoshouList['shenhe_time']->format('Y-m-d H:m:s') ?></td>
										<?php }elseif($xiaoshouList['shenheok']==0){ ?> 
											<td><span class="label label-danger">已驳回（<?php echo $xiaoshouList['shenheren'] ?>）</span></td>
											<td><?= $xiaoshouList['shenhe_time']->format('Y-m-d H:m:s') ?></td>
										<?php } ?>
										<td>
											<?php if($xiaoshouList['isshenhe'] == 0){ echo $this->Html->link('审核', ['action' => 'check', $xiaoshouList['id']]); 
											}else{ echo $this->Html->link('审核意见', ['action' => 'checkresult', $xiaoshouList['id']]); } ?>
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
									<a href="/projectERP/xiaoshouListchecks/index" class="btn btn-warning pull-left"><i class="glyphicon glyphicon-backward"></i> 返回</a>
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->