<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OwnerBasicInfosFixture
 *
 */
class OwnerBasicInfosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'owner_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'owner_type' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'comment' => 'by allotment ; by purchase ; by inheritance ; by lease', 'precision' => null, 'fixed' => null],
        'property_type' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'comment' => 'plot ; house ; apartment ; shop ', 'precision' => null, 'fixed' => null],
        'property_type_table_name' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'property_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'holding_number_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'own_percentage' => ['type' => 'float', 'length' => 4, 'precision' => 4, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'usage_type' => ['type' => 'string', 'length' => 20, 'null' => false, 'default' => null, 'comment' => 'own ; rent ; ', 'precision' => null, 'fixed' => null],
        'name_en' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'name_bn' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'father_name_en' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'father_name_bn' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'mother_name_en' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'mother_name_bn' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'spouse_name_en' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'spouse_name_bn' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'nid' => ['type' => 'string', 'length' => 19, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'dob' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'religion' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'gender' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'mobile_number' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'phone_number' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'email' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'present_address' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'permanent_address' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'picture' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'own_date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'status' => ['type' => 'integer', 'length' => 3, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'lease_expire_date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'include allotment date if needed ', 'precision' => null],
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
            'owner_id' => 1,
            'owner_type' => 'Lorem ipsum dolor sit amet',
            'property_type' => 'Lorem ipsum dolor sit amet',
            'property_type_table_name' => 'Lorem ipsum dolor sit amet',
            'property_id' => 1,
            'holding_number_id' => 1,
            'own_percentage' => 1,
            'usage_type' => 'Lorem ipsum dolor ',
            'name_en' => 'Lorem ipsum dolor sit amet',
            'name_bn' => 'Lorem ipsum dolor sit amet',
            'father_name_en' => 'Lorem ipsum dolor sit amet',
            'father_name_bn' => 'Lorem ipsum dolor sit amet',
            'mother_name_en' => 'Lorem ipsum dolor sit amet',
            'mother_name_bn' => 'Lorem ipsum dolor sit amet',
            'spouse_name_en' => 'Lorem ipsum dolor sit amet',
            'spouse_name_bn' => 'Lorem ipsum dolor sit amet',
            'nid' => 'Lorem ipsum dolor',
            'dob' => '2016-10-02',
            'religion' => 'Lorem ip',
            'gender' => 'Lorem ip',
            'mobile_number' => 'Lorem ipsum dolor ',
            'phone_number' => 'Lorem ipsum dolor ',
            'email' => 'Lorem ipsum dolor sit amet',
            'present_address' => 'Lorem ipsum dolor sit amet',
            'permanent_address' => 'Lorem ipsum dolor sit amet',
            'picture' => 'Lorem ipsum dolor sit amet',
            'own_date' => '2016-10-02',
            'status' => 1,
            'lease_expire_date' => '2016-10-02',
            'create_time' => '2016-10-02 10:47:02',
            'update_time' => '2016-10-02 10:47:02'
        ],
    ];
}
