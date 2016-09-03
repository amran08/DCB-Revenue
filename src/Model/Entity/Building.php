<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Building Entity.
 *
 * @property int $id
 * @property int $dohs_id
 * @property \App\Model\Entity\Dohs $dohs
 * @property string $road_number
 * @property string $build_type
 * @property string $title_en
 * @property string $title_bn
 * @property float $build_site_area
 * @property string $build_site_north
 * @property string $build_site_south
 * @property string $build_site_east
 * @property string $build_site_west
 * @property string $build_site_road_details
 * @property string $build_site_soil_type
 * @property string $build_purpose
 * @property string $roof_type
 * @property float $estimate_cost
 * @property float $actual_cost
 * @property \Cake\I18n\Time $plan_approve_date
 * @property \Cake\I18n\Time $work_start_date
 * @property \Cake\I18n\Time $work_finish_date
 * @property int $floor_number
 * @property string $building_details
 * @property bool $is_apartment
 * @property bool $is_house
 * @property bool $is_legal_info
 * @property int $apartment_number
 * @property bool $septic_tank_info
 * @property string $waste_cleaning_details
 * @property int $developer_id
 * @property \App\Model\Entity\Developer $developer
 * @property int $status
 * @property \Cake\I18n\Time $create_time
 * @property \Cake\I18n\Time $update_time
 * @property \App\Model\Entity\Apartment[] $apartments
 * @property \App\Model\Entity\BuildingFile[] $building_files
 * @property \App\Model\Entity\BuildingPlotInfo[] $building_plot_info
 * @property \App\Model\Entity\HoldingNumber[] $holding_numbers
 * @property \App\Model\Entity\House[] $houses
 */
class Building extends Entity
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
