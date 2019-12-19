                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        短料交付计划
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/manageDuanliaos/index"><i class="fa fa-dashboard"></i> 生产管理</a></li>
                        <li class="active">短料交付计划</li>
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
                                        <form method="post" action="/projectERP/manageDuanliaos/search" class="text-right">
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <div class="btn-group">
														<div>
															生产排期编号：<input type="text" name="jid" />
															物料编号：<input type="text" name="m_id" />
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
                                            <th>生产排期编号</th>
                                            <th>成品编号</th>
                                            <th>成品名称</th>
											<th>物料编号</th>
                                            <th>物料名称</th>
											<th>物料描述</th>
											<th>库存数量</th>
                                            <th>短缺数量</th>
                                            <th>采购数量</th>
                                            <th>计划到场时间+1</th>
                                            <th>操作人</th>
                                            <th>操作时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
										<?php foreach ($shengchanWuliaoduanques as $shengchanWuliaoduanque): ?>
										<tr>
										<td><?= $shengchanWuliaoduanque->jid ?></td>
										<td><?= $shengchanWuliaoduanque->mid ?></td>
										<td><?= $shengchanWuliaoduanque->chengpinname ?></td>
										<td><?= $shengchanWuliaoduanque->m_id ?></td>
										<td><?= $shengchanWuliaoduanque->wuliaoname ?></td>
										<td><?= $shengchanWuliaoduanque->miaoshu ?></td>
										<td><?= $shengchanWuliaoduanque->wuliaonumber ?></td>
										<td><?= $shengchanWuliaoduanque->duanquenumber ?></td>
										<?php if( $shengchanWuliaoduanque->caigounumber!=0 && $shengchanWuliaoduanque->caigounumber!=null){ ?>
										<td><?= $shengchanWuliaoduanque->caigounumber ?></td>
										<td><?= $shengchanWuliaoduanque->jihuadate->format('Y-m-d') ?></td>
										<?php }else{ ?>
										<td></td>
										<td></td>
										<?php } ?>
										<td><?= $shengchanWuliaoduanque->user?></td>
										<td><?= $shengchanWuliaoduanque->time->format('Y-m-d H:m:s')?></td>
										<td>
											<?php echo $this->Html->link('查看详情', ['action' => 'see', $shengchanWuliaoduanque->id]); ?>
											<?php if( $shengchanWuliaoduanque->caigounumber==0 || $shengchanWuliaoduanque->caigounumber==null){ echo $this->Html->link('填写短料交付计划', ['action' => 'addduanliao', $shengchanWuliaoduanque->id]); } ?>
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