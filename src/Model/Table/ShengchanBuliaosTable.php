<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Datasource\ConnectionManager;

class ShengchanBuliaosTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
	public function validationDefault(Validator $validator)
	{
		$validator
			->notEmpty('bid');

		return $validator;
	}
	public function searchname($name)
	{
		$sql = 'select * from chengpin_initials where name LIKE "%'.$name.'%" ';	
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		
		return $results;
	}
	public function updateorderid($order_id,$date)
	{
		$sql = 'update order_records set date = "'.$date.'",order_id = "'.$order_id.'" where type = "B"';	
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
	}
	public function getorderid()
	{
		$sql = 'select * from order_records where type = "B"';	
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		
		return $results;
	}
}