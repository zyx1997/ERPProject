        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                装箱单修改
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/chengpinZhuangxiangs/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                <li class="active">装箱单</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="box box-primary box-content" style="width: 60%; margin: 0px auto;">
                    <form method="post" action="/projectERP/chengpinZhuangxiangs/modify/<?= $chengpinZhuangxiang['zid'] ?>" enctype="multipart/form-data" >
					<div class="box-header">
                        <h3 class="box-title">修改装箱单</h3>
                    </div>
                    <div class="box-body" style="width:90%;margin: auto;">
                        <!-- Date dd/mm/yyyy -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">出库单编号</label>
							<div class="controls" style="width:90%;">
								<input type="text" class="form-control" name="oid" value="<?= $chengpinZhuangxiang['oid'] ?>" readonly="readonly"  placeholder="请输入(必填)"/>
							</div>
                        </div><!-- /.form group -->
                        <!-- phone mask -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">装箱单编号</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="zid" class="form-control" value="<?= $chengpinZhuangxiang['zid'] ?>" readonly="readonly"  />
							</div>
                        </div><!-- /.form group -->
                        <!-- IP mask -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">销售订单编号</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="dingdanid" class="form-control" value="<?= $chengpinZhuangxiang['dingdanid'] ?>" readonly="readonly"  />
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">合同编号</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="hetongid" class="form-control" value="<?= $chengpinZhuangxiang['hetongid'] ?>" readonly="readonly"  />
							</div>
                        </div><!-- /.form group -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">装箱单名称</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="name" value="<?= $chengpinZhuangxiang['name'] ?>" class="form-control" placeholder="请输入(必填)"
								<?php if($chengpinZhuangxiang->isshenpi==1&&$chengpinZhuangxiang->shenpiresult==1) echo "readonly='readonly'";  ?>
								/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">出厂日期</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="date" value="<?= $chengpinZhuangxiang->date->format('Y-m-d') ?>" class="form-control datepicker" placeholder="请选择(必填)"
								<?php if($chengpinZhuangxiang->isshenpi==1&&$chengpinZhuangxiang->shenpiresult==1) echo "readonly='readonly'";  ?>
								/>
		
							</div>
                        </div><!-- /.form group -->
						<?php if($chengpinZhuangxiang->isshenpi==1&&$chengpinZhuangxiang->shenpiresult==0) { ?>
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">驳回理由</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="shenpireason" value="<?= $chengpinZhuangxiang['shenpireason']?>" readonly="readonly" class="form-control" />
							</div>
                        </div><!-- /.form group -->
						<?php }?>
                    </div><!-- /.box-body -->
					<?php if($chengpinZhuangxiang->isshenpi==0||($chengpinZhuangxiang->isshenpi==1&&$chengpinZhuangxiang->shenpiresult==0)) { ?>
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" name="submit" value="提交登记" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>
					<?php } ?>
					</form>
					<div class="box-header">
                        <h3 class="box-title">成品列表</h3>
                    </div>
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
						<?php if($chengpinZhuangxiang->isshenpi==0||($chengpinZhuangxiang->isshenpi==1&&$chengpinZhuangxiang->shenpiresult==0)) { ?>
						<div class="form-group" style="margin-bottom: 15px;text-align: left">
							<form class="input-group-btn" method="post" action="/projectERP/chengpinZhuangxiangs/modify/<?= $chengpinZhuangxiang['zid'] ?>" enctype="multipart/form-data">
                                <div class="btn-group">
									<div>
										<input type="text" name="addname" />
										<input name="submit" type="submit" class="btn btn-sm btn-primary" value="添加"></input>
									</div>
                                </div><!-- ./btn-group -->
                            </form>
                        </div><!-- /.form group -->
						<?php } ?>
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>成品名称</th>
                                <th>成品编号</th>
								<th>唯一性编号</th>
								<th></th>
                            </tr>
                            </thead>
                            <thead>
							<?php foreach ($chengpinZhuangxiangitems as $chengpinZhuangxiangitem): ?>
							<tr>
                                <td><?= $chengpinZhuangxiangitem->chanpinname ?></td>
                                <td><?= $chengpinZhuangxiangitem->chanpinid ?></td>
								<td><?= $chengpinZhuangxiangitem->onlyid ?></td>
								<td>
									<?php if($chengpinZhuangxiang->isshenpi==0||($chengpinZhuangxiang->isshenpi==1&&$chengpinZhuangxiang->shenpiresult==0)) { ?>
									<?= $this->Form->postLink(
										'删除',
										['action' => 'save', $chengpinZhuangxiangitem->id,$chengpinZhuangxiang->zid],
										['confirm' => '确认删除?'])
									?>
									<?php } ?>
								</td>
                            </tr>
							<?php endforeach; ?>
                            </thead>
                        </table><!-- /.table -->
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </section><!-- /.content -->

        