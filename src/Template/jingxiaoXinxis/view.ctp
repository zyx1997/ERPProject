<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        经销商信息
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
                <div class="col-xs-12">
				<div class="box">
                    <div class="box-header">
                        <h3 class="box-title">经销商基本信息</h3>
						
                    </div>
					<div class="box-body table-responsive">
						<table class="table table-bordered table-hover">
							<tbody>
								<tr>
									<th>经销商名称</th>
									<td><?= $jingxiaoXinxi->name ?></td>
								</tr>
								<tr>
									<th>统一信用代码</th>
									<td><?= $jingxiaoXinxi->daima ?></td>
								</tr>
								<tr>
									<th>经销商类型</th>
									<td><?= $jingxiaoXinxi->jingxiaotype ?></td>
								</tr>
								<tr>
									<th>诚意金(万元)</th>
									<td><?= $jingxiaoXinxi->chengyijin ?></td>
								</tr>
								<tr>
									<th>联系人</th>
									<td><?= $jingxiaoXinxi->lianxiren ?></td>
								</tr>
								<tr>
									<th>联系电话</th>
									<td><?= $jingxiaoXinxi->telephone ?></td>
								</tr>
								<tr>
									<th>省市</th>
									<td><?= $jingxiaoXinxi->shengshi ?></td>
								</tr>
								<tr>
									<th>详细地址</th>
									<td><?= $jingxiaoXinxi->dizhi ?></td>
								</tr>
								<tr>
									<th>许可证</th>
									<td><?= $jingxiaoXinxi->xukezheng ?></td>
								</tr>
								<tr>
									<th>"代理/特许"协议</th>
									<td><a download="默认" href="../../webroot/jingxiaoxieyi/<?= $jingxiaoXinxi->xieyi ?>">下载</a></td>
								</tr>
							</tbody>
						</table><!-- /.table -->
					</div>
					<div class="box-header" style="margin-top:30px;">
						<h3 class="box-title">经销商资质</h3>
					</div>
					<div class="box-body table-responsive">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>文件名称</th>
									<th>文件类型</th>
									<th>开始时间</th>
									<th>结束时间</th>
									<th>附件</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($jingxiaoZizhis as $jingxiaoZizhi): ?>
								<tr class="editable">
									<td><?= $jingxiaoZizhi->name ?></td>
									<td><?= $jingxiaoZizhi->wenjiantype ?></td>
									<td><?php if($jingxiaoZizhi->kaishidate) echo $jingxiaoZizhi->kaishidate->format('Y-m-d'); ?></td>
									<td><?php if($jingxiaoZizhi->jieshudate) echo $jingxiaoZizhi->jieshudate->format('Y-m-d'); ?></td>
									<td><a download="默认" href="../../webroot/jingxiaozizhi/<?= $jingxiaoZizhi->fujian ?>">下载</a></td>
									
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table><!-- /.table -->
					</div>
					
					<div class="box-header" style="margin-top:30px;">
						<h3 class="box-title">经销商可供产品(配套)</h3>
					</div>

					<?php foreach ($jingxiaoPeitaos as $jingxiaoPeitao): ?>
					<div class="row" style="width: 100%; margin: 10px auto;">
						<div class="box box-primary">
							<div class="box-header" data-widget="collapse" data-toggle="tooltip">
								<h3 class="box-title"><?= $jingxiaoPeitao->peitaoname ?></h3>
								<div class="box-tools pull-right">
									
									<button class="btn btn-primary btn-sm" ><i class="fa fa-minus"></i></button>
								</div>
							</div>
							<div class="box-body">
								<table class="box-body table table-bordered table-hover" style="text-align:center;margin-bottom:20px;">
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
											<td><?= $peitaos[$jingxiaoPeitao->ptid]->mid ?></td>
											<td><?= $peitaos[$jingxiaoPeitao->ptid]->mname ?></td>
											<td><?= $peitaos[$jingxiaoPeitao->ptid]->mnumber ?></td>
										</tr>
										<tr>
											<td rowspan="<?= $peitaoitems[$jingxiaoPeitao->ptid]->count()+1 ?>">附件</td>
										</tr>
										<?php foreach ($peitaoitems[$jingxiaoPeitao->ptid] as $peitaoitem): ?>
										<tr class="editable">
											<td><?= $peitaoitem->fujianid ?></td>
											<td><?= $peitaoitem->fujianname ?></td>
											<td><?= $peitaoitem->fujiannumber ?></td>
										</tr>
										<?php endforeach; ?><!-- /.列举完所有附件 -->
										<tr class="editable">
											<td>参考价格（套）</td>
											<td colspan="3"><?= $jingxiaoPeitao->peitaojiage ?></td>
										</tr>
									</tbody>
								</table><!-- /.table -->
							</div><!-- /.box-body -->
						</div><!-- /.box -->
					</div><!-- /.row -->
					<?php endforeach; ?>
					<div class="box-body"  style="width:90%;margin: auto;text-align: center">
						<a href="javascript:history.back(-1)" class="btn btn-primary btn-sm" style="margin: 0px auto">确定</a>
					</div>	
				</div>
                </div><!-- /.box -->
            </div>
        </section><!-- /.content -->