<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HousesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HousesTable Test Case
 */
class HousesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HousesTable
     */
    public $Houses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.houses',
        'app.dohss',
        'app.apartments',
        'app.buildings',
        'app.developers',
        'app.building_files',
        'app.building_plot_info',
        'app.holding_numbers',
        'app.plots',
        'app.districts',
        'app.users',
        'app.upazilas',
        'app.dglr_area_table',
        'app.rs_moujas',
        'app.land_type',
        'app.lts',
        'app.tax_assessments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Houses') ? [] : ['className' => 'App\Model\Table\HousesTable'];
        $this->Houses = TableRegistry::get('Houses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Houses);

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
