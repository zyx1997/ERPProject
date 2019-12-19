<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        经销商信息管理
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/jingxiaoXinxis/index"><i class="fa fa-dashboard"></i>销售商基本信息管理</a></li>
                        <li class="active">经销商基本信息</li>
                    </ol>
                </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="box box-primary box-content" style="width: 60%; margin: 0px auto;">
                    <div class="box-header">
                        <h3 class="box-title">经销商基本信息</h3>
                    </div>
                    <form method="post" action="/projectERP/jingxiaoXinxis/edit/<?=$jingxiaoXinxi->id ?>" enctype="multipart/form-data"   class="box-body" style="width:90%;margin: auto;">
						<!-- phone mask -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">经销商名称</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="name" value="<?=$jingxiaoXinxi->name ?>" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">统一信用代码</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="daima" value="<?=$jingxiaoXinxi->daima ?>"  class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">经销商类型</label>
							<div class="controls" style="width:90%;">
								<select name="jingxiaotype">
									<option value="省代" <?php if($jingxiaoXinxi->jingxiaotype=="省代") echo "selected"; ?> >省代</option>
									<option value="区代" <?php if($jingxiaoXinxi->jingxiaotype=="区代") echo "selected"; ?> >区代</option>
									<option value="特许" <?php if($jingxiaoXinxi->jingxiaotype=="特许") echo "selected"; ?> >特许</option>
									<option value="报单" <?php if($jingxiaoXinxi->jingxiaotype=="报单") echo "selected"; ?> >报单</option>
								</select>
							</div>
                        </div><!-- /.form group -->
						<!-- phone mask -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">诚意金(万元)</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="chengyijin" value="<?=$jingxiaoXinxi->chengyijin ?>" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<!-- phone mask -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">联系人</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="lianxiren" value="<?=$jingxiaoXinxi->lianxiren ?>" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">联系电话</label>
							<div class="controls" style="width:90%;">
								<input name="telephone" type="text" value="<?=$jingxiaoXinxi->telephone ?>" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">省市</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="shengshi" value="<?=$jingxiaoXinxi->shengshi ?>" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">详细地址</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="dizhi" value="<?=$jingxiaoXinxi->dizhi ?>" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">许可证</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="xukezheng" value="<?=$jingxiaoXinxi->xukezheng ?>" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<div class="box-body"  style="width:90%;margin: auto;text-align: center">
							<input type="submit" value="提交登记" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
						</div>
                    </form><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </section><!-- /.content -->