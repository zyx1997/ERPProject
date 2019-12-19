<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        查看配套信息
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/jingxiaoXinxis/index"><i class="fa fa-dashboard"></i>销售商基本信息管理</a></li>
                        <li class="active">经销商基本信息</li>
                    </ol>
                </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="box box-primary" style="width: 60%; margin: 0px auto;">

                    <div class="box-body">
                        <div id="item_info" class="col-xs-12">
                            <div class="box-header">
                                <h3 class="box-title">成品配套信息</h3>
                            </div>
							<div class="box-body table-responsive">
								<table class="table table-bordered table-hover" style="text-align:center;">
									<thead>
										<tr class="editable">
											<th style="text-align:center;">配套名称</th>
											<td colspan="3"><?= $chengpinPeitao->name ?></td>
										</tr>
										<tr class="editable">
											<th style="text-align:center;">参考价格（套）</th>
											<td colspan="3"><?= $chengpinPeitao->cankaojiage ?></td>
										</tr>
										<tr>
											<th colspan="4" style="text-align:center;">产品信息</th>
										</tr>
										<tr>
											<th style="text-align:center;">产品类型</th>
											<th style="text-align:center;">编号</th>
											<th style="text-align:center;">名称</th>
											<th style="text-align:center;">数量</th>
										</tr>
									</thead>
									<tbody>
										<tr class="editable">
											<th style="text-align:center;">成品</th>
											<td><?= $chengpinPeitao->mid ?></td>
											<td><?= $chengpinPeitao->mname ?></td>
											<td><?= $chengpinPeitao->mnumber ?></td>
										</tr>
										<tr>
											<th style="text-align:center;" rowspan="<?= $chengpinPeitaoitems->count()+1 ?>">附件</th>
										</tr>
										<?php foreach ($chengpinPeitaoitems as $chengpinPeitaoitem): ?>
										<tr class="editable">
											<td><?= $chengpinPeitaoitem->fujianid ?></td>
											<td><?= $chengpinPeitaoitem->fujianname ?></td>
											<td><?= $chengpinPeitaoitem->fujiannumber ?></td>
										</tr>
										<?php endforeach; ?>
										
									</tbody>
								</table><!-- /.table -->
							</div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
						<?php if($jingxiaoXinxi->istijiao==0||($jingxiaoXinxi->istijiao==1&&$jingxiaoXinxi->isshenpi==1&&$jingxiaoXinxi->shenpiresult==0)){ ?>
						<a href="/projectERP/jingxiaoXinxis/modify/<?=$jingxiaoXinxi->id ?>" class="btn btn-primary btn-sm" style="margin: 0px auto;">返回</a>
						<?php }else{ ?>
						<a href="/projectERP/jingxiaoXinxis/view/<?=$jingxiaoXinxi->id ?>" class="btn btn-primary btn-sm" style="margin: 0px auto;">返回</a>
						<?php } ?>
                    </div>
                </div><!-- /.box -->
            </div>
        </section><!-- /.content -->