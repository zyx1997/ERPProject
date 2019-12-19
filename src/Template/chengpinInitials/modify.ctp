        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                修改成品登记
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/chengpinInitials/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                <li class="active">成品初始化登记</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form method="post" action="/projectERP/chengpinInitials/modify/<?= $chengpinInitial['id']; ?>" class="box box-primary" enctype="multipart/form-data" class="box box-primary" style="width: 60%; margin: 0px auto;">
                    <div class="box-header">
                        <h3 class="box-title">成品信息</h3>
                    </div>
                    <div class="box-body" style="width:90%;margin: auto">
                        <!-- Date dd/mm/yyyy -->
                        <div class="form-group">
                            <label>编号:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input name="mid" readonly="readonly" value="<?= $chengpinInitial['mid'] ?>" type="text" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <!-- phone mask -->
                        <div class="form-group">
                            <label>产品名称:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input name="name" value="<?= $chengpinInitial['name'] ?>" type="text" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        <!-- phone mask -->
                        <div class="form-group">
                            <label>型号:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input name="xinghao" value="<?= $chengpinInitial['xinghao'] ?>" type="text" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
						<div class="form-group">
                            <label>规格:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input name="guige" value="<?= $chengpinInitial['guige'] ?>"  type="text" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <!-- IP mask -->
                        <div class="form-group">
                            <label>单位:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input name="danwei" value="<?= $chengpinInitial['danwei'] ?>" type="text" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="form-group">
                            <label>物料描述:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input name="miaoshu" value="<?= $chengpinInitial['miaoshu'] ?>" type="text" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="form-group">
                            <label>位置:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input name="weizhi" value="<?= $chengpinInitial['weizhi'] ?>" type="text" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
						<div class="form-group">
                            <label>成品库安全库存:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input name="anquankucun" value="<?= $chengpinInitial['anquankucun'] ?>" type="text" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
						<div class="form-group">
                            <label>计划生产时间跨度:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input name="jihuatime" value="<?= $chengpinInitial['jihuatime'] ?>" type="text" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
						<div class="form-group">
                            <label>计划生产数量:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input name="jihuaquantity" value="<?= $chengpinInitial['jihuaquantity'] ?>" type="text" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
						<div class="form-group">
                            <label>成品指导价:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input name="zhidaojia" value="<?= $chengpinInitial['zhidaojia'] ?>" type="text" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
						<div class="form-group">
                            <label>成品最低价:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input name="zuidijia" value="<?= $chengpinInitial['zuidijia'] ?>" type="text" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
						<div class="form-group" style="font-size:13pt;">
                            <label style="margin-right:15px;font-weight:bold;">是否为附件:</label>
							<label style="margin-right:15px;font-weight:normal;">是
                                <input name="isfujian" value="1" type="radio" <?php if($chengpinInitial['isfujian']==1){ ?> checked <?php } ?> />
                            </label>
                            <label style="margin-right:15px;font-weight:normal;">否
                                <input name="isfujian" value="0" type="radio" <?php if($chengpinInitial['isfujian']==0){ ?> checked <?php } ?> />                                                    
                            </label>
                        </div><!-- /.form group -->
						<div class="form-group" style="font-size:13pt;">
                            <label style="margin-right:15px;font-weight:bold;">是否有唯一性ID:</label>
							<label style="margin-right:15px;font-weight:normal;">是
                                <input name="isonlyid" value="1" type="radio" <?php if($chengpinInitial['isonlyid']==1){ ?> checked <?php } ?> />
                            </label>
                            <label style="margin-right:15px;font-weight:normal;">否
                                <input name="isonlyid" value="0" type="radio" <?php if($chengpinInitial['isonlyid']==0){ ?> checked <?php } ?> />                                                    
                            </label>
                        </div><!-- /.form group -->
						<div class="form-group" style="font-size:13pt;">
                            <label style="margin-right:15px;font-weight:bold;">分类:</label>
							<label style="margin-right:15px;font-weight:normal;">一类
                                <input name="fenlei" value="1" type="radio" <?php if($chengpinInitial['fenlei']==1){ ?> checked <?php } ?> />
                            </label>
                            <label style="margin-right:15px;font-weight:normal;">二类
                                <input name="fenlei" value="2" type="radio" <?php if($chengpinInitial['fenlei']==2){ ?> checked <?php } ?> />                                                    
                            </label>
							<label style="margin-right:15px;font-weight:normal;">三类
                                <input name="fenlei" value="3" type="radio" <?php if($chengpinInitial['fenlei']==3){ ?> checked <?php } ?> />                                                    
                            </label>
                        </div><!-- /.form group -->
                    </div><!-- /.box-body -->
                    <div class="box-header">
                        <h3 class="box-title">备注</h3>
                    </div>
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
						<textarea id="beizhu" name="beizhu" style="width:90%;margin: auto;"><?= $chengpinInitial['beizhu'] ?></textarea>
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交登记" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>

                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->