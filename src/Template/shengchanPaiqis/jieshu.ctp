        <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        生产结束
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
                <form method="post" action="/projectERP/shengchanPaiqis/jieshu/<?=$chengpinInitial['mid'] ?>/<?= $id ?>" enctype="multipart/form-data"  class="box box-primary" style="width: 80%; margin: 0px auto;">

                    <div class="box-body">
                        <div id="item_info" class="col-xs-12">
                            <div class="box-header">
                                <h3 class="box-title">排期信息</h3>
                            </div>

                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>排期编号</th>
                                    <th>排期名称</th>
									<th>计划开始时间</th>
                                    <th>实际开始时间</th>
                                    <th>计划结束时间</th>
                                    <th>实际结束时间</th>
									<th>计划生产数量</th>
									<th>实际生产数量</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?= $shengchanPaiqi->jid ?></td>
                                    <td><?= $shengchanPaiqi->name ?></td>
									<td>
										<?php if($shengchanPaiqi->jihuakaishidate!=NULL)
											echo $shengchanPaiqi->jihuakaishidate->format('Y-m-d');
										?>
									</td>
									<td>
										<?php if($shengchanPaiqi->shijikaishidate!=NULL)
											echo $shengchanPaiqi->shijikaishidate->format('Y-m-d');
										?>
									</td>
									<td>
										<?php if($shengchanPaiqi->jihuajieshudate!=NULL)
											echo $shengchanPaiqi->jihuajieshudate->format('Y-m-d');
										?>
									</td>
									<td>
										<?php if($shengchanPaiqi->shijijieshudate!=NULL)
											echo $shengchanPaiqi->shijijieshudate->format('Y-m-d');
										?>
									</td>
									<td>
										<?= $shengchanPaiqi->jihuaquantity?>
									</td>
									<td>
										<?= $shengchanPaiqi->shijiquantity?>
									</td>
                                </tr>
                                </tfoot>
								<thead>
                                <tr>
                                    <th>产品编号</th>
                                    <th>产品名称</th>
									<th>是否为附件</th>
                                    <th>规格型号</th>
                                    <th>单位</th>
                                    <th>物料描述</th>
									<th>位置</th>
									<th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?= $chengpinInitial['mid'] ?></td>
                                    <td><?= $chengpinInitial['name'] ?></td>
									<td>
										<?php if($chengpinInitial->isfujian==1){echo "是";} if($chengpinInitial->isfujian==0){echo "否";} ?>
									</td>
                                    <td><?= $chengpinInitial['xinghao'] ?></td>
                                    <td><?= $chengpinInitial['danwei'] ?></td>
                                    <td><?= $chengpinInitial['miaoshu'] ?></td>
									<td><?= $chengpinInitial['weizhi'] ?></td>
									<td></td>
                                </tr>
                                </tfoot>
                            </table>
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between; margin-top:20px;">
								<label style="width:10%;margin-top:5px;">实际完成时间</label>
								<div class="controls" style="width:90%;">
									<input type="text" name="shijijieshudate" class="form-control datepicker"/>
								</div>
							</div><!-- /.form group -->
							<!-- IP mask -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
								<label style="width:10%;margin-top:5px;">实际完成数量</label>
								<div class="controls" style="width:90%;">
									<input type="text" name="shijiquantity" class="form-control"/>
								</div>
							</div><!-- /.form group -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
								<label style="width:10%;margin-top:5px;">备注</label>
								<div class="controls" style="width:90%;">
									<input type="text" name="beizhu" class="form-control"/>
								</div>
							</div><!-- /.form group -->
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input id="submit-q" type="submit" value="提交" class="btn btn-primary btn-sm" style="margin: 0px auto;"></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->