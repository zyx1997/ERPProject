        <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        生产排期审批
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/shengchanPaiqichecks/index"><i class="fa fa-dashboard"></i> 生产领料</a></li>
                        <li class="active">生产排期审批</li>
                    </ol>
                </section>
        <section class="content">
            <div class="row">
                <form method="post" action="/projectERP/shengchanPaiqichecks/check/<?= $shengchanPaiqi['id'] ?>" accept-charset="utf-8" enctype="multipart/form-data"  class="box box-primary"  style="width: 60%; margin: 0px auto;">

                    <div class="box-body">
                        <div id="item_info" class="col-xs-12">
                            <div class="box-header">
                                <h3 class="box-title">生产排期信息</h3>
                            </div>

                            <table class="table table-bordered table-hover" style="text-align: left;">
                                <thead>
                                <tr>
                                    <th>单号</th>
                                    <th>排期名称</th>
                                    <th>成品编号</th>
                                    <th>成品名称</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?= $shengchanPaiqi['jid'] ?></td>
                                    <td><?= $shengchanPaiqi['name'] ?></td>
                                    <td><?= $shengchanPaiqi['mid'] ?></td>
                                    <td><?= $shengchanPaiqi['chengpinname'] ?></td>
                                </tr>
                                </tfoot>
								<thead>
                                <tr>
									<th>计划生产开始时间</th>
									<th>实际生产开始时间</th>
									<th>计划生产结束时间</th>
									<th>实际生产结束时间</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
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
                                </tr>
                                </tfoot>
								<thead>
                                <tr>
                                    <th>计划生产数量</th>
                                    <th>实际生产数量</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?= $shengchanPaiqi['jihuaquantity'] ?></td>
                                    <td><?= $shengchanPaiqi['shijiquantity'] ?></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tfoot>
                            </table>

                        </div><!-- /.form group -->
						
                    </div><!-- /.box-body -->
					<div class="box-header">
                                <h3 class="box-title">物料清单</h3>
                            </div>
							<div class="box-body"  style="width:90%;margin: auto;text-align: center">
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
							<?php if($shengchanPaiqi->isshenpi==0){ ?>
                            <div class="form-group" style="text-align: center;">
								<input type="hidden" name="isshenpi" value="1"/>
								<input type="hidden" name="shenpiren" value="临时"/>
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
								<input type="text" name="shenpireason" class="form-control" placeholder="驳回必填"/>
							</div>
							<?php } ?>
							</div>
                    </div><!-- /.box-body -->
					<?php if($shengchanPaiqi->isshenpi==0){ ?>
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>
					<?php } ?>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->