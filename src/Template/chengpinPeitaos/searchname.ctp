                
				<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        添加成品
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/chengpinPeitaos/index"><i class="fa fa-dashboard"></i>销售管理</a></li>
                        <li class="active">成品配套</li>
                    </ol>
                </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form action="/projectERP/chengpinPeitaos/searchname" enctype="multipart/form-data"  method="post"  class="box box-primary" style="width: 60%; margin: 0px auto;">
					<div class="search-form margin" style="margin-bottom:20px;">
                        <div class="input-group" >
                            <div class="input-group-btn">
                                <div class="btn-group" style="margin-bottom:20px;">
									<div>
										成品名称：<input type="text" name="searchname" />
										<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>
									</div>
                                </div><!-- ./btn-group -->
                            </div>
                        </div>
						<?php if($results!=NULL) { ?>
							
						<table class="table table-bordered table-hover" >
							<thead>
							<tr>
								<th>编号</th>
								<th>产品名称</th>
								<th>是否是附件</th>
								<th>规格型号</th>
								<th>单位</th>
								<th>物料描述</th>
								<th>位置</th>
								<th></th>
							</tr>
							</thead>
							<thead>
							<?php foreach ($results as $result): ?>
							<tr>
								<td><?=$result->mid ?></td>
								<td><?=$result->name ?></td>
								<td><?php if($result->isfujian==0){echo "否";}else{echo "是";} ?></td>
								<td><?=$result->xinghao ?></td>
								<td><?=$result->danwei ?></td>
								<td><?=$result->miaoshu ?></td>
								<td><?=$result->weizhi ?></td>
								<td>
								<?= $this->Html->link('选择', ['action' => 'add', $result->mid]) ?>
								</td>
							</tr>
							<?php endforeach; ?>
							</thead>
						</table><!-- /.table -->
						<?php } ?>
                    </div><!-- /.search-form -->
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->