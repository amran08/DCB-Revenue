<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TaxSettings Controller
 *
 * @property \App\Model\Table\TaxSettingsTable $TaxSettings
 */
class TaxSettingsController extends AppController
{

    public $paginate = [
        'limit' => 15,
        'order' => [
            'TaxSettings.id' => 'desc'
        ]
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $taxSettings = $this->TaxSettings->find('all', [
            'conditions' => ['TaxSettings.status !=' => 99]
        ]);
        $this->set('taxSettings', $this->paginate($taxSettings));
        $this->set('_serialize', ['taxSettings']);
    }

    /**
     * View method
     *
     * @param string|null $id Tax Setting id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Auth->user();
        $taxSetting = $this->TaxSettings->get($id, [
            'contain' => []
        ]);
        $this->set('taxSetting', $taxSetting);
        $this->set('_serialize', ['taxSetting']);
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
        $taxSetting = $this->TaxSettings->newEntity();

        if ($this->request->is('post')) {

            $data = $this->request->data;
            $data['create_by'] = $user['id'];
            $data['create_time'] = $time;
            $taxSetting = $this->TaxSettings->patchEntity($taxSetting, $data);
            if ($this->TaxSettings->save($taxSetting)) {
                $this->Flash->success('The tax setting has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The tax setting could not be saved. Please, try again.');
            }
        }
        $this->set(compact('taxSetting'));
        $this->set('_serialize', ['taxSetting']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tax Setting id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Auth->user();
        $time = time();
        $taxSetting = $this->TaxSettings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            $data['update_by'] = $user['id'];
            $data['update_time'] = $time;
            $taxSetting = $this->TaxSettings->patchEntity($taxSetting, $data);
            if ($this->TaxSettings->save($taxSetting)) {
                $this->Flash->success('The tax setting has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The tax setting could not be saved. Please, try again.');
            }
        }
        $this->set(compact('taxSetting'));
        $this->set('_serialize', ['taxSetting']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tax Setting id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $taxSetting = $this->TaxSettings->get($id);

        $user = $this->Auth->user();
        $data = $this->request->data;
        $data['updated_by'] = $user['id'];
        $data['updated_date'] = time();
        $data['status'] = 99;
        $taxSetting = $this->TaxSettings->patchEntity($taxSetting, $data);
        if ($this->TaxSettings->save($taxSetting)) {
            $this->Flash->success('The tax setting has been deleted.');
        } else {
            $this->Flash->error('The tax setting could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
