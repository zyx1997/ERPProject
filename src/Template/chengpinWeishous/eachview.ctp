z                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        成品信息
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/chengpinWeishous/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                        <li class="active">随工单</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">随工单信息</h3>
                                </div><!-- /.box-header -->
								<div ><img src="../../webroot/suigongdan/<?= $chengpinDictionary['suigongdan'] ?>" /></div>
                                <div class="box-footer clearfix no-border">
									<a href="/projectERP/chengpinWeishous/view/<?= $chengpinDictionary['mid'] ?>" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-backward"></i> 返回</a>
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->