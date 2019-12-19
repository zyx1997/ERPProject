        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                添加一级分类名称
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/chengpinInitials/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                <li class="active">成品初始化登记</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form action="/projectERP/chengpinInitials/addfirstlevel/<?= $chengpinInitial['mid']; ?>" method="post" class="box box-primary" enctype="multipart/form-data" class="box box-primary" style="width: 60%; margin: 0px auto;">
					<div class="box-header">
                        <h3 class="box-title">成品信息</h3>
                    </div>
                    <div class="box-body" style="width:90%;margin: auto">
						<table class="table table-bordered table-hover" style="text-align: left;margin-bottom:20px;">
							<tbody>
								<tr>
									<th>成品编号</th>
									<td><?= $chengpinInitial['mid'] ?></td>
									<th>产品名称</th>
									<td><?= $chengpinInitial['name'] ?></td>
								</tr>
								<tr>
									<th>是否为附件</th>
									<td><?php if($chengpinInitial['isfujian']==1){echo "是";} if($chengpinInitial['isfujian']==0){echo "否";} ?></td>
									<th>是否有唯一性编号</th>
									<td><?php if($chengpinInitial['isonlyid']==1){echo "是";} if($chengpinInitial['isonlyid']==0){echo "否";} ?></td>
								</tr>
								<tr>
									<th>型号</th>
									<td><?= $chengpinInitial['xinghao'] ?></td>
									<th>规格</th>
									<td><?= $chengpinInitial['guige'] ?></td>	
								</tr>
								<tr>
									<th>单位</th>
									<td><?= $chengpinInitial['danwei'] ?></td>
									<th>位置</th>
									<td><?= $chengpinInitial['weizhi'] ?></td>
								</tr>
								<tr>
									<th>单位</th>
									<td><?= $chengpinInitial['danwei'] ?></td>
									<th>位置</th>
									<td><?= $chengpinInitial['weizhi'] ?></td>
								</tr>
								<tr>
									<th>物料描述</th>
									<td colspan="3"><?= $chengpinInitial['miaoshu'] ?></td>
								</tr>
								<tr>
									<td colspan="4"><?= $this->Html->link('修改', ['action' => 'modify', $chengpinInitial->id]) ?></td>
								</tr>
							</tfoot>
						</table>
						<div class="form-group">
							<div class="input-group-btn">
                                <div class="btn-group">
									<div>添加一级分类名称：
										<input type="hidden" name="mid" value="<?= $chengpinInitial['mid'] ?>" />
										<input type="text" name="firstlevel" />
										<input name="submit" id="firstlevel" type="submit" class="btn btn-sm btn-primary" value="添加"></input>
									</div>
                                </div><!-- ./btn-group -->
                            </div>
                        </div><!-- /.form group -->
						

					</div>
					<div class="box-header">
                        <h3 class="box-title">物料清单</h3>
                    </div>
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>一级分类名称</th>
                                <th>二级分类名称</th>
								<th>数量</th>
                            </tr>
                           
                            </thead>
							</tbody>
							<?php foreach ($chengpinFirstlevels as $chengpinFirstlevel): ?>
								
								<tr>
									<td rowspan="<?= $chengpinSecondlevels[$chengpinFirstlevel['firstlevel']]->count()+1 ?>"><?= $chengpinFirstlevel['firstlevel'] ?></td>
									<td colspan="2">
									<?= $this->Html->link('添加二级分类名称', ['action' => 'addsecondlevel', $chengpinFirstlevel->mid, $chengpinFirstlevel->firstlevel]) ?>
									</td>
								</tr>
								<?php foreach ($chengpinSecondlevels[$chengpinFirstlevel['firstlevel']] as $chengpinSecondlevel): ?>
								<tr>
									<td><?= $chengpinSecondlevel['secondlevel']?></td>
									<?php if($chengpinSecondlevel['number']==0){ ?>
									<td>
										<?= $this->Html->link('添加数量', ['action' => 'addnumber', $chengpinSecondlevel->id, $chengpinInitial['mid']]) ?>
									</td>
									<?php }else{ ?>
									<td><?= $chengpinSecondlevel['number']?></td>
									<?php } ?>
								</tr>
								<?php endforeach; ?>
							<?php endforeach; ?>
                            </tfoot>
                        </table><!-- /.table -->
                    </div><!-- /.box-body -->
					<div class="box-body"  style="width:90%;margin: auto;text-align: center">
						<a href="/projectERP/chengpinInitials/index" class="btn btn-primary btn-sm" style="margin: 0px auto">确定</a>
					</div>
                </form><!-- /.box -->
				
            </div>
        </section><!-- /.content -->