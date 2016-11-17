<?php
namespace App\Test\TestCase\Controller;

use App\Controller\TaxAssessmentsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\TaxAssessmentsController Test Case
 */
class TaxAssessmentsControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
