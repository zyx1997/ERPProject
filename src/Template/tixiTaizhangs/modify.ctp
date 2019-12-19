<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        修改销售台账
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/tixiTaizhangs/index"><i class="fa fa-dashboard"></i>销售管理</a></li>
                        <li class="active">销售台账</li>
                    </ol>
                </section>


       <!-- Main content -->
        <section class="content">
            <div class="row">
                <form method="post" action="/projectERP/tixiTaizhangs/modify/<?=$tixiTaizhang->id ?>" class="box box-primary box-content" enctype="multipart/form-data" style="width: 60%; margin: 0px auto;">
                    <div class="box-header">
                        <h3 class="box-title">销售台账信息</h3>
                    </div>
                    <div class="box-body" style="width:90%;margin: auto;">
						<!-- phone mask -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">进货单位</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="jinhuodanwei" value="<?=$tixiTaizhang->jinhuodanwei ?>" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">产品名称</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="name" value="<?=$tixiTaizhang->name ?>" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<!-- phone mask -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">型号/规格</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="xinghao" value="<?=$tixiTaizhang->xinghao ?>" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<!-- phone mask -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">生产批号</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="shengchanid" value="<?=$tixiTaizhang->shengchanid ?>" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">数量</label>
							<div class="controls" style="width:90%;">
								<input name="quantity" type="text" value="<?=$tixiTaizhang->quantity ?>" class="form-control" placeholder="请输入数字"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">单位</label>
							<div class="controls" style="width:90%;">
								<input name="danwei" type="text" value="<?=$tixiTaizhang->danwei ?>" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<!-- phone mask -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">联系人</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="person" value="<?=$tixiTaizhang->person ?>" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">联系方式</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="telephone" value="<?=$tixiTaizhang->telephone ?>" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">地址</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="dizhi" value="<?=$tixiTaizhang->dizhi ?>" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">发货日期</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="fahuodate" value="<?=$tixiTaizhang->fahuodate->format('Y-m-d') ?>" class="form-control datepicker" placeholder="请选择"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">订货日期</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="dinghuodate" value="<?php if($tixiTaizhang->dinghuodate) echo $tixiTaizhang->dinghuodate->format('Y-m-d') ?>" class="form-control datepicker" placeholder="请选择"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">备注</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="beizhu" value="<?=$tixiTaizhang->beizhu ?>" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
                    </div><!-- /.box-body -->
                    
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交登记" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>

                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->