        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                第一步：标准配置选择
                <small>添加配套产品</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/hetongLists/index"><i class="fa fa-dashboard"></i>合同评审</a></li>
                <li class="active">合同评审管理</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
				<form method="post" action="/projectERP/hetongLists/searchpeitao/<?= $hetongList['id'] ?>" class="box box-primary" accept-charset="utf-8" enctype="multipart/form-data" style="width: 60%; margin: 0px auto;">
                    <div class="box-body">
                        <div class="box-body"  style="width:90%;margin: auto;" >
                            <div class="box-header">
                                <h3 class="box-title">合同评审信息</h3>
                            </div>
                            <table class="table table-bordered table-hover" style="margin-bottom: 10px;">
                                <thead>
                                <tr>
                                    <th>编号</th>
									<th>订货单位</th>
									<th>评审对象</th>
                                    <th>发货地址</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
									<td><?= $hetongList->h_id?></td>
									<?php if($hetongList->dh_type == 0){ ?>
									<td><a target="_blank" href="/projectERP/jingxiaoXinxis/view/<?= $hetongList['dh_id'] ?>"><?= $hetongList->dh_name ?></a></td>
									<?php }elseif($hetongList->dh_type == 1){ ?>
									<td><a href="/projectERP/yiyuanXinxis/view/<?= $hetongList['dh_id'] ?>"><?= $hetongList->dh_name ?></a></td>
									<?php }else{ ?>
									<td><a href="/projectERP/qitaXinxis/view/<?= $hetongList['dh_id'] ?>"><?= $hetongList->dh_name ?></a></td>
									<?php } ?>
									<td><?= $hetongList->duixiang ?></td>
									<td><?= $hetongList->delivery_addr?></td>
                                </tr>
                                </tfoot>
								<thead>
                                <tr>
                                    <th>交货方式</th>
                                    <th>质保期</th>
									<th>产品合计(元)</th>
									<th>审批状态</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
									<td>
										<?= $hetongList->jiaohuofangshi ?>
										<?php if($hetongList->jiaohuofangshi == "款到发货(限天数)" ){ 
										echo ":".$hetongList->jiaohuofangshi_tianshu; 
										} elseif($hetongList->jiaohuofangshi == "其他"  ){ 
										echo ":".$hetongList->jiaohuofangshi_qita; } ?>
									</td>
									<td><?= $hetongList->zhibaoqi?></td>
									<td><?= $hetongList->heji_totalprice?></td>
									<?php if($hetongList->istijiao==0){ ?>
										<td><span class="label label-default">未提交审核</span></td>
									<?php } elseif($hetongList->isshenhe==0){ ?>
										<td><span class="label label-warning">已提交审核</span></td>
									<?php } elseif($hetongList->isshenhe==1 && $hetongList->pingshenbumen_diss == NULL ){ ?> 
										<td><span class="label label-primary">正在审核</span></td> 
									<?php } elseif($hetongList->isshenhe==1 && $hetongList->pingshenbumen_diss != NULL ){ ?> 
										<td><span class="label label-primary">正在审核（有驳回）</span></td> 
									<?php } elseif($hetongList->isshenhe==2 && $hetongList->shenheok==1 && $hetongList->pingshenbumen_diss == NULL){ ?> 
										<td><span class="label label-success">审核通过</span></td> 
									<?php } elseif($hetongList->isshenhe==2 && $hetongList->pingshenbumen_diss != NULL ){ ?> 
										<td><span class="label label-danger">已驳回</span></td>
									<?php } else{ ?> 
										<td></td>
									<?php } ?>
                                </tr>
                                </tfoot>
                            </table>
							<table class="table table-bordered table-hover" style="margin-bottom: 30px;">
								<thead>
								<tr>
									<th>备注</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td><?= $hetongList->beizhu ?></td>
								</tr>
								</tfoot>
							</table>
							
							<div class="box-header" style="margin-top: 30px;">
                                <h3 class="box-title">标准配置选择</h3>
                            </div>
							<div class="form-group">
								<div class="input-group-btn">
									<div class="btn-group">
										<div>输入配套名称：
											<input type="text" id="name" name="name" />
											<input name="submit" type="submit" class="btn btn-sm btn-primary" value="搜索"></input>
										</div>
									</div><!-- ./btn-group -->
								</div>
							</div><!-- /.form group -->
							<?php if($gongyingPeitaos!=NULL) { ?>
								<?php foreach ($gongyingPeitaos as $gongyingPeitao): ?>
									<div class="row" style="width: 100%; margin: 10px auto;">
										<div class="box box-primary">
											<div class="box-header" data-widget="collapse"  data-toggle="tooltip">
												<h3 class="box-title"><?= $gongyingPeitao->peitaoname ?></h3>
												<div class="box-tools pull-right">
													<button class="btn btn-primary btn-sm" title="隐藏/展开"><i class="fa fa-minus"></i></button>
													<!--
													<a href="/projectERP/hetongLists/addPeitao/<?= $hetongList->id ?>/<?= $gongyingPeitao->ptid ?>" title="选择" class="btn btn-primary btn-sm" style="color:white;"><i class="fa fa-check"></i></a>
													-->
												</div>
											</div>
											<div class="box-body">
												<table id="<?= $gongyingPeitao->id ?>" class="box-body table table-bordered table-hover" style="text-align:center;margin-bottom:20px;">
													<thead>
														<tr>
															<th style="text-align:center;">产品信息</th>
															<th style="text-align:center;">编号</th>
															<th style="text-align:center;">名称</th>
															<th style="text-align:center;">数量</th>
														</tr>
													</thead>
													<tbody>
														<tr class="editable">
															<td>成品</td>
															<td><?= $chengpinPeitaos[$gongyingPeitao['ptid']]->mid ?></td>
															<td><?= $chengpinPeitaos[$gongyingPeitao['ptid']]->mname ?></td>
															<td><?= $chengpinPeitaos[$gongyingPeitao['ptid']]->mnumber ?></td>
														</tr>
														<tr>
															<td rowspan="<?= $peitaoitemsCount[$gongyingPeitao['ptid']]+1 ?>">附件</td>
														</tr>
														<?php foreach ($chengpinPeitaoitems[$gongyingPeitao['ptid']] as $chengpinPeitaoitem): ?>
														<tr class="editable">
															<td><?= $chengpinPeitaoitem->fujianid ?></td>
															<td><?= $chengpinPeitaoitem->fujianname ?></td>
															<td><?= $chengpinPeitaoitem->fujiannumber ?></td>
														</tr>
														<?php endforeach; ?><!-- /.列举完所有附件 -->
														<tr class="editable">
															<td>参考价格（套）</td>
															<td colspan="3"><?= $gongyingPeitaojiages[$gongyingPeitao['ptid']] ?></td>
														</tr>
														<tr class="editable">
															<td colspan="4"><?= $this->Html->link('选择', ['action' => 'addPeitao', $hetongList->id, $gongyingPeitao->ptid]) ?></td>
														</tr>
													</tbody>
												</table><!-- /.table -->
											</div><!-- /.box-body -->
										</div><!-- /.box -->
									</div><!-- /.row -->
									<?php endforeach; ?><!-- /.列举完所有配套 -->
							<?php } ?>
                            
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <a href="/projectERP/hetongLists/manage/<?=$hetongList->id ?>" class="btn btn-warning btn-sm" style="color:white;">跳转评审管理</a>
                        <input type="submit" value="提交" class="btn btn-primary btn-sm" style="margin: 0px auto;display: none; margin-left:20px;"></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->