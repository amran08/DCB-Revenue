<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TaxSettingsFixture
 *
 */
class TaxSettingsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'owner_type' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'comment' => 'civilian;non_civilian', 'precision' => null, 'fixed' => null],
        'tax_rate' => ['type' => 'float', 'length' => 8, 'precision' => 0, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'economic_year' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'usage_type' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'comment' => 'own;rent', 'precision' => null, 'fixed' => null],
        'location' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'comment' => 'dohs;non-dohs', 'precision' => null, 'fixed' => null],
        'status' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'create_time' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'update_time' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'create_by' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'update_by' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'owner_type' => 'Lorem ipsum dolor sit amet',
            'tax_rate' => 1,
            'economic_year' => 'Lorem ipsum dolor sit amet',
            'usage_type' => 'Lorem ipsum dolor sit amet',
            'location' => 'Lorem ipsum dolor sit amet',
            'status' => 1,
            'create_time' => '2016-11-09 09:33:53',
            'update_time' => '2016-11-09 09:33:53',
            'create_by' => 1,
            'update_by' => 1
        ],
    ];
}
