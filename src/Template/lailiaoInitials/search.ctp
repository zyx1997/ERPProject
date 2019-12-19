				<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        原材料初始化登记
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/lailiaoInitials/index"><i class="fa fa-dashboard"></i>原料库管理</a></li>
                        <li class="active">原材料初始化登记</li>
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
                                            <th>编号</th>
											<th>原材料分类</th>
                                            <th>产品名称</th>
											<th>是否为半成品</th>
                                            <th>规格型号</th>
                                            <th>单位</th>
                                            <th>物料描述</th>
                                            <th>位置</th>
											<th>操作人</th>
											<th>操作时间</th>
											<th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
										<?php foreach ($result as $lailiaoInitial): ?>
										<tr>
										<td><?= $lailiaoInitial['m_id'] ?></td>
										<td><?= $lailiaoInitial['fenlei']?></td>
										<td><?= $lailiaoInitial['name']?></td>	
										<td><?php if($lailiaoInitial['isban']==1){echo "是";} if($lailiaoInitial['isban']==0){echo "否";} ?></td>
										<td><?= $lailiaoInitial['xinghao']?></td>
										<td><?= $lailiaoInitial['danwei']?></td>
										<td><?= $lailiaoInitial['miaoshu']?></td>
										<td><?= $lailiaoInitial['weizhi']?></td>
										<td><?= $lailiaoUsers[$lailiaoInitial->id] ?></td>
										<td><?= $lailiaoInitial->time->format('Y-m-d H:m:s')?></td>
										<td>
											<?= $this->Html->link('修改', ['action' => 'modify', $lailiaoInitial['id']]) ?>
											<?= $this->Form->postLink(
												'删除',
												['action' => 'delete', $lailiaoInitial['id']],
												['confirm' => '确认删除?'])
											?>
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
									<a href="/projectERP/lailiaoInitials/index" class="btn btn-warning"><i class="glyphicon glyphicon-backward"></i> 返回</a>
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->