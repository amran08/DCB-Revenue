<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ShopAllotmentInfo Entity.
 *
 * @property int $id
 * @property string $name_en
 * @property int $shop_id
 * @property int $market_id
 * @property string $name_bn
 * @property string $mobile_number
 * @property int $status
 * @property \Cake\I18n\Time $create_time
 * @property \Cake\I18n\Time $update_time
 */
class ShopAllotmentInfo extends Entity
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
