<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        销售台账
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/tixiTaizhangs/index"><i class="fa fa-dashboard"></i>销售管理</a></li>
                        <li class="active">销售台账</li>
                    </ol>
                </section>


                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">销售台账表</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
									<!-- 分页下拉框 -->
									<div class="pull-left">
										<?php echo $this->Paginator->limitControl([2 => 2, 10 => 10, 20 => 20, 50 => 50, 100 => 100]); ?>
									</div><!-- ./分页下拉框 -->
									<!-- search form -->
                                    <div class="search-form margin">
                                    </div><!-- /.search-form -->
									
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>进货单位</th>
                                            <th>产品名称</th>
                                            <th>型号/规格</th>
                                            <th>生产批号</th>
											<th>数量</th>
											<th>单位</th>
                                            <th>联系人</th>
											<th>联系方式</th>
											<th>地址</th>
											<th>发货日期</th>
											<th>订货日期</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($tixiTaizhangs as $tixiTaizhang): ?>
										<tr class="editable">
											<td><?= $tixiTaizhang->jinhuodanwei ?></td>
                                            <td><?= $tixiTaizhang->name ?></td>
                                            <td><?= $tixiTaizhang->xinghao ?></td>
                                            <td><?= $tixiTaizhang->shengchanid ?></td>
                                            <td><?= $tixiTaizhang->quantity ?></td>
                                            <td><?= $tixiTaizhang->danwei ?></td>
                                            <td><?= $tixiTaizhang->person ?></td>
											<td><?= $tixiTaizhang->telephone ?></td>
											<td><?= $tixiTaizhang->dizhi ?></td>
                                            <td><?php if($tixiTaizhang->fahuodate) echo $tixiTaizhang->fahuodate->format('Y-m-d'); ?></td>
											<td><?php if($tixiTaizhang->dinghuodate) echo $tixiTaizhang->dinghuodate->format('Y-m-d'); ?></td>
											<td>
												<?php if($tixiTaizhang->isshenpi==0||($tixiTaizhang->isshenpi==1&&$tixiTaizhang->shenpiresult==0)) { ?>
												<?= $this->Html->link('修改', ['action' => 'modify', $tixiTaizhang->id]) ?>
												<?= $this->Form->postLink(
													'删除',
													['action' => 'delete', $tixiTaizhang->id],
													['confirm' => '确认删除?'])
												?>
												<?php } ?>
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
                                    <a href="/projectERP/tixiTaizhangs/add" class="btn btn-warning pull-left"><i class="fa fa-plus"></i> 新增销售台账</a>
                                </div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->