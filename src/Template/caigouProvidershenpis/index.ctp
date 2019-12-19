                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        供货方审批
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/caigouProvidershenpis/index"><i class="fa fa-dashboard"></i>供货方管理</a></li>
                        <li class="active">供货方审批</li>
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
                                        <form method="post" action="/projectERP/caigouProvidershenpis/search" class="text-right">
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <div class="btn-group">
														<div>
															编码：<input type="text" name="p_id" />
															公司名称：<input type="text" name="p_name" />
															税号：<input type="text" name="shuihao" />
															审批人：<input type="text" name="shenpiren" />
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
                                            <th>编码</th>
                                            <th>公司名称</th>
                                            <th>税号</th>
                                            <th>联系人</th>
                                            <th>电话号码</th>
                                            <th>手机号码</th>
                                            <th>地址</th>
											<th>是否为物流</th>
											<th>审核人</th>
											<th>审批人</th>
											<th>审批时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($caigouProviders as $caigouProvider): ?>
										<tr>
										<td><?= $caigouProvider->p_id ?></td>
										<td><?= $caigouProvider->p_name ?></td>
										<td><?= $caigouProvider->shuihao ?></td>	
										<td><?= $caigouProvider->person ?></td>
										<td><?= $caigouProvider->dianhua ?></td>
										<td><?= $caigouProvider->shouji ?></td>
										<td><?= $caigouProvider->dizhi ?></td>
										<td><?php if($caigouProvider->iswuliu==1){echo "是";} if($caigouProvider->iswuliu==0){echo "否";} ?></td>
										<?php if($caigouProvider->isshenhe == 0){ ?>
											<td><span class="label label-warning">未审核</span></td>
										<?php } elseif($caigouProvider->shenheok == 1){ ?> 
											<td><span class="label label-success">已审核（<?php echo $caigouProvider->shenheren ?>）</span></td> 
										<?php } elseif($caigouProvider->shenheok == 0){ ?> 
											<td><span class="label label-danger">已驳回（<?php echo $caigouProvider->shenheren ?>）</span></td>
										<?php } ?>
										<?php if($caigouProvider->isshenpi == 0){ ?>
											<td><span class="label label-warning">未审批</span></td>
											<td></td>
										<?php } elseif($caigouProvider->shenpiok == 1){ ?> 
											<td><span class="label label-success">已审批（<?php echo $caigouProvider->shenpiren ?>）</span></td> 
											<td><?= $caigouProvider->shenpi_time->format('Y-m-d H:m:s')?></td>
										<?php } elseif($caigouProvider->shenpiok == 0){ ?> 
											<td><span class="label label-danger">已驳回（<?php echo $caigouProvider->shenpiren ?>）</span></td>
											<td><?= $caigouProvider->shenpi_time->format('Y-m-d H:m:s')?></td>
										<?php } ?>
										<td>
											<!-- <?= $this->Html->link('审核意见', ['action' => 'checkresult', $caigouProvider->id]) ?> -->
											<?php if($caigouProvider->isshenpi == 0){ 
												echo $this->Html->link('审批', ['action' => 'shenpi', $caigouProvider->id]); 
											}else{ 
												echo $this->Html->link('审批意见', ['action' => 'shenpiresult', $caigouProvider->id]);
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
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->