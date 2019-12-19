        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                新增采购单管理
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
				<form method="post" class="box box-primary" accept-charset="utf-8" enctype="multipart/form-data" action="/projectERP/caigouLists/searchpname" style="width: 60%; margin: 0px auto;">
					<div class="box-header">
                        <h3 class="box-title">供货方查询</h3>
                    </div>
					<div class="box-body"  style="width:90%;margin: auto;">
						<div class="input-group sidebar-form">
							<input type="text" name="p_name" class="form-control" placeholder="请输入公司名称"/>
                            <span class="input-group-btn">
                            <button type='submit' name='submit' value="搜索" class="btn btn-flat"><i class="fa fa-search"></i></button></span>
                        </div>
					</div><!-- /.box-body -->
					<?php if($decode_results!=NULL) { ?>
					<div class="box-body" style="margin: auto">
						<table class="table table-bordered table-hover" style="width:90%;margin: 0 auto;">
							<thead>
							<tr>
								<th>编码</th>
                                <th>公司名称</th>
                                <th>税号</th>
                                <th>联系人</th>
								<th>电话号码</th>
								<th>手机号码</th>
								<th>地址</th>
								<th></th>
							</tr>
							</thead>
							<thead>
							<?php foreach ($decode_results as $result): ?>
							<tr>
								<td><?=$result->p_id ?></td>
								<td><?=$result->p_name ?></td>
								<td><?=$result->shuihao ?></td>
								<td><?=$result->person ?></td>
								<td><?=$result->dianhua ?></td>
								<td><?=$result->shouji ?></td>
								<td><?=$result->dizhi ?></td>
								<td><?= $this->Html->link('选择', ['action' => 'add', $result->p_id]) ?></td>
							</tr>
							<?php endforeach; ?>
							</thead>
						</table><!-- /.table -->
					</div>
					<?php } ?>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->