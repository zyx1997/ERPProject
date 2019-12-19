<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class RolesController extends AppController
    {
		public  $paginate  =  [ 
			'limit'  =>  10, //每页显示条数
		];
		public function initialize()
		{
			parent::initialize();
			$this->loadComponent('Paginator');
			$this->loadComponent('Flash'); // Include the FlashComponent
		}
        public function index()
        {
		    $this->loadComponent('Paginator');		
			$this->set('roles', $this->paginate());//用于在前端页面中显示
        }
		public function add()
		{
			$this->viewBuilder()->setLayout('error_id');
			$this->loadComponent('Paginator');
			$role = $this->Roles->newEntity();
			if ($this->request->is('post')) {
				$roleid = $this->request->getData('roleid');
				$alreadyExists = $this->Roles->find(
					'all', array('conditions'=>array(
						'Roles.roleid'=>$roleid, //caigou
					))
				);
				if( $alreadyExists->count() >= 1 ){
					$this->Flash->error('该编号已存在，添加失败.', [
						'key' => 'error_id'
					]);
				}else{
					$this->Roles->patchEntity($role, $this->request->getData());
					//写入数据库
					if ($this->Roles->save($role)) {
						$this->Flash->success(__('新增数据成功！'));
						return $this->redirect(['action' => 'addcontroller',$roleid]);
					}
				}
			}
		}
		public function modify($roleid)
        {
			$role = $this->Roles->findByRoleid($roleid)->firstOrFail();
			if ($this->request->is(['post', 'put'])) {
				$this->Roles->patchEntity($role, $this->request->getData());
				//写入数据库
				if ($this->Roles->save($role)) {
					$this->Flash->success(__('修改成功.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('role', $role);	
        }
		public function seecontroller($roleid)
        {
			$this->loadModel("RoleControllers");
			$role = $this->Roles->findByRoleid($roleid)->firstOrFail();
			//$shengchanQiliaoFirsts = $this->ShengchanQiliaos->searchFirstlevels($jid); // 返回的是数组，用 ['字段名'] 取值
			//$chengpinFirstlevels = $this->ChengpinFirstlevels->findByMid($mid);// 用 ->字段名 取值
			$rolecontrollers = $this->RoleControllers->find(
				'all', array(
				//cakephp3.0不能在这里直接用
				//'fields'=> array('distinct RoleControllers.controllerid'),
				'fields'=> array('RoleControllers.controllerid'),//显示的字段
				'conditions' => array(
					'RoleControllers.roleid'=>$roleid
				))
			)->distinct(['controllerid']);// 用 ->字段名 取值
			$rolecontrolleractions = array();
			foreach ($rolecontrollers as $rolecontroller){
				$controllerid = $rolecontroller->controllerid;
				$rolecontrolleractions[$controllerid] = $this->RoleControllers->find(
					'all', array('conditions' => array(
						'RoleControllers.roleid'=>$roleid,
						'RoleControllers.controllerid'=>$rolecontroller->controllerid
					))
				);// 用 ->字段名 取值
			}
			$this->set('role', $role);
			$this->set(compact('rolecontrollers'));
			$this->set(compact('rolecontrolleractions'));
		}
		public function addcontroller($roleid)
        {
			$this->loadModel("RoleControllers");
			
			$role = $this->Roles->findByRoleid($roleid)->firstOrFail();
			//列举权限清单，同seecontroller()
			$rolecontrollers = $this->RoleControllers->find(
				'all', array(
				//cakephp3.0不能在这里直接用
				//'fields'=> array('distinct RoleControllers.controllerid'),
				'fields'=> array('RoleControllers.controllerid'),//显示的字段
				'conditions' => array(
					'RoleControllers.roleid'=>$roleid
				))
			)->distinct(['controllerid']);// 用 ->字段名 取值
			$rolecontrolleractions = array();
			foreach ($rolecontrollers as $rolecontroller){
				$controllerid = $rolecontroller->controllerid;
				$rolecontrolleractions[$controllerid] = $this->RoleControllers->find(
					'all', array('conditions' => array(
						'RoleControllers.roleid'=>$roleid,
						'RoleControllers.controllerid'=>$rolecontroller->controllerid
					))
				);// 用 ->字段名 取值
			}
			//新增权限
			$roleController = $this->RoleControllers->newEntity();
			if ($this->request->is(['post', 'put'])) {
				//$this->Roles->patchEntity($role, $this->request->getData());
				//写入数据库
				//if ($this->Roles->save($role)) {
				//	$this->Flash->success(__('修改成功.'));
				//	return $this->redirect(['action' => 'index']);
				//}else{
				//	$this->Flash->error(__('修改失败.'));
				//}
				$roleController->roleid = $roleid;
				$this->RoleControllers->patchEntity($roleController, $this->request->getData());
				//写入数据库
				if ($this->RoleControllers->save($roleController)) {
					$this->Flash->success(__('新增数据成功！'));
					return $this->redirect(['action' => 'addcontroller',$roleid]);
				}
			}
			$this->set('role', $role);
			$this->set(compact('rolecontrollers'));
			$this->set(compact('rolecontrolleractions'));
        }
		public function deleteController($id)
		{
			$this->loadModel("RoleControllers");
			$this->request->allowMethod(['post', 'delete']);
			$rolecontroller = $this->RoleControllers->findById($id)->firstOrFail();
			if ($this->RoleControllers->delete($rolecontroller)) {
				$this->Flash->success(__('The {0} rolecontroller has been deleted.', $id));
				return $this->redirect(['action' => 'seecontroller',$rolecontroller->roleid]);
			}
		}
		public function search(){
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$roleid = $this->request->getData('roleid');
				$rolename = $this->request->getData('rolename');
				$this->set('result', $this->paginate($this->Roles->find(
					'all', array('conditions'=>array(
						"Roles.roleid LIKE '%".$roleid."%'",
						"Roles.rolename LIKE '%".$rolename."%'"
					))
				)));
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}
    }
