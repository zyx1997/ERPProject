
		<!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                退换货通知单
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/chengpinReturns/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                <li class="active">退换货通知单</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <form method="post" action="/projectERP/chengpinReturnchecks/check/<?= $chengpinReturn['id']; ?>" accept-charset="utf-8" enctype="multipart/form-data"  class="box box-primary"  style="width: 60%; margin: 0px auto;padding:10px">


                            <div class="box-header">
                                <h3 class="box-title">退换货通知单信息</h3>
                            </div>

                            <table class="table table-bordered table-hover" style="text-align: left;">
                                <thead>
                                <tr>
                                    <th>订单编号</th>
                                    <th>日期</th>
                                    <th>退换货申请人</th>
									<th>申请单位名称</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?= $chengpinReturn['tid'] ?></td>
                                    <td><?= $chengpinReturn['date']->format('Y-m-d') ?></td>
                                    <td><?= $chengpinReturn['fuzeren'] ?></td>
                                    <td><?= $chengpinReturn['gdanwei'] ?></td>
                                </tr>
                                </tfoot>
								<thead>
                                <tr>
									<th>申请联系人</th>
									<th>联系电话</th>
									<th></th>
									<th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
									<td><?= $chengpinReturn['gperson'] ?></td>
									<td><?= $chengpinReturn['gtelephone'] ?></td>
									<th></th>
									<th></th>
                                </tr>
                                </tfoot>
                            </table>
							<div class="box-header">
                                <h3 class="box-title">明细(1)</h3>
                            </div>

                            <table class="table table-bordered table-hover" style="text-align: left;">
                                <thead>
                                <tr>
                                    <th>退换明细</th>
                                    <th>数量</th>
                                    <th>单价</th>
                                    <th>总价</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?= $chengpinReturn['mingxi'] ?></td>
                                    <td><?= $chengpinReturn['quantity'] ?></td>
                                    <td><?= $chengpinReturn['price'] ?></td>
                                    <td><?= $chengpinReturn['totalprice'] ?></td>
                                </tr>
                                </tfoot>
								<thead>
                                <tr>
									<th>收货单位</th>
									<th>收货人</th>
                                    <th>收货电话</th>
									<th>备注说明</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
									<td><?= $chengpinReturn['sdanwei'] ?></td>
									<td><?= $chengpinReturn['sperson'] ?></td>
									<td><?= $chengpinReturn['stelephone'] ?></td>
									<td><?= $chengpinReturn['beizhu'] ?></td>
                                </tr>
                                </tfoot>
                            </table>
							<div class="box-body"  style="width:90%;margin: auto;text-align: center">
								<a href="javascript:history.back(-1)" class="btn btn-primary btn-sm" style="margin: 0px auto">返回</a>
							</div>

                    
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->