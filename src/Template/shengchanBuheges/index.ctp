                      <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        生产不合格品
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/shengchanBuheges/index"><i class="fa fa-dashboard"></i> 生产领料</a></li>
                        <li class="active">生产不合格品</li>
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
										<td>
											<?= $this->Form->postLink(
												'报送质检',
												['action' => 'shishizhijian', $shengchanShishi->id],
												['confirm' => '确认报送?'])
											?>
										</td>
										<td>
											<?php  if($shengchanShishi->iszhijian==0||($shengchanShishi->zhijianresult==0&&$shengchanShishi->iszhijian==1)){ ?>
											<?= $this->Html->link('查看', ['action' => 'view', $shengchanShishi->id]) ?>
											
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
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->