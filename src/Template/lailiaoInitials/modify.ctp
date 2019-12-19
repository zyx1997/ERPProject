        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                原材料信息修改
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
                <form method="post" class="box box-primary" accept-charset="utf-8" enctype="multipart/form-data" action="/projectERP/lailiaoInitials/modify/<?= $lailiaoInitial['id']; ?>"  style="width: 60%; margin: 0px auto;">
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
                                <input readonly="readonly" type="text" id="m_id" name="m_id" value="<?= $lailiaoInitial['m_id'] ?>" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <!-- phone mask -->
                        <div class="form-group">
                            <label>产品名称:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" id="name" name="name" value="<?= $lailiaoInitial['name'] ?>" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        <!-- phone mask -->
                        <div class="form-group">
                            <label>规格型号:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" id="xinghao" name="xinghao" value="<?= $lailiaoInitial['xinghao'] ?>" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <!-- IP mask -->
                        <div class="form-group">
                            <label>单位:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" id="danwei" name="danwei" value="<?= $lailiaoInitial['danwei'] ?>" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="form-group">
                            <label>物料描述:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" id="miaoshu" name="miaoshu" value="<?= $lailiaoInitial['miaoshu'] ?>" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="form-group">
                            <label>位置:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" id="weizhi " name="weizhi" value="<?= $lailiaoInitial['weizhi'] ?>" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
						<div class="form-group" style="font-size:13pt;">
                            <label style="margin-right:15px;font-weight:bold;">原材料分类:</label>
							<label style="margin-right:15px;font-weight:normal;" checked>
                                <input type="radio" name="fenlei" id="fenlei" value="A类" <?php if($lailiaoInitial['fenlei']=='A类'){ ?> checked="" <?php } ?> />
								A类
							</label>
                            <label style="margin-right:15px;font-weight:normal;">
                                <input type="radio" name="fenlei" id="fenlei" value="B类" <?php if($lailiaoInitial['fenlei']=='B类'){ ?> checked="" <?php } ?> />                                                 
								B类
							</label>
                            <label style="margin-right:15px;font-weight:normal;">
                                <input type="radio" name="fenlei" id="fenlei" value="C类" <?php if($lailiaoInitial['fenlei']=='C类'){ ?> checked="" <?php } ?> />        
								C类
							</label>
                        </div><!-- /.form group -->
						<div class="form-group" style="font-size:13pt;">
                            <label style="margin-right:15px;font-weight:bold;">是否为半成品:</label>
							<label style="margin-right:15px;font-weight:normal;">
								<input type="radio" name="isban" id="isban" value="1" <?php if($lailiaoInitial['isban']==1){ ?> checked="" <?php } ?> />
								是
							</label>
                            <label style="margin-right:15px;font-weight:normal;">
                                <input type="radio" name="isban" id="isban" value="0" <?php if($lailiaoInitial['isban']==0){ ?> checked="" <?php } ?> />                                         
								否
							</label>
                        </div><!-- /.form group -->
                    </div><!-- /.box-body -->
                    <div class="box-header">
                        <h3 class="box-title">备注</h3>
                    </div>
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <textarea id="beizhu" name="beizhu" style="width:90%;margin: auto;"><?= $lailiaoInitial['beizhu'] ?></textarea>
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交登记" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>

                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->