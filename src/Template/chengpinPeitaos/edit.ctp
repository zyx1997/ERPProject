                
				<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        修改成品配套信息
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
                <div class="box box-primary box-content" style="width: 60%; margin: 0px auto;">
                    <div class="box-header">
                        <h3 class="box-title">成品配套信息</h3>
                    </div>
                    <form method="post" action="/projectERP/chengpinPeitaos/edit/<?=$chengpinPeitao->id ?>" enctype="multipart/form-data"   class="box-body" style="width:90%;margin: auto;">
						<!-- phone mask -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">配套名称</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="name" value="<?=$chengpinPeitao->name ?>" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">参考价格(套)</label>
							<div class="controls" style="width:90%;">
								<input type="text" name="cankaojiage" value="<?=$chengpinPeitao->cankaojiage ?>" class="form-control" />
							</div>
                        </div><!-- /.form group -->
						<div class="box-body"  style="width:90%;margin: auto;text-align: center">
							<input type="submit" value="提交登记" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
						</div>
                    </form><!-- /.box-body -->
                    
                    
                </div><!-- /.box -->
            </div>
        </section><!-- /.content -->