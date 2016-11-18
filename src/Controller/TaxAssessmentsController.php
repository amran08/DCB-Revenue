<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Date;
use Cake\Network\Session;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\View\Helper\FormHelper;
use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * TaxAssessments Controller
 *
 * @property \App\Model\Table\TaxAssessmentsTable $TaxAssessments
 */
class TaxAssessmentsController extends AppController
{


    public $paginate = [
        'limit' => 15,
        'order' => [
            'TaxAssessments.id' => 'desc'
        ]
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $taxAssessments = $this->TaxAssessments->find('all', [
            'conditions' => ['TaxAssessments.status !=' => 99],
            'contain' => ['Dohss', 'Owners']
        ]);
        $this->set('taxAssessments', $this->paginate($taxAssessments));
        $this->set('_serialize', ['taxAssessments']);


    }

    /**
     * View method
     *
     * @param string|null $id Tax Assessment id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Auth->user();
        $taxAssessment = $this->TaxAssessments->get($id, [
            'contain' => ['Dohss', 'Owners']
        ]);
        $this->set('taxAssessment', $taxAssessment);
        $this->set('_serialize', ['taxAssessment']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Auth->user();
        $time = time();
        $taxAssessment = $this->TaxAssessments->newEntity();
        $this->loadModel('TaxSettings');
        $this->loadModel('Owners');
        $this->loadModel('Apartments');
        $this->loadModel('Plots');
        $this->loadModel('Buildings');
        $this->loadModel('Houses');

        if ($this->request->is('post')) {
            $data = $this->request->data;

            $tax_rate_from_settings_table = $this->TaxSettings->find('all')->where(['TaxSettings.status' => 1])->toArray();
            $economic_year_as_param = $data['economic_year'];
            $assess_type = $data['assess_type'];

            foreach ($tax_rate_from_settings_table as $tax_rate_from_settings_table) {

                if ($economic_year_as_param != $tax_rate_from_settings_table['economic_year']) {

                    return $this->Flash->error('Tax Assessment Settings not Found For this Economic Year.');
                } else {
                    return $this->redirect(['action' => 'taxAssess',

                            "economic_year" => $economic_year_as_param,
                            "assess_type" => $assess_type]
                    );
                }

            }
            $this->set('_serialize', ['taxAssessment']);
        }
    }

    public function taxAssess()
    {
        $this->loadModel('TaxAssessments');
        $this->loadModel('TaxSettings');
        $this->loadModel('Owners');
        $this->loadModel('Apartments');
        $this->loadModel('Plots');
        $this->loadModel('Buildings');
        $this->loadModel('Houses');
        $user = $this->Auth->user();
        $time = time();
        $economic_year = $this->request->query['economic_year'];
        $assess_type = $this->request->query['assess_type'];
        $connect = ConnectionManager::get('default');


        $q = "SELECT owners.id,owners.property_id,owners.property_type_table_name,owners.status,owners.ownership_type,owners.usage_type,owners.name_bn
                    FROM owners
                    LEFT JOIN tax_assessments ON owners.id = tax_assessments.owner_id
                  WHERE tax_assessments.owner_id  IS NULL";

        $sql_execute = $connect->execute($q);
        $owner_list = $sql_execute->fetchAll('assoc');

        //  debug($owner_list); die;


        // $this->set('property_to_assess', $property_to_assess);

        $tax_rate_from_settings_table = $this->TaxSettings->find('all')->where(['TaxSettings.status' => 1])->toArray();

        $tax_calculation = [];

        $this->set('tax_calculation', $tax_calculation);

        foreach ($tax_rate_from_settings_table as $tax_rate_from_settings_table) {

            if ($economic_year != $tax_rate_from_settings_table['economic_year']) {

                return $this->Flash->error('Tax Assessment Settings not Found For this Economic Year.');
            }
            foreach ($owner_list as $key => $owners) {
                // debug($owners);
                if ($owners['ownership_type'] == $tax_rate_from_settings_table['owner_type'] && $owners['usage_type'] == $tax_rate_from_settings_table['usage_type']
                    && $economic_year == $tax_rate_from_settings_table['economic_year']
                ) {

                    if ($owners['property_type_table_name'] == "Apartments") {

                        $apartments = $this->Apartments->find('all')->contain(['Dohss'])->where(['Apartments.id' => $owners['property_id'],
                            'Apartments.status' => 1,
                        ])->toArray();

                        $tax_assessed = $apartments[0]['total_area'] * $tax_rate_from_settings_table['tax_rate'];
                        $apartment_data['owner_id'] = $owners['id'];
                        $apartment_data['dohs_id'] = $apartments[0]['dohs_id'];

                        $apartment_data['tax_settings_id'] = $tax_rate_from_settings_table['id'];
                        $apartment_data['assessed_amount'] = $tax_assessed;
                        $apartment_data['status'] = 1;

                        $apartment_data['property_id'] = $apartments[0]['id'];

                        $apartment_data['property_type_table_name'] = "Apartments";


                        $apartment_data['owner_name'] = $owners['name_bn'];
                        $apartment_data['dohss_title_bn'] = $apartments[0]['dohs']['title_bn'];

                        $tax_calculation['Apartments'][$key] = $apartment_data;
                    }

                    if ($owners['property_type_table_name'] == "Plots") {

                        $plots = $this->Plots->find('all')->contain(['Dohss'])->where(['Plots.id' => $owners['property_id'],
                            'Plots.status' => 1,
                        ])->toArray();

                        $tax_assessed = $plots[0]['total_area'] * $tax_rate_from_settings_table['tax_rate'];

                        $plot_data['owner_id'] = $owners['id'];
                        $plot_data['dohs_id'] = $plots[0]['dohs_id'];

                        $plot_data['tax_settings_id'] = $tax_rate_from_settings_table['id'];
                        $plot_data['assessed_amount'] = $tax_assessed;
                        $plot_data['status'] = 1;

                        $plot_data['property_id'] = $plots[0]['id'];
                        $plot_data['property_type_table_name'] = "Plots";

                        $plot_data['owner_name'] = $owners['name_bn'];
                        $plot_data['dohss_title_bn'] = $plots[0]['dohs']['title_bn'];

                        $tax_calculation['Plots'][$key] = $plot_data;

                    }
                    if ($owners['property_type_table_name'] == "Buildings") {

                        $buildings = $this->Buildings->find('all')->contain(['Dohss'])->where(['Buildings.id' => $owners['property_id'],
                            'Buildings.status' => 1,
                        ])->toArray();


                        $tax_assessed = $buildings[0]['build_site_area'] * $tax_rate_from_settings_table['tax_rate'];

                        $building_data['owner_id'] = $owners['id'];
                        $building_data['dohs_id'] = $buildings[0]['dohs_id'];

                        $building_data['tax_settings_id'] = $tax_rate_from_settings_table['id'];
                        $building_data['assessed_amount'] = $tax_assessed;
                        $building_data['status'] = 1;

                        $building_data['property_id'] = $buildings[0]['id'];
                        $building_data['property_type_table_name'] = "Buildings";


                        $building_data['owner_name'] = $owners['name_bn'];
                        $building_data['dohss_title_bn'] = $buildings[0]['dohs']['title_bn'];

                        $tax_calculation['Buildings'][$key] = $building_data;


                    }

                    if ($owners['property_type_table_name'] == "Houses") {

                        $houses = $this->Houses->find('all')->contain(['Dohss'])->where(['Houses.id' => $owners['property_id'],
                            'Houses.status' => 1,
                        ])->toArray();

                        $tax_assessed = $houses[0]['total_area'] * $tax_rate_from_settings_table['tax_rate'];

                        $house_data['owner_id'] = $owners['id'];
                        $house_data['dohs_id'] = $houses[0]['dohs_id'];
                        $house_data['tax_settings_id'] = $tax_rate_from_settings_table['id'];
                        $house_data['assessed_amount'] = $tax_assessed;
                        $house_data['status'] = 1;
                        $house_data['property_id'] = $houses[0]['id'];
                        $house_data['property_type_table_name'] = "Houses";
                        $house_data['owner_name'] = $owners['name_bn'];
                        $house_data['dohss_title_bn'] = $houses[0]['dohs']['title_bn'];
                        $tax_calculation['Houses'][$key] = $house_data;
                    }
                }
            }

        }

        $this->set('tax_calculation', $tax_calculation);


        if ($this->request->is(['post'])) {
            $data = $this->request->data;
            foreach ($data['Owner'] as $owner_id => $owner_assessments) {

                $tax_assessment_entity = $this->TaxAssessments->newEntity();
                $tax_assessment_data['dohs_id'] = $owner_assessments['dohs_id'];
                $tax_assessment_data['property_id'] = $owner_assessments['property_id'];
                $tax_assessment_data['tax_settings_id'] = $owner_assessments['tax_settings_id'];
                $tax_assessment_data['remarks'] = $owner_assessments['remarks'];
                $tax_assessment_data['total_amount'] = $this->Common->bn_to_en($owner_assessments['total_amount']);
                $tax_assessment_data['owner_id'] = $owner_id;
                $tax_assessment_data['property_type_table_name'] = $owner_assessments['property_type_table_name'];
                $tax_assessment_data['assess_by'] = $user['id'];
                $tax_assessment_data['assess_date'] = Date::now();
                $tax_assessment_data['assessed_amount'] = $owner_assessments['assessed_amount'];
                $tax_assessment_data['create_time'] = $time;
                $tax_assessment_data['status'] = 1;
                $tax_assessment_data['assess_type'] = $assess_type;
                $tax_assessment_entity = $this->TaxAssessments->patchEntity($tax_assessment_entity, $tax_assessment_data);
                if ($this->TaxAssessments->save($tax_assessment_entity)) {
                    $this->Flash->success('Tax Assessment Completed');
                } else {
                    $this->Flash->error('Tax Assessment can not be saved');

                }
            }

            return $this->redirect(['action' => 'index']);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Tax Assessment id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public
    function edit($id = null)
    {
        $user = $this->Auth->user();
        $time = time();
        $taxAssessment = $this->TaxAssessments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            $data['update_by'] = $user['id'];
            $data['update_date'] = $time;
            $taxAssessment = $this->TaxAssessments->patchEntity($taxAssessment, $data);
            if ($this->TaxAssessments->save($taxAssessment)) {
                $this->Flash->success('The tax assessment has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The tax assessment could not be saved. Please, try again.');
            }
        }
        $dohs = $this->TaxAssessments->Dohss->find('list', ['conditions' => ['status' => 1]]);
        $owners = $this->TaxAssessments->Owners->find('list', ['conditions' => ['status' => 1]]);
        // $ifRevisedParentAssessRows = $this->TaxAssessments->IfRevisedParentAssessRows->find('list', ['conditions'=>['status'=>1]]);
        ///$properties = $this->TaxAssessments->Properties->find('list', ['conditions'=>['status'=>1]]);
        // $taxSettings = $this->TaxAssessments->TaxSettings->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('taxAssessment', 'dohs', 'owners', 'ifRevisedParentAssessRows', 'properties', 'taxSettings'));
        $this->set('_serialize', ['taxAssessment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tax Assessment id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $taxAssessment = $this->TaxAssessments->get($id);

        $user = $this->Auth->user();
        $data = $this->request->data;
        $data['updated_by'] = $user['id'];
        $data['updated_date'] = time();
        $data['status'] = 99;
        $taxAssessment = $this->TaxAssessments->patchEntity($taxAssessment, $data);
        if ($this->TaxAssessments->save($taxAssessment)) {
            $this->Flash->success('The tax assessment has been deleted.');
        } else {
            $this->Flash->error('The tax assessment could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function resetAssessments()
    {
        $this->autoRender = false;
        $this->loadModel('TaxCollections');

        if ($this->TaxAssessments->deleteAll()) {
            $this->TaxCollections->deleteAll();
            $this->Flash->success('All tax assessments are deleted.');
        } else {
            $this->Flash->error('Tax assessments could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
