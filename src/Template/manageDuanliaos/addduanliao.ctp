        <section class="content-header">
            <h1>
                短料交付计划填写
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/manageDuanliaos/index"><i class="fa fa-dashboard"></i>生产管理</a></li>
                <li class="active">短料交付计划</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
				<form method="post" action="/projectERP/manageDuanliaos/addduanliao/<?= $shengchanWuliaoduanque->id ?>" class="box box-primary" accept-charset="utf-8" enctype="multipart/form-data" style="width: 60%; margin: 0px auto;">
                    <div class="box-body">
                        <div class="box-body"  style="width:90%;margin: auto;" >
                            <div class="box-header">
                                <h3 class="box-title">来料信息</h3>
                            </div>
                            <table class="table table-bordered table-hover" style="margin-bottom: 10px;">
                                <thead>
                                <tr>
                                    <th>生产排期编号</th>
									<th>生产排期名称</th>
									<th>成品编号</th>
                                    <th>成品名称</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
									<td><?= $shengchanWuliaoduanque->jid ?></td>
									<td><?= $shengchanWuliaoduanque->mid ?></td>
									<td><?= $shengchanWuliaoduanque->chengpinname ?></td>
									<td><?= $shengchanWuliaoduanque->m_id ?></td>
                                </tr>
                                </tfoot>
								<thead>
                                <tr>
                                    <th>物料编号</th>
                                    <th>物料名称</th>
									<th>物料描述</th>
									<th>库存数量</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
									<td><?= $shengchanWuliaoduanque->m_id ?></td>
									<td><?= $shengchanWuliaoduanque->wuliaoname ?></td>
									<td><?= $shengchanWuliaoduanque->miaoshu ?></td>
									<td><?= $lailiaoInitial->number ?></td>
                                </tr>
                                </tfoot>
                            </table>
							<div class="form-group" >
                                <label>短缺数量:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input readonly="readonly" name="duanquenumber" value="<?= $shengchanWuliaoduanque->duanquenumber ?>" type="text" class="form-control" oninput="value=value.replace(/[^\d]/g,'')" />
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
                            <div class="form-group" >
                                <label>采购数量:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input name="caigounumber" type="text" class="form-control" oninput="value=value.replace(/[^\d]/g,'')" />
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
							<div class="form-group" >
                                <label>计划到场时间+1:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
									<input name="jihuadate" type="text" class="form-control datepicker"/>
								</div><!-- /.input group -->
                            </div><!-- /.form group -->
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input name="submit" type="submit" value="提交" class="btn btn-primary btn-sm" ></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->