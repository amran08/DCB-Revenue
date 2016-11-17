<?php

namespace App\Model\Table;

use App\Model\Entity\Dohs;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dohss Model
 */
class DohssTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('dohss');
        $this->displayField('title_bn');
        $this->primaryKey('id');

        $this->hasMany('Apartments', [
            'foreignKey' => 'dohs_id'
        ]);
        $this->hasMany('Buildings', [
            'foreignKey' => 'dohs_id'
        ]);
        $this->hasMany('Houses', [
            'foreignKey' => 'dohs_id'
        ]);
        $this->hasMany('Plots', [
            'foreignKey' => 'dohs_id'
        ]);
        $this->hasMany('TaxAssessments', [
            'foreignKey' => 'dohs_id'
        ]);
        $this->hasMany('DohsMaps', [
            'foreignKey' => 'dohs_id'
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
            ->requirePresence('title_en', 'create')
            ->notEmpty('title_en');

        $validator
            ->requirePresence('title_bn', 'create')
            ->notEmpty('title_bn');

        $validator
            // ->add('total_area', 'valid', ['rule' => 'numeric'])
            ->requirePresence('total_area', 'create')
            ->notEmpty('total_area');

        $validator
            // ->add('total_plot_number', 'valid', ['rule' => 'numeric'])
            ->requirePresence('total_plot_number', 'create')
            ->notEmpty('total_plot_number');

        $validator
            //  ->add('total_building_number', 'valid', ['rule' => 'numeric'])
            ->requirePresence('total_building_number', 'create')
            ->notEmpty('total_building_number');

        $validator
            ->requirePresence('total_house_number', 'create')
            ->notEmpty('total_house_number');

        $validator
            //  ->add('total_apartment_number', 'valid', ['rule' => 'numeric'])
            ->requirePresence('total_apartment_number', 'create')
            ->notEmpty('total_apartment_number');

        $validator
            //    ->add('total_market_number', 'valid', ['rule' => 'numeric'])
            ->requirePresence('total_market_number', 'create')
            ->notEmpty('total_market_number');

        $validator
            // ->add('total_shop_number', 'valid', ['rule' => 'numeric'])
            ->requirePresence('total_shop_number', 'create')
            ->notEmpty('total_shop_number');

        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->requirePresence('status', 'create')
            ->notEmpty('status');


        $validator
           // ->requirePresence('map_file', 'create')
            ->allowEmpty('map_file');

        return $validator;
    }

}
