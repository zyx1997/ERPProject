                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        原材料补录
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/lailiaoBulus/index"><i class="fa fa-dashboard"></i>原料库管理</a></li>
                        <li class="active">原材料补录</li>
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
                                        <form method="post" action="/projectERP/lailiaoBulus/search" class="text-right">
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <div class="btn-group">
														<div>
															原材料编号：<input type="text" name="m_id" />
															产品名称：<input type="text" name="name" />
															规格型号：<input type="text" name="xinghao" />
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
                                            <th>编号</th>
											<th>原材料分类</th>
                                            <th>产品名称</th>
											<th>是否为半成品</th>
                                            <th>规格型号</th>
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
										<?php foreach ($lailiaoInitials as $lailiaoInitial): ?>
										<tr>
										<td><?= $lailiaoInitial->m_id ?></td>
										<td><?= $lailiaoInitial->fenlei?></td>
										<td><?= $lailiaoInitial->name?></td>	
										<td><?php if($lailiaoInitial->isban==1){echo "是";} if($lailiaoInitial->isban==0){echo "否";} ?></td>
										<td><?= $lailiaoInitial->xinghao?></td>
										<td><?= $lailiaoInitial->danwei?></td>
										<td><?= $lailiaoInitial->miaoshu?></td>
										<td><?= $lailiaoInitial->weizhi?></td>
										<td><?= $lailiaoInitial->number?></td>
										<td><?= $lailiaoUsers[$lailiaoInitial->id] ?></td>
										<td><?= $lailiaoInitial->time->format('Y-m-d H:m:s')?></td>
										<td>
											<?= $this->Html->link('补录', ['action' => 'add', $lailiaoInitial->id]) ?>
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
                                </div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->