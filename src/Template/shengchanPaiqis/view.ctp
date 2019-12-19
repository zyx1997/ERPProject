        <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        生产计划产品查看
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/shengchanPaiqis/index"><i class="fa fa-dashboard"></i> 生产领料</a></li>
                        <li class="active">生产计划</li>
                    </ol>
                </section>

		
		<!-- Main content -->
        <section class="content">
            <div class="row">
                <form class="box box-primary" style="width: 60%; margin: 0px auto;">
                    <div class="box-body">
                        <div id="item_info" class="col-xs-12">
                            <div class="box-header">
                                <h3 class="box-title">物料清单</h3>
                            </div>
							<div class="box-body"  style="width:90%;margin: auto;text-align: center">
							<table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th  style="text-align:center">编号</th>
                                    <th  style="text-align:center">产品名称</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?= $chengpinInitial['mid'] ?></td>
                                    <td><?= $chengpinInitial['name'] ?></td>
                                </tr>
                                </tfoot>
                            </table>
							<!-- phone mask -->
							<table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align:center">一级分类名称</th>
                                <th style="text-align:center">二级分类名称</th>
								<th style="text-align:center">数量</th>
                            </tr>
                            </thead>
                            <thead>
							<?php foreach ($chengpinFirstlevels as $chengpinFirstlevel): ?>
								<?php $count = 0;
								foreach ($chengpinSecondlevels[$chengpinFirstlevel['firstlevel']] as $chengpinSecondlevel): 
								$count++;
								endforeach; ?>
								<tr>
									<td rowspan="<?= $count+1 ?>"><?= $chengpinFirstlevel['firstlevel'] ?></td>
									<td style="margin:0;padding:0;"></td>
									<td style="margin:0;padding:0;"></td>
								</tr>
								<?php foreach ($chengpinSecondlevels[$chengpinFirstlevel['firstlevel']] as $chengpinSecondlevel): ?>
								<tr>
									<td ><?= $chengpinSecondlevel['secondlevel']?></td>
									<td ><?= $chengpinSecondlevel['number']?></td>
								</tr>
								<?php endforeach; ?>
							<?php endforeach; ?>
                            </thead>
                        </table><!-- /.table -->
                    </div><!-- /.box-body -->
                            
							
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer clearfix no-border">
						<a href="/projectERP/shengchanPaiqis/index" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-backward"></i> 返回</a>
					</div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->