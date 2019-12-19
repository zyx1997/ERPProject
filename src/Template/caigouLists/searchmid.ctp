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
				<form method="post" action="/projectERP/caigouLists/searchmid/<?= $caigouList['l_id'] ?>" class="box box-primary" accept-charset="utf-8" enctype="multipart/form-data" style="width: 60%; margin: 0px auto;">
                    <div class="box-body">
                        <div class="box-body"  style="width:90%;margin: auto;" >
                            <div class="box-header">
                                <h3 class="box-title">供货方公司信息</h3>
                            </div>
                            <table class="table table-bordered table-hover" style="margin-bottom: 10px;">
                                <thead>
                                <tr>
                                    <th>编码</th>
                                    <th>公司名称</th>
                                    <th>税号</th>
                                    <th>联系人</th>
                                    <th>电话号码</th>
                                    <th>手机号码</th>
                                    <th>地址</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?=$caigouProvider->p_id ?></td>
									<td><?=$caigouProvider->p_name ?></td>
									<td><?=$caigouProvider->shuihao ?></td>
									<td><?=$caigouProvider->person ?></td>
									<td><?=$caigouProvider->dianhua ?></td>
									<td><?=$caigouProvider->shouji ?></td>
									<td><?=$caigouProvider->dizhi ?></td>
                                </tr>
                                </tfoot>
                            </table>
                            <div class="box-header">
                                <h3 class="box-title">采购单信息</h3>
                            </div>
                            <div class="form-group" >
                                <label>采购单编号:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input readonly="readonly" type="text" class="form-control" value="<?= $caigouList['l_id'] ?>"/>
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
                            <div class="form-group">
                                <label>采购单名称:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input readonly="readonly" type="text" class="form-control" value="<?= $caigouList['l_name'] ?>"/>
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
							<div class="form-group">
                                <label>采购日期:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input readonly="readonly" type="text" class="form-control" value="<?php if($caigouList['caigoudate']!=NULL){ echo $caigouList['caigoudate']->format('Y-m-d');} ?>"/>
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
							<div class="box-header">
                                <h3 class="box-title">添加采购产品</h3>
                            </div>
							<div class="form-group">
								<div class="input-group-btn">
									<div class="btn-group">
										<div>输入产品编号：
											<!-- <input type="hidden" name="l_id" value="<?= $caigouList['l_id'] ?>" /> -->
											<input type="text" id="search_m_id" name="search_m_id" />
											<input name="submit" type="submit" class="btn btn-sm btn-primary" value="搜索"></input>
										</div>
									</div><!-- ./btn-group -->
								</div>
							</div><!-- /.form group -->
							
							<?php if($decode_results!=NULL) { ?>
							<div class="box-body" style="margin: auto">
								<table class="table table-bordered table-hover" style="margin: 0 auto;">
									<thead>
									<tr>
										<th>编号</th>
										<th>原材料分类</th>
                                        <th>产品名称</th>
                                        <th>规格型号</th>
                                        <th>位置</th>
										<th></th>
									</tr>
									</thead>
									<thead>
									<?php foreach ($decode_results as $result): ?>
									<tr>
									<tr>
										<td><?= $result->m_id ?></td>
										<td><?= $result->fenlei?></td>
										<td><?= $result->name?></td>	
										<td><?= $result->xinghao?></td>
										<td><?= $result->weizhi?></td>
										<td><?= $this->Html->link('选择', ['action' => 'addM', $caigouList->l_id, $result->m_id] ) ?></td>
									</tr>
									<?php endforeach; ?>
									</thead>
								</table><!-- /.table -->
							</div>
							<?php } ?>
                            
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input id="submit-q" type="submit" value="提交" class="btn btn-primary btn-sm" style="margin: 0px auto;display: none;"></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->