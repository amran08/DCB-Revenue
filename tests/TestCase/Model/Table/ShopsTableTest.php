<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShopsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShopsTable Test Case
 */
class ShopsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ShopsTable
     */
    public $Shops;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.shops',
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
        'app.buildings',
        'app.houses',
        'app.aprtments',
        'app.houses',
        'app.tax_assessments',
        'app.dohs_maps',
        'app.shop_files'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Shops') ? [] : ['className' => 'App\Model\Table\ShopsTable'];
        $this->Shops = TableRegistry::get('Shops', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Shops);

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
