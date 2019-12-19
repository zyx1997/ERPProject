<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Datasource\ConnectionManager;

class HetongListAllsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
	public function validationDefault(Validator $validator)
	{
		$validator
			->notEmpty('h_id');

		return $validator;
	}
	public function getamid($id, $mid)
	{
		$sql = 'select * from hetong_list_alls where h_keyid = "'.$id.'" and mid = "'.$mid.'"';	
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		
		return $results;
	}
	public function searchdb($h_id, $mid, $name, $xinghao)
	{
		$sql = "select * from hetong_list_alls where isrecord=0 ";
		if( $h_id != "" )
			$sql = $sql."and h_id like '%".$h_id."%' ";
		if( $mid != "" )
			$sql = $sql."and mid like '%".$mid."%' ";
		if( $name != "" )
			$sql = $sql."and name like '%".$name."%' ";
		if( $xinghao != "" )
			$sql = $sql."and xinghao like '%".$xinghao."%' ";
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		
		return $results;
	}
}