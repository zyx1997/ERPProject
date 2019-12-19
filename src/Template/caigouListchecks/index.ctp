                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        采购单审核
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/caigouListchecks/index"><i class="fa fa-dashboard"></i>采购管理</a></li>
                        <li class="active">采购单审核</li>
                    </ol>
                </section>
				
				
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">信息汇总表</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
									<!-- 分页下拉框 -->
									<div class="pull-left">
										<?php echo $this->Paginator->limitControl([2 => 2, 10 => 10, 20 => 20, 50 => 50, 100 => 100]); ?>
									</div><!-- ./分页下拉框 -->
                                    <!-- search form -->
                                    <div class="search-form margin">
                                        <form method="post" action="/projectERP/caigouListchecks/search" class="text-right">
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <div class="btn-group">
														<div>
															采购单编号：<input type="text" name="l_id" />
															供货方名称：<input type="text" name="p_name" />
															审核人：<input type="text" name="shenheren" />
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
                                            <th>采购单编号</th>
                                            <th>采购单名称</th>
											<th>采购时间</th>
                                            <th>供货方编码</th>
											<th>供货方名称</th>
											<th>审核人</th>
											<th>审核时间</th>
                                            <th>操作人</th>
                                            <th>操作时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($caigouLists as $caigouList): ?>
										<tr>
										<td><?= $caigouList->l_id ?></td>
										<td><?= $caigouList->l_name ?></td>
										<?php if($caigouList->caigoudate != null){ ?> 
											<td><?= $caigouList->caigoudate->format('Y-m-d') ?></td>
										<?php }else{ ?> 
											<td></td>
										<?php } ?> 
										<td><?= $caigouList->p_id ?></td>
										<td><?= $caigouList->p_name ?></td>
										<?php if($caigouList->isshenhe==0){ ?>
											<td><span class="label label-warning">未审核</span></td>
											<td></td>
										<?php } elseif($caigouList->shenheok==1){ ?> 
											<td><span class="label label-success">已审核（<?php echo $caigouList->shenheren ?>）</span></td> 
											<td><?= $caigouList->shenhe_time->format('Y-m-d H:m:s')?></td>
										<?php } elseif($caigouList->shenheok==0){ ?> 
											<td><span class="label label-danger">已驳回（<?php echo $caigouList->shenheren ?>）</span></td>
											<td><?= $caigouList->shenhe_time->format('Y-m-d H:m:s')?></td>
										<?php } ?>
										<td><?= $caigouList->user?></td>
										<td><?= $caigouList->time->format('Y-m-d H:m:s')?></td>
										<td>
											<?php if($caigouList->isshenhe == 0){ echo $this->Html->link('审核', ['action' => 'check', $caigouList->l_id]); 
											}else{ echo $this->Html->link('审核意见', ['action' => 'checkresult', $caigouList->l_id]); } ?>
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