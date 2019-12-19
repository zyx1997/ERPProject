<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Datasource\ConnectionManager;

class CaigouListsTable extends Table
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
	public function getalid($l_id)
	{
		$sql = 'select * from caigou_lists where l_id = "'.$l_id.'"';	
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		
		return $results;
	}
	/*
	public function searchdb($l_id, $p_name)
	{
		$sql = "select * from caigou_lists where 1=1 ";
		if( $l_id != "" )
			$sql = $sql."and l_id like '%".$l_id."%' ";
		if( $p_name != "" )
			$sql = $sql."and p_name like '%".$p_name."%' ";
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		
		return $results;
	}
	public function searchpname($p_name)
	{
		$sql = 'select * from caigou_providers where iswuliu=0 and isshenhe=1 and shenheok=1 ';
		if( $p_name != "" )
			$sql = $sql.'and p_name like "%'.$p_name.'%" ';
			
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		return $results;
	}
	public function searchmid($m_id)
	{
		$sql = "select * from lailiao_initials where 1=1 ";
		if( $m_id != "" )
			$sql = $sql."and m_id like '%".$m_id."%' ";
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		return $results;
	}
	*/
}