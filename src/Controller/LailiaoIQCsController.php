<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class LailiaoIQCsController extends AppController
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
		    $this->loadModel("CaigouListAlls");
			$this->loadComponent('Paginator');
		    //$lailiaoInitials = $this->Paginator->paginate($this->CaigouProviders->find());
		    //$this->set(compact('lailiaoInitials'));
			$this->set('caigouListAlls', $this->paginate($this->CaigouListAlls->find()));//用于在前端页面中显示
		}
		public function check($id)
        {
			$this->loadModel("CaigouListAlls");
			$this->loadModel("LailiaoDictionarys");
			$this->loadComponent('Paginator');
			$caigouListAll = $this->CaigouListAlls->findById($id)->firstOrFail();
			if ($this->request->is('post')) {
				$this->CaigouListAlls->patchEntity($caigouListAll, $this->request->getData());
				$caigouListAll->zhuangtai = '1'; //产品状态更新：待填写价格
				$caigouListAll->zhijianren = "张三";
				//判断文件是否上传到临时文件
				$upload = $_FILES['fileUpload'];
				if( is_uploaded_file($upload['tmp_name'])){ // 如果没有错误发生，文件上传成功
					//检测文件扩展名
					$name = $upload['name']; //文件名
					$num = strrpos($name, '.');
					//var_dump($name);
					if($num === false){ //没有扩展名显示错误信息
						return $this->redirect(['action' => 'index']);
					}else{
						$allowType = array('.doc','.pdf');
						//截取文件扩展名
						$extension = substr($name, $num);
						//var_dump($extension);
						if(  !in_array($extension, $allowType) ){
							return $this->redirect(['action' => 'index']);
						}else{
							echo $upload['size'];
							//时间戳加密文件名
							$fileName = date('Y-m-d').'-'.mt_rand();
							//拼接文件路径
							$path = '..\webroot'.DIRECTORY_SEPARATOR.$fileName.$extension;
							//$pathname = 'G:\Software\Apache\htdocs\zhouhe\app\webroot\photos\as\\';
							//mkdir($pathname);
							//获取临时文件名
							$temp = $upload['tmp_name'];
							//var_dump($temp);
							//var_dump($path);
							//上传文件
							if(move_uploaded_file($temp, $path)){
								//文件上传成功后组合文件下载地址
								$caigouListAll->zhijiandanfujian = $fileName.$extension;
							}else{
								return $this->redirect(['action' => 'index']);
							}
						}
					}
				}
				//写入数据库:产品采购单数据库CaigouListAlls
				if ($this->CaigouListAlls->save($caigouListAll)) {
					$this->Flash->success(__('修改成功.'));
					//写入数据库:A类原材料编号数据库LailiaoDictionarys
					$weiyibianhao = array('A类');
					if( in_array($caigouListAll->fenlei, $weiyibianhao) ){
						$i=1;//首序
						$num = $this->request->getData('iqc_ok');//合格数量
						$orderid = $this->LailiaoIQCs->getorderid();
						$date = date("Y-m-d");//当前日期
						if($date==$orderid[0]['date']){//如果最新订单的日期等于当天
							$i  = (int)$orderid[0]['order_id']+1;//首序
							$num = $num+$i-1;//末序
						}
						$guize = "L".str_replace('-','',$date);//编号规则"L20190517"
						for(; $i<=$num; $i++){
							$lailiaoDictionary = $this->LailiaoDictionarys->newEntity();
							$lailiaoDictionary->m_id = $caigouListAll->m_id; //此种原材料编号
							$lailiaoDictionary->l_id = $caigouListAll->l_id; //操作人
							$lailiaoDictionary->l_alls_id = $caigouListAll->id; //caigou_list_alls的序列编号
							$lailiaoDictionary->user = "gaunliren"; //操作人
							if($i>=100){
								$lailiaoDictionary->onlyid = $guize.$i;
							}else if($i>=10){
								$lailiaoDictionary->onlyid = $guize."0".$i;
							}else{
								$lailiaoDictionary->onlyid = $guize."00".$i;
							}
							if ($this->LailiaoDictionarys->save($lailiaoDictionary)) {
								$this->Flash->success(__('添加成功.'));
							}else{
								$this->Flash->error(__('添加失败.'));
							}
						}
						$this->LailiaoIQCs->updateorderid($num,$date);//更新最新订单的日期和序号
					}
					//更新库存
					$this->LailiaoIQCs->updatenum($caigouListAll->m_id,$this->request->getData('iqc_ok'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('修改失败.'));
				}
			}
			$this->set('caigouListAll', $caigouListAll);
        }
		public function checkresult($id)
        {
			$this->loadModel("CaigouListAlls");
			$caigouListAll = $this->CaigouListAlls->findById($id)->firstOrFail();
			$this->set('caigouListAll', $caigouListAll);	
        }
		public function search(){
			$this->loadModel("CaigouListAlls");
			$this->loadComponent('Paginator');
			if ($this->request->is('post')) {
				$m_id = $this->request->getData('m_id');
				$name = $this->request->getData('name');
				$this->set('result', $this->paginate($this->CaigouListAlls->find(
					'all', array('conditions'=>array(
						"CaigouListAlls.m_id LIKE '%".$m_id."%'",
						"CaigouListAlls.name LIKE '%".$name."%'"
					))
				)));
			}else{
				$this->Flash->error(__('输入有误，没有查询到课程。'));
				$this->set('result', $result=NULL);
			}
		}
		
    }
