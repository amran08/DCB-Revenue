<?php
namespace App\Model\Table;

use App\Model\Entity\TaxCollectionHistory;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TaxCollectionHistories Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Owners
 * @property \Cake\ORM\Association\BelongsTo $TaxAssesments
 */
class TaxCollectionHistoriesTable extends Table
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

        $this->table('tax_collection_histories');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Owners', [
            'foreignKey' => 'owner_id'
        ]);
        $this->belongsTo('TaxAssessments', [
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
            ->integer('id')
            ->allowEmpty('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->date('collection_date')
            ->allowEmpty('collection_date');

        $validator
            ->numeric('late_feee_amount')
            ->allowEmpty('late_feee_amount');

        $validator
            ->numeric('fine_amount')
            ->allowEmpty('fine_amount');

        $validator
            ->numeric('rebet_amount')
            ->allowEmpty('rebet_amount');

        $validator
            ->numeric('collected_amount')
            ->requirePresence('collected_amount', 'create')
            ->notEmpty('collected_amount');

        $validator
            ->allowEmpty('status');

        $validator
            ->dateTime('create_time')
            ->allowEmpty('create_time');

        $validator
            ->dateTime('update_time')
            ->allowEmpty('update_time');

        $validator
            ->integer('collected_by')
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
        $rules->add($rules->isUnique(['id']));
        $rules->add($rules->existsIn(['owner_id'], 'Owners'));
        $rules->add($rules->existsIn(['tax_assessment_id'], 'TaxAssessments'));
        return $rules;
    }
}
