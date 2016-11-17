<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TaxCollection Entity.
 *
 * @property int $id
 * @property int $owner_id
 * @property \App\Model\Entity\Owner $owner
 * @property float $base_amount
 * @property float $rebet_amount
 * @property float $late_fee_amount
 * @property float $fine_amount
 * @property float $assessed_amount
 * @property float $total_amount
 * @property int $tax_assessment_id
 * @property string $economic_year
 * @property \Cake\I18n\Time $collection_date
 * @property int $status
 * @property \Cake\I18n\Time $create_time
 * @property \Cake\I18n\Time $update_time
 * @property int $collected_by
 * @property \App\Model\Entity\TaxAssessment $tax_assessment
 */
class TaxCollection extends Entity
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
