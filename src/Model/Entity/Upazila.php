<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Upazila Entity.
 *
 * @property int $id
 * @property string $upazila_bbs_code
 * @property string $district_bbs_code
 * @property string $division_bbs_code
 * @property string $name_bd
 * @property string $name_en
 * @property string $district_name
 * @property int $status
 * @property \App\Model\Entity\DglrAreaTable[] $dglr_area_table
 * @property \App\Model\Entity\Plot[] $plots
 * @property \App\Model\Entity\RsMouja[] $rs_moujas
 * @property \App\Model\Entity\User[] $users
 */
class Upazila extends Entity
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
