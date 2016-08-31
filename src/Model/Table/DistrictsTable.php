<?php
namespace App\Model\Table;

use App\Model\Entity\District;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Districts Model
 *
 * @property \Cake\ORM\Association\HasMany $Plots
 * @property \Cake\ORM\Association\HasMany $Users
 */
class DistrictsTable extends Table
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

        $this->table('districts');
        $this->displayField('name_en');
        $this->primaryKey('id');

        $this->hasMany('Plots', [
            'foreignKey' => 'district_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'district_id'
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
            ->allowEmpty('district_bbs_code');

        $validator
            ->allowEmpty('division_bbs_code');

        $validator
            ->allowEmpty('name_bn');

        $validator
            ->allowEmpty('name_en');

        return $validator;
    }
}
