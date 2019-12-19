        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                打印生产计划单
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
                <form action="" class="box box-primary" style="width: 60%; margin: 0px auto;">
                    <div class="box-header">
                        <h3 class="box-title">生产计划</h3>
                    </div>
                    <table class="table table-bordered table-hover" style="width: 90%;margin: auto;">
                        <thead>
                        <tr>
                            <th>计划生产开始时间</th>
                            <th><input readonly="readonly" type="text" style="border:none;" value="20190305"  placeholder="请输入..."></th>
                            <th>实际生产开始时间</th>
                            <th><input readonly="readonly" type="text" style="border:none;" value="20190308" placeholder="请输入..."/></th>
                        </tr>
                        <tr>
                            <th>计划生产数量</th>
                            <th><input readonly="readonly" style="border:none;" value="150"/></th>
                            <th>实际产出数量</th>
                            <th><input readonly="readonly" style="border:none;" value="160"/></th>
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
                                <th><input readonly="readonly" style="border:none;" /></th>
                                <th><input readonly="readonly" style="border:none;" value="XA001"/></th>
                                <th><input readonly="readonly" style="border:none;" value="80"/></th>
                                <th></th>
                            </tr>
                            </thead>
                        </table><!-- /.table -->
                        <!--<div id="add_wuliao_line" type="button" class="pull-right" title="新增">-->
                            <!--<i class="fa fa-plus btn-warning btn-sm "></i>-->
                        <!--</div>-->
                    </div><!-- /.box-body -->
                    <div class="box-body" style="width:90%;margin: auto;text-align: center">
                        <button id="printNow" class="btn btn-success" onclick="window.print();"><i class="fa fa-print"></i> 打印</button>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->