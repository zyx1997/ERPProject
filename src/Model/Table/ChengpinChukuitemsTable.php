<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Datasource\ConnectionManager;

class ChengpinChukuitemsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
	public function validationDefault(Validator $validator)
	{
		$validator
			->notEmpty('oid');

		return $validator;
	}

}