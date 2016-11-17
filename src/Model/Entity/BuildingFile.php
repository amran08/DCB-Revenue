<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BuildingFile Entity.
 *
 * @property int $id
 * @property string $file_type
 * @property string $submission_type
 * @property int $building_id
 * @property \App\Model\Entity\Building $building
 * @property string $file_url
 * @property string $applicant_name_en
 * @property string $applicant_address
 * @property string $applicant_contact_number
 * @property \Cake\I18n\Time $submit_date
 * @property int $decision_by
 * @property \Cake\I18n\Time $decision_date
 * @property bool $status
 * @property \Cake\I18n\Time $create_time
 * @property \Cake\I18n\Time $update_time
 */
class BuildingFile extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
