        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                编辑供应方信息
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
				<form method="post" class="box box-primary" accept-charset="utf-8" enctype="multipart/form-data" action="/projectERP/caigouProviders/modify/<?= $caigouProvider['id']; ?>"  style="width: 60%; margin: 0px auto;">
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
								<input type="text" id="shuihao" name="shuihao" value="<?= $caigouProvider['shuihao'] ?>" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <!-- IP mask -->
                        <div class="form-group">
                            <label>联系人:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
								<input type="text" id="person" name="person" value="<?= $caigouProvider['person'] ?>" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="form-group">
                            <label>电话号码:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
								<input type="text" id="dianhua" name="dianhua" value="<?= $caigouProvider['dianhua'] ?>" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="form-group">
                            <label>手机号码:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
								<input type="text" id="shouji" name="shouji" value="<?= $caigouProvider['shouji'] ?>" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="form-group">
                            <label>地址:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
								<input type="text" id="dizhi" name="dizhi" value="<?= $caigouProvider['dizhi'] ?>" class="form-control"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
						<div class="form-group" style="font-size:13pt;">
                            <label style="margin-right:15px;font-weight:bold;">是否为物流:</label>
							<label style="margin-right:15px;font-weight:normal;">
								<input type="radio" name="iswuliu" value="1" <?php if($caigouProvider['iswuliu']==1){ ?> checked="" <?php } ?> />
								是
							</label>
                            <label style="margin-right:15px;font-weight:normal;">
                                <input type="radio" name="iswuliu"value="0" <?php if($caigouProvider['iswuliu']==0){ ?> checked="" <?php } ?> />                                         
								否
							</label>
                        </div><!-- /.form group -->
						<div class="box-header">
							<h3 class="box-title">备注</h3>
						</div>
						<div class="box-body"  style="width:90%;margin: auto;text-align: center">
							<textarea id="beizhu" name="beizhu" style="width:90%;margin: auto;"><?= $caigouProvider['beizhu'] ?></textarea>
						</div><!-- /.box-body -->
						
						<!-- 以下显示审核意见 -->
						<?php if( $caigouProvider->shenhe_beizhu != '' ){ ?>
						<div class="box-header" style="margin-top:30px;">
							<h3 class="box-title">审核意见</h3>
						</div>
						<div class="box-body"  style="width:90%;margin: auto;text-align: center">
							<textarea readonly="readonly" style="width:90%;margin: auto;"><?= $caigouProvider['shenhe_beizhu'] ?></textarea>
						</div><!-- /.box-body -->
						<?php } ?>
						<?php if( $caigouProvider->shenpi_beizhu != '' ){ ?>
						<div class="box-header" style="margin-top:30px;">
							<h3 class="box-title">审批意见</h3>
						</div>
						<div class="box-body"  style="width:90%;margin: auto;text-align: center">
							<textarea readonly="readonly" style="width:90%;margin: auto;"><?= $caigouProvider['shenpi_beizhu'] ?></textarea>
						</div><!-- /.box-body -->
						<?php } ?>
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交修改" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->