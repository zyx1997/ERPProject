        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                第二步：填写合同评审信息
                <small>新增合同评审</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/hetongLists/index"><i class="fa fa-dashboard"></i>合同评审</a></li>
                <li class="active">合同评审管理</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form method="post" action="/projectERP/hetongLists/add/<?= $dh_type ?>/<?= $dh_id ?>/<?= $dh_name ?>" class="box box-primary" enctype="multipart/form-data" style="width: 60%; margin: 0px auto;">
                    <div class="box-header">
                        <h3 class="box-title">合同评审信息</h3>
                    </div>
                    <div class="box-body" style="width:90%;margin: auto">
						<!--
						<div class="form-group">
                            <label>编号:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input readonly="readonly" value=<?= $h_id ?> type="text" class="form-control" id="h_id" name="h_id"/>
                            </div>
                        </div>
						-->
						<div class="form-group">
                            <label>订货单位类型:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input readonly="readonly" type="text" class="form-control" name="dh_type" value="<?php if($dh_type==0){echo "经销商";}elseif($dh_type==1){echo "医院";}else{echo "其他";} ?>" />
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
						<div class="form-group">
                            <label>订货单位名称:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input readonly="readonly" type="text" class="form-control" name="dh_name" value="<?= $dh_name ?>" />
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
						<div class="form-group" style="font-size:13pt;">
                            <label style="margin-right:15px;font-weight:bold;">评审对象:</label>
							<select name="duixiang">
								<option value="常规合同">常规合同</option>
								<option value="特殊合同：大型投标合同或需要特殊订制">特殊合同：大型投标合同或需要特殊订制</option>
								<option value="合同更改">合同更改</option>
							</select>
                        </div><!-- /.form group -->
                        <div class="form-group">
                            <label>发货地址:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" class="form-control" id="delivery_addr" name="delivery_addr"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
						<div class="form-group" style="font-size:13pt;">
                            <label style="margin-right:15px;font-weight:bold;">交货方式:</label>
							<label style="margin-right:15px;font-weight:normal;">
                                <input type="radio" name="jiaohuofangshi" value="款到发货" />
								款到发货
								<input hidden="hidden" type="text" name="jiaohuofangshi_beizhu"/>
                            </label>
                            <label style="margin-right:15px;font-weight:normal;">
                                <input type="radio" name="jiaohuofangshi" value="款到发货(限天数)" />
								款到发货(限天数)
								<input type="text" name="jiaohuofangshi_tianshu" placeholder="请输入天数" />
                            </label>
                            <label style="margin-right:15px;font-weight:normal;">
                                <input type="radio" name="jiaohuofangshi" value="其他"/>
								其他
								<input type="text" name="jiaohuofangshi_qita" />
                            </label>
                        </div><!-- /.form group -->
						<div class="form-group">
                            <label>质保期:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" value="12个月" class="form-control" id="zhibaoqi" name="zhibaoqi"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
						<div class="form-group" style="font-size:13pt;">
                            <label style="margin-right:15px;font-weight:bold;">评审部门:</label>
							<label style="margin-right:15px;font-weight:normal;">
                                <input type="checkbox" name="checkbox[]" value="1" checked />
								营销中心
							</label>
                            <label style="margin-right:15px;font-weight:normal;">
                                <input type="checkbox" name="checkbox[]" value="2"/>  
								办公室
							</label>
                            <label style="margin-right:15px;font-weight:normal;">
                                <input type="checkbox" name="checkbox[]" value="3"/>
								质检部
							</label>
							<label style="margin-right:15px;font-weight:normal;">
                                <input type="checkbox" name="checkbox[]" value="4"/>
								生产部
							</label>
							<label style="margin-right:15px;font-weight:normal;">
                                <input type="checkbox" name="checkbox[]" value="5"/>
								采购部
							</label>
							<label style="margin-right:15px;font-weight:normal;">
                                <input type="checkbox" name="checkbox[]" value="6" checked />
								总经理
							</label>
                        </div><!-- /.form group -->
					</div><!-- /.box-body -->
					<div class="box-header">
						<h3 class="box-title">备注</h3>
					</div>
					<div class="box-body"  style="width:90%;margin: auto;text-align: center">
						<textarea id="beizhu" name="beizhu" style="width:90%;margin: auto;"></textarea>
					</div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <a href="/projectERP/hetongLists/searchdinghuo" class="btn btn-warning btn-sm" style="color:white;">返回上一步</a>
                        <input type="submit" value="提交登记" class="btn btn-primary btn-sm" style="margin: 0px auto; margin-left:20px;"></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->