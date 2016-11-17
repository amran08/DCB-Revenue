<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Market Entity.
 *
 * @property int $id
 * @property string $title_en
 * @property string $title_bn
 * @property string $road_number
 * @property string $address
 * @property float $total_area
 * @property int $dohs_id
 * @property \App\Model\Entity\Dohs $dohs
 * @property int $building_id
 * @property \App\Model\Entity\Building $building
 * @property int $floor_number
 * @property int $total_shop_number
 * @property \Cake\I18n\Time $start_date
 * @property int $status
 * @property \Cake\I18n\Time $create_time
 * @property \Cake\I18n\Time $update_time
 * @property \App\Model\Entity\ShopFile[] $shop_files
 * @property \App\Model\Entity\Shop[] $shops
 */
class Market extends Entity
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
