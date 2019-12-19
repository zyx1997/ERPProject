        <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        选择生产计划
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/shengchanBuliaos/index"><i class="fa fa-dashboard"></i> 生产领料</a></li>
                        <li class="active">补料单</li>
                    </ol>
                </section>

				<!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">生产计划表</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
											<th>生产计划编号</th>
                                            <th>生产计划名称</th>
											<th>成品编号</th>
											<th>成品名称</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($shengchanPaiqis as $shengchanPaiqi): ?>
										<tr class="editable">
											<td><?=$shengchanPaiqi->jid?></td>
                                            <td><?=$shengchanPaiqi->name?></td>
											<td><?=$shengchanPaiqi->mid?></td>
                                            <td><?=$shengchanPaiqi->chengpinname?></td>
											<td>
												<?= $this->Html->link('选择', ['action' => 'additem', $shengchanPaiqi->mid, $shengchanPaiqi->jid]) ?>
											</td>
                                        </tr>
										<?php endforeach; ?>
                                        </tbody>
                                    </table><!-- /.table -->
                                </div><!-- /.box-body-->
                                
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->