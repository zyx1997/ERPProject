                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        装箱单
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/chengpinZhuangxiangs/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                        <li class="active">装箱单</li>
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
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>出库单编号</th>
											<th>装箱单编号</th>
                                            <th>装箱单名称</th>
											<th>出厂日期</th>
											<th>审批结果</th>
                                            <th>操作人</th>
                                            <th>操作时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($result as $chengpinZhuangxiang): ?>
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
											<?= $chengpinZhuangxiang->user?>
										</td>
										<td>
											<?= $chengpinZhuangxiang->time->format('Y-m-d H:m:s')?>
										</td>
										<td>
											<?php if($chengpinZhuangxiang->isshenpi==0||($chengpinZhuangxiang->isshenpi==1&&$chengpinZhuangxiang->shenpiresult==0)) { ?>
											<?= $this->Html->link('修改', ['action' => 'modify', $chengpinZhuangxiang->id]) ?>
											<?= $this->Form->postLink(
												'删除',
												['action' => 'delete', $chengpinZhuangxiang->id],
												['confirm' => '确认删除?'])
											?>
											<?php } ?>
										</td>
										</tr>
										<?php endforeach; ?>
                                        </tbody>
                                    </table><!-- /.table -->
                                </div><!-- /.box-body-->
								
                                <div class="box-footer clearfix no-border">
									<a href="/projectERP/chengpinZhuangxiangs/index" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-backward"></i> 返回</a>
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->
                