<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LandTypeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LandTypeTable Test Case
 */
class LandTypeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LandTypeTable
     */
    public $LandType;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.land_type',
        'app.lts',
        'app.plots',
        'app.districts',
        'app.users',
        'app.upazilas',
        'app.dglr_area_table',
        'app.rs_moujas',
        'app.dohss',
        'app.apartments',
        'app.buildings',
        'app.houses',
        'app.tax_assessments',
        'app.holding_numbers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('LandType') ? [] : ['className' => 'App\Model\Table\LandTypeTable'];
        $this->LandType = TableRegistry::get('LandType', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LandType);

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
