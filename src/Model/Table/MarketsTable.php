<?php
namespace App\Model\Table;

use App\Model\Entity\Market;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Markets Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Dohs
 * @property \Cake\ORM\Association\BelongsTo $Buildings
 * @property \Cake\ORM\Association\HasMany $ShopFiles
 * @property \Cake\ORM\Association\HasMany $Shops
 */
class MarketsTable extends Table
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

        $this->table('markets');
        $this->displayField('title_bn');
        $this->primaryKey('id');

        $this->belongsTo('Dohss', [
            'foreignKey' => 'dohs_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Buildings', [
            'foreignKey' => 'building_id'
        ]);
        $this->hasMany('ShopFiles', [
            'foreignKey' => 'market_id'
        ]);
        $this->hasMany('Shops', [
            'foreignKey' => 'market_id'
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
            // ->requirePresence('title_en', 'create')
            ->allowEmpty('title_en');

        $validator
            ->requirePresence('title_bn', 'create')
            ->notEmpty('title_bn');

        $validator
            ->allowEmpty('road_number');

        $validator
            ->allowEmpty('address');

        $validator
            // ->decimal('total_area')
            ->requirePresence('total_area', 'create')
            ->notEmpty('total_area');

        $validator
            //->integer('floor_number')
            ->allowEmpty('floor_number');

        $validator
            //->integer('total_shop_number')
            ->requirePresence('total_shop_number', 'create')
            ->notEmpty('total_shop_number');

        $validator
            ->date('start_date')
            ->allowEmpty('start_date');

        $validator
            //->integer('status')
            ->allowEmpty('status');

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
