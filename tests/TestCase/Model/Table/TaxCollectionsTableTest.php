<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TaxCollectionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TaxCollectionsTable Test Case
 */
class TaxCollectionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TaxCollectionsTable
     */
    public $TaxCollections;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tax_collections',
        'app.owners',
        'app.tax_assessments',
        'app.dohss',
        'app.apartments',
        'app.buildings',
        'app.developers',
        'app.building_files',
        'app.building_plot_info',
        'app.plots',
        'app.districts',
        'app.users',
        'app.user_groups',
        'app.user_group_permissions',
        'app.created',
        'app.updated',
        'app.upazilas',
        'app.dglr_area_table',
        'app.rs_moujas',
        'app.land_type',
        'app.lts',
        'app.holding_numbers',
        'app.houses',
        'app.building__plot__info',
        'app.dohs_maps',
        'app.tax_settings'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TaxCollections') ? [] : ['className' => 'App\Model\Table\TaxCollectionsTable'];
        $this->TaxCollections = TableRegistry::get('TaxCollections', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TaxCollections);

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
