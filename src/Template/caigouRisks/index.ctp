                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        供货方风险评估
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/caigouRisks/index"><i class="fa fa-dashboard"></i>供货方管理</a></li>
                        <li class="active">供货方风险评估</li>
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
									<!-- 分页下拉框 -->
									<div class="pull-left">
										<?php echo $this->Paginator->limitControl([2 => 2, 10 => 10, 20 => 20, 50 => 50, 100 => 100]); ?>
									</div><!-- ./分页下拉框 -->
                                    <!-- search form -->
                                    <div class="search-form margin">
                                        <form method="post" action="/projectERP/caigouRisks/search" class="text-right">
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <div class="btn-group">
														<div>
															编码：<input type="text" name="p_id" />
															公司名称：<input type="text" name="p_name" />
															税号：<input type="text" name="shuihao" />
															分数区间：<input type="text" name="lowscore" /> - <input type="text" name="highscore" />
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
                                            <th>编码</th>
                                            <th>公司名称</th>
                                            <th>税号</th>
                                            <th>联系人</th>
                                            <th>电话号码</th>
                                            <th>手机号码</th>
                                            <th>地址</th>
                                            <th>评估分数</th>
											<th>操作人</th>
                                            <th>操作时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($caigouProviders as $caigouProvider): ?>
										<tr>
										<td><?= $caigouProvider->p_id ?></td>
										<td><?= $caigouProvider->p_name ?></td>
										<td><?= $caigouProvider->shuihao ?></td>	
										<td><?= $caigouProvider->person ?></td>
										<td><?= $caigouProvider->dianhua ?></td>
										<td><?= $caigouProvider->shouji ?></td>
										<td><?= $caigouProvider->dizhi ?></td>
										<td><?= $caigouProvider->pinggu ?></td>
										<td><?= $caigouProvider->user?></td>
										<td><?= $caigouProvider->time->format('Y-m-d H:m:s')?></td>
										<td>
											<?= $this->Html->link('修改评估', ['action' => 'modify', $caigouProvider->id]) ?>
											<?= $this->Html->link('历史评估', ['action' => 'history', $caigouProvider->p_id]) ?>
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
                                    <a href="/projectERP/caigouRisks/searchpname" class="btn btn-warning pull-left"><i class="fa fa-plus"></i> 新增评估</a>
                                </div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->