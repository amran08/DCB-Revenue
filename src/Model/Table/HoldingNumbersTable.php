<?php

namespace App\Model\Table;

use App\Model\Entity\HoldingNumber;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HoldingNumbers Model
 */
class HoldingNumbersTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        $this->table('holding_numbers');
        $this->displayField('holding_number');
        $this->primaryKey('id');

//        $this->belongsTo('Plots', [
//            'foreignKey' => 'plot_id',
//            'joinType' => 'INNER'
//        ]);
        $this->belongsTo('Buildings', [
            'foreignKey' => 'building_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Owners', [
            'foreignKey' => 'holding_number_id'
        ]);
        $this->hasMany('TaxAssessments', [
            'foreignKey' => 'holding_number_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->add('id', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('id', 'create');

        $validator
                ->requirePresence('holding_number', 'create')
                ->notEmpty('holding_number');

        $validator
                ->requirePresence('applicant_name', 'create')
                ->notEmpty('applicant_name');

        $validator
                ->allowEmpty('applicant_mobile_number');

        $validator
                ->allowEmpty('applicant_present_address');

        $validator
                ->allowEmpty('applicant_permanent_address');

        $validator
                ->allowEmpty('supporting_paper');

        $validator
                ->add('application_date', 'valid', ['rule' => 'date'])
                ->requirePresence('application_date', 'create')
                ->notEmpty('application_date');

        $validator
                ->add('issue_date', 'valid', ['rule' => 'date'])
                ->allowEmpty('issue_date');

        $validator
                ->add('starting_tax_amount', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('starting_tax_amount');

        $validator
                ->add('status', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        //$rules->add($rules->existsIn(['plot_id'], 'Plots'));
        $rules->add($rules->existsIn(['building_id'], 'Buildings'));
        return $rules;
    }

}
