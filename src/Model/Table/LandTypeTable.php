<?php
namespace App\Model\Table;

use App\Model\Entity\LandType;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LandType Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Lts
 * @property \Cake\ORM\Association\HasMany $Plots
 */
class LandTypeTable extends Table
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

        $this->table('land_type');
        $this->displayField('lt_name');
        $this->primaryKey('lt_id');

        $this->belongsTo('Lts', [
            'foreignKey' => 'lt_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Plots', [
            'foreignKey' => 'land_type_id'
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
            ->requirePresence('lt_name', 'create')
            ->notEmpty('lt_name');

        $validator
            ->allowEmpty('survey');

        $validator
            ->integer('created_by')
            ->allowEmpty('created_by');

        $validator
            ->integer('created_time')
            ->allowEmpty('created_time');

        $validator
            ->integer('updated_by')
            ->requirePresence('updated_by', 'create')
            ->notEmpty('updated_by');

        $validator
            ->integer('updated_time')
            ->requirePresence('updated_time', 'create')
            ->notEmpty('updated_time');

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
        $rules->add($rules->existsIn(['lt_id'], 'Lts'));
        return $rules;
    }
}
