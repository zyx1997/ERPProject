        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                新增生产计划
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
                <form action="/projectERP/shengchanJihuas/index" class="box box-primary" style="width: 60%; margin: 0px auto;">
                    <div class="box-header">
                        <h3 class="box-title">生产计划</h3>
                    </div>
                    <table class="table table-bordered table-hover" style="width: 90%;margin: auto;">
                        <thead>
                        <tr>
                            <th>计划生产开始时间</th>
                            <th><input type="text" class="datepicker" style="border:none;"  placeholder="请输入..."></th>
                            <th>实际生产开始时间</th>
                            <th><input type="text" class="datepicker" style="border:none;" placeholder="请输入..."/></th>
                        </tr>
                        <tr>
                            <th>计划生产数量</th>
                            <th><input style="border:none;" placeholder="请输入..."/></th>
                            <th>实际产出数量</th>
                            <th><input style="border:none;" placeholder="请输入..."/></th>
                        </tr>
                        </thead>
                    </table><!-- /.table -->
                    <div class="box-header">
                        <h3 class="box-title">物料清单</h3>
                    </div>
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <table class="table table-bordered table-hover" width="">
                            <thead>
                            <tr>
                                <th>物料描述</th>
                                <th>物料编号</th>
                                <th>出料数量</th>
                                <th>领料人确认</th>
                            </tr>
                            </thead>
                            <thead id="add_wuliao">
                            <tr>
                                <th><input style="border:none;" placeholder="请输入..."/></th>
                                <th><input style="border:none;" placeholder="请输入..."/></th>
                                <th><input style="border:none;" placeholder="请输入..."/></th>
                                <th></th>
                            </tr>
                            </thead>
                        </table><!-- /.table -->
                        <div id="add_wuliao_line" type="button" class="pull-right" title="新增">
                            <i class="fa fa-plus btn-warning btn-sm "></i>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;font-weight: bold;">
                        上传附件
                        <input type="file" name="fileUpload"/>
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交登记" class="btn btn-primary btn-sm" style="margin: 0px auto" />
                    </div>

                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->