                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        齐料单
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/shengchanQiliaoreads/index"><i class="fa fa-dashboard"></i> 生产领料</a></li>
                        <li class="active">齐料单</li>
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
                                            <th>单号</th>
                                            <th>名称</th>
											<th>计划开始时间</th>
											<th>实际开始时间</th>
											<th>计划结束时间</th>
											<th>实际结束时间</th>
											<th>计划生产数量</th>
											<th>实际生产数量</th>
											<th>审批人</th>
											<th>审批时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($result as $shengchanPaiqi): ?>
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
										<td><?= $shengchanPaiqi->jihuaquantity?></td>
										<td><?= $shengchanPaiqi->shijiquantity?></td>
										<td>
											<?php 
												if($shengchanPaiqi->isshenpi==0){echo "<span class='label label-warning'>未审批</span>";}
												if($shengchanPaiqi->isshenpi==1){
													if($shengchanPaiqi->shenpiresult==1)
														echo "<span class='label label-success'>已审批($shengchanPaiqi->shenpiren)</span>";
													else
														echo "<span class='label label-danger'>已驳回($shengchanPaiqi->shenpiren)</span>";
												}
											?>
                                        </td>
										<td><?php if($shengchanPaiqi->isshenpi==1){echo $shengchanPaiqi->shenpitime->format('Y-m-d H:m:s');}else{echo "";} ?></td>
										<td>
											<span class='label label-primary'>备料(<?= $shengchanPaiqi->beiliao_number ?>/<?= $shengchanPaiqi->yiji_number ?>)</span> 
											<span class='label label-primary'> 领料(<?= $shengchanPaiqi->lingliao_number ?>/<?= $shengchanPaiqi->yiji_number ?>)</span> 
											<?php echo $this->Html->link(' 齐料清单', ['action' => 'qiliaodan', $shengchanPaiqi->jid]); ?>
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
									<a href="/projectERP/shengchanQiliaoreads/index" class="btn btn-warning"><i class="glyphicon glyphicon-backward"></i> 返回</a>
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->