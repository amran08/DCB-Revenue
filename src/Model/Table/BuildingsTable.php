<?php

namespace App\Model\Table;

use App\Model\Entity\Building;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Buildings Model
 */
class BuildingsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('buildings');
        $this->displayField('title_bn');
        $this->primaryKey('id');
        $this->belongsTo('Dohss', [
            'foreignKey' => 'dohs_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Developers', [
            'foreignKey' => 'developer_id'
        ]);
        $this->hasMany('Apartments', [
            'foreignKey' => 'building_id',
        ]);
        $this->hasMany('BuildingFiles', [
            'foreignKey' => 'building_id'
        ]);
        $this->hasMany('BuildingPlotInfo', [
            'foreignKey' => 'building_id'
        ]);
        $this->hasMany('HoldingNumbers', [
            'foreignKey' => 'building_id'
        ]);
        $this->hasMany('Houses', [
            'foreignKey' => 'building_id'
        ]);
        $this->hasMany('BuildingFiles', [
            'foreignKey' => 'building_id'
        ]);
        $this->hasMany('Owners', [
            'foreignKey' => 'property_id',
            'conditions' => ['property_type_table_name' =>'Buildings']
        ]);

        $this->hasMany('Building_Plot_Info', [
            'foreignKey' => 'building_id',
        ]);

        $this->addBehavior('Search.Search');
        $this->searchManager()
            ->value('dohs_id')
            ->add('title_bn', 'Search.Like', [
                'before' => true,
                'after' => true,
                'mode' => 'or',
                'comparison' => 'LIKE',
                'wildcardAny' => '*',
                'wildcardOne' => '?',
                'field' => ['title_bn']
            ])

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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('road_number', 'create')
            ->notEmpty('road_number');

        $validator
            ->requirePresence('build_type', 'create')
            ->notEmpty('build_type');

        $validator
            // ->requirePresence('title_en', 'create')
            ->allowEmpty('title_en');

        $validator
            ->requirePresence('title_bn', 'create')
            ->notEmpty('title_bn');

        $validator
            //->add('build_site_area', 'valid', ['rule' => 'numeric'])
            ->requirePresence('build_site_area', 'create')
            ->notEmpty('build_site_area');

        $validator
            ->requirePresence('build_site_north', 'create')
            ->notEmpty('build_site_north');

        $validator
            ->requirePresence('build_site_south', 'create')
            ->notEmpty('build_site_south');

        $validator
            ->requirePresence('build_site_east', 'create')
            ->notEmpty('build_site_east');

        $validator
            ->requirePresence('build_site_west', 'create')
            ->notEmpty('build_site_west');

        $validator
            // ->requirePresence('build_site_road_details', 'create')
            ->allowEmpty('build_site_road_details');

        $validator
            //  ->requirePresence('build_site_soil_type', 'create')
            ->allowEmpty('build_site_soil_type');

        $validator
            ->allowEmpty('build_purpose');

        $validator
            ->requirePresence('roof_type', 'create')
            ->notEmpty('roof_type');

        $validator
            ->requirePresence('estimate_cost', 'create')
            ->notEmpty('estimate_cost');

        $validator
            ->requirePresence('actual_cost', 'create')
            ->notEmpty('actual_cost');

        $validator
            ->add('plan_approve_date', 'valid', ['rule' => 'date'])
            ->allowEmpty('plan_approve_date');

        $validator
            ->add('work_start_date', 'valid', ['rule' => 'date'])
            ->allowEmpty('work_start_date');

        $validator
            ->add('work_finish_date', 'valid', ['rule' => 'date'])
            ->allowEmpty('work_finish_date');

        $validator
            //  ->add('floor_number', 'valid', ['rule' => 'numeric'])
            ->requirePresence('floor_number', 'create')
            ->notEmpty('floor_number');

        $validator
            ->allowEmpty('building_details');

        $validator
            ->add('is_apartment', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('is_apartment');

        $validator
            ->add('is_house', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('is_house');

        $validator
            ->add('is_legal_info', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('is_legal_info');
        $validator
            ->add('is_garage_available', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('is_garage_available');

        $validator
           // ->add('apartment_number', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('apartment_number');

        $validator
            ->add('septic_tank_info', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('septic_tank_info');

        $validator
            ->allowEmpty('waste_cleaning_details');

        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('status');

        $validator
            ->allowEmpty('build_status');

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
        $rules->add($rules->existsIn(['developer_id'], 'Developers'));
        return $rules;
    }

}
