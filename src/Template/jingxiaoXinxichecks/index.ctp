<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        经销商基本信息审批
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/jingxiaoXinxichecks/index"><i class="fa fa-dashboard"></i>销售商基本信息管理</a></li>
                        <li class="active">经销商基本信息审批</li>
                    </ol>
                </section>


                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">经销商基本信息</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
									<!-- 分页下拉框 -->
									<div class="pull-left">
										<?php echo $this->Paginator->limitControl([2 => 2, 10 => 10, 20 => 20, 50 => 50, 100 => 100]); ?>
									</div><!-- ./分页下拉框 -->
									<!-- search form -->
                                    <div class="search-form margin">
                                    </div><!-- /.search-form -->
									<div class="search-form margin">
                                        <form method="post" action="/projectERP/jingxiaoXinxichecks/search" class="text-right">
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <div class="btn-group">
														<div>
															名称：<input type="text" name="name" />
															联系人：<input type="text" name="lianxiren" />
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
                                            <th>经销商名称</th>
                                            <th>组织机构代码</th>
                                            <th>联系人</th>
                                            <th>联系电话</th>
											<th>审批结果</th>
											<th>审批时间</th>
											<th>重新首营情况</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($jingxiaoXinxis as $jingxiaoXinxi): ?>
										<tr class="editable">
											<td><?= $jingxiaoXinxi->name ?></td>
                                            <td><?= $jingxiaoXinxi->daima ?></td>
                                            <td><?= $jingxiaoXinxi->lianxiren ?></td>
                                            <td><?= $jingxiaoXinxi->telephone ?></td>
											<td>
											<?php
												if($jingxiaoXinxi->isshenpi==0){echo "<span class='label label-warning'>未审批</span>";}
												if($jingxiaoXinxi->isshenpi==1){
													if($jingxiaoXinxi->shenpiresult==1)
														echo "<span class='label label-success'>已审批(".$jiaoxiaoShenpis[$jingxiaoXinxi->id].")</span>";
													else
														echo "<span class='label label-danger'>已驳回(".$jiaoxiaoShenpis[$jingxiaoXinxi->id].")</span>";
												}
											?>
											</td>
											<td>
											<?php
												if($jingxiaoXinxi->isshenpi==1){
													echo $jingxiaoXinxi->time->format('Y-m-d H:m:s');
													
												}
											?>
											</td>
											<td>
												<?php if($jingxiaoXinxi->isshouying==0){
													echo "<span class='label label-warning'>未提交重新首营</span>";
													}else{
													echo $this->Html->link('重新首营', ['action' => 'checkshouying', $jingxiaoXinxi->id]);
												} ?>
											</td>
											<td>
												<?php if($jingxiaoXinxi->isshenpi==0){ ?>
												<?= $this->Html->link('审批', ['action' => 'check', $jingxiaoXinxi->id]) ?>
												
												<?php }else{ ?>
												<?= $this->Html->link('查看', ['action' => 'view', $jingxiaoXinxi->id]) ?>
												
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
                                
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->