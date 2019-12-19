<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Datasource\ConnectionManager;

class ChengpinRukusTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
	public function validationDefault(Validator $validator)
	{
		$validator
			->notEmpty('mid');

		return $validator;
	}
	public function updateorderid($order_id,$date)
	{
		$sql = 'update order_records set date = "'.$date.'",order_id = "'.$order_id.'" where type = "P"';	
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
	}
	public function getorderid()
	{
		$sql = 'select * from order_records where type = "P"';	
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		
		return $results;
	}
	public function updatenum($mid,$num){
		$sql1 = 'select * from chengpin_initials where mid = "'.$mid.'" ';	
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql1);
		$results = $stmt ->fetchAll('assoc');
		$num = $results[0]['number']+$num;
		$sql2 = 'update chengpin_initials set number = "'.$num.'" where mid = "'.$mid.'" ';
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql2);
	}
	public function searchname($name)
	{
		$sql = 'select * from chengpin_initials where isfujian = 1 and name LIKE "%'.$name.'%" ';	
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		
		return $results;
	}
	public function searchdb($mid, $name)
	{
		$sql = "select * from chengpin_rukus where 1=1 ";
		if( $mid != "" )
			$sql = $sql."and mid like '%".$mid."%' ";
		if( $name != "" )
			$sql = $sql."and name like '%".$name."%' ";
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		return $results;
	}
}