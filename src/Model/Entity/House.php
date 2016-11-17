<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * House Entity.
 *
 * @property int $id
 * @property int $dohs_id
 * @property \App\Model\Entity\Dohs $dohs
 * @property int $building_id
 * @property \App\Model\Entity\Building $building
 * @property string $house_type
 * @property string $house_number
 * @property string $house_title
 * @property int $floor_number
 * @property float $total_area
 * @property bool $is_commercial
 * @property int $status
 * @property string $details
 * @property \Cake\I18n\Time $create_time
 * @property \Cake\I18n\Time $update_time
 */
class House extends Entity
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
