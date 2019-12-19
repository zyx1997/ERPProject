<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Datasource\ConnectionManager;

class CaigouListAllsTable extends Table
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
	public function getamid($l_id, $m_id)
	{
		$sql = 'select * from caigou_list_alls where l_id = "'.$l_id.'" and m_id = "'.$m_id.'"';	
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		
		return $results;
	}
	/*
	public function searchdb($l_id, $m_id, $name)
	{
		$sql = "select * from caigou_list_alls where 1=1 ";
		if( $l_id != "" )
			$sql = $sql."and l_id like '%".$l_id."%' ";
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