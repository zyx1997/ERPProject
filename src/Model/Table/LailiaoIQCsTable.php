<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Datasource\ConnectionManager;

class LailiaoIQCsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
	public function validationDefault(Validator $validator)
	{
		$validator
			->notEmpty('m_id');

		return $validator;
	}
	//获取最新订单的日期和序号
	public function getorderid()
	{
		$sql = 'select * from order_records where type = "L"';
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		return $results;
	}
	//更新最新订单的日期和序号
	public function updateorderid($order_id,$date)
	{
		$sql = 'update order_records set date = "'.$date.'",order_id = "'.$order_id.'" where type = "L"';	
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
	}
	//库存数量更新
	public function updatenum($m_id,$num){
		$sql1 = 'select * from lailiao_initials where m_id = "'.$m_id.'" ';	
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql1);
		$results = $stmt ->fetchAll('assoc');
		$num = $results[0]['number']+$num;
		$sql2 = 'update lailiao_initials set number = "'.$num.'" where m_id = "'.$m_id.'" ';
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql2);
	}
	/*
	public function searchdb($m_id, $name)
	{
		$sql = "select * from caigou_list_alls where zhuangtai=2 ";
		if( $m_id != "" )
			$sql = $sql."and m_id like '%".$m_id."%' ";
		if( $name != "" )
			$sql = $sql."and name like '%".$name."%' ";
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		return $results;
	}
	*/
}