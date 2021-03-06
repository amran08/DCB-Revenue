<?php
namespace App\Model\Table;

use App\Model\Entity\Plot;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Search\Manager;


/**
 * Plots Model
 */
class PlotsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('plots');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Search.Search');
        $this->searchManager()
            ->value('dohs_id')
            // Here we will alias the 'q' query param to search the `Articles.title`
            // field and the `Articles.content` field, using a LIKE match, with `%`
            // both before and after.

            ->add('plot_number', 'Search.Like', [
                'before' => true,
                'after' => true,
                'mode' => 'or',
                'comparison' => 'LIKE',
                'wildcardAny' => '*',
                'wildcardOne' => '?',
                'field' => ['plot_number']
            ])

            ->add('foo', 'Search.Callback', [
                'callback' => function ($query, $args, $filter) {
                    echo $query;
                }
            ]);


        $this->belongsTo('Districts', [
            'foreignKey' => 'district_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Upazilas', [
            'foreignKey' => 'upazila_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('RsMoujas', [
            'foreignKey' => 'mouja_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Dohss', [
            'foreignKey' => 'dohs_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('LandType', [
            'foreignKey' => 'land_type_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('HoldingNumbers', [
            'foreignKey' => 'plot_id'
        ]);
        $this->hasMany('Owners', [
            'foreignKey' => 'property_id',
            'conditions' => ['property_type_table_name' => 'Plots']
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
//            ->requirePresence('plot_type', 'create')
//            ->notEmpty('plot_type');

        $validator
            ->allowEmpty('plot_type');

        $validator
            ->requirePresence('plot_number', 'create')
            ->notEmpty('plot_number');

        $validator
            ->requirePresence('road_number', 'create')
            ->notEmpty('road_number');

        $validator
            ->requirePresence('road_name', 'create')
            ->notEmpty('road_name');

        $validator
            // ->add('total_area', 'valid', ['rule' => 'numeric'])
            ->requirePresence('total_area', 'create')
            ->notEmpty('total_area');

        $validator
            // ->add('area_north', 'valid', ['rule' => 'numeric'])
            ->requirePresence('area_north', 'create')
            ->notEmpty('area_north');

        $validator
            //   ->add('area_south', 'valid', ['rule' => 'numeric'])
            ->requirePresence('area_south', 'create')
            ->notEmpty('area_south');

        $validator
            // ->add('area_east', 'valid', ['rule' => 'numeric'])
            ->requirePresence('area_east', 'create')
            ->notEmpty('area_east');

        $validator
            // ->add('area_west', 'valid', ['rule' => 'numeric'])
            ->requirePresence('area_west', 'create')
            ->notEmpty('area_west');

        $validator
            ->add('is_lease', 'valid', ['rule' => 'boolean'])
            // ->requirePresence('is_lease', 'create')
            ->allowEmpty('is_lease');

        $validator
            ->add('is_blank', 'valid', ['rule' => 'boolean'])
            //  ->requirePresence('is_blank', 'create')
            ->allowEmpty('is_blank');

        $validator
            ->add('is_residential', 'valid', ['rule' => 'boolean'])
            //->requirePresence('is_residential', 'create')
            ->allowEmpty('is_residential');

        $validator
            ->allowEmpty('details');

        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('status');

        $validator
            ->add('allotment_date', 'valid', ['rule' => 'date'])
            ->allowEmpty('allotment_date');

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
        $rules->add($rules->existsIn(['district_id'], 'Districts'));
        $rules->add($rules->existsIn(['upazila_id'], 'Upazilas'));
        $rules->add($rules->existsIn(['mouja_id'], 'RsMoujas'));
        $rules->add($rules->existsIn(['dohs_id'], 'Dohss'));
        $rules->add($rules->existsIn(['land_type_id'], 'LandType'));
        return $rules;
    }
}
