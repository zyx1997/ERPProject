<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Datasource\ConnectionManager;

class CaigouRisksTable extends Table
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
	/*
	public function searchdb($p_id, $p_name, $shuihao, $lowscore, $highscore)
	{
		//$lowscore = (double)lowscore;
		//$highscore = (double)highscore;
		$sql = "select * from caigou_providers where pinggu is not null ";
		if( $p_id != "" )
			$sql = $sql."and p_id like '%".$p_id."%' ";
		if( $p_name != "" )
			$sql = $sql."and p_name like '%".$p_name."%' ";
		if( $shuihao != "" )
			$sql = $sql."and shuihao like '%".$shuihao."%' ";
		if( $lowscore != "" )
			$sql = $sql."and pinggu >= ".$lowscore." ";
		if( $highscore != "" )
			$sql = $sql."and pinggu <= ".$highscore." ";
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		
		return $results;
	}
	*/
	public function searchpname($p_name)
	{
		$sql = "select * from caigou_providers where 1=1 ";
		if( $p_name != "" )
			$sql = $sql."and p_name like '%".$p_name."%' ";
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		return $results;
	}
}