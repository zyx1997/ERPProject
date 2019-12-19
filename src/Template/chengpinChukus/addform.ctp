        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                添加出库单
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/chengpinChukus/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                <li class="active">成品出库</li>
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
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
											<th>销售订单编号</th>
                                            <th>合同编号</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($xiaoshouLists as $xiaoshouList): ?>
										<tr class="editable">
											<td><?=$xiaoshouList->x_id?></td>
                                            <td><?=$xiaoshouList->hetong_id?></td>
											<td>
												<?= $this->Html->link('选择', ['action' => 'add',$xiaoshouList->x_id, $xiaoshouList->hetong_id]) ?>
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