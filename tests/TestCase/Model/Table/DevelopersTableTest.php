<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DevelopersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DevelopersTable Test Case
 */
class DevelopersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DevelopersTable
     */
    public $Developers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.developers',
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
        $config = TableRegistry::exists('Developers') ? [] : ['className' => 'App\Model\Table\DevelopersTable'];
        $this->Developers = TableRegistry::get('Developers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Developers);

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
}
