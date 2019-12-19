                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        合同评审管理查询
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/hetongLists/index"><i class="fa fa-dashboard"></i>合同评审</a></li>
                        <li class="active">合同评审管理</li>
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
											<th>合同评审编号</th>
											<th>订货单位名称</th>
											<th>评审对象</th>
                                            <th>发货地址</th>
                                            <th>交货方式</th>
                                            <th>质保期</th>
											<th>产品合计(元)</th>
											<th>审批状态</th>
											<th>操作人</th>
											<th>操作时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
										<?php foreach ($result as $hetongList): ?>
										<tr>
										<td><?= $hetongList['h_id'] ?></td>
										<?php if($hetongList['dh_type'] == 0){ ?>
										<td><a target="_blank" href="/projectERP/jingxiaoXinxis/view/<?= $hetongList['dh_id'] ?>"><?= $hetongList['dh_name'] ?></a></td>
										<?php }elseif($hetongList['dh_type'] == 1){ ?>
										<td><a href="/projectERP/yiyuanXinxis/view/<?= $hetongList['dh_id'] ?>"><?= $hetongList['dh_name'] ?></a></td>
										<?php }else{ ?>
										<td><a href="/projectERP/qitaXinxis/view/<?= $hetongList['dh_id'] ?>"><?= $hetongList['dh_name'] ?></a></td>
										<?php } ?>
										<td><?= $hetongList['duixiang'] ?></td>
										<td><?= $hetongList['delivery_addr'] ?></td>
										<td>
											<?= $hetongList['jiaohuofangshi'] ?>
											<?php if($hetongList['jiaohuofangshi'] == "款到发货(限天数)" ){ 
											echo ":".$hetongList['jiaohuofangshi_tianshu']; 
											} elseif($hetongList['jiaohuofangshi'] == "其他"  ){ 
											echo ":".$hetongList['jiaohuofangshi_qita']; } ?>
										</td>
										<td><?= $hetongList['zhibaoqi']?></td>
										<td><?= $hetongList['heji_totalprice']?></td>
										<?php if($hetongList['istijiao']==0){ ?>
											<td><span class="label label-default">未提交审核</span></td>
										<?php } elseif($hetongList['isshenhe']==0){ ?>
											<td><span class="label label-warning">已提交审核</span></td>
										<?php } elseif($hetongList['isshenhe']==1 && $hetongList['pingshenbumen_diss'] == NULL ){ ?> 
											<td><span class="label label-primary">正在审批</span></td> 
										<?php } elseif($hetongList['isshenhe']==1 && $hetongList['pingshenbumen_diss'] != NULL ){ ?> 
											<td><span class="label label-primary">正在审批（有驳回）</span></td> 
										<?php } elseif($hetongList['isshenhe']==2 && $hetongList['shenheok']==1 && $hetongList['pingshenbumen_diss'] == NULL){ ?> 
											<td><span class="label label-success">审批通过</span></td> 
										<?php } elseif($hetongList['isshenhe']==2 && $hetongList['pingshenbumen_diss'] != NULL ){ ?> 
											<td><span class="label label-danger">已驳回</span></td>
										<?php } else{ ?> 
											<td></td>
										<?php } ?>
										<td><?= $Users[$hetongList['id']] ?></td>
										<td><?= $hetongList['time']->format('Y-m-d H:m:s')?></td>
										<td>
											<?php if( $hetongList['istijiao']==0 || ( $hetongList['isshenhe']==2 && $hetongList['pingshenbumen_diss'] != NULL ) ){ 
											echo $this->Html->link('合同评审管理', ['action' => 'manage', $hetongList['id']]); 
											}else{ 
											echo $this->Html->link('合同评审查看', ['action' => 'view', $hetongList['id']]); 
											}?>
											<?php if( $hetongList['istijiao']!=0 ){ 
											echo $this->Html->link(' 审核进度', ['action' => 'process', $hetongList['id']]); 
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
									<a href="/projectERP/hetongLists/index" class="btn btn-warning"><i class="glyphicon glyphicon-backward"></i> 返回</a>
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->