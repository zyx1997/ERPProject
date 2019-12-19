<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Datasource\ConnectionManager;

class ChengpinFirstlevelsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
	public function validationDefault(Validator $validator)
	{
		$validator
			->notEmpty('firstlevel');

		return $validator;
	}
	public function selectsecondlevel($firstlevel){
		$sql = 'select * from chengpin_firstlevels where firstlevel = "'.$firstlevel.'"';
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		return $results;
	}
}