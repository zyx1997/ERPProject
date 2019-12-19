        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                修改发货运输信息
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/xiaoshouLists/index"><i class="fa fa-dashboard"></i>销售管理</a></li>
                <li class="active">销售订单管理</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
				<form method="post" action="/projectERP/xiaoshouLists/modify/<?= $xiaoshouList['id'] ?>" class="box box-primary" accept-charset="utf-8" enctype="multipart/form-data" style="width: 60%; margin: 0px auto;">
                    <div class="box-body">
                        <div class="box-body"  style="width:90%;margin: auto;" >
                            <div class="box-header">
                                <h3 class="box-title">合同表信息</h3>
                            </div>
                            <table class="table table-bordered table-hover" style="margin-bottom: 10px;">
                                <thead>
                                <tr>
                                    <th>合同评审编号</th>
									<th>评审对象</th>
									<th>订货单位</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
									<td><?= $xiaoshouList->h_id?></td>
									<td><?= $xiaoshouList->duixiang ?></td>
									<td><?= $xiaoshouList->dh_name?></td>
                                </tr>
                                </tfoot>
								<thead>
                                <tr>
									<th>发货地址</th>
                                    <th>交货方式</th>
                                    <th>质保期</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
									<td><?= $xiaoshouList->delivery_addr?></td>
									<td>
										<?= $xiaoshouList->jiaohuofangshi ?> 
										<?php if($xiaoshouList->jiaohuofangshi_beizhu != NULL ){ echo ":".$xiaoshouList->jiaohuofangshi_beizhu; } ?>
									</td>
									<td><?= $xiaoshouList->zhibaoqi?></td>
                                </tr>
                                </tfoot>
                            </table>
							<div class="box-header" style="margin-top: 40px;" >
                                <h3 class="box-title">我方发货信息</h3>
                            </div>
							<div class="form-group">
								<label>销售订单编号:</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-edit"></i>
									</div>
									<input value="<?= $xiaoshouList->x_id ?>" readonly="readonly" type="text" class="form-control"/>
								</div><!-- /.input group -->
							</div><!-- /.form group -->
							<div class="form-group">
								<label>合同编号:</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-edit"></i>
									</div>
									<input value="<?= $xiaoshouList->hetong_id ?>" type="text" class="form-control" name="hetong_id"/>
								</div><!-- /.input group -->
							</div><!-- /.form group -->	
							<div class="form-group">
								<label>交货方式:</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-edit"></i>
									</div>
									<input value="<?php if($xiaoshouList->jiaohuofangshi_beizhu != NULL ){ echo $xiaoshouList->jiaohuofangshi.":".$xiaoshouList->jiaohuofangshi_beizhu; }else{echo $xiaoshouList->jiaohuofangshi;} ?>" readonly="readonly" type="text" class="form-control"/>
								</div><!-- /.input group -->
							</div><!-- /.form group -->
                            <div class="form-group" >
                                <label>发货日期:</label>
								<div class="input-group">
									<div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
									<div class="controls" style="width:90%;">
										<input type="text" name="fahuodate" class="form-control datepicker" value="<?php if($xiaoshouList->fahuodate!=null){echo $xiaoshouList->fahuodate->format('Y-m-d');} ?>" />
									</div>
								</div><!-- /.input group -->
                            </div><!-- /.form group -->
							<div class="form-group">
								<label>发货地点:</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-edit"></i>
									</div>
									<input type="text" class="form-control" name="fahuoplace" value="<?= $xiaoshouList->fahuoplace ?>" />
								</div><!-- /.input group -->
							</div><!-- /.form group -->
							<div class="form-group">
								<label>发货人:</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-edit"></i>
									</div>
									<input type="text" class="form-control" name="fahuoren" value="<?= $xiaoshouList->fahuoren ?>" />
								</div><!-- /.input group -->
							</div><!-- /.form group -->
							<div class="form-group" >
                                <label>预计到货日期:</label>
								<div class="input-group">
									<div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
									<div class="controls" style="width:90%;">
										<input type="text" name="target_daohuodate" class="form-control datepicker"  value="<?php if($xiaoshouList->target_daohuodate!=null){echo $xiaoshouList->target_daohuodate->format('Y-m-d');} ?>" />
									</div>
								</div><!-- /.input group -->
                            </div><!-- /.form group -->
							<div class="form-group" style="font-size:13pt;">
								<label style="margin-right:15px;font-weight:bold;">运输方式:</label>
								<p><label style="margin-right:15px;font-weight:normal;">
									<input type="radio" name="yuunshufangshi" value="自提" <?php if($xiaoshouList['yuunshufangshi']=='自提'){ ?> checked="" <?php } ?> />
									自提
									<input type="text" name="tihuoren" placeholder="请输入提货人" value="<?php if($xiaoshouList['yuunshufangshi']=='自提'){ echo $xiaoshouList->tihuoren;} ?>" />
								</label></p>
								<p><label style="margin-right:15px;font-weight:normal;">
									<input type="radio" name="yuunshufangshi" value="送货" <?php if($xiaoshouList['yuunshufangshi']=='送货'){ ?> checked="" <?php } ?> />
									送货 
									<input type="text" name="songhuoren" placeholder="请输入送货人" value="<?php if($xiaoshouList['yuunshufangshi']=='送货'){ echo $xiaoshouList->songhuoren;} ?>" />
								</label></p>
								<p><label style="margin-right:15px;font-weight:normal;">
									<input type="radio" name="yuunshufangshi" value="物流" <?php if($xiaoshouList['yuunshufangshi']=='物流'){ ?> checked="" <?php } ?> />
									物流(快递)
									<select name="wuliucompany">
										<option value="default" <?php if($xiaoshouList['yuunshufangshi']!='物流'){ ?> selected="selected" <?php } ?> >下拉选择物流公司</option>
										<?php foreach ($wuliucompanys as $wuliucompany): ?>
										<option value="<?= $wuliucompany['p_name'] ?>" <?php if($xiaoshouList['yuunshufangshi']=='物流' && $xiaoshouList['wuliucompany']==$wuliucompany['p_name']){ ?> selected="selected" <?php } ?> ><?= $wuliucompany['p_name'] ?></option>
										<?php endforeach; ?>
									</select>
									物流单号：
									<input type="text" name="wuliudanhao" value="<?php if($xiaoshouList['yuunshufangshi']=='物流'){ echo $xiaoshouList->wuliudanhao;} ?>" />
								</label></p>
							</div><!-- /.form group -->
							<div class="box-header" style="margin-top: 40px;" >
                                <h3 class="box-title">客户收货信息</h3>
                            </div>
							<div class="form-group">
								<label>收货单位:</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-edit"></i>
									</div>
									<input type="text" class="form-control" name="shouhuodanwei" value="<?= $xiaoshouList->shouhuodanwei ?>" />
								</div><!-- /.input group -->
							</div><!-- /.form group -->
							<div class="form-group">
								<label>联系人:</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-edit"></i>
									</div>
									<input type="text" class="form-control" name="shouhuoren" value="<?= $xiaoshouList->shouhuoren ?>" />
								</div><!-- /.input group -->
							</div><!-- /.form group -->
							<div class="form-group">
								<label>联系电话:</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-edit"></i>
									</div>
									<input type="text" class="form-control" name="shouhuodianhua" value="<?= $xiaoshouList->shouhuodianhua ?>" />
								</div><!-- /.input group -->
							</div><!-- /.form group -->
							<div class="form-group">
								<label>收货地址:</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-edit"></i>
									</div>
									<input type="text" class="form-control" name="shouhuodizhi" value="<?= $xiaoshouList->shouhuodizhi ?>" />
								</div><!-- /.input group -->
							</div><!-- /.form group -->
							<div class="box-header">
								<h3 class="box-title">备注</h3>
							</div>
							<div class="box-body"  style="width:90%;margin: auto;text-align: center">
								<textarea name="shouhuo_beizhu" style="width:90%;margin: auto;"> <?= $xiaoshouList->shouhuo_beizhu ?></textarea>
							</div><!-- /.box-body -->
							
							<!-- 以下显示审核意见 -->
							<?php if( $xiaoshouList->shenhe_beizhu != '' ){ ?>
							<div class="box-header" style="margin-top:30px;">
								<h3 class="box-title">审核意见</h3>
							</div>
							<div class="box-body"  style="width:90%;margin: auto;text-align: center">
								<textarea readonly="readonly" style="width:90%;margin: auto;"><?= $xiaoshouList['shenhe_beizhu'] ?></textarea>
							</div><!-- /.box-body -->
							<?php } ?>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交修改" class="btn btn-primary btn-sm"></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->