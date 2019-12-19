<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Datasource\ConnectionManager;

class ChengpinZhuangxiangsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
	public function validationDefault(Validator $validator)
	{
		$validator
			->notEmpty('oid');

		return $validator;
	}
	public function updateorderid($order_id,$date)
	{
		$sql = 'update order_records set date = "'.$date.'",order_id = "'.$order_id.'" where type = "Z"';	
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
	}
	public function getorderid()
	{
		$sql = 'select * from order_records where type = "Z"';	
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		
		return $results;
	}

}