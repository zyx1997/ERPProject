<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class UsersController extends AppController
    {
		public function index(){
			$users = $this->request->getSession()->read('user');
			$this->set('users',$users);
		}
		
		public function modify(){
			$this->viewBuilder()->setLayout('error_id');
			$users = $this->request->getSession()->read('user');
			$this->set('users',$users);
			if ($this->request->is(['post', 'put'])) {
				$old = $this->request->getData('old');
				if($users->password!=md5($old)){
					$this->Flash->error('密码不正确', [
						'key' => 'error_id'
					]);
					
				}else{
					$new1 = $this->request->getData('new1');
					$new2 = $this->request->getData('new2');
					if($new1!=$new2){
						$this->Flash->error('新密码输入不一致', [
						'key' => 'error_id'
					]);
					}else{
						$users->password = md5($new1);
						if ($this->Users->save($users)) {
							return $this->redirect(['action' => 'index']);
						}else{
							$this->Flash->error(__('修改失败.'));
						}
					}
				}
				
				
			}
		}
		
        public function login(){
			$this->viewBuilder()->setLayout('default_login');
			if ($this->request->is('post')) {
				$zhanghao = $this->request->getData('zhanghao');
				$gonghao = $this->request->getData('gonghao');
				$pwd = $this->request->getData('password');
				$users=$this->Users->find('all',array('conditions'=>array('Users.zhanghao'=>$zhanghao,
					'Users.gonghao'=>$gonghao)));
		        if($users->count()!=0){
					foreach($users as $us){
						if($us['password']==md5($pwd)){
							$this->request->getSession()->write('user',$us);
							$this->loadModel("UserRoles");
							$userRole = $this->UserRoles->findByGonghao($us->gonghao)->firstOrFail();
							$this->loadModel("RoleControllers");
							$this->request->getSession()->write('user',$us);
							$this->request->getSession()->write('userRole',$userRole);
							if($userRole->roleid!="root"){
								$roleControllers = $this->RoleControllers->findByRoleid($userRole->roleid);
								//$this->request->getSession()->write('roleControllers',$roleControllers);
								$roles = array();
								foreach($roleControllers as $role){
									if(!in_array($role->controllerid,$roles)){
										array_push($roles,$role->controllerid);
									}
								}
								$this->request->getSession()->write('roles',$roles);
							}
							$this->redirect(['action' => 'welcome']);
						}else{
							$this->Flash->error('密码不正确', [
								'key' => 'error_login'
							]);	
						}
						break;
					}
				}else{
					$this->Flash->error('账号不正确', [
						'key' => 'error_login'
					]);
				}
			}
		}
		public function logout(){
			$this->request->getSession()->delete('user');
			$this->Flash->error('您已注销', [
					'key' => 'error_login'
			]);
			$this->redirect(['action' => 'login']);
		}
		public function welcome(){
			
		}

		
    }
