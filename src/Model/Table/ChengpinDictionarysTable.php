<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Datasource\ConnectionManager;

class ChengpinDictionarysTable extends Table
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
	public function searchdb($onlyid,$mid)
	{
		if( $onlyid != "" )
			$sql = "select * from chengpin_dictionarys where 1=1 and mid LIKE '".$mid."'";
		//if( $mid != "" )
		//	$sql = $sql."mid like '%".$mid."%' ";
		//if( $onlyid != "" )
			//$sql = $sql."and onlyid like '%".$onlyid."%' ";
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		return $results;
	}
}