        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                修改补料单
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
                <form method="post" action="/projectERP/shengchanBuliaos/modify/<?=$shengchanBuliao->id?>" enctype="multipart/form-data"  class="box box-primary" style="width: 60%; margin: 0px auto;">
                    <div class="box-body">
                        <div id="item_info" class="col-xs-12">
							<div class="box-header">
                                <h3 class="box-title">补料单信息</h3>
                            </div>
							<table class="table table-bordered table-hover" style="text-align: left;margin-bottom:20px;">
							<thead>
								<tr>
									<th>生产计划编号</th>
									<th>物料编号</th>
									<th>物料名称</th>
									<th>物料描述</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?= $shengchanBuliao->jid ?></td>
									<td><?= $shengchanBuliao->mid ?></td>
									<td><?= $shengchanBuliao->mname ?></td>
									<td><?= $shengchanBuliao->miaoshu ?></td>
								</tr>
							</tfoot>
							</table>
							<!-- IP mask -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
								<label style="width:10%;margin-top:5px;">补料单编号</label>
								<div class="controls" style="width:90%;">
									<input type="text" value="<?=$shengchanBuliao->bid ?>" name="bid" class="form-control" readonly="readonly"/>
								</div>
							</div><!-- /.form group -->
							<!-- IP mask -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
								<label style="width:10%;margin-top:5px;">补料数量</label>
								<div class="controls" style="width:90%;">
									<input type="text" value="<?=$shengchanBuliao->buliaoquantity ?>" name="buliaoquantity" class="form-control"/>
								</div>
							</div><!-- /.form group -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
								<label style="width:10%;margin-top:5px;">补料原因</label>
								<div class="controls" style="width:90%;">
									<input type="text" value="<?=$shengchanBuliao->reason ?>" name="reason" class="form-control"/>
								</div>
							</div><!-- /.form group -->
							<?php if($shengchanBuliao->isshenpi==1&&$shengchanBuliao->shenpiresult==0) { ?>
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">驳回理由</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="shenpireason" value="<?= $shengchanBuliao->shenpireason ?>" readonly="readonly" class="form-control" />
							</div>
                        </div><!-- /.form group -->
						<?php }?>
						</div><!-- /.box-body -->
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input id="submit-q" type="submit" value="提交" class="btn btn-primary btn-sm" style="margin: 0px auto;"></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->