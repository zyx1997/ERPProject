        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                第一步：添加订货单位 
                <small>新增合同评审</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/hetongLists/index"><i class="fa fa-dashboard"></i>合同评审</a></li>
                <li class="active">合同评审管理</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form method="post" action="/projectERP/hetongLists/searchdinghuo" class="box box-primary" enctype="multipart/form-data" style="width: 60%; margin: 0px auto;">
                    <div class="box-header">
                        <h3 class="box-title">查询订货单位:</h3>
                    </div>
                    <div class="box-body" style="width:90%;margin: auto">
						<!-- 
						<div class="form-group">
                            <label>编号:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <input readonly="readonly" value=<?= $h_id ?> type="text" class="form-control" id="h_id" name="h_id"/>
                            </div>
                        </div>
						<div class="form-group">
                            <label>订货单位:</label>
						</div>
						-->
						
						<div class="form-group">
							<div class="input-group-btn">
								<div class="btn-group">
									<div>
										<select name="dh_type">
											<option value="0">经销商</option>
											<option value="1">医院</option>
											<option value="2">其他</option>
										</select>
										<input type="text" name="dh_name" placeholder="输入单位名称"/>
										<input name="submit" type="submit" class="btn btn-sm btn-primary" value="搜索"></input>
									</div>
								</div><!-- ./btn-group -->
							</div>
						</div><!-- /.form group -->
							<?php if($decode_results!=NULL) { 
								if( $dh_type == 0 ) { ?>
								<table class="table table-bordered table-hover" style="width:100%;margin: 0 auto;">
									<thead>
									<tr>
										<th>经销商名称</th>
                                        <th>组织机构代码</th>
                                        <th>联系人</th>
                                        <th>联系电话</th>
										<th></th>
									</tr>
									</thead>
									<thead>
									<?php foreach ($decode_results as $jingxiaoXinxi): ?>
									<tr>
									<tr>
										<td><?= $jingxiaoXinxi->name ?></td>
                                        <td><?= $jingxiaoXinxi->daima ?></td>
                                        <td><?= $jingxiaoXinxi->lianxiren ?></td>
                                        <td><?= $jingxiaoXinxi->telephone ?></td>
										<td><?= $this->Html->link('选择', ['action' => 'add', $dh_type, $jingxiaoXinxi->id, $jingxiaoXinxi->name] ) ?></td>
									</tr>
									<?php endforeach; ?>
									</thead>
								</table><!-- /.table -->
								<?php }elseif( $dh_type == 1 ) { ?>
								<table class="table table-bordered table-hover" style="width:100%;margin: 0 auto;">
									<thead>
									<tr>
										<th>医院名称</th>
                                        <th>组织机构代码</th>
                                        <th>医院联系人</th>
                                        <th>医院联系电话</th>
										<th></th>
									</tr>
									</thead>
									<thead>
									<?php foreach ($decode_results as $yiyuanXinxi): ?>
									<tr>
									<tr>
										<td><?= $yiyuanXinxi->name ?></td>
                                        <td><?= $yiyuanXinxi->daima ?></td>
                                        <td><?= $yiyuanXinxi->lianxiren ?></td>
                                        <td><?= $yiyuanXinxi->telephone ?></td>
										<td><?= $this->Html->link('选择', ['action' => 'add', $dh_type, $yiyuanXinxi->id, $yiyuanXinxi->name] ) ?></td>
									</tr>
									<?php endforeach; ?>
									</thead>
								</table><!-- /.table -->
								<?php }else{ ?>
								<table class="table table-bordered table-hover" style="width:100%;margin: 0 auto;">
									<thead>
									<tr>
										<th>名称</th>
                                        <th>身份证号</th>
                                        <th>联系人</th>
                                        <th>联系电话</th>
										<th></th>
									</tr>
									</thead>
									<thead>
									<?php foreach ($decode_results as $qitaXinxi): ?>
									<tr>
									<tr>
										<td><?= $qitaXinxi->name ?></td>
                                        <td><?= $qitaXinxi->daima ?></td>
                                        <td><?= $qitaXinxi->lianxiren ?></td>
                                        <td><?= $qitaXinxi->telephone ?></td>
										<td><?= $this->Html->link('选择', ['action' => 'add', $dh_type, $qitaXinxi->id, $qitaXinxi->name] ) ?></td>
									</tr>
									<?php endforeach; ?>
									</thead>
								</table><!-- /.table -->
								<?php } ?>
							<?php } ?>
							<div class="box-body"  style="width:90%;margin-top:30px;;text-align: center">
								<a href="javascript:history.back(-1)" class="btn btn-warning btn-sm " style="color:white;" >返回上一步</a>
							</div>
					</div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->