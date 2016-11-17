<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OwnerBasicInfo Entity.
 *
 * @property int $id
 * @property int $owner_id
 * @property \App\Model\Entity\Owner $owner
 * @property string $owner_type
 * @property string $property_type
 * @property string $property_type_table_name
 * @property int $property_id
 * @property \App\Model\Entity\Property $property
 * @property int $holding_number_id
 * @property \App\Model\Entity\HoldingNumber $holding_number
 * @property float $own_percentage
 * @property string $usage_type
 * @property string $name_en
 * @property string $name_bn
 * @property string $father_name_en
 * @property string $father_name_bn
 * @property string $mother_name_en
 * @property string $mother_name_bn
 * @property string $spouse_name_en
 * @property string $spouse_name_bn
 * @property string $nid
 * @property \Cake\I18n\Time $dob
 * @property string $religion
 * @property string $gender
 * @property string $mobile_number
 * @property string $phone_number
 * @property string $email
 * @property string $present_address
 * @property string $permanent_address
 * @property string $picture
 * @property \Cake\I18n\Time $own_date
 * @property int $status
 * @property \Cake\I18n\Time $lease_expire_date
 * @property \Cake\I18n\Time $create_time
 * @property \Cake\I18n\Time $update_time
 */
class OwnerBasicInfo extends Entity
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
