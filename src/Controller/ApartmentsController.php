<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Datasource\ConnectionManager;

/**
 * Apartments Controller
 *
 * @property \App\Model\Table\ApartmentsTable $Apartments
 */
class ApartmentsController extends AppController
{

    public $paginate = [
        'limit' => 15,
        'order' => [
            'Apartments.id' => 'desc'
        ]
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        parent::initialize();
        $this->loadComponent('Search.Prg', [
            'actions' => ['index']
        ]);
        $apartments = $this->Apartments
            ->find('search', ['search' => $this->Common->bn_to_en($this->request->data)])
            ->contain(['Dohss', 'Buildings'])
            ->where(['Apartments.status !=' => 99]);

        if ($this->request->is('post')) {
        }
        $dohs = $this->Apartments->Dohss->find('list', ['conditions' => ['status' => 1]]);
        $buildings_list = $this->Apartments->Buildings->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('dohs', 'buildings_list'));
        $this->set('apartments', $this->paginate($apartments));
        $this->set('_serialize', ['apartments']);
    }

    /**
     * View method
     *
     * @param string|null $id Apartment id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Auth->user();
        $apartment = $this->Apartments->get($id, [
            'contain' => ['Dohss', 'Buildings']
        ]);


        $this->set('apartment', $apartment);
        $this->set('_serialize', ['apartment']);

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
        $apartment = $this->Apartments->newEntity();
        if ($this->request->is('post')) {

            $data = $this->request->data;
            $data['create_by'] = $user['id'];
            $data['create_time'] = Time::now();

            $data['apartment_number'] = $this->Common->bn_to_en($data['apartment_number']);
            $data['floor_number'] = $this->Common->bn_to_en($data['floor_number']);
            $data['monthly_rent'] = $this->Common->bn_to_en($data['monthly_rent']);
            $data['floor_position'] = $this->Common->bn_to_en($data['floor_position']);
            $data['total_area'] = $this->Common->bn_to_en($data['total_area']);

            $apartment = $this->Apartments->patchEntity($apartment, $data);
            if ($this->Apartments->save($apartment)) {
                $this->Flash->success('The apartment has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The apartment could not be saved. Please, try again.');
            }
        }
        $dohs = $this->Apartments->Dohss->find('list', ['conditions' => ['status' => 1]]);
        $buildings = $this->Apartments->Buildings->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('apartment', 'dohs', 'buildings'));
        $this->set('_serialize', ['apartment']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Apartment id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Auth->user();

        $apartment = $this->Apartments->get($id, [
            'contain' => ['Dohss', 'Buildings']
        ]);
        $apartment['apartment_number'] = $this->Common->en_to_bn($apartment['apartment_number']);
        $apartment['floor_number'] = $this->Common->en_to_bn($apartment['floor_number']);
        $apartment['monthly_rent'] = $this->Common->en_to_bn($apartment['monthly_rent']);
        $apartment['floor_position'] = $this->Common->en_to_bn($apartment['floor_position']);
        $apartment['total_area'] = $this->Common->en_to_bn($apartment['total_area']);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            $data['update_by'] = $user['id'];
            $data['update_time'] = Time::now();

            $data['apartment_number'] = $this->Common->bn_to_en($data['apartment_number']);
            $data['floor_number'] = $this->Common->bn_to_en($data['floor_number']);
            $data['monthly_rent'] = $this->Common->bn_to_en($data['monthly_rent']);
            $data['floor_position'] = $this->Common->bn_to_en($data['floor_position']);
            $data['total_area'] = $this->Common->bn_to_en($data['total_area']);

            $apartment = $this->Apartments->patchEntity($apartment, $data);

            if ($this->Apartments->save($apartment)) {
                $this->Flash->success('The apartment has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The apartment could not be saved. Please, try again.');
            }
        }
        $dohs = $this->Apartments->Dohss->find('list', ['conditions' => ['status' => 1]]);
        $buildings = $this->Apartments->Buildings->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('apartment', 'dohs', 'buildings'));
        $this->set('_serialize', ['apartment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Apartment id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->loadModel('Owners');
        $apartment = $this->Apartments->get($id);

        $user = $this->Auth->user();
        $data = $this->request->data;
        $data['updated_by'] = $user['id'];
        $data['updated_date'] = time();
        $data['status'] = 99;
        $apartment = $this->Apartments->patchEntity($apartment, $data);
        $conn = ConnectionManager::get('default');
        $conn->transactional(function ($conn) use ($apartment) {

            if ($this->Apartments->save($apartment)) {
                $this->Owners->updateAll(
                    ['status' => 99],
                    ['property_type_table_name' => 'Apartments', 'property_id' => $apartment->id]
                );
                $this->Flash->success('The apartment has been deleted.');
            } else {
                $this->Flash->error('The apartment could not be deleted. Please, try again.');
            }
            return $this->redirect(['action' => 'index']);

        });

    }
}
