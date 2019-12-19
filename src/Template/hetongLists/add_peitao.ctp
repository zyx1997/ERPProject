        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                第二步：输入配套价格
                <small>添加配套产品</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/hetongLists/index"><i class="fa fa-dashboard"></i>合同评审</a></li>
                <li class="active">合同评审管理</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
				<form method="post" action="/projectERP/hetongLists/addPeitao/<?= $hetongList['id'] ?>/<?= $gongyingPeitao['ptid'] ?>" class="box box-primary" accept-charset="utf-8" enctype="multipart/form-data" style="width: 60%; margin: 0px auto;">
                    <div class="box-body">
                        <div class="box-body"  style="width:90%;margin: auto;" >
							<div class="box-header">
								<h3 class="box-title"><?= $gongyingPeitao->peitaoname ?></h3>
							</div>
							<div class="box-body table-responsive">
								<table class="table table-bordered table-hover" style="text-align:center;">
									<thead>
										<tr>
											<th style="text-align:center;">产品信息</th>
											<th style="text-align:center;">编号</th>
											<th style="text-align:center;">名称</th>
											<th style="text-align:center;">数量</th>
										</tr>
									</thead>
									<tbody>
										<tr class="editable">
											<td>成品</td>
											<td><?= $chengpinPeitao->mid ?></td>
											<td><?= $chengpinPeitao->mname ?></td>
											<td><?= $chengpinPeitao->mnumber ?></td>
										</tr>
										<tr>
											<td rowspan="<?= $peitaoitemsCount+1 ?>">附件</td>
										</tr>
										<?php foreach ($chengpinPeitaoitems as $chengpinPeitaoitem): ?>
										<tr class="editable">
											<td><?= $chengpinPeitaoitem->fujianid ?></td>
											<td><?= $chengpinPeitaoitem->fujianname ?></td>
											<td><?= $chengpinPeitaoitem->fujiannumber ?></td>
										</tr>
										<?php endforeach; ?>
										<tr class="editable">
											<td>供应商参考价格（配套）</td>
											<td colspan="3"><?= $gongyingPeitaojiage ?></td>
										</tr>
									</tbody>
								</table><!-- /.table -->
								<div class="form-group" style="margin-top: 30px;">
									<label>配套价格:</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-edit"></i>
										</div>
										<input type="text" class="form-control" name="peitaojiage"/>
									</div><!-- /.input group -->
								</div><!-- /.form group -->
							</div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center;padding-bottom: 30px;">
						<a href="/projectERP/hetongLists/searchpeitao/<?=$hetongList->id ?>" class="btn btn-warning btn-sm" style="color:white;">返回上一步</a>
                        <input name="submit" type="submit" value="确认添加" class="btn btn-primary btn-sm" style="margin-left:20px;"></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->