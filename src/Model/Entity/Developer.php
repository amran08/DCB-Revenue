<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Developer Entity.
 *
 * @property int $id
 * @property string $name_en
 * @property string $name_bn
 * @property string $details
 * @property string $address
 * @property int $status
 * @property \App\Model\Entity\Building[] $buildings
 */
class Developer extends Entity
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
