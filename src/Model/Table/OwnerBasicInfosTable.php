<?php
namespace App\Model\Table;

use App\Model\Entity\OwnerBasicInfo;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OwnerBasicInfos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Owners
 * @property \Cake\ORM\Association\BelongsTo $Properties
 * @property \Cake\ORM\Association\BelongsTo $HoldingNumbers
 */
class OwnerBasicInfosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('owner_basic_infos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Owners', [
            'foreignKey' => 'owner_id'
        ]);
//        $this->belongsTo('Properties', [
//            'foreignKey' => 'property_id',
//            'joinType' => 'INNER'
//        ]);
//        $this->belongsTo('HoldingNumbers', [
//            'foreignKey' => 'holding_number_id',
//            'joinType' => 'INNER'
//        ]);
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
            ->integer('id')
            ->allowEmpty('id', 'create');


        $validator
            ->requirePresence('name_en', 'create')
            ->notEmpty('name_en');

        $validator
            ->allowEmpty('name_bn');

        $validator
            ->requirePresence('father_name_en', 'create')
            ->notEmpty('father_name_en');

        $validator
            ->allowEmpty('father_name_bn');

        $validator
            ->requirePresence('mother_name_en', 'create')
            ->notEmpty('mother_name_en');

        $validator
            ->allowEmpty('mother_name_bn');

        $validator
            ->allowEmpty('spouse_name_en');

        $validator
            ->allowEmpty('spouse_name_bn');

        $validator
            ->requirePresence('nid', 'create')
            ->notEmpty('nid');

        $validator
            ->date('dob')
            ->allowEmpty('dob');

        $validator
            ->allowEmpty('religion');

        $validator
            ->allowEmpty('gender');

        $validator
            ->requirePresence('mobile_number', 'create')
            ->notEmpty('mobile_number');

        $validator
            ->allowEmpty('phone_number');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->allowEmpty('present_address');

        $validator
            ->allowEmpty('permanent_address');

        $validator
            ->allowEmpty('picture');



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
        //$rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['owner_id'], 'Owners'));
       // $rules->add($rules->existsIn(['property_id'], 'Properties'));
        //$rules->add($rules->existsIn(['holding_number_id'], 'HoldingNumbers'));
        return $rules;
    }
}
