<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;

class UsersTable extends Table
{

    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('email', 'A email is required')
            ->add('email','valid', ['rule' => 'email','message' => 'Invalid email'])
            ->notEmpty('password', 'A password is required')
            ->notEmpty('role', 'A role is required')
            ->add('role', 'inList', [
                'rule' => ['inList', ['doctor', 'patient']],
                'message' => 'Please enter a valid role'
            ]);
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->addCreate($rules->isUnique(['email']));
        return $rules;
    }
}

?>