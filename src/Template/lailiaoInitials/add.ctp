        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                新增原材料登记
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/lailiaoInitials/index"><i class="fa fa-dashboard"></i>原料库管理</a></li>
                <li class="active">原材料初始化登记</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form method="post" action="/projectERP/lailiaoInitials/add" class="box box-primary" enctype="multipart/form-data" style="width: 60%; margin: 0px auto;">
                    <div class="box-header">
                        <h3 class="box-title">原材料信息</h3>
                    </div>
                    <div class="box-body" style="width:90%;margin: auto">
                        <!-- Date dd/mm/yyyy -->
                        <div class="form-group">
                            <label>编号:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" class="form-control" id="m_id" name="m_id" required="required"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <!-- phone mask -->
                        <div class="form-group">
                            <label>产品名称:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" class="form-control" id="name" name="name"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        <!-- phone mask -->
                        <div class="form-group">
                            <label>规格型号:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" class="form-control" id="xinghao" name="xinghao"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <!-- IP mask -->
                        <div class="form-group">
                            <label>单位:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" class="form-control" id="danwei" name="danwei"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="form-group">
                            <label>物料描述:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" class="form-control" id="miaoshu" name="miaoshu"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="form-group">
                            <label>位置:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" class="form-control" id="weizhi" name="weizhi"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
						<div class="form-group" style="font-size:13pt;">
                            <label style="margin-right:15px;font-weight:bold;">原材料分类:</label>
							<label style="margin-right:15px;font-weight:normal;">
                                <input type="radio" name="fenlei" id="fenlei" value="A类" checked=""/>
								A类
                            </label>
                            <label style="margin-right:15px;font-weight:normal;">
                                <input type="radio" name="fenlei" id="fenlei" value="B类"/>  
								B类                                              
                            </label>
                            <label style="margin-right:15px;font-weight:normal;">
                                <input type="radio" name="fenlei" id="fenlei" value="C类"/>
								C类
                            </label>
                        </div><!-- /.form group -->
						<div class="form-group" style="font-size:13pt;">
                            <label style="margin-right:15px;font-weight:bold;">是否为半成品:</label>
							<label style="margin-right:15px;font-weight:normal;">
                                <input type="radio" name="isban" id="isban" value="1" checked=""/>
								是
                            </label>
                            <label style="margin-right:15px;font-weight:normal;">
                                <input type="radio" name="isban" id="isban" value="0"/>   
								否                                             
                            </label>
                        </div><!-- /.form group -->
                    </div><!-- /.box-body -->
					<div class="form-group">
                        <label>上传附件:（.doc .pdf）</label>
                        <div class="input-group">
                            <input type="file" name="fileUpload"/>
                        </div><!-- /.input group -->
                     </div><!-- /.form group -->
                    <div class="box-header">
                        <h3 class="box-title">备注</h3>
                    </div>
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
						<textarea id="beizhu" name="beizhu" style="width:90%;margin: auto;"></textarea>
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交登记" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>

                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->