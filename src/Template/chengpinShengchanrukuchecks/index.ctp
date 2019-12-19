                    <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        成品质检
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/chengpinShengchanrukuchecks/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                        <li class="active">成品质检</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">明细汇总表</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <!-- search form -->
                                    <!-- 分页下拉框 -->
									<div class="pull-left">
										<?php echo $this->Paginator->limitControl([2 => 2, 10 => 10, 20 => 20, 50 => 50, 100 => 100]); ?>
									</div><!-- ./分页下拉框 -->
									<!-- search form -->
                                    <div class="search-form margin">
                                        <form method="post" action="/projectERP/chengpinShengchanrukuchecks/search" class="text-right">
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <div class="btn-group">
														<div>
															编号：<input type="text" name="mid" />
															产品名称：<input type="text" name="name" />
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
                                            <th>编号</th>
                                            <th>产品名称</th>
                                            <th>机器编号</th>
											<th>生产批号</th>
											<th>生产日期</th>
											<th>状态</th>
                                            <th>质检时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($shengchanShishis as $shengchanShishi): ?>
										<tr>
										<td>
											<?= $shengchanShishi->mid ?>
										</td>
										<td>
											<?= $shengchanShishi->mname?>
										</td>
										<td>
											<?= $shengchanShishi->onlyid?>
										</td>
										<td>
											<?= $shengchanShishi->pihao?>
										</td>
										<td>
											<?php if($shengchanShishi->shengchandate) echo $shengchanShishi->shengchandate->format('Y-m-d'); ?>
										</td>
										<td>
										<?php 
											if($shengchanShishi->iszhijian==0){echo "<span class='label label-warning'>待质检</span>";}
											if($shengchanShishi->iszhijian==1){
												if($shengchanShishi->zhijianresult==1)
													echo "<span class='label label-success'>已质检(".$shengchanShenpis[$shengchanShishi->id].")</span>";
												else
													echo "<span class='label label-danger'>已驳回</span>";
												
											}
										?>
										</td>
										<td>
											<?php if($shengchanShishi->iszhijian==1) { ?>
											<?= $shengchanShishi->time->format('Y-m-d H:m:s')?>
											<?php } ?>
										</td>
										<td>
											<?php if($shengchanShishi->iszhijian==0) { ?>
											<?= $this->Html->link('质检', ['action' => 'check', $shengchanShishi->id]) ?>
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