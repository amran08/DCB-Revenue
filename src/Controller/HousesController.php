<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * Houses Controller
 *
 * @property \App\Model\Table\HousesTable $Houses
 */
class HousesController extends AppController
{

    public $paginate = [
        'limit' => 15,
        'order' => [
            'Houses.id' => 'desc'
        ]
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $houses = $this->Houses->find('all', [
            'conditions' => ['Houses.status !=' => 99],
            'contain' => ['Dohss', 'Buildings']
        ]);
        // debug($houses->toArray()); die;
        $this->set('houses', $this->paginate($houses));
        $this->set('_serialize', ['houses']);
    }

    /**
     * View method
     *
     * @param string|null $id House id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Auth->user();
        $house = $this->Houses->get($id, [
            'contain' => ['Dohss', 'Buildings']
        ]);
        $this->set('house', $house);
        $this->set('_serialize', ['house']);
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
        $house = $this->Houses->newEntity();
        if ($this->request->is('post')) {

            $data = $this->request->data;

            $data['house_number'] = $this->Common->bn_to_en($data['house_number']);
            $data['floor_number'] = $this->Common->bn_to_en($data['floor_number']);
            $data['total_area'] = $this->Common->bn_to_en($data['total_area']);
//            $data['create_by'] = $user['id'];

            $data['create_time'] = $time;
            $house = $this->Houses->patchEntity($house, $data);
            if ($this->Houses->save($house)) {
                $this->Flash->success('The house has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The house could not be saved. Please, try again.');
            }
        }
        $this->loadModel('Districts');
        $dohss = $this->Houses->Dohss->find('list', ['conditions' => ['status' => 1]]);
        $districts = $this->Districts->find('list');
        //$buildings = $this->Houses->Buildings->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('house', 'dohss', 'buildings', 'districts'));
        $this->set('_serialize', ['house']);
    }

    /**
     * Edit method
     *
     * @param string|null $id House id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Auth->user();
        $time = time();
        $house = $this->Houses->get($id, [
            'contain' => []
        ]);

        $house['house_number'] = $this->Common->en_to_bn($house['house_number']);
        $house['floor_number'] = $this->Common->en_to_bn($house['floor_number']);
        $house['total_area'] = $this->Common->en_to_bn($house['total_area']);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
//            $data['update_by'] = $user['id'];
            $data['update_time'] = $time;
            $data['house_number'] = $this->Common->bn_to_en($data['house_number']);
            $data['floor_number'] = $this->Common->bn_to_en($data['floor_number']);
            $data['total_area'] = $this->Common->bn_to_en($data['total_area']);

            $house = $this->Houses->patchEntity($house, $data);
            if ($this->Houses->save($house)) {
                $this->Flash->success('The house has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The house could not be saved. Please, try again.');
            }
        }
        $this->loadModel('Districts');
        $dohss = $this->Houses->Dohss->find('list', ['conditions' => ['status' => 1]]);
        $districts = $this->Districts->find('list');
        $buildings = $this->Houses->Buildings->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('house', 'dohss', 'buildings', 'districts'));
        $this->set('_serialize', ['house']);
    }

    public function buildingList($dohs_id)
    {
        $this->autoRender = false;

        $this->loadModel('Buildings');
        $buildings = $this->Buildings->find('all', [

            'conditions' => ['Buildings.dohs_id' => $dohs_id]
        ])->select(['id', 'title_en', 'title_bn'])->toArray();

        $this->response->body(json_encode($buildings));
    }

    /**
     * Delete method
     *
     * @param string|null $id House id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->loadModel('Owners');
        $house = $this->Houses->get($id);

        $user = $this->Auth->user();
        $data = $this->request->data;
        $data['updated_by'] = $user['id'];
        $data['updated_date'] = time();
        $data['status'] = 99;
        $house = $this->Houses->patchEntity($house, $data);
        $conn = ConnectionManager::get('default');
        $conn->transactional(function ($conn) use ($house) {
            if ($this->Houses->save($house)) {
                $this->Owners->updateAll(
                    ['status' => 99],
                    ['property_type_table_name' => 'Houses', 'property_id' => $house->id]
                );
                $this->Flash->success('The house has been deleted.');
            } else {
                $this->Flash->error('The house could not be deleted. Please, try again.');
            }
            return $this->redirect(['action' => 'index']);
        });
    }

}
