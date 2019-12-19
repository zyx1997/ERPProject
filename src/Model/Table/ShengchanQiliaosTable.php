<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Datasource\ConnectionManager;

class ShengchanQiliaosTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
	public function validationDefault(Validator $validator)
	{
		$validator
			->notEmpty('jid');

		return $validator;
	}
	//找到生产计划为jid的所有一级分类，需要备料领料的信息
	public function searchFirstlevels($jid)
	{
		$sql = 'select * from shengchan_qiliao_firsts where jid = "'.$jid.'" ';
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		
		return $results;
	}
	//找到生产计划为jid，一级分类为firstlevel的所有二级分类，需要短缺的信息,和所共属的齐料一级单的数据库ID
	public function searchSecondlevels($jid, $firstlevel)
	{
		$sql = 'select a.id, a.mid, a.firstlevel, a.secondlevel, a.secondid, a.number as singleConsumeNum, a.isduanque, a.shijiquantity, a.allNeedNum, b.number as currentKucun from shengchan_qiliao_seconds a, lailiao_initials b where a.jid = "'.$jid.'" and a.firstlevel = "'.$firstlevel.'" and a.secondid = b.m_id ';
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		
		return $results;
	}
}