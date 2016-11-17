<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

use Cake\Auth\DefaultPasswordHasher;
/**
 * User Entity.
 *
 * @property int $id
 * @property int $division_id
 * @property \App\Model\Entity\Division $division
 * @property int $district_id
 * @property \App\Model\Entity\District $district
 * @property int $upazila_id
 * @property \App\Model\Entity\Upazila $upazila
 * @property int $office_id
 * @property \App\Model\Entity\Office $office
 * @property int $designation_id
 * @property \App\Model\Entity\Designation $designation
 * @property int $user_group_id
 * @property \App\Model\Entity\UserGroup $user_group
 * @property string $full_name_bn
 * @property string $full_name_en
 * @property string $username
 * @property string $password
 * @property string $picture_alt
 * @property string $picture
 * @property int $status
 * @property int $create_by
 * @property int $create_date
 * @property int $update_by
 * @property int $update_date
 */
class User extends Entity
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

    /**
     * Fields that are excluded from JSON an array versions of the entity.
     *
     * @var array
     */

    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }

    }
}
