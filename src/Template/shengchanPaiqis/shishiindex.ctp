                      <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        生产计划实施
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
                                    <h3 class="box-title">成品列表</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
									<!-- 分页下拉框 -->
									<div class="pull-left">
										<?php echo $this->Paginator->limitControl([2 => 2, 10 => 10, 20 => 20, 50 => 50, 100 => 100]); ?>
									</div><!-- ./分页下拉框 -->
									<!-- search form -->
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>生产批号</th>
											<th>产品名称</th>
                                            <th>生产日期</th>
                                            <th>机器编号</th>
                                            <th>随工单</th>
											<th>质检情况</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php $count=0; foreach ($shengchanShishis as $shengchanShishi): $count++; ?>
										<tr>
										<td>
											<?= $shengchanShishi->pihao ?>
										</td>
										<td>
											<?= $shengchanShishi->mname?>
										</td>	
										<td>
											<?php if($shengchanShishi->shengchandate) echo $shengchanShishi->shengchandate->format('Y-m-d'); ?>
										</td>
										<td>
											<?= $shengchanShishi->onlyid?>
										</td>
										<td>
											<?= $this->Html->link('查看', ['action' => 'suigongdan', $shengchanShishi->id]) ?>
										</td>
										<?php if($shengchanShishi->isbaosong==0){ ?>
										<td>
											<?= $this->Form->postLink(
												'报送质检',
												['action' => 'shishizhijian', $shengchanShishi->id],
												['confirm' => '确认报送?'])
											?>
										</td>
										<?php }else{ ?>
										<td>
											<?php 
												if($shengchanShishi->iszhijian==0){echo "<span class='label label-warning'>未质检</span>";}
												if($shengchanShishi->iszhijian==1){
													if($shengchanShishi->zhijianresult==1)
														echo "<span class='label label-success'>已质检</span>";
													else
														echo "<span class='label label-danger'>已驳回</span>";
												}
											?>
										</td>
										<?php } ?>
										<td>
											<?php  if($shengchanShishi->iszhijian==0||($shengchanShishi->zhijianresult==0&&$shengchanShishi->iszhijian==1)){ ?>
											<?= $this->Html->link('修改', ['action' => 'shishimodify', $shengchanShishi->id]) ?>
											<?= $this->Form->postLink(
												'删除',
												['action' => 'shishidelete', $shengchanShishi->id],
												['confirm' => '确认删除?'])
											?>
											<?php } ?>
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
								<?php if($shengchanPaiqi->shijiquantity != $count ){ ?>
                                <div class="box-footer clearfix no-border">
                                    <a href="/projectERP/shengchanPaiqis/shishiadd/<?=$jid ?>" class="btn btn-warning pull-left"><i class="fa fa-plus"></i> 新增</a>
                                </div>
								<?php } ?>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->