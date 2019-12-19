        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                编辑供应方风险评估
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/caigouRisks/index"><i class="fa fa-dashboard"></i>供货方管理</a></li>
                <li class="active">供应方风险评估</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
				<form method="post" class="box box-primary" accept-charset="utf-8" enctype="multipart/form-data" action="/projectERP/caigouRisks/modify/<?= $caigouProvider['id']; ?>"  style="width: 60%; margin: 0px auto;">
					<div class="box-header">
                        <h3 class="box-title">供应方信息</h3>
                    </div>
							<table class="table table-bordered table-hover" style="text-align: left;width: 90%; margin: auto">
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
                    <div class="box-body" style="width:90%;margin: auto">
                        <div class="form-group">
                            <label>评审分数:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
								<input type="text" id="pinggu" name="pinggu" value="<?= $caigouProvider['pinggu'] ?>" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                    </div><!-- /.box-body -->
                    <div class="box-header">
                        <h3 class="box-title">评审备注</h3>
                    </div>
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <textarea id="beizhu" name="pg_beizhu" style="width:90%;margin: auto;"><?= $caigouProvider['pg_beizhu'] ?></textarea>
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交修改" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>

                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->