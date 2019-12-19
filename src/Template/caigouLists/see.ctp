                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        采购单详情
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/caigouLists/index"><i class="fa fa-dashboard"></i>采购管理</a></li>
                        <li class="active">采购单管理</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
								<div class="box-body table-responsive">
									<table class="table table-bordered table-hover" style="margin-bottom: 30px;">
										<thead>
										<tr>
											<th>采购单编号</th>
											<th>采购单名称</th>
											<th>供货方编码</th>
											<th>供货方名称</th>
											<th>审核人</th>
											<th>审批人</th>
										</tr>
										</thead>
										<tbody>
										<tr>
											<td><?= $caigouList->l_id ?></td>
											<td><?= $caigouList->l_name ?></td>	
											<td><?= $caigouList->p_id ?></td>
											<td><?= $caigouList->p_name ?></td>
											<?php if($caigouList->isshenhe==0){ ?>
												<td><span class="label label-warning">未审核</span></td>
											<?php } elseif($caigouList->shenheok==1){ ?> 
												<td><span class="label label-success">已审核（<?php echo $caigouList->shenheren ?>）</span></td> 
											<?php } elseif($caigouList->shenheok==0){ ?> 
												<td><span class="label label-danger">已驳回（<?php echo $caigouList->shenheren ?>）</span></td>
											<?php } ?>
											<?php if($caigouList->isshenpi == 0){ ?>
												<td><span class="label label-warning">未审批</span></td>
											<?php } elseif($caigouList->shenpiok == 1){ ?> 
												<td><span class="label label-success">已审批（<?php echo $caigouList->shenpiren ?>）</span></td> 
											<?php } elseif($caigouList->shenpiok == 0){ ?> 
												<td><span class="label label-danger">已驳回（<?php echo $caigouList->shenpiren ?>）</span></td>
											<?php } ?>
										</tr>
										</tfoot>
									</table>
								</div><!-- /.box-body-->
								<div class="box-header">
                                    <h3 class="box-title">产品采购</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
									<!-- 分页下拉框 -->
									<div class="pull-left">
										<?php echo $this->Paginator->limitControl([2 => 2, 10 => 10, 20 => 20, 50 => 50, 100 => 100]); ?>
									</div><!-- ./分页下拉框 -->
                                    <!-- search form -->
                                    <div class="search-form margin">
                                        <form method="post" action="/projectERP/caigouLists/searchM/<?= $caigouList->l_id ?>" class="text-right">
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <div class="btn-group">
														<div>
															产品编号：<input type="text" name="m_id" />
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
											<th>产品编号</th>
                                            <th>产品名称</th>
                                            <th>数量</th>
											<th>单价</th>
											<th>总价</th>
                                            <th>操作人</th>
                                            <th>操作时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($caigouListAlls as $caigouListAll): ?>
										<tr>
										<td><?= $caigouListAll->m_id ?></td>	
										<td><?= $caigouListAll->name ?></td>
										<td><?= $caigouListAll->target_quantity ?></td>
										<td><?= $caigouListAll->target_price ?></td>
										<td><?= $caigouListAll->target_totalprice ?></td>
										<td><?= $caigouListAll->user?></td>
										<td><?= $caigouListAll->time->format('Y-m-d H:m:s')?></td>
										<td>
											<?php if(($caigouList->isshenhe==0) || ($caigouList->isshenhe==1 && $caigouList->shenheok!=1) || ($caigouList->isshenpi==1 && $caigouList->shenpiok!=1)){  
												echo $this->Html->link('修改', ['action' => 'modifyM', $caigouListAll->id]);
												echo $this->Form->postLink(
													' 删除',
													['action' => 'deleteM', $caigouListAll->id],
													['confirm' => '确认删除?']);
											} ?>
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
									<?php if(($caigouList->isshenhe==0) || ($caigouList->isshenhe==1 && $caigouList->shenheok!=1) || ($caigouList->isshenpi==1 && $caigouList->shenpiok!=1)){ ?>  
									<a href="/projectERP/caigouLists/searchmid/<?= $caigouList->l_id ?>" class="btn btn-warning pull-left"><i class="fa fa-plus"></i> 新增产品采购</a>
									<?php } ?>
								</div>
									
									<!-- 以下显示审核意见 -->
									<?php if( $caigouList->shenhe_beizhu != '' ){ ?>
									<div class="box-header" style="margin-top:30px;">
										<h3 class="box-title">审核意见</h3>
									</div>
									<div class="box-body"  style="width:90%;margin: auto;text-align: center">
										<textarea readonly="readonly" style="width:90%;margin: auto;"><?= $caigouList['shenhe_beizhu'] ?></textarea>
									</div><!-- /.box-body -->
									<?php } ?>
									<?php if( $caigouList->shenpi_beizhu != '' ){ ?>
									<div class="box-header" style="margin-top:30px;">
										<h3 class="box-title">审批意见</h3>
									</div>
									<div class="box-body"  style="padding-bottom:30px;text-align: center">
										<textarea readonly="readonly" style="width:90%;margin: auto;"><?= $caigouList['shenpi_beizhu'] ?></textarea>
									</div><!-- /.box-body -->
									<?php } ?>
									
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->