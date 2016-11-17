<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * HoldingNumber Entity.
 *
 * @property int $id
 * @property int $plot_id
 * @property \App\Model\Entity\Plot $plot
 * @property int $building_id
 * @property \App\Model\Entity\Building $building
 * @property string $holding_number
 * @property string $applicant_name
 * @property string $applicant_mobile_number
 * @property string $applicant_present_address
 * @property string $applicant_permanent_address
 * @property string $supporting_paper
 * @property \Cake\I18n\Time $application_date
 * @property \Cake\I18n\Time $issue_date
 * @property float $starting_tax_amount
 * @property int $status
 * @property \Cake\I18n\Time $create_time
 * @property \Cake\I18n\Time $update_time
 * @property \App\Model\Entity\Owner[] $owners
 * @property \App\Model\Entity\TaxAssessment[] $tax_assessments
 */
class HoldingNumber extends Entity
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
