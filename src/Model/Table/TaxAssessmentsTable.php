<?php
namespace App\Model\Table;

use App\Model\Entity\TaxAssessment;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TaxAssessments Model
 */
class TaxAssessmentsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('tax_assessments');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Dohss', [
            'foreignKey' => 'dohs_id'
        ]);
        $this->belongsTo('Owners', [
            'foreignKey' => 'owner_id'
        ]);

        $this->belongsTo('TaxSettings', [
            'foreignKey' => 'tax_settings_id'
        ]);
        $this->hasOne('TaxCollections', [
            'foreignKey' => 'tax_assessment_id'
        ]);
        $this->hasMany('TaxCollectionHistories', [
            'foreignKey' => 'tax_assessment_id'
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

//        $validator
//            ->allowEmpty('economic_year');

        $validator
            ->allowEmpty('assess_type');


        $validator
            ->allowEmpty('property_type_table_name');

        $validator
            // ->add('total_area', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('total_area');

        $validator
            ->add('assessed_amount', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('assessed_amount');

        $validator
            ->add('total_amount', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('total_amount');

        $validator
            ->allowEmpty('remarks');


        $validator
            ->add('assess_by', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('assess_by');

        $validator
            ->add('assess_date', 'valid', ['rule' => 'date'])
            ->allowEmpty('assess_date');

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
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['dohs_id'], 'Dohss'));
        $rules->add($rules->existsIn(['owner_id'], 'Owners'));
        // $rules->add($rules->existsIn(['if_revised_parent_assess_row_id'], 'IfRevisedParentAssessRows'));
        //////$rules->add($rules->existsIn(['property_id'], 'Properties'));
        //   $rules->add($rules->isUnique(['owner_id'], 'TaxSettings'));
        return $rules;
    }
}
