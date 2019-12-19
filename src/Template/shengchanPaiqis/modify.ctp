        <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        修改生产计划
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/shengchanPaiqis/index"><i class="fa fa-dashboard"></i> 生产领料</a></li>
                        <li class="active">生产计划</li>
                    </ol>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form method="post" action="/projectERP/ShengchanPaiqis/modify/<?=$shengchanPaiqi['id'] ?>" enctype="multipart/form-data"  class="box box-primary" style="width: 60%; margin: 0px auto;">
                    <div class="box-body">
                        <div id="item_info" class="col-xs-12">
							<div class="box-header">
                                <h3 class="box-title">生产排期</h3>
                            </div>
							<!-- IP mask -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
								<label style="width:10%;margin-top:5px;">单号</label>
								<div class="controls" style="width:90%;">
									<input type="text" value="<?=$shengchanPaiqi['jid'] ?>" name="jid" class="form-control" readonly="readonly"/>
								</div>
							</div><!-- /.form group -->
							<!-- IP mask -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
								<label style="width:10%;margin-top:5px;">排期名称</label>
								<div class="controls" style="width:90%;">
									<input type="text" name="name" value="<?=$shengchanPaiqi['name'] ?>" class="form-control"/>
								</div>
							</div><!-- /.form group -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
								<label style="width:10%;margin-top:5px;">成品名称</label>
								<div class="controls" style="width:90%;">
									<input type="text" name="chengpinname" value="<?=$shengchanPaiqi['chengpinname'] ?>" class="form-control" readonly="readonly"/>
								</div>
							</div><!-- /.form group -->
							<!-- phone mask -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
								<label style="width:10%;margin-top:5px;">计划生产开始时间</label>
								<div class="controls" style="width:90%;">
									<input type="text" name="jihuakaishidate" value="<?php if($shengchanPaiqi->jihuakaishidate!=NULL)
												echo $shengchanPaiqi->jihuakaishidate->format('Y-m-d');
											?>" class="form-control datepicker"/>
								</div>
							</div><!-- /.form group -->
							<!-- phone mask -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
								<label style="width:10%;margin-top:5px;">实际生产开始时间</label>
								<div class="controls" style="width:90%;">
									<input type="text" name="shijikaishidate" value="<?php if($shengchanPaiqi->shijikaishidate!=NULL)
												echo $shengchanPaiqi->shijikaishidate->format('Y-m-d');
											?>" class="form-control datepicker"/>
								</div>
							</div><!-- /.form group -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
								<label style="width:10%;margin-top:5px;">计划生产结束时间</label>
								<div class="controls" style="width:90%;">
									<input type="text" name="jihuajieshudate" value="<?php if($shengchanPaiqi->jihuajieshudate!=NULL)
												echo $shengchanPaiqi->jihuajieshudate->format('Y-m-d');
											?>" class="form-control datepicker"/>
								</div>
							</div><!-- /.form group -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
								<label style="width:10%;margin-top:5px;">实际生产结束时间</label>
								<div class="controls" style="width:90%;">
									<input type="text" name="shijijieshudate" value="<?php if($shengchanPaiqi->shijijieshudate!=NULL)
												echo $shengchanPaiqi->shijijieshudate->format('Y-m-d');
											?>" class="form-control datepicker"/>
								</div>
							</div><!-- /.form group -->
							<!-- IP mask -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
								<label style="width:10%;margin-top:5px;">计划生产数量</label>
								<div class="controls" style="width:90%;">
									<input type="text" name="jihuaquantity" value="<?=$shengchanPaiqi['jihuaquantity'] ?>" class="form-control"/>
								</div>
							</div><!-- /.form group -->
							<!-- IP mask -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
								<label style="width:10%;margin-top:5px;">实际生产数量</label>
								<div class="controls" style="width:90%;">
									<input type="text" name="shijiquantity" value="<?=$shengchanPaiqi['shijiquantity'] ?>" class="form-control"/>
								</div>
							</div><!-- /.form group -->
							<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
								<label style="width:10%;margin-top:5px;">备注</label>
								<div class="controls" style="width:90%;">
									<input type="text" name="beizhu" value="<?=$shengchanPaiqi['beizhu'] ?>" class="form-control"/>
								</div>
							</div><!-- /.form group -->
							<?php if($shengchanPaiqi->isshenpi==1&&$shengchanPaiqi->shenpiresult==0) { ?>
							<div class="box-header">
								<h3 class="box-title">驳回理由</h3>
							</div>
							<div class="box-body"  style="width:90%;margin: auto;text-align: center">
								<textarea style="width:90%;margin: auto;"><?=$shengchanPaiqi['shenpireason'] ?></textarea>
							</div><!-- /.box-body -->
							<?php }?>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input id="submit-q" type="submit" value="提交" class="btn btn-primary btn-sm" style="margin: 0px auto;"></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->