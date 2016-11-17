<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TaxCollectionHistory Entity.
 *
 * @property int $id
 * @property int $owner_id
 * @property \App\Model\Entity\Owner $owner
 * @property int $tax_assesment_id
 * @property \App\Model\Entity\TaxAssesment $tax_assesment
 * @property \Cake\I18n\Time $collection_date
 * @property float $late_feee_amount
 * @property float $fine_amount
 * @property float $rebet_amount
 * @property float $collected_amount
 * @property int $status
 * @property \Cake\I18n\Time $create_time
 * @property \Cake\I18n\Time $update_time
 * @property int $collected_by
 */
class TaxCollectionHistory extends Entity
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
