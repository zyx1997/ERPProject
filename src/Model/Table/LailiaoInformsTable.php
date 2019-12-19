<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Datasource\ConnectionManager;

class LailiaoInformsTable extends Table
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
	/*
	public function searchdb($m_id, $name)
	{
		$sql = "select * from caigou_list_alls where zhuangtai=1 ";
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