        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                添加发货运输信息
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
				<form method="post" action="/projectERP/xiaoshouLists/add/<?= $xiaoshouList['id'] ?>" class="box box-primary" accept-charset="utf-8" enctype="multipart/form-data" style="width: 60%; margin: 0px auto;">
                    <div class="box-body">
                        <div class="box-body"  style="width:90%;margin: auto;" >
                            <div class="box-header">
                                <h3 class="box-title">合同评审信息</h3>
                            </div>
                            <table class="table table-bordered table-hover" style="margin-bottom: 10px;">
                                <thead>
                                <tr>
                                    <th>合同评审编号</th>
									<th>评审对象</th>
									<th>订货单位</th>
                                    <th>发货地址</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
									<td><?= $xiaoshouList->h_id?></td>
									<td><?= $xiaoshouList->duixiang ?></td>
									<?php if($xiaoshouList->dh_type == 0){ ?>
									<td><a target="_blank" href="/projectERP/jingxiaoXinxis/view/<?= $xiaoshouList['dh_id'] ?>"><?= $xiaoshouList->dh_name ?></a></td>
									<?php }elseif($xiaoshouList->dh_type == 1){ ?>
									<td><a href="/projectERP/yiyuanXinxis/view/<?= $xiaoshouList['dh_id'] ?>"><?= $xiaoshouList->dh_name ?></a></td>
									<?php }else{ ?>
									<td><a href="/projectERP/qitaXinxis/view/<?= $xiaoshouList['dh_id'] ?>"><?= $xiaoshouList->dh_name ?></a></td>
									<?php } ?>
									<td><?= $xiaoshouList->delivery_addr?></td>
                                </tr>
                                </tfoot>
								<thead>
                                <tr>
									
                                    <th>交货方式</th>
                                    <th>质保期</th>
									<th>产品合计(元)</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
									<td>
										<?= $xiaoshouList->jiaohuofangshi ?> 
										<?php if($xiaoshouList->jiaohuofangshi_beizhu != NULL ){ echo ":".$xiaoshouList->jiaohuofangshi_beizhu; } ?>
									</td>
									<td><?= $xiaoshouList->zhibaoqi?></td>
									<td><?= $xiaoshouList->heji_totalprice?></td>
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
									<input required="required" type="text" class="form-control" name="hetong_id"/>
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
										<input type="text" name="fahuodate" class="form-control datepicker"/>
									</div>
								</div><!-- /.input group -->
                            </div><!-- /.form group -->
							<div class="form-group">
								<label>发货地点:</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-edit"></i>
									</div>
									<input value="海泰发展三道C座102" type="text" class="form-control" name="fahuoplace"/>
								</div><!-- /.input group -->
							</div><!-- /.form group -->
							<div class="form-group">
								<label>发货人:</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-edit"></i>
									</div>
									<input type="text" class="form-control" name="fahuoren"/>
								</div><!-- /.input group -->
							</div><!-- /.form group -->
							<div class="form-group" >
                                <label>预计到货日期:</label>
								<div class="input-group">
									<div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
									<div class="controls" style="width:90%;">
										<input type="text" name="target_daohuodate" class="form-control datepicker"/>
									</div>
								</div><!-- /.input group -->
                            </div><!-- /.form group -->
							<div class="form-group" style="font-size:13pt;">
								<label style="margin-right:15px;font-weight:bold;">运输方式:</label>
								<p><label style="margin-right:15px;font-weight:normal;">
									<input type="radio" name="yuunshufangshi" value="自提" checked="" />
									自提
									<input type="text" id="tihuoren" name="tihuoren" placeholder="请输入提货人"/>
								</label></p>
								<p><label style="margin-right:15px;font-weight:normal;">
									<input type="radio" name="yuunshufangshi" value="送货" />
									送货 
									<input type="text" id="songhuoren" name="songhuoren" placeholder="请输入送货人"/>
								</label></p>
								<p><label style="margin-right:15px;font-weight:normal;">
									<input type="radio" name="yuunshufangshi" value="物流" />
									物流(快递)
									<select id="wuliucompany" name="wuliucompany">
										<option value="default">下拉选择物流公司</option>
										<?php foreach ($wuliucompanys as $wuliucompany): ?>
										<option value="<?= $wuliucompany->p_name ?>"><?= $wuliucompany->p_name ?></option>
										<?php endforeach; ?>
									</select>
									填写物流单号：
									<input type="text" name="wuliudanhao" />
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
									<input type="text" class="form-control" name="shouhuodanwei"/>
								</div><!-- /.input group -->
							</div><!-- /.form group -->
							<div class="form-group">
								<label>联系人:</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-edit"></i>
									</div>
									<input type="text" class="form-control" name="shouhuoren"/>
								</div><!-- /.input group -->
							</div><!-- /.form group -->
							<div class="form-group">
								<label>联系电话:</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-edit"></i>
									</div>
									<input type="text" class="form-control" name="shouhuodianhua"/>
								</div><!-- /.input group -->
							</div><!-- /.form group -->
							<div class="form-group">
								<label>收货地址:</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-edit"></i>
									</div>
									<input type="text" class="form-control" name="shouhuodizhi"/>
								</div><!-- /.input group -->
							</div><!-- /.form group -->
							<div class="form-group">
								<label>上传合同附件:（.doc .pdf）</label>
								<div class="input-group">
									<input type="file" name="fileUpload"/>
								</div><!-- /.input group -->
							 </div><!-- /.form group -->
							<div class="box-header">
								<h3 class="box-title">备注</h3>
							</div>
							<div class="box-body"  style="width:90%;margin: auto;text-align: center">
								<textarea name="shouhuo_beizhu" style="width:90%;margin: auto;"></textarea>
							</div><!-- /.box-body -->
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交" class="btn btn-primary btn-sm" ></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->