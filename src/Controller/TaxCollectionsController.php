<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Date;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Time;

/**
 * TaxCollections Controller
 *
 * @property \App\Model\Table\TaxCollectionsTable $TaxCollections
 */
class TaxCollectionsController extends AppController
{

    public $paginate = [
        'limit' => 15,
        'order' => [
            'TaxCollections.id' => 'desc'
        ]
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $taxCollections = $this->TaxCollections->find('all', [
            'conditions' => ['TaxCollections.status !=' => 99],
            'contain' => ['Owners', 'TaxAssessments']
        ]);
        // debug($taxCollections->toArray()); die;
        $this->set('taxCollections', $this->paginate($taxCollections));
        $this->set('_serialize', ['taxCollections']);
    }

    /**
     * View method
     *
     * @param string|null $id Tax Collection id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Auth->user();
        $taxCollection = $this->TaxCollections->get($id, [
            'contain' => ['Owners']
        ]);
        $this->set('taxCollection', $taxCollection);
        $this->set('_serialize', ['taxCollection']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Auth->user();

        $this->loadModel('TaxSettings');
        $this->loadModel('TaxAssessments');
        $this->loadModel('Owners');
        $this->loadModel('Apartments');
        $this->loadModel('Plots');
        $this->loadModel('Buildings');
        $this->loadModel('Houses');
        $this->loadModel('TaxCollectionHistories');
        //$connect = ConnectionManager::get('default');
//        $q = "SELECT *
//                    FROM tax_assessments
//                    LEFT JOIN tax_collections ON tax_collections.owner_id = tax_assessments.owner_id
//                  WHERE tax_collections.owner_id  IS NULL";
//        $sql_execute = $connect->execute($q);
//        $tax_assessed = $sql_execute->fetchAll('assoc');
//        debug($tax_assessed); die;

//


        $tax_assessed = $this->TaxAssessments->find('all')
            ->contain(['Dohss', 'Owners', 'TaxSettings', 'TaxCollections', 'TaxCollectionHistories'
//            => function ($q) {
//                    return $q->where(['TaxCollectionHistories.status' => 1, 'TaxCollectionHistories.tax_assessment_id' => 'TaxAssessments.id']);
//                }
            ])
            ->where(['TaxAssessments.status' => 1])->toArray();

        $this->set('tax_assessed', $tax_assessed);
        //  debug($tax_assessed);

        if ($this->request->is('post')) {
            $data = $this->request->data;
            //debug($data); die;
            $data['collection_date'] = Date::now();
            $time = time();
            foreach ($data['TaxCollection'] as $key => $value) {
                $taxCollection = $this->TaxCollections->newEntity();
                $taxCollection_histories = $this->TaxCollectionHistories->newEntity();

                $collection_data['owner_id'] = $key;
                $collection_data['economic_year'] = $value['economic_year'];
                $collection_data['assessed_amount'] = $value['assessed_amount'];
                $collection_data['base_amount'] = $value['base_amount'];
                $collection_data['tax_settings_id'] = $value['tax_settings_id'];
                $collection_data['tax_assessment_id'] = $value['tax_assessment_id'];
                $collection_data['total_amount'] = $value['total_amount']+$value['prev_amount'];
                $collection_data['create_time'] = $time;
                $collection_data['collection_date'] = $data['collection_date'];
                $collection_data['collected_by'] = $user['id'];
                $collection_data['status'] = 1;


                $collection_history_data['owner_id'] = $key;
                $collection_history_data['base_amount'] = $value['base_amount'];
                $collection_history_data['rebet_amount'] = $value['rebet_amount'];
                $collection_history_data['late_fee_amount'] = $value['late_fee_amount'];
                $collection_history_data['fine_amount'] = $value['fine_amount'];
                $collection_history_data['tax_assessment_id'] = $value['tax_assessment_id'];
                $collection_history_data['collected_amount'] = $value['total_amount'];
                // $collection_history_data['create_time'] = $time;
                $collection_history_data['collection_date'] = $data['collection_date'];
                $collection_history_data['collected_by'] = $user['id'];
                $collection_history_data['status'] = 1;


                $taxCollection = $this->TaxCollections->patchEntity($taxCollection, $collection_data);

                $taxCollection_histories = $this->TaxCollectionHistories->patchEntity($taxCollection_histories, $collection_history_data);

                if ($this->TaxCollectionHistories->save($taxCollection_histories)) {

                  // $this->TaxCollections->save($taxCollection);
                    $this->Flash->success('The tax collection has been saved.');
                } else {
                    $this->Flash->error('The tax collection could not be saved. Please, try again.');
                }

            }
            return $this->redirect(['action' => 'index']);
        }

    }

    /**
     * Edit method
     *
     * @param string|null $id Tax Collection id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Auth->user();
        $time = time();
        $taxCollection = $this->TaxCollections->get($id, [
            'contain' => ['Owners', 'TaxAssessments']
        ]);

        $taxCollection['collection_date'] = $this->Common->bn_to_en($taxCollection['collection_date']);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            $data['update_by'] = $user['id'];
            $data['update_date'] = $time;
            $taxCollection = $this->TaxCollections->patchEntity($taxCollection, $data);
            if ($this->TaxCollections->save($taxCollection)) {
                $this->Flash->success('The tax collection has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The tax collection could not be saved. Please, try again.');
            }
        }
        $owners = $this->TaxCollections->Owners->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('taxCollection', 'owners'));
        $this->set('_serialize', ['taxCollection']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tax Collection id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $taxCollection = $this->TaxCollections->get($id);

        $user = $this->Auth->user();
        $data = $this->request->data;
        $data['updated_by'] = $user['id'];
        $data['updated_date'] = time();
        $data['status'] = 99;
        $taxCollection = $this->TaxCollections->patchEntity($taxCollection, $data);
        if ($this->TaxCollections->save($taxCollection)) {
            $this->Flash->success('The tax collection has been deleted.');
        } else {
            $this->Flash->error('The tax collection could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function resetCollections()
    {
        $this->autoRender = false;

        if ($this->TaxCollections->deleteAll()) {
            $this->Flash->success('All tax Collections are deleted.');
        } else {
            $this->Flash->error('Tax collections could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
