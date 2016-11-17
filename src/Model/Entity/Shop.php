<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Shop Entity.
 *
 * @property int $id
 * @property int $market_id
 * @property \App\Model\Entity\Market $market
 * @property string $shop_type
 * @property string $shop_number
 * @property string $title_en
 * @property string $title_bn
 * @property float $total_area
 * @property int $floor_number
 * @property string $shop_details
 * @property bool $status
 * @property \Cake\I18n\Time $create_time
 * @property \Cake\I18n\Time $update_time
 * @property \App\Model\Entity\ShopFile[] $shop_files
 */
class Shop extends Entity
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
