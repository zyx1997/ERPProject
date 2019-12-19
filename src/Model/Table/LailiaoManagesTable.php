<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Datasource\ConnectionManager;

class LailiaoManagesTable extends Table
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
	public function searchdb($l_id, $m_id, $zhuangtai)
	{
		if( $zhuangtai != "" )
			$sql = "select * from caigou_list_alls where zhuangtai=".$zhuangtai." ";
		else
			$sql = "select * from caigou_list_alls where zhuangtai>=0 ";
		if( $l_id != "" )
			$sql = $sql."and l_id like '%".$l_id."%' ";
		if( $m_id != "" )
			$sql = $sql."and m_id like '%".$m_id."%' ";
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		
		return $results;
	}
}