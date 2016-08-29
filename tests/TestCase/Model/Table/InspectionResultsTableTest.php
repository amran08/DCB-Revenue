<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InspectionResultsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InspectionResultsTable Test Case
 */
class InspectionResultsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InspectionResultsTable
     */
    public $InspectionResults;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.inspection_results',
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
        'app.updated',
        'app.inspections'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('InspectionResults') ? [] : ['className' => 'App\Model\Table\InspectionResultsTable'];
        $this->InspectionResults = TableRegistry::get('InspectionResults', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InspectionResults);

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
