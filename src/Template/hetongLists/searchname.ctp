        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                添加产品
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/hetongLists/index"><i class="fa fa-dashboard"></i>合同评审</a></li>
                <li class="active">合同评审管理</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
				<form method="post" action="/projectERP/hetongLists/searchname/<?= $hetongList['id'] ?>" class="box box-primary" accept-charset="utf-8" enctype="multipart/form-data" style="width: 60%; margin: 0px auto;">
                    <div class="box-body">
                        <div class="box-body"  style="width:90%;margin: auto;" >
                            <div class="box-header">
                                <h3 class="box-title">合同表信息</h3>
                            </div>
                            <table class="table table-bordered table-hover" style="margin-bottom: 10px;">
                                <thead>
                                <tr>
                                    <th>评审对象</th>
                                    <th>编号</th>
									<th>订货单位</th>
                                    <th>发货地址</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
									<td><?= $hetongList->duixiang ?></td>
									<td><?= $hetongList->h_id?></td>
									<td><?= $hetongList->dh_name?></td>
									<td><?= $hetongList->delivery_addr?></td>
                                </tr>
                                </tfoot>
								<thead>
                                <tr>
                                    <th>交货方式</th>
                                    <th>质保期</th>
									<th>产品合计(元)</th>
									<th>审批状态</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
									<td>
										<?= $hetongList->jiaohuofangshi ?>
										<?php if($hetongList->jiaohuofangshi == "款到发货(限天数)" ){ 
										echo ":".$hetongList->jiaohuofangshi_tianshu; 
										} elseif($hetongList->jiaohuofangshi == "其他"  ){ 
										echo ":".$hetongList->jiaohuofangshi_qita; } ?>
									</td>
									<td><?= $hetongList->zhibaoqi?></td>
									<td><?= $hetongList->heji_totalprice?></td>
									<?php if($hetongList->istijiao==0){ ?>
										<td><span class="label label-default">未提交审核</span></td>
									<?php } elseif($hetongList->isshenhe==0){ ?>
										<td><span class="label label-warning">已提交审核</span></td>
									<?php } elseif($hetongList->isshenhe==1 && $hetongList->pingshenbumen_diss == NULL ){ ?> 
										<td><span class="label label-primary">正在审核</span></td> 
									<?php } elseif($hetongList->isshenhe==1 && $hetongList->pingshenbumen_diss != NULL ){ ?> 
										<td><span class="label label-primary">正在审核（有驳回）</span></td> 
									<?php } elseif($hetongList->isshenhe==2 && $hetongList->shenheok==1 && $hetongList->pingshenbumen_diss == NULL){ ?> 
										<td><span class="label label-success">审核通过</span></td> 
									<?php } elseif($hetongList->isshenhe==2 && $hetongList->pingshenbumen_diss != NULL ){ ?> 
										<td><span class="label label-danger">已驳回</span></td>
									<?php } else{ ?> 
										<td></td>
									<?php } ?>
                                </tr>
                                </tfoot>
                            </table>
							<table class="table table-bordered table-hover" style="margin-bottom: 30px;">
								<thead>
								<tr>
									<th>备注</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td><?= $hetongList->beizhu ?></td>
								</tr>
								</tfoot>
							</table>
							
							<div class="box-header">
                                <h3 class="box-title">添加合同产品</h3>
                            </div>
							<div class="form-group">
								<div class="input-group-btn">
									<div class="btn-group">
										<div>输入产品名：
											<input type="text" id="name" name="name" />
											<input name="submit" type="submit" class="btn btn-sm btn-primary" value="搜索"></input>
										</div>
									</div><!-- ./btn-group -->
								</div>
							</div><!-- /.form group -->
							<?php if($decode_results!=NULL) { ?>
								<table class="table table-bordered table-hover" style="margin: 0 auto;">
									<thead>
									<tr>
										<th>编号</th>
										<th>产品名称</th>
										<th>是否为附件</th>
										<th>规格型号</th>
										<th>单位</th>
										<th>物料描述</th>
										<th>位置</th>
										<th></th>
									</tr>
									</thead>
									<thead>
									<?php foreach ($decode_results as $result): ?>
									<tr>
									<tr>
										<td><?= $result->mid ?></td>
										<td><?= $result->name?></td>	
										<td><?php if($result->isfujian==1){echo "是";} if($result->isfujian==0){echo "否";} ?></td>
										<td><?= $result->xinghao?></td>
										<td><?= $result->danwei?></td>
										<td><?= $result->miaoshu?></td>
										<td><?= $result->weizhi?></td>
										<td><?= $this->Html->link('选择', ['action' => 'addM', $hetongList->id, $result->mid] ) ?></td>
									</tr>
									<?php endforeach; ?>
									</thead>
								</table><!-- /.table -->
							<?php } ?>
                            
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交" class="btn btn-primary btn-sm" style="margin: 0px auto;display: none;"></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->