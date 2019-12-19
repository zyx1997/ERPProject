        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                添加二级分类名称
                <small>车间</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/projectERP/chengpinInitials/index"><i class="fa fa-dashboard"></i>成品库管理</a></li>
                <li class="active">成品初始化登记</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
			<div class="row">
                <div class="box box-primary" style="width: 60%; margin: 0px auto;">
                    <div class="box-header">
                        <h3 class="box-title">成品编号</h3>
                    </div>
					<div class="input-group" style="width:90%;margin:auto;">
                        <div class="input-group-addon">
                            <i class="fa fa-edit"></i>
                        </div>
                        <input type="text" name="mid" class="form-control" value="<?=$mid ?>" readonly="readonly" />
                    </div><!-- /.input group -->
					<div class="box-header">
                        <h3 class="box-title">一级分类名称</h3>
                    </div>
					<div class="input-group" style="width:90%;margin:auto;">
                        <div class="input-group-addon">
                            <i class="fa fa-edit"></i>
                        </div>
                        <input type="text" name="firstlevel" class="form-control" value="<?= $firstlevel?>" readonly="readonly" />
                    </div><!-- /.input group -->
					<div class="box-header">
                        <h3 class="box-title">添加二级分类名称</h3>
                    </div>
					<form  method="post" action="/projectERP/chengpinInitials/addsecondlevel/<?=$mid ?>/<?= $firstlevel?>" enctype="multipart/form-data"  class="box-body"  style="width:90%;margin: auto;">
                        <div class="input-group-btn">
                            <div class="btn-group">
								<div style="margin-bottom:20px;">
									<input type="text" name="searchname" />
									<input type="submit" value="搜索" name="submit" class="btn btn-sm btn-primary" ></input>
								</div>
                            </div><!-- ./btn-group -->
                        </div>
                    </form ><!-- /.box-body -->
					<?php if($results!=NULL){ if($results!="no") { ?>
						<table class="table table-bordered table-hover" style="width:90%;margin: 0 auto;">
							<thead>
							<tr>
								<th>产品编号</th>
								<th>产品名称</th>
								<th></th>
							</tr>
							</thead>
							<thead>
							<?php foreach ($results as $result): ?>
							<tr>
								<td><?=$result->m_id ?></td>
								<td><?=$result->name ?></td>
								<td>
								<?= $this->Form->postLink(
									'添加',
									['action' => 'save', $mid, $firstlevel, $result->name,$result->m_id])
								?>
								</td>
							</tr>
							<?php endforeach; ?>
							</thead>
						</table><!-- /.table -->
					<?php } else { ?>
						<div style="width:90%;margin: auto;"><?php echo "尚未进行原材料初始化登记"; ?></div>
					<?php } } ?>
                </div><!-- /.box -->
            </div>
        </section><!-- /.content -->