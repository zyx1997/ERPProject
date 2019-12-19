                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        生产计划单
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/shengchanJihuas/index"><i class="fa fa-dashboard"></i> 生产领料</a></li>
                        <li class="active">生产计划单</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">明细汇总表</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <!-- search form -->
                                    <div class="col-sm-8 search-form margin pull-left">
                                        <form method="get" action="/projectERP/shengchanJihuas/index" class="text-right">
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <div class="btn-group">
                                                        <button id="sel_result" type="button" class="btn btn-default btn-lg dropdown-toggle" data-toggle="dropdown">
                                                            生产计划名称<span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li class="btn-lg"><a href="#" onclick="select(this)">生产计划名称</a></li>
                                                            <li class="btn-lg"><a href="#" onclick="select(this)">计划生产开始时间</a></li>
                                                            <li class="btn-lg"><a href="#" onclick="select(this)">状态</a></li>
                                                        </ul>
                                                    </div>
                                                </div><!-- /btn-group -->
                                                <input name="userInput" type="text" class="form-control input-lg" placeholder="请输入关键字">
                                                <div class="input-group-btn">
                                                    <button type="submit" name="submit" class="btn btn-lg btn-primary"><i class="fa fa-search"></i></button>
                                                </div>

                                            </div>
                                        </form>
                                    </div><!-- /.search-form -->
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>序号</th>
                                            <th>生产计划名称</th>
                                            <th>计划生产开始时间</th>
                                            <th>实际生产开始时间</th>
                                            <th>状态</th>
                                            <th>操作人</th>
                                            <th>操作时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="editable">
                                            <td>1</td>
                                            <td>2019生产计划</td>
                                            <td>2019-01-01</td>
                                            <td>2019-01-01</td>
                                            <td>
                                                <span class="label label-warning">在生产</span>
                                            </td>
                                            <td>原野</td>
                                            <td>2019-03-06</td>
											<td>
												<a href="/projectERP/shengchanJihuas/modify" class="btn btn-primary btn-sm" data-widget='edit' data-toggle="tooltip" title="编辑"><i class="fa fa-edit"></i></a>
												<a href="#" class="btn btn-danger btn-sm" data-widget='' data-toggle="tooltip" title="删除"><i class="fa fa-times"></i></a>
												<a href="/projectERP/shengchanJihuas/print" class="btn btn-success btn-sm" data-widget='' data-toggle="tooltip" title="打印"><i class="fa fa-print"></i></a>
											</td>
                                        </tr>
                                        <tr class="editable">
                                            <td>2</td>
                                            <td>第一组生产计划</td>
                                            <td>2019-01-01</td>
                                            <td>2019-01-01</td>
                                            <td>
                                                <span class="label label-success">已完成</span>
                                            </td>
                                            <td>原野</td>
                                            <td>2019-03-06</td>
											<td>
												<a href="/projectERP/shengchanJihuas/modify" class="btn btn-primary btn-sm" data-widget='edit' data-toggle="tooltip" title="编辑"><i class="fa fa-edit"></i></a>
												<a href="#" class="btn btn-danger btn-sm" data-widget='' data-toggle="tooltip" title="删除"><i class="fa fa-times"></i></a>
												<a href="/projectERP/shengchanJihuas/print" class="btn btn-success btn-sm" data-widget='' data-toggle="tooltip" title="打印"><i class="fa fa-print"></i></a>
											</td>
                                        </tr>
                                        <tr class="editable">
                                            <td>3</td>
                                            <td>四月生产计划</td>
                                            <td>2019-01-01</td>
                                            <td>2019-01-01</td>
                                            <td>
                                                <span class="label label-success">已完成</span>
                                            </td>
                                            <td>原野</td>
                                            <td>2019-03-06</td>
											<td>
												<a href="/projectERP/shengchanJihuas/modify" class="btn btn-primary btn-sm" data-widget='edit' data-toggle="tooltip" title="编辑"><i class="fa fa-edit"></i></a>
												<a href="#" class="btn btn-danger btn-sm" data-widget='' data-toggle="tooltip" title="删除"><i class="fa fa-times"></i></a>
												<a href="/projectERP/shengchanJihuas/print" class="btn btn-success btn-sm" data-widget='' data-toggle="tooltip" title="打印"><i class="fa fa-print"></i></a>
											</td>
                                        </tr>
                                        <tr class="editable">
                                            <td>4</td>
                                            <td>第二组生产计划</td>
                                            <td>2019-01-01</td>
                                            <td>2019-01-01</td>
                                            <td>
                                                <span class="label label-warning">在生产</span>
                                            </td>
                                            <td>原野</td>
                                            <td>2019-03-06</td>
											<td>
												<a href="/projectERP/shengchanJihuas/modify" class="btn btn-primary btn-sm" data-widget='edit' data-toggle="tooltip" title="编辑"><i class="fa fa-edit"></i></a>
												<a href="#" class="btn btn-danger btn-sm" data-widget='' data-toggle="tooltip" title="删除"><i class="fa fa-times"></i></a>
												<a href="/projectERP/shengchanJihuas/print" class="btn btn-success btn-sm" data-widget='' data-toggle="tooltip" title="打印"><i class="fa fa-print"></i></a>
											</td>
                                        </tr>
                                        <tr class="editable">
                                            <td>5</td>
                                            <td>第二季度生产计划</td>
                                            <td>2019-01-01</td>
                                            <td>2019-01-01</td>
                                            <td>
                                                <span class="label label-warning">在生产</span>
                                            </td>
                                            <td>原野</td>
                                            <td>2019-03-06</td>
											<td>
												<a href="/projectERP/shengchanJihuas/modify" class="btn btn-primary btn-sm" data-widget='edit' data-toggle="tooltip" title="编辑"><i class="fa fa-edit"></i></a>
												<a href="#" class="btn btn-danger btn-sm" data-widget='' data-toggle="tooltip" title="删除"><i class="fa fa-times"></i></a>
												<a href="/projectERP/shengchanJihuas/print" class="btn btn-success btn-sm" data-widget='' data-toggle="tooltip" title="打印"><i class="fa fa-print"></i></a>
											</td>
                                        </tr>
                                        </tbody>
                                    </table><!-- /.table -->
                                </div><!-- /.box-body-->
                                <div class="box-footer clearfix no-border">
                                    <a href="/projectERP/shengchanJihuas/add" id="addProduct" class="btn btn-warning pull-left"><i class="fa fa-plus"></i> 新增生产计划</a>
                                </div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->