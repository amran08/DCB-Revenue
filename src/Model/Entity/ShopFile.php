<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ShopFile Entity.
 *
 * @property int $id
 * @property int $market_id
 * @property \App\Model\Entity\Market $market
 * @property int $shop_id
 * @property \App\Model\Entity\Shop $shop
 * @property string $allotment_type
 * @property int $owner_id
 * @property \App\Model\Entity\Owner $owner
 * @property string $application_form_file
 * @property \Cake\I18n\Time $allotment_issue_date
 * @property \Cake\I18n\Time $allotment_expire_date
 * @property string $contract_file
 * @property float $contract_value
 * @property string $floor_map
 * @property bool $status
 * @property \Cake\I18n\Time $create_time
 * @property \Cake\I18n\Time $update_time
 */
class ShopFile extends Entity
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
