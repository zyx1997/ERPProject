          <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        修改生产计划实施
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/shengchanPaiqis/index"><i class="fa fa-dashboard"></i> 生产领料</a></li>
                        <li class="active">生产计划</li>
                    </ol>

        <section class="content">
            <div class="row">
                <form method="post" action="/projectERP/shengchanPaiqis/shishimodify/<?= $shengchanShishi['id'] ?>" accept-charset="utf-8" enctype="multipart/form-data"  class="box box-primary"  style="width: 60%; margin: 0px auto;">

                    <div class="box-body">
                        <div id="item_info" class="col-xs-12">
                            <div class="box-header">
                                <h3 class="box-title">生产排期信息</h3>
                            </div>

                            <table class="table table-bordered table-hover" style="text-align: left; margin-bottom:20px;">
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
                            </table>
							
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">生产批号</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="pihao" value="<?=$shengchanShishi->pihao ?>" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">生产日期</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="shengchandate" value="<?php if($shengchanShishi->shengchandate) echo $shengchanShishi->shengchandate->format('Y-m-d'); ?>" class="form-control datepicker" placeholder="请选择"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">机器编号</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="onlyid" value="<?=$shengchanShishi->onlyid ?>" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
                        
						<?php if($shengchanShishi->iszhijian==1&&$shengchanShishi->zhijianresult==0) { ?>
							<div class="box-header">
								<h3 class="box-title">驳回理由</h3>
							</div>
							<div class="box-body"  style="width:90%;margin: auto;text-align: center">
								<textarea style="width:90%;margin: auto;"><?=$shengchanShishi['zhijianreason'] ?></textarea>
							</div><!-- /.box-body -->
						<?php }?>
						</div><!-- /.form group -->
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>
					
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->