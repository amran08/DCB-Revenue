<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UpazilasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UpazilasTable Test Case
 */
class UpazilasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UpazilasTable
     */
    public $Upazilas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.upazilas',
        'app.dglr_area_table',
        'app.plots',
        'app.districts',
        'app.users',
        'app.rs_moujas',
        'app.dohss',
        'app.apartments',
        'app.buildings',
        'app.houses',
        'app.tax_assessments',
        'app.land_type',
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
        $config = TableRegistry::exists('Upazilas') ? [] : ['className' => 'App\Model\Table\UpazilasTable'];
        $this->Upazilas = TableRegistry::get('Upazilas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Upazilas);

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
