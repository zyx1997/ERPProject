                
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
                                    <h3 class="box-title">成品配套列表</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
									<!-- 分页下拉框 -->
									<div class="pull-left">
										<?php echo $this->Paginator->limitControl([2 => 2, 10 => 10, 20 => 20, 50 => 50, 100 => 100]); ?>
									</div><!-- ./分页下拉框 -->
									<!-- search form -->
                                    <div class="search-form margin">
                                        <form method="post" action="/projectERP/chengpinPeitaos/search" class="text-right">
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <div class="btn-group">
														<div>
															配套名称：<input type="text" name="name" />
															成品名称：<input type="text" name="mname" />
															<button type="submit" name="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>
														</div>
                                                    </div><!-- ./btn-group -->
                                                </div>
                                            </div>
                                        </form>
                                    </div><!-- /.search-form -->
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
										<?php foreach ($chengpinPeitaos as $chengpinPeitao): ?>
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
                                    <a href="/projectERP/chengpinPeitaos/searchname" class="btn btn-warning pull-left"><i class="fa fa-plus"></i> 新增配套</a>
                                </div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->