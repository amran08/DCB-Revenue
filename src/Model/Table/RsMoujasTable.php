<?php
namespace App\Model\Table;

use App\Model\Entity\RsMouja;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RsMoujas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Upazilas
 */
class RsMoujasTable extends Table
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

        $this->table('rs_moujas');
        $this->displayField('name_bd');
        $this->primaryKey('id');

        $this->belongsTo('Upazilas', [
            'foreignKey' => 'upazila_id'
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
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('dglr_code', 'create')
            ->notEmpty('dglr_code');

        $validator
            ->allowEmpty('name_en');

        $validator
            ->requirePresence('name_bd', 'create')
            ->notEmpty('name_bd');

        $validator
            ->integer('status')
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
        $rules->add($rules->existsIn(['upazila_id'], 'Upazilas'));
        return $rules;
    }
}
