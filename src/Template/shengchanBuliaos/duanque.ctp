        <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        新增物料短缺表
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/shengchanBuliaos/index"><i class="fa fa-dashboard"></i> 生产领料</a></li>
                        <li class="active">补料单</li>
                    </ol>
                </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
				<form method="post" class="box box-primary" accept-charset="utf-8" enctype="multipart/form-data" action="/projectERP/shengchanBuliaos/duanque/<?= $shengchanBuliao['id']; ?>"  style="width: 60%; margin: 0px auto;">
					<div class="box-header">
                        <h3 class="box-title">物料短缺信息</h3>
                    </div>
                    <div class="box-body" style="width:90%;margin: auto">	
						<div class="form-group">
                            <label>生产排期编号:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input readonly="readonly" value="<?= $shengchanPaiqi['jid'] ?>" name="jid" type="text" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
						<div class="form-group">
                            <label>生产排期名称:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input readonly="readonly" value="<?= $shengchanPaiqi['name'] ?>" name="name" type="text" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
						<div class="form-group">
                            <label>成品编号:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input readonly="readonly" value="<?= $shengchanPaiqi['mid'] ?>" name="mid" type="text" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
						<div class="form-group">
                            <label>成品名称:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input readonly="readonly" value="<?= $shengchanPaiqi['chengpinname'] ?>" name="chengpinname" type="text" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="form-group">
                            <label>物料编号:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input readonly="readonly" value="<?= $lailiaoInitial['m_id'] ?>" name="m_id" type="text" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
						<div class="form-group">
                            <label>物料名称:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input readonly="readonly" value="<?= $lailiaoInitial['name'] ?>" name="wuliaoname" type="text" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
						<div class="form-group">
                            <label>物料描述:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input readonly="readonly" value="<?= $lailiaoInitial['miaoshu'] ?>" name="miaoshu" type="text" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="form-group">
                            <label>库存数量:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input readonly="readonly" value="<?= $lailiaoInitial['number'] ?>" type="text" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <!-- IP mask -->
                        <div class="form-group">
                            <label>短缺数量:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" name="duanquenumber" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交登记" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>

                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->