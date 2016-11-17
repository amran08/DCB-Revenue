<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TaxAssessmentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TaxAssessmentsTable Test Case
 */
class TaxAssessmentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TaxAssessmentsTable
     */
    public $TaxAssessments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tax_assessments',
        'app.dohs',
        'app.owners',
        'app.if_revised_parent_assess_rows',
        'app.properties',
        'app.tax_settings',
        'app.tax_assessment_appeals'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TaxAssessments') ? [] : ['className' => 'App\Model\Table\TaxAssessmentsTable'];
        $this->TaxAssessments = TableRegistry::get('TaxAssessments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TaxAssessments);

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
