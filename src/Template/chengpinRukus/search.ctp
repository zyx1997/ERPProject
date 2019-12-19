                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        成品库附件入库
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/chengpinRukus/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                        <li class="active">成品库附件入库</li>
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
                                            <th>物料描述</th>
											<th>生产日期</th>
											<th>入库日期</th>
											<th>入库数量</th>
											<th>状态</th>
                                            <th>操作人</th>
                                            <th>操作时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($result as $chengpinRuku): ?>
										<tr>
										<td>
											<?= $chengpinRuku['mid'] ?>
										</td>
										<td>
											<?= $chengpinRuku['name']?>
										</td>
										<td>
											<?= $chengpinRuku['miaoshu']?>
										</td>
										<td>
											<?= $chengpinRuku['shengchandate']?>
										</td>
										<td>
											<?= $chengpinRuku['rukudate']?>
										</td>
										<td>
											<?= $chengpinRuku['rukuquantity']?>
										</td>
										<td>
										<?php
											if($chengpinRuku->istijiao==0){
												echo "<span class='label label-warning'>未提交质检</span>";
											}else{
												if($chengpinRuku->iszhijian==0){echo "<span class='label label-warning'>待质检</span>";}
												if($chengpinRuku->iszhijian==1){
													echo "<span class='label label-success'>已质检(".$chengpinShenpis[$chengpinRuku->id].")</span>";
												}
											}
										?>
										</td>
										<td>
											<?= $chengpinUsers[$chengpinRuku->id] ?>
										</td>
										<td>
											<?= $chengpinRuku->time->format('Y-m-d H:m:s')?>
										</td>
										<td>
											<?php if($chengpinRuku->istijiao==0) { ?>
											<?= $this->Html->link('管理', ['action' => 'modify', $chengpinRuku->id]) ?>
											<?= $this->Form->postLink(
												'删除',
												['action' => 'delete', $chengpinRuku->id],
												['confirm' => '确认删除?'])
											?>
											<?php }else{ echo $this->Html->link('查看', ['action' => 'view', $chengpinRuku->id]);} ?>
										</td>
										</tr>
										<?php endforeach; ?>
                                        </tbody>
                                    </table><!-- /.table -->
									<?php } ?>
                                </div><!-- /.box-body-->
								<div class="box-footer clearfix no-border">
									<a href="/projectERP/chengpinRukus/index" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-backward"></i> 返回</a>
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->