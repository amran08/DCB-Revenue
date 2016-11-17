<?php

namespace App\Model\Table;

use App\Model\Entity\BuildingFile;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BuildingFiles Model
 */
class BuildingFilesTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        $this->table('building_files');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Buildings', [
            'foreignKey' => 'building_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->add('id', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('id', 'create');

        $validator
                ->allowEmpty('file_type');

        $validator
                ->allowEmpty('submission_type');

        $validator
                ->allowEmpty('file_url');

        $validator
                ->allowEmpty('applicant_name_en');

        $validator
                ->allowEmpty('applicant_address');

        $validator
                ->allowEmpty('applicant_contact_number');

        $validator
                ->add('submit_date', 'valid', ['rule' => 'date'])
                ->allowEmpty('submit_date');

        $validator
                ->add('decision_by', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('decision_by');

        $validator
                ->add('decision_date', 'valid', ['rule' => 'date'])
                ->allowEmpty('decision_date');

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
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->existsIn(['building_id'], 'Buildings'));
        return $rules;
    }

}
