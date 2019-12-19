        <section class="content-header">
            <h1>
                供货方审批
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/caigouProvidershenpis/index"><i class="fa fa-dashboard"></i>供货方管理</a></li>
                <li class="active">供货方审批</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
				<form method="post" class="box box-primary" accept-charset="utf-8" enctype="multipart/form-data" action="/projectERP/caigouProvidershenpis/shenpi/<?= $caigouProvider['id']; ?>"  style="width: 60%; margin: 0px auto;">
                    <div class="box-body">
                        <div class="col-xs-12">
                            <div class="box-header">
                                <h3 class="box-title">供货方信息</h3>
                            </div>
                            <table class="table table-bordered table-hover" style="text-align: left;">
                                <thead>
                                <tr>
                                    <th>编码</th>
                                    <th>公司名称</th>
                                    <th>税号</th>
                                    <th>联系人</th>
                                </tr>
                                </thead>
                                <tbody>
								<tr>
									<td><?= $caigouProvider->p_id ?></td>
									<td><?= $caigouProvider->p_name ?></td>
									<td><?= $caigouProvider->shuihao ?></td>	
									<td><?= $caigouProvider->person ?></td>
								</tr>
								</tfoot>
								<thead>
                                <tr>
									<th>电话号码</th>
									<th>手机号码</th>
									<th>地址</th>
									<th>是否为物流</th>
                                </tr>
                                </thead>
								<tbody>
								<tr>
									<td><?= $caigouProvider->dianhua ?></td>
									<td><?= $caigouProvider->shouji ?></td>
									<td><?= $caigouProvider->dizhi ?></td>
									<td><?php if($caigouProvider->iswuliu==1){echo "是";} if($caigouProvider->iswuliu==0){echo "否";} ?></td>
								</tr>
								</tfoot>
                            </table>
							<div class="box-header" style="margin-top:30px">
                                <h3 class="box-title">审核意见</h3>
                            </div>
                            <table class="table table-bordered table-hover" style="text-align: left;">
                                <thead>
                                <tr>
                                    <th>审核结果</th>
                                    <th>审核人</th>
                                    <th>审核时间</th>
                                    <th>审核备注</th>
                                </tr>
                                </thead>
                                <tbody>
								<tr>
									<td>
									<?php if($caigouProvider->shenheok==1){ ?> 
									<span class="label label-success">已审核</span>
									<?php } else { ?> 
									<span class="label label-danger">已驳回</span>
									<?php } ?>
									</td>
									<td><?= $caigouProvider->shenheren ?></td>
									<td><?= $caigouProvider->shenhe_time->format('Y-m-d H:m:s') ?></td>	
									<td><?= $caigouProvider->shenhe_beizhu ?></td>
								</tr>
								</tfoot>
                            </table>
                            <div class="form-group" style="text-align: center;margin-top:40px">
                                <div style="margin: 10px auto;">
                                    <label>
                                        <input style="margin: 3px;" type="radio" name="shenpiok" value="1" class="minimal" checked/> 通过
                                    </label>
                                    <label>
                                        <input style="margin: 3px;" type="radio" name="shenpiok" value="0" class="minimal"/>  驳回
                                    </label>
                                </div>
                            </div>
							<div class="box-header">
								<h3 class="box-title">审批备注</h3>
							</div>
							<div class="box-body"  style="width:90%;margin: auto;text-align: center">
								<textarea id="shenpi_beizhu" name="shenpi_beizhu" style="width:90%;margin: auto;"></textarea>
							</div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->