                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        生产计划
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/shengchanPaiqis/index"><i class="fa fa-dashboard"></i> 生产领料</a></li>
                        <li class="active">生产计划</li>
                    </ol>
                </section>

                 <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">生产排期表</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>单号</th>
                                            <th>名称</th>
                                            <th>成品信息查看</th>
											<th>计划开始时间</th>
											<th>实际开始时间</th>
											<th>计划结束时间</th>
											<th>实际结束时间</th>
											<th>计划生产数量</th>
											<th>实际生产数量</th>
											<th>状态</th>
                                            <th>操作人</th>
                                            <th>操作时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($result as $shengchanPaiqi): ?>
										<tr>
										<td>
											<?= $shengchanPaiqi->jid ?>
										</td>
										<td>
											<?= $shengchanPaiqi->name?>
										</td>
										<td>
											<?= $this->Html->link('查看', ['action' => 'view', $shengchanPaiqi->mid]) ?>
										</td>
										<td>
											<?php if($shengchanPaiqi->jihuakaishidate!=NULL)
												echo $shengchanPaiqi->jihuakaishidate->format('Y-m-d');
											?>
										</td>
										<td>
											<?php if($shengchanPaiqi->shijikaishidate!=NULL)
												echo $shengchanPaiqi->shijikaishidate->format('Y-m-d');
											?>
										</td>
										<td>
											<?php if($shengchanPaiqi->jihuajieshudate!=NULL)
												echo $shengchanPaiqi->jihuajieshudate->format('Y-m-d');
											?>
										</td>
										<td>
											<?php if($shengchanPaiqi->shijijieshudate!=NULL)
												echo $shengchanPaiqi->shijijieshudate->format('Y-m-d');
											?>
										</td>
										<td>
											<?= $shengchanPaiqi->jihuaquantity?>
										</td>
										<td>
											<?= $shengchanPaiqi->shijiquantity?>
										</td>
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
										<td>
											<?= $shengchanPaiqi->user?>
										</td>
										<td>
											<?= $shengchanPaiqi->time->format('Y-m-d H:m:s')?>
										</td>
										<td>
											<?php if($shengchanPaiqi->isshenpi==0||($shengchanPaiqi->isshenpi==1&&$shengchanPaiqi->shenpiresult==0)) { ?>
											<?= $this->Html->link('修改', ['action' => 'modify', $shengchanPaiqi->id]) ?>
											<?= $this->Form->postLink(
												'删除',
												['action' => 'delete', $shengchanPaiqi->id],
												['confirm' => '确认删除?'])
											?>
											<?php } else{ if($shengchanPaiqi->isjieshu==0){ ?>
											<?= $this->Html->link('生产结束', ['action' => 'jieshu', $shengchanPaiqi->mid, $shengchanPaiqi->id]) ?>
											<?php }else{ echo "生产已结束";
											} } ?>
										</td>
										</tr>
										<?php endforeach; ?>
                                        </tbody>
                                    </table><!-- /.table -->
                                </div><!-- /.box-body-->
								
                                <div class="box-footer clearfix no-border">
									<a href="/projectERP/shengchanPaiqis/index" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-backward"></i> 返回</a>
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->