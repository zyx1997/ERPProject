        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                成品出库质检
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/chengpinChukuchecks/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                <li class="active">成品库附件质检</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form action="/projectERP/chengpinChukuchecks/check/<?= $chengpinChuku->oid ?>" method="post" class="box box-primary" enctype="multipart/form-data" class="box box-primary" style="width: 60%; margin: 0px auto;">
					<div class="box-header">
                        <h3 class="box-title">出库单信息</h3>
                    </div>
                    <div class="box-body" style="width:90%;margin: auto">
						<table class="table table-bordered table-hover" style="text-align: left;margin-bottom:20px;">
							<thead>
								<tr>
									<th>出库单编号</th>
									<th>销售订单编号</th>
									<th>合同编号</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?= $chengpinChuku['oid'] ?></td>
									<td><?= $chengpinChuku->dingdanid?></td>
									<td><?= $chengpinChuku['hetongid'] ?></td>
								</tr>
							</tfoot>
						</table>
					<div class="box-header">
                        <h3 class="box-title">成品列表</h3>
                    </div>
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>成品编号</th>
                                <th>成品名称</th>
								<th>唯一性编号</th>
                            </tr>
                            </thead>
                            <thead>
							<?php foreach ($chengpinChukuitems as $chengpinChukuitem): ?>
							<tr>
                                <td><?= $chengpinChukuitem->chanpinid ?></td>
                                <td><?= $chengpinChukuitem->chanpinname ?></td>
								<td><?= $chengpinChukuitem->onlyid ?></td>
                            </tr>
							<?php endforeach; ?>
                            </thead>
                        </table><!-- /.table -->
                    </div><!-- /.box-body -->
					<?php if($chengpinChuku->isshenpi==0){ ?>
					<div class="form-group" style="text-align: center;">
						<input type="hidden" name="isshenpi" value="1"/>
						<input type="hidden" name="shenpiren" value="张三"/>
                        <div style="margin: 10px auto;">
                            <label>
                                <input style="margin: 3px;" type="radio" name="shenpiresult" value="1" class="minimal" checked/> 通过
                            </label>
                            <label>
                                <input style="margin: 3px;" type="radio" name="shenpiresult" value="0" class="minimal"/>  驳回
                            </label>
                        </div>
                    </div>
					<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
						<label style="width:10%;margin-top:5px;">审批说明</label>
						<div class="controls" style="width:90%;">
							<input type="text" name="shenpireason" class="form-control" placeholder="必填"/>
						</div>
					</div>
					<div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>
					<?php } ?>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->