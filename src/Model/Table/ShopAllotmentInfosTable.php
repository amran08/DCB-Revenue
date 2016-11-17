<?php
namespace App\Model\Table;

use App\Model\Entity\ShopAllotmentInfo;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ShopAllotmentInfos Model
 */
class ShopAllotmentInfosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('shop_allotment_infos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Shops', [
            'foreignKey' => 'shop_id'
        ]);
        $this->belongsTo('Markets', [
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
            ->allowEmpty('name_en');

        $validator
            ->allowEmpty('name_bn');
        $validator
            ->allowEmpty('father_name_en');
        $validator
            ->allowEmpty('father_name_bn');
        $validator
            ->allowEmpty('mother_name_en');
        $validator
            ->allowEmpty('mother_name_bn');
        $validator
            ->allowEmpty('nid');

        $validator
            ->allowEmpty('mobile_number');

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
        $rules->add($rules->existsIn(['shop_id'], 'Shops'));
        $rules->add($rules->existsIn(['market_id'], 'Markets'));
        return $rules;
    }
}
