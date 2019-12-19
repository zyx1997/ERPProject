<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Datasource\ConnectionManager;

class ChengpinInitialsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
	public function validationDefault(Validator $validator)
	{
		$validator
			->notEmpty('mid');

		return $validator;
	}
	
	public function getamid($mid)
	{
		$sql = 'select * from chengpin_initials where mid = "'.$mid.'"';	
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		
		return $results;
	}
	public function searchname($name)
	{
		$sql = 'select * from chengpin_initials where name LIKE "%'.$name.'%" ';	
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		
		return $results;
	}
	public function searchdb($mid, $name, $xinghao, $isfujian)
	{
		$sql = "select * from chengpin_initials where 1=1 ";
		if( $mid != "" )
			$sql = $sql."and mid like '%".$mid."%' ";
		if( $name != "" )
			$sql = $sql."and name like '%".$name."%' ";
		if( $xinghao != "" )
			$sql = $sql."and xinghao like '%".$xinghao."%' ";
		if( $isfujian != "" )
			$sql = $sql."and isfujian like '%".$isfujian."%' ";
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		return $results;
	}
}