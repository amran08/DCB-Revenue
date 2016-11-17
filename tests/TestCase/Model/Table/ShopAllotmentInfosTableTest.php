<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShopAllotmentInfosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShopAllotmentInfosTable Test Case
 */
class ShopAllotmentInfosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ShopAllotmentInfosTable
     */
    public $ShopAllotmentInfos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.shop_allotment_infos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ShopAllotmentInfos') ? [] : ['className' => 'App\Model\Table\ShopAllotmentInfosTable'];
        $this->ShopAllotmentInfos = TableRegistry::get('ShopAllotmentInfos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ShopAllotmentInfos);

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
