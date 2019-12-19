        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                添加出库单产品
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/chengpinChukus/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                <li class="active">成品出库</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form action="/projectERP/chengpinChukus/searchitem" method="post" class="box box-primary" enctype="multipart/form-data" class="box box-primary" style="width: 60%; margin: 0px auto;">
					<div class="box-header">
                        <h3 class="box-title">出库单信息</h3>
                    </div>
                    <div class="box-body" style="width:90%;margin: auto">
						<table class="table table-bordered table-hover" style="text-align: left;margin-bottom:20px;">
							<thead>
								<tr>
									<th>出库单编号</th>
									<th>出库单名称</th>
									<th>合同编号</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?= $chengpinChuku['oid'] ?></td>
									<td><?= $chengpinChuku['name'] ?></td>
									<td><?= $chengpinChuku['hetongid'] ?></td>
								</tr>
							</tfoot>
						</table>
						<div class="form-group">
							<div class="input-group-btn">
                                <div class="btn-group">
									<div>搜索产品名称：
										<input type="hidden" name="oid" value="<?= $chengpinChuku['oid'] ?>" />
										<input type="text" name="name" />
										<input name="submit" type="submit" class="btn btn-sm btn-primary" value="搜索"></input>
									</div>
                                </div><!-- ./btn-group -->
                            </div>
                        </div><!-- /.form group -->
					<div class="box-header">
                        <h3 class="box-title">成品列表</h3>
                    </div>
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>成品编号</th>
                                <th>成品名称</th>
                            </tr>
                            </thead>
                            <thead>
							<?php foreach ($chengpinChukuitems as $chengpinChukuitem): ?>
							<tr>
                                <td><?= $chengpinChukuitem->chanpinid ?></td>
                                <td><?= $chengpinChukuitem->chanpinname ?></td>
                            </tr>
							<?php endforeach; ?>
                            </thead>
                        </table><!-- /.table -->
                    </div><!-- /.box-body -->
					</div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->