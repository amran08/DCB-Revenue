<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BuildingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BuildingsTable Test Case
 */
class BuildingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BuildingsTable
     */
    public $Buildings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.building_files',
        'app.building_plot_info'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Buildings') ? [] : ['className' => 'App\Model\Table\BuildingsTable'];
        $this->Buildings = TableRegistry::get('Buildings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Buildings);

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
