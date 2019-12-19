
		<!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                管理退换货通知单
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/chengpinReturns/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                <li class="active">退换货通知单</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form method="post" action="/projectERP/chengpinReturns/modify/<?= $chengpinReturn['id']; ?>" enctype="multipart/form-data"  class="box box-primary box-content" style="width: 60%; margin: 0px auto;">
                    <div class="box-header">
                        <h3 class="box-title">退换货通知单</h3>
                    </div>
                    <div class="box-body" style="width:90%;margin: auto;">
                        <!-- Date dd/mm/yyyy -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">订单编号</label>
							<div class="controls" style="width:90%;">
								<input type="text" class="form-control" value="<?= $chengpinReturn['tid'] ?>" name="tid" readonly="readonly"  placeholder="请输入(必填)"/>
							</div>
                        </div><!-- /.form group -->
                        <!-- phone mask -->
                        <!-- phone mask -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">日期</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="date" value="<?= $chengpinReturn['date']->format('Y-m-d') ?>" class="form-control datepicker" placeholder="请选择(必填)"/>
							</div>
                        </div><!-- /.form group -->
                        <!-- IP mask -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">退换货申请人</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="fuzeren" value="<?= $chengpinReturn['fuzeren'] ?>" class="form-control" placeholder="请输入(必填)"/>
							</div>
                        </div><!-- /.form group -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">申请单位名称</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="gdanwei" value="<?= $chengpinReturn['gdanwei'] ?>" class="form-control" placeholder="请输入(必填)"/>
							</div>
                        </div><!-- /.form group -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">申请联系人</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="gperson" value="<?= $chengpinReturn['gperson'] ?>" class="form-control" placeholder="请输入(必填)"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">联系电话</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="gtelephone" value="<?= $chengpinReturn['gtelephone'] ?>" class="form-control" placeholder="请输入(必填)"/>
							</div>
                        </div><!-- /.form group -->
                    </div><!-- /.box-body -->
					<div class="box-header">
                        <h3 class="box-title">明细(1)</h3>
                    </div>
                    <div class="box-body"  style="width:90%;margin: auto;">
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">退换明细</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="mingxi" value="<?= $chengpinReturn['mingxi'] ?>" class="form-control" placeholder="订单产品；订单型号（必填）"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">备注说明</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="beizhu" class="form-control" placeholder="请输入" value=<?= $chengpinReturn['beizhu'] ?> ></input>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">数量</label>
							<div class="controls" style="width:90%;">
								<input id="quantity" name="quantity" value="<?= $chengpinReturn['quantity'] ?>" type="text" class="form-control" placeholder="请输入数字(必填)"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">单价</label>
							<div class="controls" style="width:90%;">
								<input id="price" name="price" value="<?= $chengpinReturn['price'] ?>" type="text" class="form-control" placeholder="请输入金额(必填)"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">总价</label>
							<div class="controls" style="width:90%;">
								<input id="totalPrice" name="totalprice" value="<?= $chengpinReturn['totalprice'] ?>" onclick="getTotalPrice()" type="text" class="form-control" placeholder="自动计算数值(必填)"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">收货单位</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="sdanwei" value="<?= $chengpinReturn['sdanwei'] ?>" class="form-control" placeholder="请输入(必填)"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">收获人</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="sperson" value="<?= $chengpinReturn['sperson'] ?>" class="form-control" placeholder="请输入(必填)"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">收获电话</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="stelephone" value="<?= $chengpinReturn['stelephone'] ?>" class="form-control" placeholder="请输入(必填)"/>
							</div>
                        </div><!-- /.form group -->
						<?php if($chengpinReturn->isshenpi==1&&$chengpinReturn->shenpiresult==0) { ?>
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">驳回理由</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="shenpireason" value="<?= $chengpinReturn['shenpireason']?>" readonly="readonly" class="form-control" />
							</div>
                        </div><!-- /.form group -->
						<?php }?>
                    </div><!-- /.box-body -->
                    <div class="box-header">
                        <h3 class="box-title">特殊说明</h3>
                    </div>
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center"><textarea id="beizhu" name="beizhu" style="width:90%;margin: auto;"><?= $chengpinReturn['beizhu'] ?></textarea></div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" name="submit" value="提交审批" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                        <input type="submit" name="submit" value="提交保存" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>

                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->