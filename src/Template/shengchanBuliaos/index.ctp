                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        补料单
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/shengchanBuliaos/index"><i class="fa fa-dashboard"></i> 生产领料</a></li>
                        <li class="active">补料单</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">补料单</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <!-- search form -->
                                    <!-- 分页下拉框 -->
									<div class="pull-left">
										<?php echo $this->Paginator->limitControl([2 => 2, 10 => 10, 20 => 20, 50 => 50, 100 => 100]); ?>
									</div><!-- ./分页下拉框 -->
									<!-- search form -->
                                    <div class="search-form margin">
                                        <form method="post" action="/projectERP/shengchanBuliaos/search" class="text-right">
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <div class="btn-group">
														<div>
															补料单号：<input type="text" name="bid" />
															生产计划单号：<input type="text" name="jid" />
															物料名称：<input type="text" name="mname" />
															<button type="submit" name="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>
														</div>
                                                    </div><!-- ./btn-group -->
                                                </div>
                                            </div>
                                        </form>
                                    </div><!-- /.search-form -->
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>补料单编号</th>
                                            <th>生产计划单号</th>
											<th>物料名称</th>
											<th>库存数量</th>
											<th>补料数量</th>
											<th>补料原因</th>
											<th>补料人</th>
                                            <th>状态</th>
                                            <th>操作时间</th>
											<th>短缺</th>
                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody>
										<?php foreach ($shengchanBuliaos as $shengchanBuliao): ?>
										<tr>
										<td>
											<?= $shengchanBuliao->bid ?>
										</td>
										<td>
											<?= $shengchanBuliao->jid?>
										</td>
										<td>
											<?= $shengchanBuliao->mname?>
										</td>
										<td>
											<font color="<?php if($kucunquantitys[$shengchanBuliao->mid]<=0){echo "red";} ?>">
												<?= $kucunquantitys[$shengchanBuliao->mid]?>
												</font>
											<?php if($shengchanBuliao->isbeiliao==0){ $rnum = $kucunquantitys[$shengchanBuliao->mid]-$shengchanBuliao->buliaoquantity; ?>
												(若备料后<font color="<?php if($rnum<=0){echo "red";} ?>"><?= $rnum ?></font>)
											<?php }else{ if($shengchanBuliao->islingliao==0){ ?>
												(已备料<?= $shengchanBuliao->buliaoquantity ?>)
											<?php }else{ ?>
												(已领料<?= $shengchanBuliao->buliaoquantity ?>)
											<?php } } ?>
										</td>
										<td>
											<?= $shengchanBuliao->buliaoquantity?>
										</td>
										<td>
											<?= $shengchanBuliao->reason?>
										</td>
										<td>
											<?= $shengchanBuliao->user?>
										</td>
										<td>
											<?php 
												if($shengchanBuliao->isshenpi==0){echo "<span class='label label-warning'>未审批</span>";}
												if($shengchanBuliao->isshenpi==1){
													if($shengchanBuliao->shenpiresult==1)
														echo "<span class='label label-success'>已审批($shengchanBuliao->shenpiren)</span>";
													else
														echo "<span class='label label-danger'>已驳回($shengchanBuliao->shenpiren)</span>";
												}
											?>
                                        </td>
										<td>
											<?= $shengchanBuliao->time->format('Y-m-d H:m:s')?>
										</td>
										<!-- /.短缺 -->	
										<?php if( $shengchanBuliao->isduanque == 0 ) { ?>
										<td><?= $this->Html->link('短缺', ['action' => 'duanque', $shengchanBuliao->id ]) ?></td>
										<?php } else { ?>
										<td>已申请</td>
										<?php } ?>
										
										<td>
											<?php if($shengchanBuliao->isshenpi==0||($shengchanBuliao->isshenpi==1&&$shengchanBuliao->shenpiresult==0)) { ?>
											<?= $this->Html->link('修改', ['action' => 'modify', $shengchanBuliao->id]) ?>
											<?= $this->Form->postLink(
												'删除',
												['action' => 'delete', $shengchanBuliao->id],
												['confirm' => '确认删除?'])
											?>
											<?php }else if($shengchanBuliao->isbeiliao==0){ if($rnum>=0){ ?>
											<?= $this->Form->postLink(
												'备料',
												['action' => 'beiliao', $shengchanBuliao->id])
											?>
											<?php }else echo "无法备料"; }else if($shengchanBuliao->isbeiliao==1){ 
												if($shengchanBuliao->islingliao==0){
											?>
											<?= $this->Form->postLink(
												'取消备料',
												['action' => 'quxiaobeiliao', $shengchanBuliao->id])
											?>
											<?= $this->Html->link('领料', ['action' => 'lingliao', $shengchanBuliao->id]) ?>
											<?php }else{  echo "已领料($shengchanBuliao->lingliaoren)"; } }   ?>
										</td>
										</tr>
										<?php endforeach; ?>
                                        </tbody>
                                    </table><!-- /.table -->
                                </div><!-- /.box-body-->
								<!-- 分页导航 -->
								<div>
									<?= $this->paginator->counter([
										'format' => '  显示 {{start}} 到 {{end}} 项，共 {{count}} 项'
									]) ?>
									<div style="float:right">
										<ul class="pagination">
											<li><?php echo $this->paginator->prev('上一页'); ?></li> 
											<li><?php echo $this->paginator->numbers(array('modulus' => 3)); ?></li>
											<li><?php echo $this->paginator->next('下一页'); ?></li>
										</ul>
									</div>
								</div><!-- /.分页导航 -->
                                <div class="box-footer clearfix no-border">
                                    <a href="/projectERP/shengchanBuliaos/addform" class="btn btn-warning pull-left"><i class="fa fa-plus"></i> 新增补料单</a>
                                </div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->