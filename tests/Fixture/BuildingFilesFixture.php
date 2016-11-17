<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BuildingFilesFixture
 *
 */
class BuildingFilesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'file_type' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => 'soil , plan, fire clearance , environment clearance, air,legal clearance', 'precision' => null, 'fixed' => null],
        'submission_type' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => null, 'comment' => 'revised, new, again, corrected', 'precision' => null, 'fixed' => null],
        'building_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'file_url' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'applicant_name_en' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'applicant_address' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'applicant_contact_number' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'submit_date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'decision_by' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'decision_date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'status' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'create_time' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'update_time' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
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
            'file_type' => 'Lorem ipsum dolor sit amet',
            'submission_type' => 'Lorem ip',
            'building_id' => 1,
            'file_url' => 'Lorem ipsum dolor sit amet',
            'applicant_name_en' => 'Lorem ipsum dolor sit amet',
            'applicant_address' => 'Lorem ipsum dolor sit amet',
            'applicant_contact_number' => 'Lorem ipsum dolor ',
            'submit_date' => '2016-09-26',
            'decision_by' => 1,
            'decision_date' => '2016-09-26',
            'status' => 1,
            'create_time' => '2016-09-26 09:18:56',
            'update_time' => '2016-09-26 09:18:56'
        ],
    ];
}
