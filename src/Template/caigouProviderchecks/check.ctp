        <section class="content-header">
            <h1>
                供货方管理审核
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/caigouProviderchecks/index"><i class="fa fa-dashboard"></i>供货方管理</a></li>
                <li class="active">供货方管理审核</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
				<form method="post" class="box box-primary" accept-charset="utf-8" enctype="multipart/form-data" action="/projectERP/caigouProviderchecks/check/<?= $caigouProvider['id']; ?>"  style="width: 60%; margin: 0px auto;">
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
                            <div class="form-group" style="text-align: center;">
                                <div style="margin: 10px auto;">
                                    <label>
                                        <input style="margin: 3px;" type="radio" name="shenheok" value="1" class="minimal" checked/> 通过
                                    </label>
                                    <label>
                                        <input style="margin: 3px;" type="radio" name="shenheok" value="0" class="minimal"/>  驳回
                                    </label>
                                </div>
                            </div>
							<div class="box-header">
								<h3 class="box-title">审核备注</h3>
							</div>
							<div class="box-body"  style="width:90%;margin: auto;text-align: center">
								<textarea id="shenhe_beizhu" name="shenhe_beizhu" style="width:90%;margin: auto;"></textarea>
							</div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->