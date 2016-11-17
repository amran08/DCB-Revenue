<?php
namespace App\Model\Table;

use App\Model\Entity\ShopFile;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ShopFiles Model
 */
class ShopFilesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('shop_files');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Markets', [
            'foreignKey' => 'market_id'
        ]);
        $this->belongsTo('Shops', [
            'foreignKey' => 'shop_id'
        ]);
        $this->belongsTo('Owners', [
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
            ->add('id', 'valid', ['rule' => 'integer'])
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('allotment_type');

        $validator
            ->allowEmpty('application_form_file');

        $validator
            ->add('allotment_issue_date', 'valid', ['rule' => 'date'])
            ->allowEmpty('allotment_issue_date');

        $validator
            ->add('allotment_expire_date', 'valid', ['rule' => 'date'])
            ->allowEmpty('allotment_expire_date');

//        $validator
//            ->allowEmpty('contract_file');
        $validator->add('contract_file', 'file', [
            'rule' => ['mimeType', ['image/jpeg', 'image/png']],
            'on' => function ($context) {

                return !empty($context['data']['contract_file']);
            }
        ]);
        $validator
            //->add('contract_value', 'valid', ['rule' => 'text'])
            ->allowEmpty('contract_value');

        $validator
            ->allowEmpty('floor_map');

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
        $rules->add($rules->existsIn(['shop_id'], 'Shops'));
        $rules->add($rules->existsIn(['owner_id'], 'Owners'));
        return $rules;
    }
}
