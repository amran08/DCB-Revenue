<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BuildingPlotInfo Entity.
 *
 * @property int $id
 * @property int $building_id
 * @property \App\Model\Entity\Building $building
 * @property int $plot_id
 * @property \App\Model\Entity\Plot $plot
 * @property bool $status
 * @property \Cake\I18n\Time $create_time
 * @property \Cake\I18n\Time $update_time
 */
class BuildingPlotInfo extends Entity
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
