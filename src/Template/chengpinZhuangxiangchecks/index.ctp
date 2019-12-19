                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        装箱单审批
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/chengpinZhuangxiangchecks/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                        <li class="active">装箱单审批</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">装箱单</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
									<!-- 分页下拉框 -->
									<div class="pull-left">
										<?php echo $this->Paginator->limitControl([2 => 2, 10 => 10, 20 => 20, 50 => 50, 100 => 100]); ?>
									</div><!-- ./分页下拉框 -->
									<!-- search form -->
                                    <div class="search-form margin">
                                        <form method="post" action="/projectERP/chengpinZhuangxiangchecks/search" class="text-right">
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <div class="btn-group">
														<div>
															编号：<input type="text" name="oid" />
															出库单名称：<input type="text" name="name" />
															合同编号：<input type="text" name="hetongid" />
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
                                            <th>出库单编号</th>
                                            <th>装箱单编号</th>
											<th>装箱单名称</th>
											<th>出厂日期</th>
                                            <th>审批人</th>
                                            <th>审批时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($chengpinZhuangxiangs as $chengpinZhuangxiang): ?>
										<tr>
										<td>
											<?= $chengpinZhuangxiang->oid ?>
										</td>
										<td>
											<?= $chengpinZhuangxiang->zid?>
										</td>	
										<td>
											<?= $chengpinZhuangxiang->name?>
										</td>
										<td>
											<?= $chengpinZhuangxiang->date->format('Y-m-d')?>
										</td>
										<td>
											<?php 
												if($chengpinZhuangxiang->isshenpi==0){echo "<span class='label label-warning'>未审批</span>";}
												if($chengpinZhuangxiang->isshenpi==1){
													if($chengpinZhuangxiang->shenpiresult==1)
														echo "<span class='label label-success'>已审批($chengpinZhuangxiang->shenpiren)</span>";
													else
														echo "<span class='label label-danger'>已驳回($chengpinZhuangxiang->shenpiren)</span>";
												}
											?>
										</td>
										<td>
											<?php 
												if($chengpinZhuangxiang->isshenpi==1){echo $chengpinZhuangxiang->shenpitime->format('Y-m-d H:m:s');}
											?>
										</td>
										<td>
											<?php 
												if($chengpinZhuangxiang->isshenpi==0){
													echo $this->Html->link('审批', ['action' => 'check', $chengpinZhuangxiang->zid]);
												}else{
														echo $this->Html->link('查看', ['action' => 'check', $chengpinZhuangxiang->zid]);
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