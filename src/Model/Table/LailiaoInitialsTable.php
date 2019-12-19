<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Datasource\ConnectionManager;

class LailiaoInitialsTable extends Table
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
	public function getamid($m_id)
	{
		$sql = 'select * from lailiao_initials where m_id = "'.$m_id.'"';	
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		
		return $results;
	}
	/*
	public function searchdb($m_id, $name, $xinghao)
	{
		$sql = "select * from lailiao_initials where 1=1 ";
		if( $m_id != "" )
			$sql = $sql."and m_id like '%".$m_id."%' ";
		if( $name != "" )
			$sql = $sql."and name like '%".$name."%' ";
		if( $xinghao != "" )
			$sql = $sql."and xinghao like '%".$xinghao."%' ";
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		
		return $results;
	}
	*/
}