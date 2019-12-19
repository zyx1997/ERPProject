       <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        领料
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/shengchanQiliaos/index"><i class="fa fa-dashboard"></i> 生产领料</a></li>
                        <li class="active">齐料单</li>
                    </ol>
                </section>
        <section class="content">
            <div class="row">
                <form method="post" action="/projectERP/shengchanQiliaos/lingliao/<?= $shengchanQiliaoFirst['id'] ?>" accept-charset="utf-8" enctype="multipart/form-data"  class="box box-primary"  style="width: 60%; margin: 0px auto;">

                    <div class="box-body">
                        <div id="item_info" class="col-xs-12">
                            <div class="box-header">
                                <h3 class="box-title">齐料单信息</h3>
                            </div>
							<table class="table table-bordered table-hover" style="margin-bottom: 30px;">
								<thead>
								<tr>
									<th>生产排期单号</th>
                                    <th>生产排期名称</th>
									<th>产品单号</th>
                                    <th>产品名称</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td><?= $shengchanPaiqi->jid ?></td>
									<td><?= $shengchanPaiqi->name?></td>
									<td><?= $shengchanPaiqi->mid ?></td>
									<td><?= $shengchanPaiqi->chengpinname?></td>
								</tr>
								</tfoot>
								<thead>
								<tr>
									<th>计划开始时间</th>
									<th>实际开始时间</th>
									<th>计划结束时间</th>
									<th>实际结束时间</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<?php if($shengchanPaiqi->jihuakaishidate != null){ ?> 
										<td><?= $shengchanPaiqi->jihuakaishidate->format('Y-m-d') ?></td>
									<?php }else{ ?> 
										<td></td>
									<?php } ?> 
									<?php if($shengchanPaiqi->shijikaishidate != null){ ?> 
										<td><?= $shengchanPaiqi->shijikaishidate->format('Y-m-d') ?></td>
									<?php }else{ ?> 
										<td></td>
									<?php } ?> 
									<?php if($shengchanPaiqi->jihuajieshudate != null){ ?> 
										<td><?= $shengchanPaiqi->jihuajieshudate->format('Y-m-d') ?></td>
									<?php }else{ ?> 
										<td></td>
									<?php } ?> 
									<?php if($shengchanPaiqi->shijijieshudate != null){ ?> 
										<td><?= $shengchanPaiqi->shijijieshudate->format('Y-m-d') ?></td>
									<?php }else{ ?> 
										<td></td>
									<?php } ?> 
								</tr>
								</tfoot>
								<thead>
								<tr>
									<th>计划生产数量</th>
									<th>实际生产数量</th>
									<th>审批人</th>
									<th>审批时间</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td><?= $shengchanPaiqi->jihuaquantity ?></td>
									<td><?= $shengchanPaiqi->shijiquantity ?></td>
									<td><?= $shengchanPaiqi->shenpiren ?></td>
									<td><?= $shengchanPaiqi->shenpitime->format('Y-m-d H:m:s') ?></td>
								</tr>
								</tfoot>
							</table>
                            <div class="box-header">
                                <h3 class="box-title">物料信息</h3>
                            </div>
							<table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
											<th>一级分类名称</th>
                                            <th>二级分类名称</th>
                                            <th>所需数量</th>
											<th>原材料库存</th>
                                        </tr>
                                        </thead>
										<tbody>
										<tr>
											<td rowspan="<?= ($shengchanQiliaoFirst->erji_number)+1 ?>"><?= $shengchanQiliaoFirst['firstlevel'] ?></td>
										</tr>
										<?php 
										foreach ($shengchanQiliaoSeconds as $shengchanQiliaoSecond): 
										?>
										<tr>
											<td><?= '( '.$shengchanQiliaoSecond['secondid'].' ) '.$shengchanQiliaoSecond['secondlevel']?></td>
											<?php 
											$singleConsumeNum = $shengchanQiliaoSecond['singleConsumeNum'];
											$consumeGeshu = $shengchanQiliaoSecond['shijiquantity'];
											$allNeedNum = $shengchanQiliaoSecond['allNeedNum'];
											$currentKucun = $shengchanQiliaoSecond['currentKucun'];
											$afterKucun = $currentKucun - $allNeedNum;
											$styleNegative = '<span style="color:red;">';
											$stylePositive = '<span style="color:green;">';	
											// 所需数量
											echo '<td>'.$allNeedNum.' = '.$singleConsumeNum.' * '.$consumeGeshu.'</td>';
											// 原材料库存
											echo '<td>'.$currentKucun.' ( 已备料 '.$allNeedNum.' )</td>'; 
											?>
										</tr>
										<?php endforeach; ?><!-- /.列举完所有二级分类 -->
                                        </tbody>
							</table><!-- /.table -->
							<div class="form-group" style="margin-top:20px; display:flex; flex-direction:row; justify-content: space-between;">
								<label style="width:10%;margin-top:5px;">领料人</label>
								<div class="controls" style="width:90%;">
									<input type="hidden" name="islingliao" value="1"/>
									<input type="text" name="lingliaoren" class="form-control"/>
								</div>
							</div><!-- /.form-group -->
                       </div><!-- /.form group -->
                    </div><!-- /.box-body -->
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>
                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->