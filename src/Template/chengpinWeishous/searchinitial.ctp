                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        未售成品信息
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
                                    <h3 class="box-title">查询结果</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
									<?php if($result==NULL){ echo "没有匹配结果"; }
									else{ ?>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>编号</th>
                                            <th>产品名称</th>
											<th>是否为附件</th>
                                            <th>规格型号</th>
                                            <th>单位</th>
                                            <th>物料描述</th>
                                            <th>位置</th>
                                            <th>操作人</th>
                                            <th>操作时间</th>
											<th>详情</th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($result as $chengpinInitial): ?>
										<tr>
										<td>
											<?= $chengpinInitial['mid'] ?>
										</td>
										<td>
											<?= $chengpinInitial['name']?>
										</td>	
										<td>
											<?php if($chengpinInitial['isfujian']==1){echo "是";} if($chengpinInitial['isfujian']==0){echo "否";} ?>
										</td>
										<td>
											<?= $chengpinInitial['xinghao']?>
										</td>
										<td>
											<?= $chengpinInitial['danwei']?>
										</td>
										<td>
											<?= $chengpinInitial['miaoshu']?>
										</td>
										<td>
											<?= $chengpinInitial['weizhi']?>
										</td>
										<td>
											<?= $chengpinInitial['user']?>
										</td>
										<td>
											<?= $chengpinInitial['time']?>
										</td>
										<td><?= $this->Html->link('查看', ['action' => 'view', $chengpinInitial['mid']]) ?></td>
										</tr>
										<?php endforeach; ?>
                                        </tbody>
                                    </table><!-- /.table -->
									<?php } ?>
                                </div><!-- /.box-body-->
								<div class="box-footer clearfix no-border">
									<a href="/projectERP/chengpinWeishous/index" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-backward"></i> 返回</a>
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->