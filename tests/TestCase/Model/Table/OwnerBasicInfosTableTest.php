<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OwnerBasicInfosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OwnerBasicInfosTable Test Case
 */
class OwnerBasicInfosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OwnerBasicInfosTable
     */
    public $OwnerBasicInfos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.owner_basic_infos',
        'app.owners',
        'app.buildings',
        'app.dohss',
        'app.apartments',
        'app.buildings',
        'app.developers',
        'app.building_files',
        'app.building_plot_info',
        'app.plots',
        'app.districts',
        'app.users',
        'app.upazilas',
        'app.dglr_area_table',
        'app.rs_moujas',
        'app.land_type',
        'app.lts',
        'app.holding_numbers',
        'app.tax_assessments',
        'app.houses',
        'app.dohs_maps',
        'app.aprtments',
        'app.houses',
        'app.properties'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OwnerBasicInfos') ? [] : ['className' => 'App\Model\Table\OwnerBasicInfosTable'];
        $this->OwnerBasicInfos = TableRegistry::get('OwnerBasicInfos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OwnerBasicInfos);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
