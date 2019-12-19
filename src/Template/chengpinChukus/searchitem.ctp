        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                查询产品结果
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
                                    <h3 class="box-title">查询结果</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
									<?php if($result==NULL){ echo "没有匹配结果"; }
									else{ ?>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
											<th>产品编号</th>
                                            <th>产品名称</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($result as $chengpinInitial): ?>
										<tr class="editable">
											<td><?= $chengpinInitial->mid ?></td>
                                            <td><?= $chengpinInitial->name ?></td>
											<td>
											<?= $this->Html->link('选择', ['action' => 'addonlyid', $chengpinInitial->mid, $oid]) ?>
											
											</td>
                                        </tr>
										<?php endforeach; ?>
                                        </tbody>
                                    </table><!-- /.table -->
									<?php } ?>
                                </div><!-- /.box-body-->
								<div class="box-footer clearfix no-border">
									<a href="/projectERP/chengpinChukus/additem/<?= $oid ?>" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-backward"></i> 返回</a>
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->