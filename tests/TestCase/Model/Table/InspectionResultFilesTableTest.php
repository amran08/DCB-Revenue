<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InspectionResultFilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InspectionResultFilesTable Test Case
 */
class InspectionResultFilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InspectionResultFilesTable
     */
    public $InspectionResultFiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.inspection_result_files',
        'app.applications',
        'app.offices',
        'app.divisions',
        'app.districts',
        'app.moujas',
        'app.upazila_lisas',
        'app.upazilas',
        'app.designations',
        'app.users',
        'app.user_groups',
        'app.user_group_permissions',
        'app.created',
        'app.user_basics',
        'app.updated',
        'app.inspections',
        'app.inspection_results',
        'app.application_files',
        'app.hearings',
        'app.application_remarks',
        'app.appellants',
        'app.defendants',
        'app.lawyers',
        'app.payments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('InspectionResultFiles') ? [] : ['className' => 'App\Model\Table\InspectionResultFilesTable'];
        $this->InspectionResultFiles = TableRegistry::get('InspectionResultFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InspectionResultFiles);

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
