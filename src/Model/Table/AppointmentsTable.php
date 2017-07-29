<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;

class AppointmentsTable extends Table
{
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('doctor_id', 'A email is required')
            ->notEmpty('user_id', 'A password is required')
            ->notEmpty('date', 'date field is required')
            ->notEmpty('time', 'time field is required');
    }
}

?>