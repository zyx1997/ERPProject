        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                修改合同评审信息
                <small>合同评审管理</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/hetongLists/index"><i class="fa fa-dashboard"></i>合同评审</a></li>
                <li class="active">合同评审管理</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form method="post" class="box box-primary" accept-charset="utf-8" enctype="multipart/form-data" action="/projectERP/hetongLists/modify/<?= $hetongList['id'] ?>"  style="width: 60%; margin: 0px auto;" >
                    <div class="box-header">
                        <h3 class="box-title">合同评审信息</h3>
                    </div>
                    <div class="box-body" style="width:90%;margin: auto">
						<div class="form-group">
                            <label>编号:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input readonly="readonly" value="<?= $hetongList->h_id ?>" type="text" class="form-control" name="h_id"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
						<div class="form-group">
                            <label>订货单位类型:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input readonly="readonly" type="text" class="form-control" name="dh_type" value="<?php if($hetongList->dh_type==0){echo "经销商";}elseif($hetongList->dh_type==1){echo "医院";}else{echo "其他";} ?>" />
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
						<div class="form-group">
                            <label>订货单位:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input readonly="readonly" type="text" class="form-control" name="dh_name" value="<?= $hetongList->dh_name ?>" />
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
						<div class="form-group" style="font-size:13pt;">
                            <label style="margin-right:15px;font-weight:bold;">评审对象:</label>
							<select name="duixiang">
								<option value="常规合同" <?php if($hetongList['duixiang']=='常规合同'){ ?> selected="selected" <?php } ?> >常规合同</option>
								<option value="特殊合同：大型投标合同或需要特殊订制" <?php if($hetongList['duixiang']=='特殊合同：大型投标合同或需要特殊订制'){ ?> selected="selected" <?php } ?> >特殊合同：大型投标合同或需要特殊订制</option>
								<option value="合同更改" <?php if($hetongList['duixiang']=='合同更改'){ ?> selected="selected" <?php } ?> >合同更改</option>
							</select>
                        </div><!-- /.form group -->
                        <div class="form-group">
                            <label>发货地址:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" class="form-control" id="delivery_addr" name="delivery_addr" value="<?= $hetongList['delivery_addr'] ?>" />
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
						<div class="form-group" style="font-size:13pt;">
                            <label style="margin-right:15px;font-weight:bold;">交货方式:</label>
							<label style="margin-right:15px;font-weight:normal;">
                                <input type="radio" name="jiaohuofangshi" value="款到发货" <?php if($hetongList['jiaohuofangshi']=='款到发货'){ ?> checked="" <?php } ?> />
								款到发货
								<input hidden="hidden" type="text" name="jiaohuofangshi_beizhu"/>
                            </label>
                            <label style="margin-right:15px;font-weight:normal;">
                                <input type="radio" name="jiaohuofangshi" value="款到发货(限天数)" <?php if($hetongList['jiaohuofangshi']=='款到发货(限天数)'){ ?> checked="" <?php } ?> />
								款到发货(限天数)
								<input type="text" name="jiaohuofangshi_tianshu" size="4" value="<?php if($hetongList['jiaohuofangshi']=='款到发货(限天数)'){ echo $hetongList['jiaohuofangshi_tianshu']; }?>" />
							</label>
                            <label style="margin-right:15px;font-weight:normal;">
                                <input type="radio" name="jiaohuofangshi" value="其他" <?php if($hetongList['jiaohuofangshi']=='其他'){ ?> checked="" <?php } ?> />
								其他
								<input type="text" name="jiaohuofangshi_qita" value="<?php if($hetongList['jiaohuofangshi']=='其他'){ echo $hetongList['jiaohuofangshi_qita']; }?>" />
                            </label>
                        </div><!-- /.form group -->
						<div class="form-group">
                            <label>质保期:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input type="text" class="form-control" id="zhibaoqi" name="zhibaoqi" value="<?= $hetongList['zhibaoqi'] ?>" />
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
						<div class="form-group" style="font-size:13pt;">
                            <label style="margin-right:15px;font-weight:bold;">评审部门:</label>
							<label style="margin-right:15px;font-weight:normal;">
                                <input type="checkbox" name="checkbox[]" value="1" <?php if( strstr($hetongList['pingshenbumen_target'],"1")!=false){ ?> checked="" <?php } ?> />
								营销中心
							</label>
                            <label style="margin-right:15px;font-weight:normal;">
                                <input type="checkbox" name="checkbox[]" value="2" <?php if( strstr($hetongList['pingshenbumen_target'],"2")!=false){ ?> checked="" <?php } ?> />  
								办公室
							</label>
                            <label style="margin-right:15px;font-weight:normal;">
                                <input type="checkbox" name="checkbox[]" value="3" <?php if( strstr($hetongList['pingshenbumen_target'],"3")!=false){ ?> checked="" <?php } ?> />
								质检部
							</label>
							<label style="margin-right:15px;font-weight:normal;">
                                <input type="checkbox" name="checkbox[]" value="4" <?php if( strstr($hetongList['pingshenbumen_target'],"4")!=false){ ?> checked="" <?php } ?> />
								生产部
							</label>
							<label style="margin-right:15px;font-weight:normal;">
                                <input type="checkbox" name="checkbox[]" value="5" <?php if( strstr($hetongList['pingshenbumen_target'],"5")!=false){ ?> checked="" <?php } ?> />
								采购部
							</label>
							<label style="margin-right:15px;font-weight:normal;">
                                <input type="checkbox" name="checkbox[]" value="6" <?php if( strstr($hetongList['pingshenbumen_target'],"6")!=false){ ?> checked="" <?php } ?> />
								总经理
							</label>
                        </div><!-- /.form group -->
						
					</div><!-- /.box-body -->
					<div class="box-header">
						<h3 class="box-title">备注</h3>
					</div>
					<div class="box-body"  style="width:90%;margin: auto;text-align: center">
						<textarea name="beizhu" style="width:90%;margin: auto;"><?= $hetongList['beizhu'] ?></textarea>
					</div><!-- /.box-body -->
					
					<!-- 以下显示审核意见 -->
					<?php if( $hetongList->shenhebeizhu != '' ){ ?>
					<div class="box-header" style="margin-top:30px;">
						<h3 class="box-title">各部门审核意见</h3>
					</div>
					<div class="box-body"  style="width:90%;margin: auto;text-align: center">
						<textarea readonly="readonly" name="shenhebeizhu" style="width:90%;margin: auto;"><?= $hetongList['shenhebeizhu'] ?></textarea>
					</div><!-- /.box-body -->
					<?php } ?>
                    <div class="box-body"  style="width:90%;margin-top:30px;;text-align: center">
                        <a href="/projectERP/hetongLists/manage/<?=$hetongList->id ?>" class="btn btn-warning btn-sm" style="color:white;">返回上一步</a>
                        <input type="submit" value="提交修改" class="btn btn-primary btn-sm" style="margin: 0px auto; margin-left:20px;"></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->