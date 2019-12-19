        <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        成品质检
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/chengpinShengchanrukuchecks/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                        <li class="active">成品质检</li>
                    </ol>
                </section>
        <section class="content">
            <div class="row">
                <form method="post" action="/projectERP/chengpinShengchanrukuchecks/check/<?= $shengchanShishi['id']; ?>" accept-charset="utf-8" enctype="multipart/form-data"  class="box box-primary"  style="width: 60%; margin: 0px auto;">

                    <div class="box-body">
                        <div id="item_info" class="col-xs-12">
                            <div class="box-header">
                                <h3 class="box-title">入库信息</h3>
                            </div>

                            <table class="table table-bordered table-hover" style="text-align: left;">
                                <thead>
                                <tr>
                                    <th>编号</th>
                                    <th>成品名称</th>
									<th>机器编号</th>
									<th>生产批号</th>
									<th>生产日期</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?= $shengchanShishi->mid ?></td>
                                    <td><?= $shengchanShishi->mname ?></td>
                                    <td><?= $shengchanShishi->onlyid ?></td>
									<td><?= $shengchanShishi->pihao ?></td>
                                    <td><?php if($shengchanShishi->shengchandate) echo $shengchanShishi->shengchandate->format('Y-m-d'); ?></td>
                                </tr>
                                </tfoot>
                            </table>
							<!-- phone mask -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between; margin-top:20px;">
								<label style="width:10%;margin-top:5px;">入库日期</label>
								<div class="controls" style="width:90%;">
									<input type="text" name="rukudate" value="" class="form-control datepicker"/>
								</div>
							</div><!-- /.form group -->
							<!-- phone mask -->
							<?php if($shengchanShishi->iszhijian==0){ ?>
                            <div class="form-group" style="text-align: center;">
								<input type="hidden" name="iszhijian" value="1"/>
                                <div style="margin: 10px auto;">
                                    <label>
                                        <input style="margin: 3px;" type="radio" name="zhijianresult" value="1" class="minimal" checked/> 通过
                                    </label>
                                    <label>
                                        <input style="margin: 3px;" type="radio" name="zhijianresult" value="0" class="minimal"/>  驳回
                                    </label>
                                </div>
                            </div>
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">质检说明</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="zhijianreason" class="form-control" placeholder="驳回必填"/>
							</div>
							<?php } ?>

                        </div>
						
                    </div><!-- /.box-body -->
					
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->