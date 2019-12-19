  <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        修改用户管理
                        <small>车间</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/projectERP/xusers/index"><i class="fa fa-dashboard"></i>账号管理</a></li>
                        <li class="active">管理员管理</li>
                    </ol>
                </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form method="post" action="/projectERP/xusers/modify/<?=$user->id ?>" class="box box-primary box-content" enctype="multipart/form-data" style="width: 60%; margin: 0px auto;">
                    <div class="box-header">
                        <h3 class="box-title">修改用户信息</h3>
                    </div>
                    <div class="box-body" style="width:90%;margin: auto;">
						<!-- phone mask -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">账号</label>
							<div class="controls" style="width:90%;">
								<input type="text" value="<?=$user->zhanghao ?>" name="zhanghao" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">工号</label>
							<div class="controls" style="width:90%;">
								<input type="text" value="<?=$user->gonghao ?>" name="gonghao" class="form-control" placeholder="请输入" readonly="readonly" />
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">密码</label>
							<div class="controls" style="width:90%;">
								<input id="modifypwd" onclick="modifyPwd()" type="password" value="<?=$user->password ?>" name="password" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<!-- phone mask -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">姓名</label>
							<div class="controls" style="width:90%;">
								<input type="text" value="<?=$user->name ?>" name="name" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<!-- phone mask -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">部门</label>
							<div class="controls" style="width:90%;">
								<input type="text" value="<?=$user->bumen ?>" name="bumen" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">岗位</label>
							<div class="controls" style="width:90%;">
								<input name="gangwei" value="<?=$user->gangwei ?>" type="text" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">电话</label>
							<div class="controls" style="width:90%;">
								<input name="telephone" value="<?=$user->telephone ?>" type="text" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<!-- phone mask -->
                        <div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">邮箱</label>
							<div class="controls" style="width:90%;">
								<input type="text"value="<?=$user->email ?>" name="email" class="form-control" placeholder="请输入"/>
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">重新上传照片</label>
							<div class="controls" style="width:90%;">
								<input type="file" name="fileUpload" />
							</div>
                        </div><!-- /.form group -->
						<div class="form-group" style="display:flex; flex-direction:row; justify-content: space-between;">
							<label style="width:10%;margin-top:5px;">角色</label>
							<div class="controls" style="width:90%;">
								<select name="roleid">
									<?php foreach ($roles as $role): ?>
									<option value="<?=$role->roleid ?>" <?php if($role->roleid==$userRole->roleid){echo "selected";} ?> ><?=$role->rolename ?></option>
									<?php endforeach; ?>
								</select>
							</div>
                        </div><!-- /.form group -->
                        
                    </div><!-- /.box-body -->
                    
                    <div class="box-body"  style="width:90%;margin: auto;text-align: center">
                        <input type="submit" value="提交登记" class="btn btn-primary btn-sm" style="margin: 0px auto"></input>
                    </div>

                </form><!-- /.box -->
            </div>
        </section><!-- /.content -->