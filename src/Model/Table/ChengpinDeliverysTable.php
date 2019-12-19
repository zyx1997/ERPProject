<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Datasource\ConnectionManager;

class ChengpinDeliverysTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
	public function validationDefault(Validator $validator)
	{
		$validator
			->notEmpty('sid');

		return $validator;
	}
	public function updateorderid($order_id,$date)
	{
		$sql = 'update order_records set date = "'.$date.'",order_id = "'.$order_id.'" where type = "S"';	
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
	}
	public function getorderid()
	{
		$sql = 'select * from order_records where type = "S"';	
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		
		return $results;
	}
	public function searchdb($sid, $hetongid, $gdanwei, $shenpiren)
	{
		$sql = "select * from chengpin_deliverys where 1=1 ";
		if( $sid != "" )
			$sql = $sql."and sid like '%".$sid."%' ";
		if( $hetongid != "" )
			$sql = $sql."and hetongid like '%".$hetongid."%' ";
		if( $gdanwei != "" )
			$sql = $sql."and gdanwei like '%".$gdanwei."%' ";
		if( $shenpiren != "" )
			$sql = $sql."and shenpiren like '%".$shenpiren."%' ";
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		
		return $results;
	}
}