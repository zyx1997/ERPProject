                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        IQC质检
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/lailiaoIQCs/index"><i class="fa fa-dashboard"></i>原料库管理</a></li>
                        <li class="active">IQC质检</li>
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
                                        <form method="post" action="/projectERP/lailiaoIQCs/search" class="text-right">
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
											<th>采购单号</th>
											<th>产品号</th>
											<th>产品类</th>
                                            <th>产品名</th>
											<th>是否半成品</th>
                                            <th>规格型号</th>
                                            <th>单位</th>
                                            <th>物料描述</th>
                                            <th>位置</th>
											<th>采购单数量</th>
											<th>采购单单价</th>
											<th>采购单总价</th>
											<th>状态</th>
                                            <th>操作人</th>
                                            <th>操作时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
										<?php foreach ($caigouListAlls as $caigouListAll): ?>
										<tr>
										<td><?= $caigouListAll->l_id ?></td>
										<td><?= $caigouListAll->m_id ?></td>
										<td><?= $caigouListAll->fenlei?></td>
										<td><?= $caigouListAll->name?></td>	
										<td><?php if($caigouListAll->isban==1){echo "是";} if($caigouListAll->isban==0){echo "否";} ?></td>
										<td><?= $caigouListAll->xinghao?></td>
										<td><?= $caigouListAll->danwei?></td>
										<td><?= $caigouListAll->miaoshu?></td>
										<td><?= $caigouListAll->weizhi?></td>
										<td><?= $caigouListAll->target_quantity?></td>
										<td><?= $caigouListAll->target_price?></td>
										<td><?= $caigouListAll->target_totalprice?></td>
										<?php if($caigouListAll->zhuangtai==0){ ?>
											<td><span class="label label-default">待来料质检</span></td>
										<?php } elseif($caigouListAll->zhuangtai==1){ ?> 
											<td><span class="label label-warning">已入库待填价</span></td>
										<?php } elseif($caigouListAll->zhuangtai==2){ ?> 
											<td><span class="label label-success">已入库已填价</span></td>
										<?php } else { ?>
											<td></td>
										<?php } ?>
										<td><?= $caigouListAll->user?></td>
										<td><?= $caigouListAll->time->format('Y-m-d H:m:s')?></td>
										<td>
											<?php if($caigouListAll->zhuangtai == 0){ echo $this->Html->link('来料质检', ['action' => 'check', $caigouListAll->id]); 
											}else{ echo $this->Html->link('质检结果', ['action' => 'checkresult', $caigouListAll->id]); } ?>
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