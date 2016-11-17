<?php
namespace App\Model\Table;

use App\Model\Entity\TaxCollection;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TaxCollections Model
 */
class TaxCollectionsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('tax_collections');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Owners', [
            'foreignKey' => 'owner_id'
        ]);
        $this->belongsTo('TaxAssessments', [
            'foreignKey' => 'tax_assessment_id'
        ]);
        $this->belongsTo('Dohss', [
            'foreignKey' => 'dohs_id'
        ]);

        $this->belongsTo('Owners', [
            'foreignKey' => 'owner_id'
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
            ->add('base_amount', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('base_amount');
            
        $validator
            ->add('rebet_amount', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('rebet_amount');
            
        $validator
            ->add('late_fee_amount', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('late_fee_amount');
            
        $validator
            ->add('fine_amount', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('fine_amount');
            
        $validator
            ->add('assessed_amount', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('assessed_amount');
            
        $validator
            ->add('total_amount', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('total_amount');
            
        $validator
            ->allowEmpty('economic_year');
            
        $validator
            ->add('collection_date', 'valid', ['rule' => 'date'])
            ->allowEmpty('collection_date');
            
        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('status');
            
        $validator
            ->add('collected_by', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('collected_by');

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
        $rules->add($rules->existsIn(['owner_id'], 'Owners'));
        //$rules->add($rules->existsIn(['tax_assessment_id'], 'TaxAssessments'));
        return $rules;
    }
}
