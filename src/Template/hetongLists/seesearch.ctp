                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        合同表详情
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/hetongLists/index"><i class="fa fa-dashboard"></i>合同评审</a></li>
                        <li class="active">合同评审管理</li>
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
                                <div class="table-responsive" style="width: 98%; margin: 10px auto;">
									<!-- 分页下拉框 -->
									<div class="pull-left">
										<?php echo $this->Paginator->limitControl([2 => 2, 10 => 10, 20 => 20, 50 => 50, 100 => 100]); ?>
									</div><!-- ./分页下拉框 -->
									<?php foreach ($hetongListAlls as $hetongListAll): ?>
									<div class="row" style="width: 100%; margin: 10px auto;">
										<div class="box box-primary">
											<div class="box-header" data-widget="collapse" data-toggle="tooltip">
												<h3 class="box-title"><?= $hetongListAll['name'] ?></h3>
												<div class="box-tools pull-right">
													<button class="btn btn-primary btn-sm" ><i class="fa fa-minus"></i></button>
												</div>
											</div>
											<div class="box-body">
												<table id="<?= $hetongListAll->id ?>" class="box-body table table-bordered table-hover" style="text-align:center;margin-bottom:20px;">
													<thead>
														<tr>
															<th style="text-align:center;">产品信息</th>
															<th style="text-align:center;">编号</th>
															<th style="text-align:center;">名称</th>
															<th style="text-align:center;">数量</th>
														</tr>
													</thead>
													<tbody>
														<tr class="editable">
															<td>成品</td>
															<td><?= $hetongListAll['mid'] ?></td>
															<td><?= $hetongListAll['mname'] ?></td>
															<td><?= $hetongListAll['mnumber'] ?></td>
														</tr>
														<tr>
															<td rowspan="<?= $peitaoitemsCount[$hetongListAll['peitaoid']]+1 ?>">附件</td>
														</tr>
														<?php foreach ($chengpinPeitaoitems[$hetongListAll['peitaoid']] as $chengpinPeitaoitem): ?>
														<tr class="editable">
															<td><?= $chengpinPeitaoitem['fujianid'] ?></td>
															<td><?= $chengpinPeitaoitem['ujianname'] ?></td>
															<td><?= $chengpinPeitaoitem['fujiannumber'] ?></td>
														</tr>
														<?php endforeach; ?><!-- /.列举完所有附件 -->
														<tr class="editable">
															<td>参考价格（套）</td>
															<td colspan="3"><?= $hetongListAll['cankaojiage'] ?></td>
														</tr>
													</tbody>
												</table><!-- /.table -->
											</div><!-- /.box-body -->
										</div><!-- /.box -->
									</div><!-- /.row -->
									<?php endforeach; ?><!-- /.列举完所有配套 -->
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
								<div class="box-footer clearfix no-border">
									<a href="/projectERP/hetongLists/index" class="btn btn-warning"><i class="glyphicon glyphicon-backward"></i> 返回</a>
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->