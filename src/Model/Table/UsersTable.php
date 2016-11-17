<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');
//        $this->belongsTo('Divisions', [
//            'foreignKey' => 'division_id',
//            'joinType' => 'INNER'
//        ]);
//        $this->belongsTo('Districts', [
//            'foreignKey' => 'district_id'
//        ]);
//        $this->belongsTo('Upazilas', [
//            'foreignKey' => 'upazila_id'
//        ]);
//        $this->belongsTo('Offices', [
//            'foreignKey' => 'office_id',
//            'joinType' => 'INNER'
//        ]);
//        $this->belongsTo('Designations', [
//            'foreignKey' => 'designation_id'
//        ]);
        $this->belongsTo('UserGroups', [
            'foreignKey' => 'user_group_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
            
        $validator
            ->requirePresence('full_name_bn', 'create')
            ->notEmpty('full_name_bn');
            
        $validator
            ->requirePresence('full_name_en', 'create')
            ->notEmpty('full_name_en');
            
        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username');
            
        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

            
        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));
//        $rules->add($rules->existsIn(['division_id'], 'Divisions'));
//        $rules->add($rules->existsIn(['district_id'], 'Districts'));
//        $rules->add($rules->existsIn(['upazila_id'], 'Upazilas'));
//        $rules->add($rules->existsIn(['office_id'], 'Offices'));
//        $rules->add($rules->existsIn(['designation_id'], 'Designations'));
        $rules->add($rules->existsIn(['user_group_id'], 'UserGroups'));
        return $rules;
    }
}
