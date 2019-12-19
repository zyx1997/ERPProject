        <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        新增生产计划
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
                <form method="post" action="/projectERP/ShengchanPaiqis/add/<?=$chengpinInitial['mid'] ?>" enctype="multipart/form-data"  class="box box-primary" style="width: 60%; margin: 0px auto;">
                    <div class="box-body">
                        <div id="item_info" class="col-xs-12">
							<div class="box-header">
                                <h3 class="box-title">生产排期</h3>
                            </div>
							<!-- IP mask -->
							
							<!-- IP mask -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
								<label style="width:10%;margin-top:5px;">排期名称</label>
								<div class="controls" style="width:90%;">
									<input type="text" name="name" class="form-control"/>
								</div>
							</div><!-- /.form group -->
							
							<!-- phone mask -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
								<label style="width:10%;margin-top:5px;">计划生产开始时间</label>
								<div class="controls" style="width:90%;">
									<input type="text" name="jihuakaishidate" class="form-control datepicker"/>
								</div>
							</div><!-- /.form group -->
							<!-- phone mask -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
								<label style="width:10%;margin-top:5px;">实际生产开始时间</label>
								<div class="controls" style="width:90%;">
									<input type="text" name="shijikaishidate" class="form-control datepicker"/>
								</div>
							</div><!-- /.form group -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
								<label style="width:10%;margin-top:5px;">计划生产结束时间</label>
								<div class="controls" style="width:90%;">
									<input type="text" name="jihuajieshudate" class="form-control datepicker"/>
								</div>
							</div><!-- /.form group -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
								<label style="width:10%;margin-top:5px;">实际生产结束时间</label>
								<div class="controls" style="width:90%;">
									<input type="text" name="shijijieshudate" class="form-control datepicker"/>
								</div>
							</div><!-- /.form group -->
							<!-- IP mask -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
								<label style="width:10%;margin-top:5px;">计划生产数量</label>
								<div class="controls" style="width:90%;">
									<input type="text" name="jihuaquantity" class="form-control"/>
								</div>
							</div><!-- /.form group -->
							<!-- IP mask -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
								<label style="width:10%;margin-top:5px;">实际生产数量</label>
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
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input id="submit-q" type="submit" value="提交" class="btn btn-primary btn-sm" style="margin: 0px auto;"></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->