<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HoldingNumbersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HoldingNumbersTable Test Case
 */
class HoldingNumbersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HoldingNumbersTable
     */
    public $HoldingNumbers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.holding_numbers',
        'app.plots',
        'app.districts',
        'app.users',
        'app.upazilas',
        'app.dglr_area_table',
        'app.rs_moujas',
        'app.dohss',
        'app.apartments',
        'app.buildings',
        'app.developers',
        'app.building_files',
        'app.building_plot_info',
        'app.houses',
        'app.tax_assessments',
        'app.land_type',
        'app.lts',
        'app.owners'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('HoldingNumbers') ? [] : ['className' => 'App\Model\Table\HoldingNumbersTable'];
        $this->HoldingNumbers = TableRegistry::get('HoldingNumbers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->HoldingNumbers);

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
