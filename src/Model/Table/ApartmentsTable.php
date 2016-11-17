<?php
namespace App\Model\Table;

use App\Model\Entity\Apartment;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Apartments Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Dohs
 * @property \Cake\ORM\Association\BelongsTo $Buildings
 */
class ApartmentsTable extends Table
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

        $this->table('apartments');
        $this->displayField('apartment_number');
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
            'conditions' => ['property_type_table_name' => 'Apartments']
        ]);

        $this->addBehavior('Search.Search');
        $this->searchManager()
            ->value('dohs_id')
            ->value('building_id')
            ->add('foo', 'Search.Callback', [
                'callback' => function ($query, $args, $filter) {
                    echo $args;
                    echo $filter;
                }
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
            ->decimal('monthly_rent')
            ->allowEmpty('monthly_rent');

        $validator
            // ->requirePresence('apartment_type', 'create')
            ->allowEmpty('apartment_type');

        $validator
            //  ->requirePresence('apartment_number', 'create')
            ->allowEmpty('apartment_number');

        $validator
            //->add('floor_number', 'valid', ['rule' => 'numeric'])
            //->requirePresence('floor_number', 'create')
            ->allowEmpty('floor_number');

        $validator
            ->allowEmpty('floor_position');

        $validator
            // ->numeric('total_area')
            //->requirePresence('total_area', 'create')
            ->allowEmpty('total_area');

        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('status');

        $validator
            ->allowEmpty('details');

        $validator
            ->dateTime('create_time')
            ->allowEmpty('create_time');

        $validator
            ->dateTime('update_time')
            ->allowEmpty('update_time');

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
