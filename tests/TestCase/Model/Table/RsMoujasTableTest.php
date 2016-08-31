<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RsMoujasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RsMoujasTable Test Case
 */
class RsMoujasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RsMoujasTable
     */
    public $RsMoujas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.rs_moujas',
        'app.upazilas',
        'app.dglr_area_table',
        'app.plots',
        'app.districts',
        'app.users',
        'app.dohss',
        'app.apartments',
        'app.buildings',
        'app.houses',
        'app.tax_assessments',
        'app.land_type',
        'app.lts',
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
        $config = TableRegistry::exists('RsMoujas') ? [] : ['className' => 'App\Model\Table\RsMoujasTable'];
        $this->RsMoujas = TableRegistry::get('RsMoujas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RsMoujas);

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
