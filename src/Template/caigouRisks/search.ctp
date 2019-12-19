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
                                    <h3 class="box-title">查询结果</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
									<!-- 分页下拉框 -->
									<div class="pull-left">
										<?php echo $this->Paginator->limitControl([2 => 2, 10 => 10, 20 => 20, 50 => 50, 100 => 100]); ?>
									</div><!-- ./分页下拉框 -->
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
											<th>是否为物流</th>
                                            <th>评估分数</th>
											<th>操作人</th>
                                            <th>操作时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($result as $caigouProvider): ?>
										<tr>
										<td><?= $caigouProvider['p_id'] ?></td>
										<td><?= $caigouProvider['p_name'] ?></td>
										<td><?= $caigouProvider['shuihao'] ?></td>	
										<td><?= $caigouProvider['person'] ?></td>
										<td><?= $caigouProvider['dianhua'] ?></td>
										<td><?= $caigouProvider['shouji'] ?></td>
										<td><?= $caigouProvider['dizhi'] ?></td>
										<td><?php if($caigouProvider['iswuliu']==1){echo "是";} if($caigouProvider['iswuliu']==0){echo "否";} ?></td>
										<td><?= $caigouProvider['pinggu'] ?></td>
										<td><?= $caigouProvider['user']?></td>
										<td><?= $caigouProvider['time']->format('Y-m-d H:m:s') ?></td>
										<td>
											<?= $this->Html->link('修改评估', ['action' => 'modify', $caigouProvider['id']]) ?>
											<?= $this->Html->link('历史评估', ['action' => 'history', $caigouProvider['p_id']]) ?>
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
									<a href="/projectERP/caigouRisks/index" class="btn btn-warning"><i class="glyphicon glyphicon-backward"></i> 返回</a>
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->