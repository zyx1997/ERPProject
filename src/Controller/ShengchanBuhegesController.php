<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class ShengchanBuhegesController extends AppController
    {
        public function index()
        {
		    $this->loadModel("ShengchanShishis");
			$zhijianresult = 0;
			$iszhijian = 1;
			$this->set('shengchanShishis', $this->paginate($this->ShengchanShishis->find('all', array(
				'conditions'=>array("ShengchanShishis.zhijianresult LIKE '%".$zhijianresult."%'",
				"ShengchanShishis.iszhijian LIKE '%".$iszhijian."%'"
			)))
			));

        }
		public function suigongdan($id){
			$this->loadModel("ShengchanShishis");
			$shengchanShishi = $this->ShengchanShishis->findById($id)->firstOrFail();
			$this->set('shengchanShishi',$shengchanShishi);
		}
		public function view($id){
			$this->loadModel("ShengchanPaiqis");
			$this->loadModel("ShengchanShishis");
			$shengchanShishi = $this->ShengchanShishis->findById($id)->firstOrFail();
			$shengchanPaiqi = $this->ShengchanPaiqis->findByJid($shengchanShishi->jid)->firstOrFail();
			$this->set('shengchanPaiqi' ,$shengchanPaiqi);
			$this->set('shengchanShishi' ,$shengchanShishi);
		}
		public function shishizhijian($id){
			$this->loadModel("ShengchanShishis");
			$this->request->allowMethod(['post', 'shishizhijian']);
			$shengchanShishi = $this->ShengchanShishis->findById($id)->firstOrFail();
			$shengchanShishi->isbaosong = 1;
			$shengchanShishi->iszhijian = 0;
			if ($this->ShengchanShishis->save($shengchanShishi)) {
				$this->Flash->success(__('删除成功'));
				return $this->redirect(['action' => 'index']);
			}
		}
		

    }
