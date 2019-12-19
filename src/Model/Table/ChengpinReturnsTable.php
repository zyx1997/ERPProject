<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Datasource\ConnectionManager;

class ChengpinReturnsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
	public function validationDefault(Validator $validator)
	{
		$validator
			->notEmpty('tid');

		return $validator;
	}
	public function updateorderid($order_id,$date)
	{
		$sql = 'update order_records set date = "'.$date.'",order_id = "'.$order_id.'" where type = "T"';	
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
	}
	public function getorderid()
	{
		$sql = 'select * from order_records where type = "T"';	
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		
		return $results;
	}
	public function searchdb($tid, $fuzeren, $shenpiren)
	{
		$sql = "select * from chengpin_returns where 1=1 ";
		if( $tid != "" )
			$sql = $sql."and tid like '%".$tid."%' ";
		if( $fuzeren != "" )
			$sql = $sql."and fuzeren like '%".$fuzeren."%' ";
		if( $shenpiren != "" )
			$sql = $sql."and shenpiren like '%".$shenpiren."%' ";
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		
		return $results;
	}
}