<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RsMouja Entity.
 *
 * @property int $id
 * @property string $dglr_code
 * @property int $upazila_id
 * @property \App\Model\Entity\Upazila $upazila
 * @property string $name_en
 * @property string $name_bd
 * @property int $status
 */
class RsMouja extends Entity
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
