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
									<?php if($result==NULL){ echo "没有匹配结果"; }
									else{ ?>
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
										<?php foreach ($result as $shengchanShishi): ?>
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
									<?php } ?>
                                </div><!-- /.box-body-->
								<div class="box-footer clearfix no-border">
									<a href="/projectERP/chengpinShengchanrukuchecks/index" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-backward"></i> 返回</a>
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->