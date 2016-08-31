<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DistrictsFixture
 *
 */
class DistrictsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'district_bbs_code' => ['type' => 'string', 'fixed' => true, 'length' => 2, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'division_bbs_code' => ['type' => 'string', 'fixed' => true, 'length' => 2, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'name_bn' => ['type' => 'string', 'length' => 40, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'name_en' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
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
            'district_bbs_code' => '',
            'division_bbs_code' => '',
            'name_bn' => 'Lorem ipsum dolor sit amet',
            'name_en' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
