                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        已售成品信息
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/chengpinYishous/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                        <li class="active">成品查看(已售)</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">已售成品信息</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
									<!-- 分页下拉框 -->
									<div class="pull-left">
										<?php echo $this->Paginator->limitControl([2 => 2, 10 => 10, 20 => 20, 50 => 50, 100 => 100]); ?>
									</div><!-- ./分页下拉框 -->
									<!-- search form -->
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>编号</th>
                                            <th>产品名称</th>
											<th>唯一编号</th>
											<th>订单id</th>
                                            <th>随工单</th>
											
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($chengpinDictionarys as $chengpinDictionary): ?>
										<tr>
										<td>
											<?= $chengpinDictionary['mid'] ?>
										</td>
										<td>
											<?= $chengpinDictionary['name']?>
										</td>	
										<td>
											<?= $chengpinDictionary['onlyid']?>
										</td>
										<td>
											<?= $chengpinDictionary['orderid']?>
										</td>
										<td>
											<?php if($chengpinDictionary['suigongdan']!=NULL) { ?> 
												<?= $this->Html->link('查看随工单', ['action' => 'eachview', $chengpinDictionary['onlyid']]) ?>
											<?php } else{ echo "未添加"; } ?>
										</td>
										
										</tr>
										<?php endforeach; ?>
                                        </tbody>
                                    </table><!-- /.table -->
									<div class="box-footer clearfix no-border">
										<a href="/projectERP/chengpinYishous/index" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-backward"></i> 返回</a>
									</div>
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
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->