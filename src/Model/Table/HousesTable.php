<?php
namespace App\Model\Table;

use App\Model\Entity\House;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Houses Model
 */
class HousesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('houses');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Dohss', [
            'foreignKey' => 'dohs_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Buildings', [
            'foreignKey' => 'building_id',
            'joinType' => 'INNER'
        ]);

        $this->hasMany('Owners', [
            'foreignKey' => 'property_id',
            'conditions' => ['property_type_table_name' =>'Houses']
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
            ->requirePresence('house_type', 'create')
            ->notEmpty('house_type');

        $validator
            // ->requirePresence('house_number', 'create')
            ->notEmpty('house_number');

        $validator
            ->requirePresence('house_title', 'create')
            ->notEmpty('house_title');

        $validator
            // ->add('floor_number', 'valid', ['rule' => 'numeric'])
            //->requirePresence('floor_number', 'create')
            ->allowEmpty('floor_number');

        $validator
            //   ->add('total_area', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('total_area');

        $validator
            ->add('is_commercial', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('is_commercial');

        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('status');

        $validator
            ->allowEmpty('details');

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
        $rules->add($rules->existsIn(['dohs_id'], 'Dohss'));
        $rules->add($rules->existsIn(['building_id'], 'Buildings'));
        return $rules;
    }
}
