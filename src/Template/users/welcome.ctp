<section class="content-header">
                    <h1>
                        欢迎登录ERP管理系统
                        <small>欢迎页面</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
</section>
<section class="content">
	<section class="col-lg-6 connectedSortable">                            
		<!-- TO DO List -->
		<div class="box box-primary">
			<div class="box-header">
				<i class="ion ion-clipboard"></i>
				<h3 class="box-title">待办事项（正在开发中……）</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				<ul class="todo-list">
					<li>
						<!-- drag handle -->
						<span class="handle">
							<i class="fa fa-ellipsis-v"></i>
							<i class="fa fa-ellipsis-v"></i>
						</span>  
						<!-- checkbox -->
						<input type="checkbox" value="" name=""/>                                            
						<!-- todo text -->
						<span class="text">Design a nice theme</span>
						<!-- Emphasis label -->
						<small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
						<!-- General tools such as edit or delete-->
						<div class="tools">
							<i class="fa fa-edit"></i>
							<i class="fa fa-trash-o"></i>
						</div>
					</li>
					<li>
						<span class="handle">
							<i class="fa fa-ellipsis-v"></i>
							<i class="fa fa-ellipsis-v"></i>
						</span>                                            
						<input type="checkbox" value="" name=""/>
						<span class="text">Make the theme responsive</span>
						<small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
						<div class="tools">
							<i class="fa fa-edit"></i>
							<i class="fa fa-trash-o"></i>
						</div>
					</li>
					<li>
						<span class="handle">
							<i class="fa fa-ellipsis-v"></i>
							<i class="fa fa-ellipsis-v"></i>
						</span>
						<input type="checkbox" value="" name=""/>
						<span class="text">Let theme shine like a star</span>
						<small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
						<div class="tools">
							<i class="fa fa-edit"></i>
							<i class="fa fa-trash-o"></i>
						</div>
					</li>
					<li>
						<span class="handle">
							<i class="fa fa-ellipsis-v"></i>
							<i class="fa fa-ellipsis-v"></i>
						</span>
						<input type="checkbox" value="" name=""/>
						<span class="text">Let theme shine like a star</span>
						<small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
						<div class="tools">
							<i class="fa fa-edit"></i>
							<i class="fa fa-trash-o"></i>
						</div>
					</li>
					<li>
						<span class="handle">
							<i class="fa fa-ellipsis-v"></i>
							<i class="fa fa-ellipsis-v"></i>
						</span>
						<input type="checkbox" value="" name=""/>
						<span class="text">Check your messages and notifications</span>
						<small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
						<div class="tools">
							<i class="fa fa-edit"></i>
							<i class="fa fa-trash-o"></i>
						</div>
					</li>
					<li>
						<span class="handle">
							<i class="fa fa-ellipsis-v"></i>
							<i class="fa fa-ellipsis-v"></i>
						</span>
						<input type="checkbox" value="" name=""/>
						<span class="text">Let theme shine like a star</span>
						<small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>
						<div class="tools">
							<i class="fa fa-edit"></i>
							<i class="fa fa-trash-o"></i>
						</div>
					</li>
				</ul>
			</div><!-- /.box-body -->
			
		</div><!-- /.box -->
		<script src="http://localhost/projectERP/js/raphael-min.js"></script>
        <script src="http://localhost/projectERP/js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="http://localhost/projectERP/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="http://localhost/projectERP/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="http://localhost/projectERP/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src="http://localhost/projectERP/js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="http://localhost/projectERP/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="http://localhost/projectERP/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="http://localhost/projectERP/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="http://localhost/projectERP/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
		<!-- AdminLTE App -->
        <script src="http://localhost/projectERP/js/AdminLTE/app.js" type="text/javascript"></script>
        
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="http://localhost/projectERP/js/AdminLTE/dashboard.js" type="text/javascript"></script>   
		<!-- Custom tabs (Charts with tabs)-->
		<div class="nav-tabs-custom" style="height:412px;">
			<!-- Tabs within a box -->
			<ul class="nav nav-tabs pull-right">
				<li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
				<li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
				<li class="pull-left header"><i class="fa fa-inbox"></i>销售情况（正在开发中……）</li>
			</ul>
			<div class="tab-content no-padding">
				<!-- Morris chart - Sales -->
				<div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
				<div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
			</div>
		</div><!-- /.nav-tabs-custom -->

	</section><!-- left col -->
	<section class="col-lg-6 connectedSortable ui-sortable">  
		<div class="box box-solid box-info" style="height:325px;">
			<div class="box-header">
				<h3 class="box-title">系统更新公告</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-info btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				
				<p>
					系统上线功能：经销商管理、合同评审环节、销售管理三个模块。<br>
					系统问题紧急联系电话：15802228266。
				</p>
			</div><!-- /.box-body -->
		</div>
		<div class="box box-danger" id="loading-example">
			<div class="box-header">
				<!-- tools box -->
				<div class="pull-right box-tools">
					<button class="btn btn-danger btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-danger btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div><!-- /. tools -->
				<i class="fa fa-cloud"></i>

				<h3 class="box-title">统计内容（正在开发中……）</h3>
			</div><!-- /.box-header -->
			<div class="box-body no-padding">
				<div class="row">
					<div class="col-sm-7">
						<!-- bar chart -->
						<div class="chart" id="bar-chart" style="height: 250px;"></div>
					</div>
					<div class="col-sm-5">
						<div class="pad">
							<!-- Progress bars -->
							<div class="clearfix">
								<span class="pull-left">Bandwidth</span>
								<small class="pull-right">10/200 GB</small>
							</div>
							<div class="progress xs">
								<div class="progress-bar progress-bar-green" style="width: 70%;"></div>
							</div>

							<div class="clearfix">
								<span class="pull-left">Transfered</span>
								<small class="pull-right">10 GB</small>
							</div>
							<div class="progress xs">
								<div class="progress-bar progress-bar-red" style="width: 70%;"></div>
							</div>

							<div class="clearfix">
								<span class="pull-left">Activity</span>
								<small class="pull-right">73%</small>
							</div>
							<div class="progress xs">
								<div class="progress-bar progress-bar-light-blue" style="width: 70%;"></div>
							</div>

							<div class="clearfix">
								<span class="pull-left">FTP</span>
								<small class="pull-right">30 GB</small>
							</div>
							<div class="progress xs">
								<div class="progress-bar progress-bar-aqua" style="width: 70%;"></div>
							</div>
							<!-- Buttons -->
							<p>
								<button class="btn btn-default btn-sm"><i class="fa fa-cloud-download"></i> Generate PDF</button>
							</p>
						</div><!-- /.pad -->
					</div><!-- /.col -->
				</div><!-- /.row - inside box -->
			</div><!-- /.box-body -->
			<div class="box-footer">
				<div class="row">
					<div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
						<input type="text" class="knob" data-readonly="true" value="80" data-width="60" data-height="60" data-fgColor="#f56954"/>
						<div class="knob-label">CPU</div>
					</div><!-- ./col -->
					<div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
						<input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgColor="#00a65a"/>
						<div class="knob-label">Disk</div>
					</div><!-- ./col -->
					<div class="col-xs-4 text-center">
						<input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgColor="#3c8dbc"/>
						<div class="knob-label">RAM</div>
					</div><!-- ./col -->
				</div><!-- /.row -->
			</div><!-- /.box-footer -->
		</div><!-- /.box -->        
	</section><!-- right col -->
</section>