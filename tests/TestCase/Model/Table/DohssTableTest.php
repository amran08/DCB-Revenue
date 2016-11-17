<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DohssTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DohssTable Test Case
 */
class DohssTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DohssTable
     */
    public $Dohss;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.dohss',
        'app.districts',
        'app.plots',
        'app.upazilas',
        'app.dglr_area_table',
        'app.rs_moujas',
        'app.users',
        'app.land_type',
        'app.lts',
        'app.holding_numbers',
        'app.apartments',
        'app.buildings',
        'app.developers',
        'app.building_files',
        'app.building_plot_info',
        'app.houses',
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
        $config = TableRegistry::exists('Dohss') ? [] : ['className' => 'App\Model\Table\DohssTable'];
        $this->Dohss = TableRegistry::get('Dohss', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Dohss);

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
