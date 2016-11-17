<?php
namespace App\Model\Table;

use App\Model\Entity\TaxSetting;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TaxSettings Model
 */
class TaxSettingsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('tax_settings');
        $this->displayField('economic_year');
        $this->primaryKey('id');
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
            ->requirePresence('owner_type', 'create')
            ->notEmpty('owner_type');
            
        $validator
            ->add('tax_rate', 'valid', ['rule' => 'numeric'])
            ->requirePresence('tax_rate', 'create')
            ->notEmpty('tax_rate');
            
        $validator
            ->requirePresence('economic_year', 'create')
            ->notEmpty('economic_year');
            
        $validator
            ->requirePresence('usage_type', 'create')
            ->notEmpty('usage_type');
            
        $validator
            ->requirePresence('location', 'create')
            ->notEmpty('location');
            
        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('status');

        return $validator;
    }
}
