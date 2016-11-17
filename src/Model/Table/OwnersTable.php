<?php
namespace App\Model\Table;

use App\Model\Entity\Owner;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Search\Manager;

/**
 * Owners Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Properties
 * @property \Cake\ORM\Association\HasMany $OwnerBasicInfos
 * @property \Cake\ORM\Association\HasMany $ShopFiles
 * @property \Cake\ORM\Association\HasMany $TaxAssessments
 * @property \Cake\ORM\Association\HasMany $TaxCollections
 */
class OwnersTable extends Table
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

        $this->table('owners');
        $this->displayField('name_bn');
        $this->primaryKey('id');

        $this->addBehavior('Search.Search');
        $this->searchManager()
        ->value('property_type_table_name')
        ->add('name_bn', 'Search.Like', [
            'before' => true,
            'after' => true,
            'mode' => 'or',
            'comparison' => 'LIKE',
            'wildcardAny' => '*',
            'wildcardOne' => '?',
            'field' => ['name_bn']
        ])

        ->add('foo', 'Search.Callback', [
            'callback' => function ($query, $args, $filter) {
                echo $args;
                echo $filter;
            }
        ]);



//        $this->hasMany('ShopFiles', [
//            'foreignKey' => 'owner_id'
//        ]);

        $this->hasOne('TaxAssessments', [
            'foreignKey' => 'owner_id'
        ]);

        $this->hasOne('TaxCollections', [
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
            // ->requirePresence('owner_type', 'create')
            ->allowEmpty('owner_type');
        $validator
            //->add('own_percentage', 'valid', ['rule' => 'numeric'])
            //   ->requirePresence('own_percentage', 'create')
            ->allowEmpty('own_percentage');

        $validator
            // ->requirePresence('usage_type', 'create')
            ->allowEmpty('usage_type');

        $validator
            //   ->requirePresence('name_en', 'create')
            ->allowEmpty('name_en');

        $validator
            ->allowEmpty('name_bn');

        $validator
            // ->requirePresence('father_name_en', 'create')
            ->allowEmpty('father_name_en');

        $validator
            ->allowEmpty('father_name_bn');

        $validator
            //  ->requirePresence('mother_name_en', 'create')
            ->allowEmpty('mother_name_en');

        $validator
            ->allowEmpty('mother_name_bn');

        $validator
            ->allowEmpty('spouse_name_en');

        $validator
            ->allowEmpty('spouse_name_bn');

        $validator
            ->allowEmpty('nid');

        $validator
            ->add('dob', 'valid', ['rule' => 'date'])
            ->allowEmpty('dob');

        $validator
            ->allowEmpty('religion');

        $validator
            ->allowEmpty('gender');

        $validator
            ->allowEmpty('mobile_number');

        $validator
            //    ->requirePresence('mobile_number', 'create')
            ->allowEmpty('mobile_number');

        $validator
            //    ->requirePresence('phone_number', 'create')
            ->allowEmpty('phone_number');

        $validator
            //->add('email', 'valid', ['rule' => 'email'])
            ->allowEmpty('email');

        $validator
            ->allowEmpty('present_address');

        $validator
            ->allowEmpty('permanent_address');

        $validator
            ->allowEmpty('picture');

        $validator
            ->add('own_date', 'valid', ['rule' => 'date'])
            ->allowEmpty('own_date');

        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('status');

        $validator
            ->add('lease_expire_date', 'valid', ['rule' => 'date'])
            ->allowEmpty('lease_expire_date');

        $validator
            ->add('last_mutation_date', 'valid', ['rule' => 'date'])
            ->allowEmpty('last_mutation_date');

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

        return $rules;
    }
}
