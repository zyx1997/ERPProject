         <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        选择物料
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
                                    <h3 class="box-title">物料信息</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
											<th>物料编号</th>
                                            <th>物料名称</th>
											<th>需要数量</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($chengpinSecondlevels as $chengpinSecondlevel): ?>
										<tr class="editable">
											<td><?=$chengpinSecondlevel->secondid?></td>
                                            <td><?=$chengpinSecondlevel->secondlevel?></td>
											<td><?=$chengpinSecondlevel->number?></td>
											<td>
												<?= $this->Html->link('选择', ['action' => 'add', $chengpinSecondlevel->secondid, $jid]) ?>
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