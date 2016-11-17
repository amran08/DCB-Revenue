<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TaxCollectionHistoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TaxCollectionHistoriesTable Test Case
 */
class TaxCollectionHistoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TaxCollectionHistoriesTable
     */
    public $TaxCollectionHistories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tax_collection_histories',
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
        'app.tax_settings',
        'app.tax_collections',
        'app.tax_assesments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TaxCollectionHistories') ? [] : ['className' => 'App\Model\Table\TaxCollectionHistoriesTable'];
        $this->TaxCollectionHistories = TableRegistry::get('TaxCollectionHistories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TaxCollectionHistories);

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
