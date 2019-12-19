        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                成品库附件入库信息修改
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/chengpinRukus/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                <li class="active">成品库附件入库</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="box box-primary" style="width: 70%; margin: 0px auto;padding: 10px;">
                        
                            <div class="box-header">
                                <h3 class="box-title">成品附件信息</h3>
                            </div>

                            <table class="table table-bordered table-hover">
                                <tbody>
									<tr>
										<th>编号</th>
										<td><?= $chengpinRuku['mid'] ?></td>
										<th>产品名称</th>
										<td><?= $chengpinRuku['name'] ?></td>
									</tr>
									<tr>
										<th>规格型号</th>
										<td ><?= $chengpinRuku['xinghao'] ?></td>
										<th>单位</th>
										<td><?= $chengpinRuku['danwei'] ?></td>
									</tr>
									<tr>
										<th>物料描述</th>
										<td colspan="3" ><?= $chengpinRuku['miaoshu'] ?></td>
									</tr>
									<tr>
										<th>位置</th>
										<td><?= $chengpinRuku['weizhi'] ?></td>
										<th>生产批号</th>
										<td><?= $chengpinRuku['shengchanid'] ?></td>
									</tr>
									<tr>
										<th>生产日期</th>
										<td><?php if($chengpinRuku['shengchandate']) echo $chengpinRuku->shengchandate->format('Y-m-d'); ?></td>
										<th>入库日期</th>
										<td><?php if($chengpinRuku['rukudate']) echo $chengpinRuku->rukudate->format('Y-m-d'); ?></td>
									</tr>
									<tr>
										<th colspan="2">入库数量</th>
										<td colspan="2" ><?= $chengpinRuku['rukuquantity'] ?></td>
									</tr>
                                </tfoot>
                            </table>
                        
                </div><!-- /.box -->
            </div>
        </section><!-- /.content -->