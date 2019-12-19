                
				<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        成品配套
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/chengpinPeitaos/index"><i class="fa fa-dashboard"></i>销售管理</a></li>
                        <li class="active">成品配套</li>
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
											<th>配套名称</th>
                                            <th>成品名称</th>
                                            <th>成品数量</th>
                                            <th>参考价格(套)</th>
                                            <th>操作人</th>
                                            <th>操作时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($result as $chengpinPeitao): ?>
										<tr class="editable">
											<td><?= $chengpinPeitao->name ?></td>
                                            <td><?= $chengpinPeitao->mname ?></td>
                                            <td><?= $chengpinPeitao->mnumber ?></td>
                                            <td><?= $chengpinPeitao->cankaojiage ?></td>
                                            <td><?= $chengpinUsers[$chengpinPeitao->id] ?></td>
                                            <td><?= $chengpinPeitao->time->format('Y-m-d H:m:s') ?></td>
											<td>
												<?= $this->Html->link('管理', ['action' => 'modify', $chengpinPeitao->id]) ?>
												<?= $this->Form->postLink(
													'删除',
													['action' => 'delete', $chengpinPeitao->id],
													['confirm' => '确认删除?'])
												?>
											</td>
                                        </tr>
										<?php endforeach; ?>
                                        </tbody>
                                    </table><!-- /.table -->
									<?php } ?>
                                </div><!-- /.box-body-->
								<div class="box-footer clearfix no-border">
									<a href="/projectERP/chengpinPeitaos/index" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-backward"></i> 返回</a>
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->