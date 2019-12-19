                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        成品信息
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/chengpinWeishous/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                        <li class="active">成品查看(未售)</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">成品信息列表</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
									<!-- 分页下拉框 -->
									<div class="pull-left">
										<?php echo $this->Paginator->limitControl([2 => 2, 10 => 10, 20 => 20, 50 => 50, 100 => 100]); ?>
									</div><!-- ./分页下拉框 -->
									<!-- search form -->
                                    <div class="search-form margin">
                                        <form method="post" action="/projectERP/chengpinSuigongdans/searchinitial" class="text-right">
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <div class="btn-group">
														<div>
															编号：<input type="text" name="mid" />
															产品名称：<input type="text" name="name" />
															规格型号：<input type="text" name="xinghao" />
															是否为附件: <input type="text" name="isfujian" />
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
											<th>是否为附件</th>
											<th>是否有唯一编号</th>
                                            <th>规格型号</th>
                                            <th>单位</th>
                                            <th>物料描述</th>
                                            <th>位置</th>
											<th>库存</th>
											<th>详情</th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($chengpinInitials as $chengpinInitial): ?>
										<tr>
										<td>
											<?= $chengpinInitial->mid ?>
										</td>
										<td>
											<?= $chengpinInitial->name?>
										</td>	
										<td>
											<?php if($chengpinInitial->isfujian==1){echo "是";} if($chengpinInitial->isfujian==0){echo "否";} ?>
										</td>
										<td>
											<?php if($chengpinInitial->isonlyid==1){echo "是";} if($chengpinInitial->isonlyid==0){echo "否";} ?>
										</td>
										<td>
											<?= $chengpinInitial->xinghao?>
										</td>
										<td>
											<?= $chengpinInitial->danwei?>
										</td>
										<td>
											<?= $chengpinInitial->miaoshu?>
										</td>
										<td>
											<?= $chengpinInitial->weizhi?>
										</td>
										<td>
											<?= $chengpinInitial->number?>
										</td>
										<td>
											<?php if($chengpinInitial->isonlyid==1){
												echo $this->Html->link('查看', ['action' => 'view', $chengpinInitial->mid]);
												}
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
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->