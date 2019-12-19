<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        新增经销商资质
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
                <form method="post" action="/projectERP/jingxiaoXinxis/addzizhi/<?= $jxid ?>" class="box box-primary box-content" enctype="multipart/form-data" style="width: 60%; margin: 0px auto;">
                    <div class="box-header">
                        <h3 class="box-title">经销商资质</h3>
                    </div>
                    <div class="box-body" style="width:90%;margin: auto;">
						<!-- phone mask -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">文件名称</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="name" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">经销商类型</label>
							<div class="controls" style="width:90%;">
								<select name="wenjiantype">
									<option value="三类经营许可证">三类经营许可证</option>
									<option value="二类经营备案表">二类经营备案表</option>
									<option value="产品许可证">产品许可证</option>
									<option value="医疗许可证">医疗许可证</option>
									<option value="第三方洁净检测报告">第三方洁净检测报告</option>
									<option value="营业执照">营业执照</option>
									<option value="质量保证协议">质量保证协议</option>
									<option value="质量手册程序文件">质量手册程序文件</option>
									<option value="采购合同">采购合同</option>
								</select>
							</div>
                        </div><!-- /.form group -->
						<!-- phone mask -->
						
						<!-- phone mask -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">开始日期</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="kaishidate" class="form-control datepicker" placeholder="请选择(必填)"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">结束日期</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="jieshudate" class="form-control datepicker" placeholder="请选择(必填)"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">附件</label>
							<div class="controls" style="width:90%;">
								<input type="file" name="fileUpload" />
							</div>
                        </div><!-- /.form group -->
                    </div><!-- /.box-body -->
                    
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交登记" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>
                </form><!-- /.box -->
				
            </div>
        </section><!-- /.content -->