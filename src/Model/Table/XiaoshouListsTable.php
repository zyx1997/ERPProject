<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Datasource\ConnectionManager;

class XiaoshouListsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
	public function validationDefault(Validator $validator)
	{
		$validator
			->notEmpty('h_id');

		return $validator;
	}
	/*public function searchdb($duixiang, $h_id, $dh_name)
	{
		$sql = "select * from hetong_lists where shenheok=1 ";
		if( $duixiang != "" )
			$sql = $sql."and duixiang like '%".$duixiang."%' ";
		if( $h_id != "" )
			$sql = $sql."and h_id like '%".$h_id."%' ";
		if( $dh_name != "" )
			$sql = $sql."and dh_name like '%".$dh_name."%' ";
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		
		return $results;
	}*/
	//获取最新订单的日期和序号
	public function getorderid()
	{
		$sql = 'select * from order_records where type = "X"';	
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		
		return $results;
	}
	//更新最新订单的日期和序号
	public function updateorderid($order_id,$date)
	{
		$sql = 'update order_records set date = "'.$date.'",order_id = "'.$order_id.'" where type = "X"';	
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
	}
}