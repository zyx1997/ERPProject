                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        合同表详情
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
								<div class="box-body table-responsive">
									<table class="table table-bordered table-hover" style="margin-bottom: 30px;">
										<thead>
										<tr>
											<th>评审对象</th>
                                            <th>编号</th>
											<th>订货单位</th>
                                            <th>发货地址</th>
                                            <th>交货方式</th>
                                            <th>质保期</th>
											<th>产品合计(元)</th>
											<th>审批状态</th>
										</tr>
										</thead>
										<tbody>
										<tr>
											<td><?= $hetongList->duixiang ?></td>
											<td><?= $hetongList->h_id?></td>
											<td><?= $hetongList->dh_name?></td>
											<td><?= $hetongList->delivery_addr?></td>
											<td>
												<?= $hetongList->jiaohuofangshi ?>
												<?php if($hetongList->jiaohuofangshi == "款到发货(限天数)" ){ 
												echo ":".$hetongList->jiaohuofangshi_tianshu; 
												} elseif($hetongList->jiaohuofangshi == "其他"  ){ 
												echo ":".$hetongList->jiaohuofangshi_qita; } ?>
											</td>
											<td><?= $hetongList->zhibaoqi?></td>
											<td><?= $hetongList['heji_totalprice']?></td>
											<?php if($hetongList->isshenhe==0){ ?>
												<td><span class="label label-warning">未审批</span></td>
											<?php } elseif($hetongList->isshenhe==1 && $hetongList->pingshenbumen_diss == NULL ){ ?> 
												<td><span class="label label-primary">正在审批</span></td> 
											<?php } elseif($hetongList->isshenhe==1 && $hetongList->pingshenbumen_diss != NULL ){ ?> 
												<td><span class="label label-primary">正在审批（有驳回）</span></td> 
											<?php } elseif($hetongList->isshenhe==2 && $hetongList->shenheok==1 && $hetongList->pingshenbumen_diss == NULL){ ?> 
												<td><span class="label label-success">审批通过</span></td> 
											<?php } elseif($hetongList->isshenhe==2 && $hetongList->pingshenbumen_diss != NULL ){ ?> 
												<td><span class="label label-danger">已驳回</span></td>
											<?php } else{ ?> 
												<td></td>
											<?php } ?>
										</tr>
										</tfoot>
									</table>
								</div><!-- /.box-body-->
								<div class="box-header">
                                    <h3 class="box-title">合同产品查询结果</h3>
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
											<th>数量</th>
											<th>成品/附件价格</th>
											<th>总价(元)</th>
											<th>优惠(元)</th>
											<th>优惠备注</th>
											<th>合计(元)</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($result as $hetongListAll): ?>
										<tr>
										<td><?= $hetongListAll['mid'] ?></td>
										<td><?= $hetongListAll['name']?></td>	
										<td><?php if($hetongListAll['isfujian']==1){echo "是";} if($hetongListAll['isfujian']==0){echo "否";} ?></td>
										<td><?= $hetongListAll['xinghao']?></td>
										<td><?= $hetongListAll['danwei']?></td>
										<td><?= $hetongListAll['miaoshu']?></td>
										<td><?= $hetongListAll['weizhi']?></td>
										<td><?= $hetongListAll['shuliang']?></td>
										<td><?= $hetongListAll['zhidaojia']?></td>
										<td><?= $hetongListAll['zongjia']?></td>
										<td><?= $hetongListAll['youhui_price']?></td>
										<td><?= $hetongListAll['youhui_beizhu']?></td>
										<td><?= $hetongListAll['heji_price']?></td>
										<td>
											<?php if( $hetongList['isshenhe']==0 || ( $hetongList['isshenhe']==2 && $hetongList['shenheok'] == 0) ){ 
											echo $this->Html->link('修改', ['action' => 'modifyM', $hetongListAll['id']]); 
											echo $this->Form->postLink(
												' 删除',
												['action' => 'deleteM', $hetongListAll['id']],
												['confirm' => '确认删除?']);
											} ?>
										</td>
										</tr>
										<?php endforeach; ?>
                                        </tbody>
                                    </table><!-- /.table -->
									<?php } ?>
                                </div><!-- /.box-body-->
								<div class="box-footer clearfix no-border">
									<a href="/projectERP/hetongLists/see/<?= $hetongList['id'] ?>" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-backward"></i> 返回</a>
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->