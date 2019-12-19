                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        成品库附件入库
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/chengpinRukus/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                        <li class="active">成品库附件入库</li>
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
                                    <!-- search form -->
                                    <!-- 分页下拉框 -->
									<div class="pull-left">
										<?php echo $this->Paginator->limitControl([2 => 2, 10 => 10, 20 => 20, 50 => 50, 100 => 100]); ?>
									</div><!-- ./分页下拉框 -->
									<!-- search form -->
                                    <div class="search-form margin">
                                        <form method="post" action="/projectERP/chengpinRukus/search" class="text-right">
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <div class="btn-group">
														<div>
															编号：<input type="text" name="mid" />
															产品名称：<input type="text" name="name" />
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
                                            <th>产品名称</th>
                                            <th>物料描述</th>
											<th>生产日期</th>
											<th>入库日期</th>
											<th>入库数量</th>
											<th>状态</th>
                                            <th>操作人</th>
                                            <th>操作时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($chengpinRukus as $chengpinRuku): ?>
										<tr>
										<td>
											<?= $chengpinRuku->mid ?>
										</td>
										<td>
											<?= $chengpinRuku->name?>
										</td>
										<td>
											<?= $chengpinRuku->miaoshu?>
										</td>
										<td>
											<?= $chengpinRuku->shengchandate->format('Y-m-d')?>
										</td>
										<td>
											<?= $chengpinRuku->rukudate->format('Y-m-d')?>
										</td>
										<td>
											<?= $chengpinRuku->rukuquantity?>
										</td>
										<td>
										<?php
											if($chengpinRuku->istijiao==0){
												echo "<span class='label label-warning'>未提交质检</span>";
											}else{
												if($chengpinRuku->iszhijian==0){echo "<span class='label label-warning'>待质检</span>";}
												if($chengpinRuku->iszhijian==1){
													echo "<span class='label label-success'>已质检(".$chengpinShenpis[$chengpinRuku->id].")</span>";
												}
											}
										?>
										</td>
										<td>
											<?= $chengpinUsers[$chengpinRuku->id] ?>
										</td>
										<td>
											<?= $chengpinRuku->time->format('Y-m-d H:m:s')?>
										</td>
										<td>
											<?php if($chengpinRuku->istijiao==0) { ?>
											<?= $this->Html->link('管理', ['action' => 'modify', $chengpinRuku->id]) ?>
											<?= $this->Form->postLink(
												'删除',
												['action' => 'delete', $chengpinRuku->id],
												['confirm' => '确认删除?'])
											?>
											<?php }else{ echo $this->Html->link('查看', ['action' => 'view', $chengpinRuku->id]);} ?>
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
                                    <a href="/projectERP/chengpinRukus/searchname" class="btn btn-warning pull-left"><i class="fa fa-plus"></i> 新增入库成品</a>
                                </div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->