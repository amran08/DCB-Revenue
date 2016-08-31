<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Plot Entity.
 *
 * @property int $id
 * @property int $district_id
 * @property \App\Model\Entity\District $district
 * @property int $upazila_id
 * @property \App\Model\Entity\Upazila $upazila
 * @property int $mouja_id
 * @property \App\Model\Entity\Mouja $mouja
 * @property int $dohs_id
 * @property \App\Model\Entity\Doh $doh
 * @property int $land_type_id
 * @property \App\Model\Entity\LandType $land_type
 * @property string $plot_type
 * @property string $plot_number
 * @property string $road_number
 * @property string $road_name
 * @property float $total_area
 * @property float $area_north
 * @property float $area_south
 * @property float $area_east
 * @property float $area_west
 * @property bool $is_lease
 * @property bool $is_blank
 * @property bool $is_residential
 * @property string $details
 * @property \Cake\I18n\Time $allotment_date
 * @property \Cake\I18n\Time $create_time
 * @property \Cake\I18n\Time $update_time
 * @property \App\Model\Entity\HoldingNumber[] $holding_numbers
 */
class Plot extends Entity
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
