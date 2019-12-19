        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                修改采购单信息
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
				<form method="post" class="box box-primary" accept-charset="utf-8" enctype="multipart/form-data" action="/projectERP/caigouLists/modify/<?= $caigouList['l_id']; ?>" style="width: 60%; margin: 0px auto;">
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
                                    <td><?=$caigouList->p_id ?></td>
									<td><?=$caigouList->p_name ?></td>
									<td><?=$caigouList->shuihao ?></td>
									<td><?=$caigouList->person ?></td>
									<td><?=$caigouList->dianhua ?></td>
									<td><?=$caigouList->shouji ?></td>
									<td><?=$caigouList->dizhi ?></td>
                                </tr>
                                </tfoot>
                            </table>
                            <div class="box-header">
                                <h3 class="box-title">填写采购单信息</h3>
                            </div>
                            <div class="form-group" >
                                <label>填写采购单编号:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input readonly="readonly" id="l_id" name="l_id" type="text" class="form-control" value="<?= $caigouList->l_id ?>" />
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
                            <div class="form-group">
                                <label>填写采购单名称:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input id="l_name" name="l_name" type="text" class="form-control" value="<?= $caigouList->l_name ?>" />
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
							<div class="form-group" >
                                <label>填写采购时间:</label>
								<div class="input-group">
									<div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
									<input type="text" name="caigoudate" class="form-control datepicker" value="<?= $caigouList->caigoudate ?>" />
								</div><!-- /.input group -->
                            </div><!-- /.form group -->
							
							<!-- 以下显示审核意见 -->
							<?php if( $caigouList->shenhe_beizhu != '' ){ ?>
							<div class="box-header" style="margin-top:30px;">
								<h3 class="box-title">审核意见</h3>
							</div>
							<div class="box-body"  style="width:90%;margin: auto;text-align: center">
								<textarea readonly="readonly" style="width:90%;margin: auto;"><?= $caigouList['shenhe_beizhu'] ?></textarea>
							</div><!-- /.box-body -->
							<?php } ?>
							<?php if( $caigouList->shenpi_beizhu != '' ){ ?>
							<div class="box-header" style="margin-top:30px;">
								<h3 class="box-title">审批意见</h3>
							</div>
							<div class="box-body"  style="width:90%;margin: auto;text-align: center">
								<textarea readonly="readonly" style="width:90%;margin: auto;"><?= $caigouList['shenpi_beizhu'] ?></textarea>
							</div><!-- /.box-body -->
							<?php } ?>
                        </div>
                    </div><!-- /.box-body -->
					<div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交修改" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->