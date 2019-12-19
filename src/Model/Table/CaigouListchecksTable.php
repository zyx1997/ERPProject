<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Datasource\ConnectionManager;

class CaigouListchecksTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
	public function validationDefault(Validator $validator)
	{
		$validator
			->notEmpty('l_id');

		return $validator;
	}
	/*
	public function searchdb($l_id, $p_name, $shenheren)
	{
		$sql = "select * from caigou_lists where 1=1 ";
		if( $l_id != "" )
			$sql = $sql."and l_id like '%".$l_id."%' ";
		if( $p_name != "" )
			$sql = $sql."and p_name like '%".$p_name."%' ";
		if( $shenheren != "" )
			$sql = $sql."and shenheren like '%".$shenheren."%' ";
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		
		return $results;
	}
	*/
}