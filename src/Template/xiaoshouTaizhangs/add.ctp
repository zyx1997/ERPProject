
				<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        新增销售台账
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/xiaoshouTaizhangs/index"><i class="fa fa-dashboard"></i>销售管理</a></li>
                        <li class="active">销售台账</li>
                    </ol>
                </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form method="post" action="/projectERP/xiaoshouTaizhangs/add" class="box box-primary box-content" enctype="multipart/form-data" style="width: 60%; margin: 0px auto;">
                    <div class="box-header">
                        <h3 class="box-title">销售台账信息</h3>
                    </div>
                    <div class="box-body" style="width:90%;margin: auto;">
                        <!-- Date dd/mm/yyyy -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">订货日期</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="dinghuodate" class="form-control datepicker" placeholder="请选择"/>
							</div>
                        </div><!-- /.form group -->
						<!-- phone mask -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">联系人</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="person" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<!-- phone mask -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">联系方式</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="telephone" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<!-- phone mask -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">采购单位</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="caigoudanwei" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<!-- phone mask -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">终端客户单位</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="zhongduandanwei" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<!-- phone mask -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">收货地址</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="shouhuodizhi" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">采购地区</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="caigoudiqu" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
                        <!-- phone mask -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">销售地区</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="xiaoshoudiqu" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
                        <!-- phone mask -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">仪器型号</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="xinghao" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
                        <!-- phone mask -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">产品名称</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="name" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
                        <!-- phone mask -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">机器型号/编号</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="jiqiid" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
                        <!-- phone mask -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">数量</label>
							<div class="controls" style="width:90%;">
								<input id="quantity" name="quantity" type="text" class="form-control" placeholder="请输入数字"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">单价</label>
							<div class="controls" style="width:90%;">
								<input id="price" name="price" type="text" class="form-control" placeholder="请输入金额"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">总价</label>
							<div class="controls" style="width:90%;">
								<input id="totalPrice" name="totalprice" onclick="getTotalPrice()" type="text" class="form-control" required="required" placeholder="自动计算数值"/>
							</div>
                        </div><!-- /.form group -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">汇款情况</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="huikuan" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">到账账户</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="daozhangzhanghu" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">到账金额</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="daozhangprice" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">到账日期</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="daozhangdate" class="form-control datepicker" placeholder="请选择"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">发货方式</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="fahuofangshi" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">单号</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="danhao" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">发货时间</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="fahuodate" class="form-control datepicker" placeholder="请选择"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">经办人</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="jingbanren" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">备注</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="beizhu" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交登记" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>

                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->