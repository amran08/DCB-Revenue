<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Owners Controller
 *
 * @property \App\Model\Table\OwnersTable $Owners
 */
class OwnersController extends AppController
{

    public $paginate = [
        'limit' => 15,
        'order' => [
            'Owners.id' => 'desc'
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

//
//        $owners = $this->Owners->find('all', [
//            'conditions' => ['Owners.status !=' => 99],
//            ///'contain' => [ 'HoldingNumbers']
//        ]);

        $owners = $this->Owners
            ->find('search', ['search' => $this->Common->bn_to_en($this->request->data)])
            ->where(['Owners.status !=' => 99]);
          //  ->contain(['Districts', 'Upazilas', 'RsMoujas', 'Dohss', 'LandType']);
        // debug($owners->toArray());

        $this->set('owners', $this->paginate($owners));
        $this->set('_serialize', ['owners']);
    }

    /**
     * View method
     *
     * @param string|null $id Owner id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Auth->user();
        $owner = $this->Owners->get($id, [
            //'contain' => ['Properties', 'HoldingNumbers']
        ]);
        $this->set('owner', $owner);
        $this->set('_serialize', ['owner']);
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
        $owner = $this->Owners->newEntity();
        $this->loadModel('Dohss');
        $this->loadModel('Buildings');
        if ($this->request->is('post')) {

            $data = $this->request->data;
            $data['create_by'] = $user['id'];
            $data['create_date'] = $time;

            $data['own_percentage'] = $this->Common->bn_to_en($data['own_percentage']);
            $data['apartment_owned'] = $this->Common->bn_to_en($data['apartment_owned']);
            $data['nid'] = $this->Common->bn_to_en($data['nid']);
            $data['mobile_number'] = $this->Common->bn_to_en($data['mobile_number']);
            $data['phone_number'] = $this->Common->bn_to_en($data['phone_number']);

            // $data['property_type_table_name'] = $this->Common->bn_to_en($data['property_type']);


            $owner = $this->Owners->patchEntity($owner, $data);
            if ($this->Owners->save($owner)) {
                $this->Flash->success('The owner has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The owner could not be saved. Please, try again.');
            }
        }
        $dohs = $this->Dohss->find('list', ['conditions' => ['status' => 1]]);
        //$holdingNumbers = $this->Owners->HoldingNumbers->find('list', ['conditions' => ['status' => 1]]);
       // $buildings = $this->Buildings->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('owner', 'properties', 'dohs','buildings'));
        $this->set('_serialize', ['owner']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Owner id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('Dohss');
        $user = $this->Auth->user();
        $time = time();
        $owner = $this->Owners->get($id, [
            'contain' => []
        ]);
        $owner['own_percentage'] = $this->Common->en_to_bn($owner['own_percentage']);
        $owner['apartment_owned'] = $this->Common->en_to_bn($owner['apartment_owned']);
        $owner['nid'] = $this->Common->en_to_bn($owner['nid']);
        $owner['mobile_number'] = $this->Common->en_to_bn($owner['mobile_number']);
        $owner['phone_number'] = $this->Common->en_to_bn($owner['phone_number']);

        //default language is bangla.So dates are converted to bn. but we are saving date like 2012-2-11;
        //so converting bn date to en


         $owner['last_mutation_date'] = $this->Common->bn_to_en($owner['last_mutation_date']);
        $owner['dob'] = $this->Common->bn_to_en($owner['dob']);
        $owner['own_date'] = $this->Common->bn_to_en($owner['own_date']);
        $owner['lease_expire_date'] = $this->Common->bn_to_en($owner['lease_expire_date']);

        if ($owner['property_type_table_name'] == 'Apartments') {

            $this->loadModel('Apartments');
            $property_type = "Apartments";
            $this->set('property_type', $property_type);

            $property_id = $this->Apartments->find('list', ['conditions' => ['Apartments.id' => $owner['property_id']]])->toArray();
            $this->set('property_id', $property_id);

        }
        if ($owner['property_type_table_name'] == 'Buildings') {
            $property_type = "Buildings";
            $this->set('property_type', $property_type);

        }
        if ($owner['property_type_table_name'] == 'Shops') {
            $property_type = "Shops";
            $this->set('property_type', $property_type);

        }

        if ($owner['property_type_table_name'] == 'Plots') {
            $property_type = "Plots";
            $this->set('property_type', $property_type);

        }

        if ($owner['property_type_table_name'] == 'Houses') {
            $property_type = "Houses";
            $this->set('property_type', $property_type);

        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            if($data['property_id']=="")
            {
                $data['property_id'] = $owner['property_id'];
            }
            $data['update_by'] = $user['id'];
            $data['update_date'] = $time;
            $data['own_percentage'] = $this->Common->bn_to_en($data['own_percentage']);
            $data['apartment_owned'] = $this->Common->bn_to_en($data['apartment_owned']);
            $data['nid'] = $this->Common->bn_to_en($data['nid']);
            $data['mobile_number'] = $this->Common->bn_to_en($data['mobile_number']);
            $data['phone_number'] = $this->Common->bn_to_en($data['phone_number']);
            $owner['last_mutation_date'] = $this->Common->bn_to_en($owner['last_mutation_date']);

            $owner = $this->Owners->patchEntity($owner, $data);
            if ($this->Owners->save($owner)) {
                $this->Flash->success('The owner has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The owner could not be saved. Please, try again.');
            }
        }
        // $properties = $this->Owners->Properties->find('list', ['conditions' => ['status' => 1]]);
        // $holdingNumbers = $this->Owners->HoldingNumbers->find('list', ['conditions' => ['status' => 1]]);
        $dohs = $this->Dohss->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('owner', 'properties', 'dohs'));
        $this->set('_serialize', ['owner']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Owner id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $owner = $this->Owners->get($id);

        $user = $this->Auth->user();
        $data = $this->request->data;
        $data['updated_by'] = $user['id'];
        $data['updated_date'] = time();
        $data['status'] = 99;
        $owner = $this->Owners->patchEntity($owner, $data);
        if ($this->Owners->save($owner)) {
            $this->Flash->success('The owner has been deleted.');
        } else {
            $this->Flash->error('The owner could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function getPlots($dohs_id)
    {
        $this->autoRender = false;
        $this->loadModel('Plots');
        $plots = $this->Plots->find('all', ['conditions' => ['Plots.dohs_id' => $dohs_id]])->select(['id', 'dohs_id', 'plot_number'])->toArray();
        $this->response->body(json_encode($plots));
    }

    public function getApartments($dohs_id, $building_id)
    {
        $this->autoRender = false;
        $this->loadModel('Apartments');
        $apartments = $this->Apartments->find('all', ['conditions' => ['Apartments.dohs_id' => $dohs_id, 'Apartments.building_id' => $building_id]])->select(['id', 'building_id', 'dohs_id', 'apartment_number'])->toArray();
        $this->response->body(json_encode($apartments));

    }

    public function getBuildings($dohs_id)
    {
        $this->autoRender = false;
        $this->loadModel('Buildings');
        $buildings = $this->Buildings->find('all', ['conditions' => ['Buildings.dohs_id' => $dohs_id,'Buildings.status'=>1]])->select(['id', 'dohs_id', 'title_bn'])->toArray();
        $this->response->body(json_encode($buildings));

    }
}
