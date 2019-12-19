
		<!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                管理发货通知单
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
                <form method="post" action="/projectERP/chengpinDeliverys/modify/<?= $chengpinDelivery['id']; ?>" accept-charset="utf-8" enctype="multipart/form-data" class="box box-primary box-content" style="width: 60%; margin: 0px auto;">
                    <div class="box-header">
                        <h3 class="box-title">发货通知单</h3>
                    </div>
                    <div class="box-body" style="width:90%;margin: auto;">
                        <!-- Date dd/mm/yyyy -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">订单编号</label>
							<div class="controls" style="width:90%;">
								<input type="text" class="form-control" value="<?= $chengpinDelivery['sid'] ?>" name="sid" readonly="readonly"  placeholder="请输入(必填)"/>
							</div>
                        </div><!-- /.form group -->
                        <!-- phone mask -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">合同编号</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="hetongid"  class="form-control" placeholder="请输入" value="<?= $chengpinDelivery['hetongid'] ?>" ></input>
							</div>
                        </div><!-- /.form group -->

                        <!-- phone mask -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">日期</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="date" value="<?= $chengpinDelivery['date']->format('Y-m-d') ?>" class="form-control datepicker" placeholder="请选择(必填)"/>
							</div>
                        </div><!-- /.form group -->
                        <!-- IP mask -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">负责人</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="fuzeren" value="<?= $chengpinDelivery['fuzeren'] ?>" class="form-control" placeholder="请输入(必填)"/>
							</div>
                        </div><!-- /.form group -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">购方单位名称</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="gdanwei" value="<?= $chengpinDelivery['gdanwei'] ?>" class="form-control" placeholder="请输入(必填)"/>
							</div>
                        </div><!-- /.form group -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">购方联系人</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="gperson" value="<?= $chengpinDelivery['gperson'] ?>" class="form-control" placeholder="请输入(必填)"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">联系电话</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="gtelephone" value="<?= $chengpinDelivery['gtelephone'] ?>" class="form-control" placeholder="请输入(必填)"/>
							</div>
                        </div><!-- /.form group -->
                    </div><!-- /.box-body -->
					<div class="box-header">
                        <h3 class="box-title">明细(1)</h3>
                    </div>
                    <div class="box-body"  style="width:90%;margin: auto;">
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">订单明细</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="mingxi"   class="form-control" placeholder="订单产品；订单型号" value="<?= $chengpinDelivery['mingxi'] ?>" ></input>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">备注说明</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="beizhu" class="form-control" placeholder="请输入" value="<?= $chengpinDelivery['beizhu'] ?>"  ></input>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">数量</label>
							<div class="controls" style="width:90%;">
								<input id="quantity" name="quantity" value="<?= $chengpinDelivery['quantity'] ?>" type="text" class="form-control" placeholder="请输入数字(必填)"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">单价</label>
							<div class="controls" style="width:90%;">
								<input id="price" name="price" value="<?= $chengpinDelivery['price'] ?>" type="text" class="form-control" placeholder="请输入金额(必填)"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">总价</label>
							<div class="controls" style="width:90%;">
								<input id="totalPrice" name="totalprice" value="<?= $chengpinDelivery['totalprice'] ?>" onclick="getTotalPrice()" type="text" class="form-control" required="required" placeholder="自动计算数值(必填)"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">收货单位</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="sdanwei" value="<?= $chengpinDelivery['sdanwei'] ?>" class="form-control" placeholder="请输入(必填)"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">收获人</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="sperson" value="<?= $chengpinDelivery['sperson'] ?>" class="form-control" placeholder="请输入(必填)"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">收获电话</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="stelephone" value="<?= $chengpinDelivery['stelephone'] ?>" class="form-control" placeholder="请输入(必填)"/>
							</div>
                        </div><!-- /.form group -->
						<?php if($chengpinDelivery->isshenpi==1&&$chengpinDelivery->shenpiresult==0) { ?>
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">驳回理由</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="shenpireason" value="<?= $chengpinDelivery['shenpireason']?>" readonly="readonly" class="form-control" />
							</div>
                        </div><!-- /.form group -->
						<?php }?>
                    </div><!-- /.box-body -->
                    <div class="box-header">
                        <h3 class="box-title">特殊说明</h3>
                    </div>
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center"><textarea id="beizhu" name="shuoming"  style="width:90%;margin: auto;"><?= $chengpinDelivery['shuoming'] ?></textarea>
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" name="submit" value="提交审批" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                        <input type="submit" name="submit" value="提交保存" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>

                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->