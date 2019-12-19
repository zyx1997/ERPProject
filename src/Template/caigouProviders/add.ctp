        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                新增供应方
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/caigouProviders/index"><i class="fa fa-dashboard"></i>供货方管理</a></li>
                <li class="active">供应方管理</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
				<form method="post" action="/projectERP/caigouProviders/add" class="box box-primary" enctype="multipart/form-data" style="width: 60%; margin: 0px auto;">
                    <div class="box-header">
                        <h3 class="box-title">供应方信息</h3>
                    </div>
                    <div class="box-body" style="width:90%;margin: auto">
                        <!-- Date dd/mm/yyyy -->
                        <div class="form-group">
                            <label>编码:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
								<input type="text" class="form-control" id="p_id" name="p_id"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <!-- phone mask -->
                        <div class="form-group">
                            <label>公司名称:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" class="form-control" id="p_name" name="p_name"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        <!-- phone mask -->
                        <div class="form-group">
                            <label>税号:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" class="form-control" id="shuihao" name="shuihao"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <!-- IP mask -->
                        <div class="form-group">
                            <label>联系人:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" class="form-control" id="person" name="person"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="form-group">
                            <label>电话号码:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" class="form-control" id="dianhua" name="dianhua"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="form-group">
                            <label>手机号码:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" class="form-control" id="shouji" name="shouji"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="form-group">
                            <label>地址:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" class="form-control" id="dizhi" name="dizhi"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
						<div class="form-group" style="font-size:13pt;">
                            <label style="margin-right:15px;font-weight:bold;">是否为物流:</label>
							<label style="margin-right:15px;font-weight:normal;">
                                <input type="radio" name="iswuliu" value="1"/>
								是
                            </label>
                            <label style="margin-right:15px;font-weight:normal;">
                                <input type="radio" name="iswuliu" value="0"  checked=""/>   
								否                                             
                            </label>
                        </div><!-- /.form group -->
                        <div class="form-group">
                            <label>上传附件:</label>
                            <div class="input-group">
                                <input type="file" name="fileUpload"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                    </div><!-- /.box-body -->
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