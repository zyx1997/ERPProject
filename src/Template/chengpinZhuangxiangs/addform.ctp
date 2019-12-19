        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                出库单
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/chengpinZhaungxiangs/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                <li class="active">装箱单</li>
            </ol>
        </section>

        <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">出库单</h3>
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
                                            <th>编号</th>
											<th>销售订单编号</th>
											<th>合同编号</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($chengpinChukus as $chengpinChuku): ?>
										<tr>
										<td>
											<?= $chengpinChuku->oid ?>
										</td>	
										<td>
											<?= $chengpinChuku->dingdanid ?>
										</td>
										<td>
											<?= $chengpinChuku->hetongid?>
										</td>
										<td>
											<?= $this->Html->link('选择', ['action' => 'add', $chengpinChuku->oid]) ?>
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