                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        供应方所提供的原料
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/caigouProviders/index"><i class="fa fa-dashboard"></i>采购管理</a></li>
                        <li class="active">供应方管理</li>
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
                                        <form method="get" action="/projectERP/caigouProviders/seeMaterial" class="text-right">
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <div class="btn-group">
                                                        <button id="sel_result" type="button" class="btn btn-default btn-lg dropdown-toggle" data-toggle="dropdown">
                                                            编码<span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li class="btn-lg"><a href="#" onclick="select(this)">编码</a></li>
                                                            <li class="btn-lg"><a href="#" onclick="select(this)">公司名称</a></li>
                                                            <li class="btn-lg"><a href="#" onclick="select(this)">税号</a></li>
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
                                            <th>编号</th>
                                            <th>名称</th>
                                            <th>规格型号</th>
                                            <th>单位</th>
                                            <th>物料描述</th>
                                            <th>位置</th>
                                            <th>操作人</th>
                                            <th>操作时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
										<tr class="editable">
                                            <td>B000012</td>
                                            <td>牵引电器盒</td>
                                            <td>P2</td>
                                            <td>盒</td>
                                            <td>牵引电器盒</td>
                                            <td>A1A</td>
                                            <td>原野</td>
                                            <td>2019-03-06</td>
											<td>
												<a href="/projectERP/caigouProviders/modifyMaterial" class="btn btn-primary btn-sm" data-widget='edit' data-toggle="tooltip" title="编辑"><i class="fa fa-edit"></i></a>
												<a href="#" class="btn btn-danger btn-sm" data-widget='' data-toggle="tooltip" title="删除"><i class="fa fa-times"></i></a>
											</td>
                                        </tr>
                                        <tr class="editable">
                                            <td>M000058</td>
                                            <td>牵引四通导轨</td>
                                            <td>P2</td>
                                            <td>捆</td>
                                            <td>牵引四通导轨</td>
                                            <td>A1C</td>
                                            <td>原野</td>
                                            <td>2019-03-06</td>
											<td>
												<a href="/projectERP/caigouProviders/modifyMaterial" class="btn btn-primary btn-sm" data-widget='edit' data-toggle="tooltip" title="编辑"><i class="fa fa-edit"></i></a>
												<a href="#" class="btn btn-danger btn-sm" data-widget='' data-toggle="tooltip" title="删除"><i class="fa fa-times"></i></a>
											</td>
                                        </tr>
                                        <tr class="editable">
                                            <td>B000004</td>
                                            <td>龙门架</td>
                                            <td>P2</td>
                                            <td>盒</td>
                                            <td>龙门架</td>
                                            <td>A1D</td>
                                            <td>原野</td>
                                            <td>2019-03-06</td>
											<td>
												<a href="/projectERP/caigouProviders/modifyMaterial" class="btn btn-primary btn-sm" data-widget='edit' data-toggle="tooltip" title="编辑"><i class="fa fa-edit"></i></a>
												<a href="#" class="btn btn-danger btn-sm" data-widget='' data-toggle="tooltip" title="删除"><i class="fa fa-times"></i></a>
											</td>
                                        </tr>
                                        <tr class="editable">
                                            <td>M000017</td>
                                            <td>横杠Ø32*1.5*500mm</td>
                                            <td>P2</td>
                                            <td>捆</td>
                                            <td>横杠Ø32*1.5*500mm</td>
                                            <td>A2A</td>
                                            <td>原野</td>
                                            <td>2019-03-06</td>
											<td>
												<a href="/projectERP/caigouProviders/modifyMaterial" class="btn btn-primary btn-sm" data-widget='edit' data-toggle="tooltip" title="编辑"><i class="fa fa-edit"></i></a>
												<a href="#" class="btn btn-danger btn-sm" data-widget='' data-toggle="tooltip" title="删除"><i class="fa fa-times"></i></a>
											</td>
                                        </tr>
                                        <tr class="editable">
                                            <td>M000058</td>
                                            <td>塑柱φ7*10</td>
                                            <td>P2</td>
                                            <td>捆</td>
                                            <td>塑柱φ7*10</td>
                                            <td>H2E</td>
                                            <td>原野</td>
                                            <td>2019-03-06</td>
											<td>
												<a href="/projectERP/caigouProviders/modifyMaterial" class="btn btn-primary btn-sm" data-widget='edit' data-toggle="tooltip" title="编辑"><i class="fa fa-edit"></i></a>
												<a href="#" class="btn btn-danger btn-sm" data-widget='' data-toggle="tooltip" title="删除"><i class="fa fa-times"></i></a>
											</td>
                                        </tr>
                                        </tbody>
                                    </table><!-- /.table -->
                                </div><!-- /.box-body-->
                                <div class="box-footer clearfix no-border">
                                    <a href="/projectERP/caigouProviders/addMaterial" class="btn btn-warning pull-left"><i class="fa fa-plus"></i> 添加供应方可提供原料</a>
                                </div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->