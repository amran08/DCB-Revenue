<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TaxSetting Entity.
 *
 * @property int $id
 * @property string $owner_type
 * @property float $tax_rate
 * @property string $economic_year
 * @property string $usage_type
 * @property string $location
 * @property int $status
 * @property \Cake\I18n\Time $create_time
 * @property \Cake\I18n\Time $update_time
 * @property int $create_by
 * @property int $update_by
 */
class TaxSetting extends Entity
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
