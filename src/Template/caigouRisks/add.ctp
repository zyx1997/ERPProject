        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                编辑供应方风险评估
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/caigouRisks/index"><i class="fa fa-dashboard"></i>采购管理</a></li>
                <li class="active">供应方风险评估</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
				<form method="post" class="box box-primary" accept-charset="utf-8" enctype="multipart/form-data" action="/projectERP/caigouRisks/add/<?= $caigouProvider['p_id']; ?>"  style="width: 60%; margin: 0px auto;">
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
								<input readonly="readonly" type="text" id="p_id" name="p_id" value="<?= $caigouProvider['p_id'] ?>" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <!-- phone mask -->
                        <div class="form-group">
                            <label>公司名称:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
								<input readonly="readonly" type="text" id="p_name" name="p_name" value="<?= $caigouProvider['p_name'] ?>" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        <!-- phone mask -->
                        <div class="form-group">
                            <label>税号:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
								<input readonly="readonly" type="text" id="shuihao" name="shuihao" value="<?= $caigouProvider['shuihao'] ?>" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <!-- IP mask -->
                        <div class="form-group">
                            <label>联系人:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
								<input readonly="readonly" type="text" id="person" name="person" value="<?= $caigouProvider['person'] ?>" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="form-group">
                            <label>电话号码:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
								<input readonly="readonly" type="text" id="dianhua" name="dianhua" value="<?= $caigouProvider['dianhua'] ?>" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="form-group">
                            <label>手机号码:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
								<input readonly="readonly" type="text" id="shouji" name="shouji" value="<?= $caigouProvider['shouji'] ?>" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="form-group">
                            <label>地址:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
								<input readonly="readonly" type="text" id="dizhi" name="dizhi" value="<?= $caigouProvider['dizhi'] ?>" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="form-group">
                            <label>评审分数:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
								<input type="text" id="pinggu" name="pinggu" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                    </div><!-- /.box-body -->
                    <div class="box-header">
                        <h3 class="box-title">评审备注</h3>
                    </div>
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <textarea id="beizhu" name="pg_beizhu" style="width:90%;margin: auto;"></textarea>
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交修改" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>

                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->