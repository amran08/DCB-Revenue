<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BuildingPlotInfoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BuildingPlotInfoTable Test Case
 */
class BuildingPlotInfoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BuildingPlotInfoTable
     */
    public $BuildingPlotInfo;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.building_plot_info',
        'app.buildings',
        'app.dohss',
        'app.apartments',
        'app.houses',
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
        'app.developers',
        'app.building_files'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BuildingPlotInfo') ? [] : ['className' => 'App\Model\Table\BuildingPlotInfoTable'];
        $this->BuildingPlotInfo = TableRegistry::get('BuildingPlotInfo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BuildingPlotInfo);

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
