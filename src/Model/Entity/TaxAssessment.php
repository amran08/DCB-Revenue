<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TaxAssessment Entity.
 *
 * @property int $id
 * @property int $dohs_id
 * @property \App\Model\Entity\Doh $doh
 * @property string $economic_year
 * @property int $owner_id
 * @property \App\Model\Entity\Owner $owner
 * @property string $assess_type
 * @property int $if_revised_parent_assess_row_id
 * @property \App\Model\Entity\IfRevisedParentAssessRow $if_revised_parent_assess_row
 * @property string $property_type
 * @property string $property_type_table_name
 * @property int $property_id
 * @property \App\Model\Entity\Property $property
 * @property string $property_title
 * @property int $tax_settings_id
 * @property \App\Model\Entity\TaxSetting $tax_setting
 * @property float $total_area
 * @property float $assessed_amount
 * @property float $total_amount
 * @property string $remarks
 * @property int $assess_by
 * @property \Cake\I18n\Time $assess_date
 * @property bool $status
 * @property \Cake\I18n\Time $create_time
 * @property \Cake\I18n\Time $update_time
 * @property \App\Model\Entity\TaxAssessmentAppeal[] $tax_assessment_appeals
 */
class TaxAssessment extends Entity
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
