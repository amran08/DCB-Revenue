<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MasTable Test Case
 */
class MasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MasTable
     */
    public $Mas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Mas') ? [] : ['className' => 'App\Model\Table\MasTable'];
        $this->Mas = TableRegistry::get('Mas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Mas);

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
