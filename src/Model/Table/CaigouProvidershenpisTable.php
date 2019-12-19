<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Datasource\ConnectionManager;

class CaigouProvidershenpisTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
	public function validationDefault(Validator $validator)
	{
		$validator
			->notEmpty('p_id');

		return $validator;
	}
	public function getapid($p_id)
	{
		$sql = 'select * from caigou_providers where p_id = "'.$p_id.'"';	
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		
		return $results;
	}
	/*public function searchdb($p_id, $p_name, $shuihao, $shenheren)
	{
		$sql = "select * from caigou_providers where 1=1 ";
		if( $p_id != "" )
			$sql = $sql."and p_id like '%".$p_id."%' ";
		if( $p_name != "" )
			$sql = $sql."and p_name like '%".$p_name."%' ";
		if( $shuihao != "" )
			$sql = $sql."and shuihao like '%".$shuihao."%' ";
		if( $shenheren != "" )
			$sql = $sql."and shenheren like '%".$shenheren."%' ";
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		
		return $results;
	}*/
}