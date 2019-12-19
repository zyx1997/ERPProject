
		<!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                查看发货通知单
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/chengpinDeliverys/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                <li class="active">发货通知单</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="box box-primary box-content" style="width: 60%; margin: 0px auto;">
                    <div class="box-header">
                                <h3 class="box-title">发货通知单信息</h3>
                            </div>

                            <table class="table table-bordered table-hover" style="text-align: left;">
                                <thead>
                                <tr>
                                    <th>订单编号</th>
                                    <th>合同编号</th>
                                    <th>日期</th>
                                    <th>负责人</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?= $chengpinDelivery['sid'] ?></td>
                                    <td><?= $chengpinDelivery['hetongid'] ?></td>
                                    <td><?= $chengpinDelivery['date']->format('Y-m-d') ?></td>
                                    <td><?= $chengpinDelivery['fuzeren'] ?></td>
                                </tr>
                                </tfoot>
								<thead>
                                <tr>
									<th>购方单位名称</th>
									<th>购方联系人</th>
									<th>购方联系电话</th>
									<th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
									<td><?= $chengpinDelivery['gdanwei'] ?></td>
									<td><?= $chengpinDelivery['gperson'] ?></td>
									<td><?= $chengpinDelivery['gtelephone'] ?></td>
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
                                    <th>订单明细</th>
                                    <th>数量</th>
                                    <th>单价</th>
                                    <th>总价</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?= $chengpinDelivery['mingxi'] ?></td>
                                    <td><?= $chengpinDelivery['quantity'] ?></td>
                                    <td><?= $chengpinDelivery['price'] ?></td>
                                    <td><?= $chengpinDelivery['totalprice'] ?></td>
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
									<td><?= $chengpinDelivery['sdanwei'] ?></td>
									<td><?= $chengpinDelivery['sperson'] ?></td>
									<td><?= $chengpinDelivery['stelephone'] ?></td>
									<td><?= $chengpinDelivery['beizhu'] ?></td>
                                </tr>
                                </tfoot>
                            </table>
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <a href="javascript:history.back(-1)" class="btn btn-primary btn-sm" style="margin: 0px auto">返回</a>
                    </div>

                </div><!-- /.box -->
            </div>
        </section><!-- /.content -->