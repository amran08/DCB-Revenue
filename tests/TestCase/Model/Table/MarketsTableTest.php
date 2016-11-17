<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MarketsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MarketsTable Test Case
 */
class MarketsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MarketsTable
     */
    public $Markets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.shop_files',
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
        $config = TableRegistry::exists('Markets') ? [] : ['className' => 'App\Model\Table\MarketsTable'];
        $this->Markets = TableRegistry::get('Markets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Markets);

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
