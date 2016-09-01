<?php
namespace App\Model\Table;

use App\Model\Entity\Upazila;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Upazilas Model
 *
 * @property \Cake\ORM\Association\HasMany $DglrAreaTable
 * @property \Cake\ORM\Association\HasMany $Plots
 * @property \Cake\ORM\Association\HasMany $RsMoujas
 * @property \Cake\ORM\Association\HasMany $Users
 */
class UpazilasTable extends Table
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

        $this->table('upazilas');
        $this->displayField('name_bd');
        $this->primaryKey('id');

        $this->hasMany('DglrAreaTable', [
            'foreignKey' => 'upazila_id'
        ]);
        $this->hasMany('Plots', [
            'foreignKey' => 'upazila_id'
        ]);
        $this->hasMany('RsMoujas', [
            'foreignKey' => 'upazila_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'upazila_id'
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
            ->allowEmpty('upazila_bbs_code');

        $validator
            ->requirePresence('district_bbs_code', 'create')
            ->notEmpty('district_bbs_code');

        $validator
            ->requirePresence('division_bbs_code', 'create')
            ->notEmpty('division_bbs_code');

        $validator
            ->requirePresence('name_bd', 'create')
            ->notEmpty('name_bd');

        $validator
            ->allowEmpty('name_en');

        $validator
            ->requirePresence('district_name', 'create')
            ->notEmpty('district_name');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }
}
