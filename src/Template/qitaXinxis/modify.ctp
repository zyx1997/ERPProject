<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        管理其他基本信息
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/qitaXinxis/index"><i class="fa fa-dashboard"></i>销售商基本信息管理</a></li>
                        <li class="active">其他基本信息</li>
                    </ol>
                </section>


       <section class="content">
            <div class="row">
                <form method="post" action="/projectERP/qitaXinxis/modify/<?=$qitaXinxi->id ?>" class="box box-primary box-content" enctype="multipart/form-data" style="width: 60%; margin: 0px auto;">
                    <div class="box-header">
                        <h3 class="box-title">其他基本信息</h3>
                    </div>
                    <div class="box-body" style="width:90%;margin: auto;">
						<!-- phone mask -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">名称</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="name" value="<?=$qitaXinxi->name ?>" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">身份证号</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="daima" value="<?=$qitaXinxi->daima ?>" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<!-- phone mask -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">地址</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="dizhi" value="<?=$qitaXinxi->dizhi ?>" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<!-- phone mask -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">联系人</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="lianxiren" value="<?=$qitaXinxi->lianxiren ?>" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">联系电话</label>
							<div class="controls" style="width:90%;">
								<input name="telephone" type="text" value="<?=$qitaXinxi->telephone ?>" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">重新上传执业资格证书</label>
							<div class="controls" style="width:90%;">
								<input type="file" name="fileUpload" />
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">证照过期时间</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="guoqidate" value="<?php if($qitaXinxi->guoqidate) echo $qitaXinxi->guoqidate->format('Y-m-d'); ?>" class="form-control datepicker" placeholder="请选择"/>
							</div>
                        </div><!-- /.form group -->
						<?php if($qitaXinxi['isshenpi']==1&&$qitaXinxi['shenpiresult']==0){ ?>
						<div class="box-header">
							<h3 class="box-title">驳回理由</h3>
						</div>
						<div class="box-body"  style="width:90%;margin: auto;text-align: center">
							<textarea style="width:90%;margin: auto;"><?=$qitaXinxi['shenpireason'] ?></textarea>
						</div><!-- /.box-body -->
						<?php } ?>
                    </div><!-- /.box-body -->
                    
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" name="submit" value="提交审批" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                        <input type="submit" name="submit" value="提交保存" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>

                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->