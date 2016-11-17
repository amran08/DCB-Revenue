<?php
namespace App\Model\Table;

use App\Model\Entity\Shop;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Shops Model
 */
class ShopsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('shops');
        $this->displayField('shop_number');
        $this->primaryKey('id');
        $this->belongsTo('Markets', [
            'foreignKey' => 'market_id'
        ]);
        $this->hasMany('ShopFiles', [
            'foreignKey' => 'shop_id'
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
            ->allowEmpty('shop_type');

        $validator
            ->allowEmpty('shop_number');

        $validator
            ->allowEmpty('title_en');

        $validator
          //  ->requirePresence('title_bn', 'create')
            ->allowEmpty('title_bn');

        $validator
            //->add('total_area')
            ->allowEmpty('total_area');

        $validator
            //->add('floor_number')
            ->allowEmpty('floor_number');

//        $validator
//            ->add('allocation_date', 'valid', ['rule' => 'date'])
//            ->allowEmpty('allocation_date');

        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('status');

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
        $rules->add($rules->existsIn(['market_id'], 'Markets'));
        return $rules;
    }
}
