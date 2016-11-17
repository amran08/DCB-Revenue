<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DohsMapsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DohsMapsTable Test Case
 */
class DohsMapsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DohsMapsTable
     */
    public $DohsMaps;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.dohs_maps',
        'app.dohs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DohsMaps') ? [] : ['className' => 'App\Model\Table\DohsMapsTable'];
        $this->DohsMaps = TableRegistry::get('DohsMaps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DohsMaps);

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
