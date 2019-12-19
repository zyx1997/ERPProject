        <section class="content-header">
            <h1>
                退换通知单审批
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/chengpinReturnchecks/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                <li class="active">退换货通知单审批</li>
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
							
							<?php if($chengpinReturn->isshenpi==0){ ?>
                            <div class="form-group" style="text-align: center;">
								<input type="hidden" name="isshenpi" value="1"/>
                                <div style="margin: 10px auto;">
                                    <label>
                                        <input style="margin: 3px;" type="radio" name="shenpiresult" value="1" class="minimal" checked/> 通过
                                    </label>
                                    <label>
                                        <input style="margin: 3px;" type="radio" name="shenpiresult" value="0" class="minimal"/>  驳回
                                    </label>
                                </div>
                            </div>
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">审批说明</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="shenpireason" class="form-control" placeholder="驳回必填"/>
							</div>
							</div>
							<div class="box-body"  style="width:90%;margin: auto;text-align: center">
								<input type="submit" value="提交" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
							</div>
							<?php } ?>
                    
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->