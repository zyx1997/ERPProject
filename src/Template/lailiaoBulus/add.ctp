        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                原材料补录
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/lailiaoBulus/index"><i class="fa fa-dashboard"></i>原料库管理</a></li>
                <li class="active">原材料补录</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
				<form method="post" action="/projectERP/lailiaoBulus/add/<?= $lailiaoInitial['id'] ?>" class="box box-primary" accept-charset="utf-8" enctype="multipart/form-data" style="width: 60%; margin: 0px auto;">
                    <div class="box-body">
                        <div class="box-body"  style="width:90%;margin: auto;" >
                            <div class="box-header">
                                <h3 class="box-title">原材料信息</h3>
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
									<th>库存数量</th>
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
									<td><?= $lailiaoInitial->number?></td>
                                </tr>
                                </tfoot>
                            </table>
                            
							<?php if($isA){ ?>
							<div class="form-group">
                                <label>编号规则:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input name="guize" type="text" class="form-control" />
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
							<div class="form-group">
                                <label>起始号码:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input name="qishi" type="text" class="form-control" />
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
							<div class="form-group">
                                <label>结束号码:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input name="jieshu" type="text" class="form-control" />
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
							<?php } else{ ?>
							<div class="form-group" >
                                <label>添加数量:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input name="number" type="text" class="form-control" oninput="value=value.replace(/[^\d]/g,'')" />
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
							<?php } ?>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input name="submit" type="submit" value="提交" class="btn btn-primary btn-sm" ></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->