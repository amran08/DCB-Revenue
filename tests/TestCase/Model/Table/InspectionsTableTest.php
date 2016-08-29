<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InspectionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InspectionsTable Test Case
 */
class InspectionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InspectionsTable
     */
    public $Inspections;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.inspections',
        'app.appications',
        'app.offices',
        'app.divisions',
        'app.districts',
        'app.moujas',
        'app.upazila_lisas',
        'app.upazilas',
        'app.applications',
        'app.application_files',
        'app.hearings',
        'app.inspection_result_files',
        'app.inspection_results',
        'app.appellants',
        'app.defendants',
        'app.lawyers',
        'app.payments',
        'app.designations',
        'app.users',
        'app.user_groups',
        'app.user_group_permissions',
        'app.created',
        'app.user_basics',
        'app.updated'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Inspections') ? [] : ['className' => 'App\Model\Table\InspectionsTable'];
        $this->Inspections = TableRegistry::get('Inspections', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Inspections);

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
