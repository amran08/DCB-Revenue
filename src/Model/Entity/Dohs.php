<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Dohs Entity.
 *
 * @property int $id
 * @property int $district_id
 * @property \App\Model\Entity\District $district
 * @property int $upazila_id
 * @property \App\Model\Entity\Upazila $upazila
 * @property string $title_en
 * @property string $title_bn
 * @property float $total_area
 * @property int $total_plot_number
 * @property int $total_building_number
 * @property int $total_house_number
 * @property int $total_apartment_number
 * @property int $total_market_number
 * @property int $total_shop_number
 * @property int $status
 * @property string $map_file
 * @property \Cake\I18n\Time $create_time
 * @property \Cake\I18n\Time $update_time
 * @property \App\Model\Entity\Apartment[] $apartments
 * @property \App\Model\Entity\Building[] $buildings
 * @property \App\Model\Entity\House[] $houses
 * @property \App\Model\Entity\Plot[] $plots
 * @property \App\Model\Entity\TaxAssessment[] $tax_assessments
 */
class Dohs extends Entity
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
