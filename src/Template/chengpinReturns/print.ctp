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

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form action="/projectERP/chengpinReturns/index" class="box box-primary box-content" style="width: 60%; margin: 0px auto;">
                    <div class="box-header">
                        <h3 class="box-title">退换货通知单</h3>
                    </div>
                    <div class="box-body" style="width:90%;margin: auto;">
                        <!-- Date dd/mm/yyyy -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">订单编号</label>
							<div class="controls" style="width:90%;">
								<input type="text" value="T20190413001" readonly="readonly" class="form-control" required="required"  placeholder="请输入(必填)"/>
							</div>
                        </div><!-- /.form group -->
                        <!-- phone mask -->

                        <!-- phone mask -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">日期</label>
							<div class="controls" style="width:90%;">
								<input type="text" value="2016-05-09" class="form-control datepicker" required="required" placeholder="请选择(必填)" readonly="readonly" />
							</div>
                        </div><!-- /.form group -->
                        <!-- IP mask -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">退换货申请人</label>
							<div class="controls" style="width:90%;">
								<input type="text" value="原野" class="form-control" required="required" placeholder="请输入(必填)" readonly="readonly" />
							</div>
                        </div><!-- /.form group -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">申请单位名称</label>
							<div class="controls" style="width:90%;">
								<input type="text" value="天津大学" class="form-control" required="required" placeholder="请输入(必填)" readonly="readonly" />
							</div>
                        </div><!-- /.form group -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">申请联系人</label>
							<div class="controls" style="width:90%;">
								<input type="text" value="张三" class="form-control" required="required" placeholder="请输入(必填)" readonly="readonly" />
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">联系电话</label>
							<div class="controls" style="width:90%;">
								<input type="text" value="302231" class="form-control" required="required" placeholder="请输入(必填)" readonly="readonly" />
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
								<input type="text" class="form-control" placeholder="订单产品；订单型号(必填)" required readonly="readonly" />
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">备注说明</label>
							<div class="controls" style="width:90%;">
								<input type="text" class="form-control" placeholder="请输入" readonly="readonly" />
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">数量</label>
							<div class="controls" style="width:90%;">
								<input id="quantity" value="23" type="text" class="form-control" required="required" placeholder="请输入数字(必填)" readonly="readonly" />
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">单价</label>
							<div class="controls" style="width:90%;">
								<input id="price" value="10" type="text" class="form-control" required="required" placeholder="请输入金额(必填)" readonly="readonly" />
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">总价</label>
							<div class="controls" style="width:90%;">
								<input id="totalPrice" value="230" onclick="getTotalPrice()" type="text" class="form-control" required="required" placeholder="自动计算数值(必填)" readonly="readonly" />
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">收货单位</label>
							<div class="controls" style="width:90%;">
								<input type="text" value="天津市" class="form-control" required="required" placeholder="请输入(必填)" readonly="readonly" />
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">收获人</label>
							<div class="controls" style="width:90%;">
								<input type="text" value="收货人" class="form-control" required="required" placeholder="请输入(必填)" readonly="readonly" />
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">收获电话</label>
							<div class="controls" style="width:90%;">
								<input type="text" value="30298" class="form-control" required="required" placeholder="请输入(必填)" readonly="readonly" />
							</div>
                        </div><!-- /.form group -->
                    </div><!-- /.box-body -->
                    <div class="box-header">
                        <h3 class="box-title">特殊说明</h3>
                    </div>
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                            <textarea readonly="readonly" id="beizhu" name="beizhu" style="width:90%;margin: auto;">
                            </textarea>

                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <button id="printNow" class="btn btn-success" onclick="window.print();"><i class="fa fa-print"></i> 打印</button>
                    </div>

                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->