<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        经销商信息
                        <small>合同评审管理</small>
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
								</tr>
							</thead>
							<tbody>
								<?php foreach ($jingxiaoZizhis as $jingxiaoZizhi): ?>
								<tr class="editable">
									<td><?= $jingxiaoZizhi->name ?></td>
									<td><?= $jingxiaoZizhi->wenjiantype ?></td>
									<td><?php if($jingxiaoZizhi->kaishidate) echo $jingxiaoZizhi->kaishidate->format('Y-m-d'); ?></td>
									<td><?php if($jingxiaoZizhi->jieshudate) echo $jingxiaoZizhi->jieshudate->format('Y-m-d'); ?></td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table><!-- /.table -->
					</div>
					
					<div class="box-header" style="margin-top:30px;">
						<h3 class="box-title">标准配置列表</h3>
					</div>
					<div class="box-body table-responsive">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>配套名称</th>
									<th>参考价格(套)</th>
									<th>查看配套详情</th>
									<th>附件</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($jingxiaoPeitaos as $jingxiaoPeitao): ?>
								<tr class="editable">
									<td><?= $jingxiaoPeitao->peitaoname ?></td>
									<td><?= $jingxiaoPeitao->peitaojiage ?></td>
									<td><a download="默认" href="../../webroot/jingxiaozizhi/<?= $jingxiaoZizhi->fujian ?>">下载</a></td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table><!-- /.table -->
					</div>
					<div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <a href="/projectERP/hetongLists/manage/<?=$hetongList->id ?>" class="btn btn-warning btn-sm" style="color:white;">跳转评审管理</a>
                        <input type="submit" value="提交" class="btn btn-primary btn-sm" style="margin: 0px auto;display: none; margin-left:20px;"></input>
                    </div>
				</div>
					
                </div><!-- /.box -->
            </div>
        </section><!-- /.content -->