        <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        新增短料交付计划
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/manageDuanliaos/index"><i class="fa fa-dashboard"></i> 生产管理</a></li>
                        <li class="active">短料交付计划</li>
                    </ol>
                </section>
                <section class="content">
            <div class="row">
                <form action="/projectERP/manageDuanliaos/index" class="box box-primary" style="width: 60%; margin: 0px auto;">
                    <div class="box-header">
                        <h3 class="box-title">短料交付信息</h3>
                    </div>
                    <div class="box-body" style="width:90%;margin: auto">
                        <!-- Date dd/mm/yyyy -->
                        <div class="form-group">
                            <label>物料编号:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <!-- phone mask -->
                        <div class="form-group">
                            <label>库存数量:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        <!-- phone mask -->
                        <div class="form-group">
                            <label>BOM数量:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <!-- IP mask -->
                        <div class="form-group">
                            <label>短缺数量:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="form-group">
                            <label>采购数量:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="form-group">
                            <label>计划到场时间+1:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" class="datepicker form-control">
                                <!-- <input type="text" class="form-control"/> -->
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="form-group">
                            <label>物料描述:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="form-group">
                            <label>上传附件:</label>
                            <div class="input-group">
                                <input type="file" name="fileUpload"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交登记" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>

                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->