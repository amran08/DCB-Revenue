<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TaxSettingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TaxSettingsTable Test Case
 */
class TaxSettingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TaxSettingsTable
     */
    public $TaxSettings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('TaxSettings') ? [] : ['className' => 'App\Model\Table\TaxSettingsTable'];
        $this->TaxSettings = TableRegistry::get('TaxSettings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TaxSettings);

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
