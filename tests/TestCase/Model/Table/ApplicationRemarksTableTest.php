<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicationRemarksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApplicationRemarksTable Test Case
 */
class ApplicationRemarksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ApplicationRemarksTable
     */
    public $ApplicationRemarks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.application_remarks',
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
        'app.inspection_result_files',
        'app.application_files',
        'app.hearings',
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
        $config = TableRegistry::exists('ApplicationRemarks') ? [] : ['className' => 'App\Model\Table\ApplicationRemarksTable'];
        $this->ApplicationRemarks = TableRegistry::get('ApplicationRemarks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApplicationRemarks);

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
