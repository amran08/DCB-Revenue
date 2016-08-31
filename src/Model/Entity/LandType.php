<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LandType Entity.
 *
 * @property int $lt_id
 * @property \App\Model\Entity\Lt $lt
 * @property string $lt_name
 * @property string $survey
 * @property int $created_by
 * @property int $created_time
 * @property int $updated_by
 * @property int $updated_time
 * @property int $status
 * @property \App\Model\Entity\Plot[] $plots
 */
class LandType extends Entity
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
        'lt_id' => false,
    ];
}
