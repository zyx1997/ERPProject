                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        成品初始化登记
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/chengpinInitials/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                        <li class="active">成品初始化登记</li>
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
									<?php if($result==NULL){ echo "没有匹配结果"; }
									else{ ?>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>编号</th>
                                            <th>产品名称</th>
											<th>是否为附件</th>
                                            <th>型号</th>
                                            <th>单位</th>
                                            <th>物料描述</th>
                                            <th>位置</th>
											<th>库存数量</th>
                                            <th>操作人</th>
                                            <th>操作时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($result as $chengpinInitial): ?>
										<tr>
										<td>
											<?= $chengpinInitial->mid ?>
										</td>
										<td>
											<?= $chengpinInitial->name?>
										</td>	
										<td>
											<?php if($chengpinInitial->isfujian==1){echo "是";} if($chengpinInitial->isfujian==0){echo "否";} ?>
										</td>
										<td>
											<?= $chengpinInitial->xinghao?>
										</td>
										<td>
											<?= $chengpinInitial->danwei?>
										</td>
										<td>
											<?= $chengpinInitial->miaoshu?>
										</td>
										<td>
											<?= $chengpinInitial->weizhi?>
										</td>
										<td>
											<?= $chengpinInitial->number?>
										</td>
										<td>
											<?= $chengpinUsers[$chengpinInitial->id] ?>
										</td>
										<td>
											<?= $chengpinInitial->time->format('Y-m-d H:m:s')?>
										</td>
										<td>
											<?= $this->Html->link('补录', ['action' => 'add', $chengpinInitial->id]) ?>
										</td>
										</tr>
										<?php endforeach; ?>
                                        </tbody>
                                    </table><!-- /.table -->
									<?php } ?>
                                </div><!-- /.box-body-->
								<div class="box-footer clearfix no-border">
									<a href="/projectERP/chengpinInitials/index" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-backward"></i> 返回</a>
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->