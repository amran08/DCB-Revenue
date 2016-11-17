<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShopFilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShopFilesTable Test Case
 */
class ShopFilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ShopFilesTable
     */
    public $ShopFiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.shop_files',
        'app.markets',
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
        'app.owners',
        'app.tax_assessments',
        'app.houses',
        'app.dohs_maps',
        'app.shops'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ShopFiles') ? [] : ['className' => 'App\Model\Table\ShopFilesTable'];
        $this->ShopFiles = TableRegistry::get('ShopFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ShopFiles);

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
