        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                添加采购产品
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/caigouLists/index"><i class="fa fa-dashboard"></i>采购管理</a></li>
                <li class="active">采购单管理</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
				<form method="post" action="/projectERP/caigouLists/modifyM/<?= $caigouListAll['id'] ?>" class="box box-primary" accept-charset="utf-8" enctype="multipart/form-data" style="width: 60%; margin: 0px auto;">
                    <div class="box-body">
                        <div class="box-body"  style="width:90%;margin: auto;" >
                            <div class="box-header">
                                <h3 class="box-title">采购产品信息</h3>
                            </div>
                            <table class="table table-bordered table-hover" style="margin-bottom: 10px;">
                                <thead>
                                <tr>
                                    <th>编号</th>
									<th>原材料分类</th>
                                    <th>产品名称</th>
									<th>是否为半成品</th>
                                    <th>规格型号</th>
                                    <th>单位</th>
                                    <th>物料描述</th>
                                    <th>位置</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
									<td><?= $lailiaoInitial->m_id ?></td>
									<td><?= $lailiaoInitial->fenlei?></td>
									<td><?= $lailiaoInitial->name?></td>	
									<td><?php if($lailiaoInitial->isban==1){echo "是";} if($lailiaoInitial->isban==0){echo "否";} ?></td>
									<td><?= $lailiaoInitial->xinghao?></td>
									<td><?= $lailiaoInitial->danwei?></td>
									<td><?= $lailiaoInitial->miaoshu?></td>
									<td><?= $lailiaoInitial->weizhi?></td>
                                </tr>
                                </tfoot>
                            </table>
                            <div class="box-header">
                                <h3 class="box-title">填写采购信息</h3>
                            </div>
                            <div class="form-group" >
                                <label>采购数量:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input id="quantity" name="target_quantity" type="text" class="form-control" value="<?= $caigouListAll->target_quantity ?>" />
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
                            <div class="form-group">
                                <label>产品单价:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input id="price" name="target_price" type="text" class="form-control" value="<?= $caigouListAll->target_price ?>" />
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
							<div class="form-group">
                                <label>产品总价:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input id="totalPrice" name="target_totalprice" onclick="getTotalPrice()" type="text" class="form-control" value="<?= $caigouListAll->target_totalprice ?>" />
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input name="submit" type="submit" value="提交修改" class="btn btn-primary btn-sm" ></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->