                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        短料交付计划
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/manageDuanliaos/index"><i class="fa fa-dashboard"></i> 生产管理</a></li>
                        <li class="active">短料交付计划</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">查询结果</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <?php if($result==NULL){ echo "没有匹配结果"; }
									else{ ?>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>生产排期编号</th>
                                            <th>成品编号</th>
                                            <th>成品名称</th>
											<th>物料编号</th>
                                            <th>物料名称</th>
											<th>物料描述</th>
											<th>库存数量</th>
                                            <th>短缺数量</th>
                                            <th>采购数量</th>
                                            <th>计划到场时间+1</th>
                                            <th>操作人</th>
                                            <th>操作时间</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
										<?php foreach ($result as $shengchanWuliaoduanque): ?>
										<tr>
										<td><?= $shengchanWuliaoduanque['jid'] ?></td>
										<td><?= $shengchanWuliaoduanque['mid'] ?></td>
										<td><?= $shengchanWuliaoduanque['chengpinname'] ?></td>
										<td><?= $shengchanWuliaoduanque['m_id'] ?></td>
										<td><?= $shengchanWuliaoduanque['wuliaoname'] ?></td>
										<td><?= $shengchanWuliaoduanque['miaoshu'] ?></td>
										<td><?= $shengchanWuliaoduanque['wuliaonumber'] ?></td>
										<td><?= $shengchanWuliaoduanque['duanquenumber'] ?></td>
										<?php if( $shengchanWuliaoduanque['caigounumber']!=0 && $shengchanWuliaoduanque['caigounumber']!=null){ ?>
										<td><?= $shengchanWuliaoduanque['caigounumber'] ?></td>
										<td><?= $shengchanWuliaoduanque['jihuadate'] ?></td>
										<?php }else{ ?>
										<td></td>
										<td></td>
										<?php } ?>
										<td><?= $shengchanWuliaoduanque['user']?></td>
										<td><?= $shengchanWuliaoduanque['time']?></td>
										<td>
											<?php echo $this->Html->link('查看详情', ['action' => 'see', $shengchanWuliaoduanque['id']]); ?>
											<?php if( $shengchanWuliaoduanque['caigounumber']==0 || $shengchanWuliaoduanque['caigounumber']==null){ echo $this->Html->link('填写短料交付计划', ['action' => 'addduanliao', $shengchanWuliaoduanque['id']]); } ?>
										</td>
										</tr>
										<?php endforeach; ?>
                                        </tbody>
                                    </table><!-- /.table -->
									<?php } ?>
                                </div><!-- /.box-body-->
                                <div class="box-footer clearfix no-border">
									<a href="/projectERP/manageDuanliaos/index" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-backward"></i> 返回</a>
								</div>
                            </div><!-- /.box-->
                        </div>
                    </div>
                </section><!-- /.content -->