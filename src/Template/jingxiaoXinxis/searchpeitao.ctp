<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        搜索成品配套
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/jingxiaoXinxis/index"><i class="fa fa-dashboard"></i>销售商基本信息管理</a></li>
                        <li class="active">经销商基本信息</li>
                    </ol>
                </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form action="/projectERP/jingxiaoXinxis/searchpeitao/<?=$jxid ?>" enctype="multipart/form-data"  method="post"  class="box box-primary" style="width: 60%; margin: 0px auto;">
					<div class="search-form margin" style="margin-bottom:20px;">
                        <div class="input-group" >
                            <div class="input-group-btn">
                                <div class="btn-group" style="margin-bottom:20px;">
									<div>
										配套名称：<input type="text" name="searchname" />
										<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>
									</div>
                                </div><!-- ./btn-group -->
                            </div>
                        </div>
						<?php if($results!=NULL) { ?>
							
						<table class="table table-bordered table-hover" >
							<thead>
							<tr>
								<th>配套名称</th>
								<th>成品名称</th>
                                <th>成品数量</th>
                                <th>参考价格(套)</th>
								<th></th>
							</tr>
							</thead>
							<thead>
							<?php foreach ($results as $result): ?>
							<tr>
								<td><?=$result->name ?></td>
								<td><?=$result->mname ?></td>
								<td><?=$result->mnumber ?></td>
								<td><?=$result->mjiage ?></td>
								<td>
								<?= $this->Html->link('选择', ['action' => 'addpeitao', $jxid, $result->ptid]) ?>
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