                
				<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        成品配套管理
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/chengpinPeitaos/index"><i class="fa fa-dashboard"></i>销售管理</a></li>
                        <li class="active">成品配套</li>
                    </ol>
                </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
				<div class="box">
                    <div class="box-header">
                        <h3 class="box-title">成品配套信息</h3>
                    </div>
					<div class="box-body table-responsive">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>配套名称</th>
									<th>参考价格(套)</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<tr class="editable">
									<td><?= $chengpinPeitao->name ?></td>
									<td><?= $chengpinPeitao->cankaojiage ?></td>
									<td><?= $this->Html->link('修改', ['action' => 'edit', $chengpinPeitao->id]) ?></td>
								</tr>
							</tbody>
						</table><!-- /.table -->
					</div>
                    
                    <div class="box-header">
						<h3 class="box-title">成品信息</h3>
					</div>
					<div class="box-body table-responsive">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>成品编号</th>
									<th>成品名称</th>
									<th>成品数量</th>
									<th>成品单价</th>
									<th>更改</th>
								</tr>
							</thead>
							<tbody>
								<tr class="editable">
									<td><?= $chengpinPeitao->mid ?></td>
									<td><?= $chengpinPeitao->mname ?></td>
									<td><?= $chengpinPeitao->mnumber ?></td>
									<td><?= $chengpinPeitao->mjiage ?></td>
									<td><?= $this->Html->link('更改成品', ['action' => 'searchitem', $chengpinPeitao->ptid, 1]) ?></td>
								</tr>
							</tbody>
						</table><!-- /.table -->
					</div>
					<div class="box-header">
						<h3 class="box-title">成品附件信息</h3>
						<a href="/projectERP/chengpinPeitaos/searchitem/<?=$chengpinPeitao->ptid ?>/2 " class="btn btn-primary btn-sm" style="margin-left:10px;color:white;"><i class="fa fa-plus"></i> 添加</a>
					</div>
					<div class="box-body table-responsive">
						
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>成品编号</th>
									<th>成品名称</th>
									<th>成品数量</th>
									<th>成品单价</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($chengpinPeitaoitems as $chengpinPeitaoitem): ?>
								<tr class="editable">
									<td><?= $chengpinPeitaoitem->fujianid ?></td>
									<td><?= $chengpinPeitaoitem->fujianname ?></td>
									<td><?= $chengpinPeitaoitem->fujiannumber ?></td>
									<td><?= $chengpinPeitaoitem->fujianjiage ?></td>
									<td>
										<?= $this->Form->postLink(
											'删除',
											['action' => 'deleteitem', $chengpinPeitaoitem->id],
											['confirm' => '确认删除?'])
										?>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table><!-- /.table -->
						
					</div>
					<div class="box-body"  style="width:90%;margin: auto;text-align: center">
						<a href="/projectERP/chengpinPeitaos/index" class="btn btn-primary btn-sm" style="margin: 0px auto">确定</a>
					</div>					
				</div>
                </div><!-- /.box -->
            </div>
        </section><!-- /.content -->