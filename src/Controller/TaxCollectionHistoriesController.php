<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TaxCollectionHistories Controller
 *
 * @property \App\Model\Table\TaxCollectionHistoriesTable $TaxCollectionHistories
 */
class TaxCollectionHistoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */


    public function index()
    {
        $this->paginate = [
            'contain' => ['Owners', 'TaxAssessments']
        ];
        $taxCollectionHistories = $this->paginate($this->TaxCollectionHistories);

        $this->set(compact('taxCollectionHistories'));
        $this->set('_serialize', ['taxCollectionHistories']);
    }

    /**
     * View method
     *
     * @param string|null $id Tax Collection History id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $taxCollectionHistory = $this->TaxCollectionHistories->get($id, [
            'contain' => ['Owners', 'TaxAssessments']
        ]);

        $this->set('taxCollectionHistory', $taxCollectionHistory);
        $this->set('_serialize', ['taxCollectionHistory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $taxCollectionHistory = $this->TaxCollectionHistories->newEntity();
        if ($this->request->is('post')) {
            $taxCollectionHistory = $this->TaxCollectionHistories->patchEntity($taxCollectionHistory, $this->request->data);
            if ($this->TaxCollectionHistories->save($taxCollectionHistory)) {
                $this->Flash->success(__('The tax collection history has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tax collection history could not be saved. Please, try again.'));
            }
        }
        $owners = $this->TaxCollectionHistories->Owners->find('list', ['limit' => 200]);
        $taxAssessments = $this->TaxCollectionHistories->TaxAssessments->find('list', ['limit' => 200]);
        $this->set(compact('taxCollectionHistory', 'owners', 'taxAssessments'));
        $this->set('_serialize', ['taxCollectionHistory']);
    }

    /**
     * Edit method
     *
     * @param string|null $assessment_id Tax Collection History id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($assessment_id)
    {
        $this->loadModel('TaxAssessments');

        $taxCollectionHistory = $this->TaxCollectionHistories->find('all')
            ->contain(['TaxAssessments', 'Owners'])
            ->where(['TaxCollectionHistories.tax_assessment_id' => $assessment_id])->toArray();

        if ($this->request->is(['patch', 'post', 'put'])) {
            // $taxCollectionHistory = $this->TaxCollectionHistories->patchEntity($taxCollectionHistory, $this->request->data);
            //if ($this->TaxCollectionHistories->save($taxCollectionHistory)) {
            //  $this->Flash->success(__('The tax collection history has been saved.'));
            //return $this->redirect(['action' => 'index']);
            //} else {
            //  $this->Flash->error(__('The tax collection history could not be saved. Please, try again.'));
            // }
        }
        //  $owners = $this->TaxCollectionHistories->Owners->find('list', ['limit' => 200]);
        $owner_name_property = $this->TaxCollectionHistories->find('all')
            ->contain('Owners')
            ->where(['TaxCollectionHistories.tax_assessment_id' => $assessment_id])->first()->toArray();
        $this->set(compact('taxCollectionHistory', 'owner_name_property', 'taxAssessments'));
        $this->set('_serialize', ['taxCollectionHistory']);
    }

    public function collectionHistoriesSingleAssessment($assessment_id)
    {
        $this->autoRender = false;
        $this->loadModel('TaxAssessments');

        $collections = $this->TaxCollectionHistories->find('all')
            ->contain(['TaxAssessments', 'Owners'])
            ->where(['TaxCollectionHistories.tax_assessment_id' => $assessment_id])->toArray();

        ///$this->response->body(json_encode($collections));
        // debug($collections);

    }

    /**
     * Delete method
     *
     * @param string|null $id Tax Collection History id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $taxCollectionHistory = $this->TaxCollectionHistories->get($id);
        if ($this->TaxCollectionHistories->delete($taxCollectionHistory)) {
            $this->Flash->success(__('The tax collection history has been deleted.'));
        } else {
            $this->Flash->error(__('The tax collection history could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
