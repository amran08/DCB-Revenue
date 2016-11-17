<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BuildingFilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BuildingFilesTable Test Case
 */
class BuildingFilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BuildingFilesTable
     */
    public $BuildingFiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.building_files',
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
        'app.owners',
        'app.buildings',
        'app.developers',
        'app.building_plot_info',
        'app.aprtments',
        'app.houses',
        'app.tax_assessments',
        'app.dohs_maps'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BuildingFiles') ? [] : ['className' => 'App\Model\Table\BuildingFilesTable'];
        $this->BuildingFiles = TableRegistry::get('BuildingFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BuildingFiles);

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
