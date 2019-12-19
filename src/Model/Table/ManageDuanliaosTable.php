<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Datasource\ConnectionManager;

class ManageDuanliaosTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
	public function validationDefault(Validator $validator)
	{
		$validator
			->notEmpty('id');

		return $validator;
	}
	public function searchdb($jid, $m_id)
	{
		$sql = "select * from shengchan_wuliaoduanques where 1=1 ";
		if( $jid != "" )
			$sql = $sql."and jid like '%".$jid."%' ";
		if( $m_id != "" )
			$sql = $sql."and m_id like '%".$m_id."%' ";
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		
		return $results;
	}
}