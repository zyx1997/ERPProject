                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        物料短缺表
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/manageWuliaos/index"><i class="fa fa-dashboard"></i> 生产管理</a></li>
                        <li class="active">物料短缺表</li>
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
                                        <form method="get" action="/projectERP/manageWuliaos/index" class="text-right">
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <div class="btn-group">
                                                        <button id="sel_result" type="button" class="btn btn-default btn-lg dropdown-toggle" data-toggle="dropdown">
                                                            物料描述<span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li class="btn-lg"><a href="#" onclick="select(this)">物料描述</a></li>
                                                            <li class="btn-lg"><a href="#" onclick="select(this)">物料编号</a></li>
                                                            <li class="btn-lg"><a href="#" onclick="select(this)">库存数量</a></li>
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
                                            <th>物料描述</th>
                                            <th>物料编号</th>
                                            <th>库存数量</th>
                                            <th>BOM数量</th>
                                            <th>短缺数量</th>
                                            <th>操作人</th>
                                            <th>操作时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="editable">
                                            <td>这是一段描述</td>
                                            <td>1</td>
                                            <td>10</td>
                                            <td>10</td>
                                            <td>5</td>
                                            <td>原野</td>
                                            <td>2019-03-06</td>
											<td>
												<a href="/projectERP/manageWuliaos/modify" class="btn btn-primary btn-sm" data-widget='edit' data-toggle="tooltip" title="编辑"><i class="fa fa-edit"></i></a>
												<a href="#" class="btn btn-danger btn-sm" data-widget='' data-toggle="tooltip" title="删除"><i class="fa fa-times"></i></a>
											</td>
                                        </tr>
                                        <tr class="editable">
                                            <td>这是一段描述</td>
                                            <td>2</td>
                                            <td>10</td>
                                            <td>10</td>
                                            <td>5</td>
                                            <td>原野</td>
                                            <td>2019-03-06</td>
											<td>
												<a href="/projectERP/manageWuliaos/modify" class="btn btn-primary btn-sm" data-widget='edit' data-toggle="tooltip" title="编辑"><i class="fa fa-edit"></i></a>
												<a href="#" class="btn btn-danger btn-sm" data-widget='' data-toggle="tooltip" title="删除"><i class="fa fa-times"></i></a>
											</td>
                                        </tr>
                                        <tr class="editable">
                                            <td>这是一段描述</td>
                                            <td>3</td>
                                            <td>10</td>
                                            <td>10</td>
                                            <td>5</td>
                                            <td>原野</td>
                                            <td>2019-03-06</td>
											<td>
												<a href="/projectERP/manageWuliaos/modify" class="btn btn-primary btn-sm" data-widget='edit' data-toggle="tooltip" title="编辑"><i class="fa fa-edit"></i></a>
												<a href="#" class="btn btn-danger btn-sm" data-widget='' data-toggle="tooltip" title="删除"><i class="fa fa-times"></i></a>
											</td>
                                        </tr>
                                        <tr class="editable">
                                            <td>这是一段描述</td>
                                            <td>4</td>
                                            <td>10</td>
                                            <td>10</td>
                                            <td>5</td>
                                            <td>原野</td>
                                            <td>2019-03-06</td>
											<td>
												<a href="/projectERP/manageWuliaos/modify" class="btn btn-primary btn-sm" data-widget='edit' data-toggle="tooltip" title="编辑"><i class="fa fa-edit"></i></a>
												<a href="#" class="btn btn-danger btn-sm" data-widget='' data-toggle="tooltip" title="删除"><i class="fa fa-times"></i></a>
											</td>
                                        </tr>
                                        <tr class="editable">
                                            <td>这是一段描述</td>
                                            <td>5</td>
                                            <td>10</td>
                                            <td>10</td>
                                            <td>5</td>
                                            <td>原野</td>
                                            <td>2019-03-06</td>
											<td>
												<a href="/projectERP/manageWuliaos/modify" class="btn btn-primary btn-sm" data-widget='edit' data-toggle="tooltip" title="编辑"><i class="fa fa-edit"></i></a>
												<a href="#" class="btn btn-danger btn-sm" data-widget='' data-toggle="tooltip" title="删除"><i class="fa fa-times"></i></a>
											</td>
                                        </tr>
                                        </tbody>
                                        <!--<tfoot>-->
                                        <!--<tr>-->
                                            <!--<th>编号</th>-->
                                            <!--<th>产品名称</th>-->
                                            <!--<th>规格型号</th>-->
                                            <!--<th>单位</th>-->
                                            <!--<th>物料描述</th>-->
                                            <!--<th>位置</th>-->
                                        <!--</tr>-->
                                        <!--</tfoot>-->
                                    </table><!-- /.table -->
                                </div><!-- /.box-body-->
                                <div class="box-footer clearfix no-border">
                                    <a id="addProduct" class="btn btn-warning pull-left" href="/projectERP/manageWuliaos/add"><i class="fa fa-plus"></i> 新增物料短缺表</a>
                                </div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->