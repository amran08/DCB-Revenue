<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Buildings Controller
 *
 * @property \App\Model\Table\BuildingsTable $Buildings
 */
class BuildingsController extends AppController {

    public $paginate = [
        'limit' => 15,
        'order' => [
            'Buildings.id' => 'desc'
        ]
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $buildings = $this->Buildings->find('all', [
            'conditions' => ['Buildings.status !=' => 99],
            'contain' => ['Dohss', 'Developers']
        ]);
        $this->set('buildings', $this->paginate($buildings));
        $this->set('_serialize', ['buildings']);
    }

    /**
     * View method
     *
     * @param string|null $id Building id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Auth->user();
        $building = $this->Buildings->get($id, [
            'contain' => ['Dohss']
        ]);
        $this->set('building', $building);
        $this->set('_serialize', ['building']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {

        $user = $this->Auth->user();
        $time = Time::now();
        $building = $this->Buildings->newEntity();
        if ($this->request->is('post')) {

            $data = $this->request->data;
            //$data['create_by'] = $user['id'];
            $data['create_time'] = $time;
            debug($data);
            $building = $this->Buildings->patchEntity($building, $data);
            if ($this->Buildings->save($building)) {
                $this->Flash->success('The building has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The building could not be saved. Please, try again.');
            }
        }
        $dohss = $this->Buildings->Dohss->find('list', ['conditions' => ['status' => 1]]);
        $developers = $this->Buildings->Developers->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('building', 'dohss', 'developers'));
        $this->set('_serialize', ['building']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Building id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Auth->user();
        $time = Time::now();
        $building = $this->Buildings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            $data['update_time'] = $time;

            $data['plan_approve_date'] = Time::parseDate($data['plan_approve_date'], 'yyyy-mm-dd');
           
            $building = $this->Buildings->patchEntity($building, $data);
            if ($this->Buildings->save($building)) {
                $this->Flash->success('The building has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The building could not be saved. Please, try again.');
            }
        }
        $dohss = $this->Buildings->Dohss->find('list', ['conditions' => ['status' => 1]]);
        $developers = $this->Buildings->Developers->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('building', 'dohss', 'developers'));
        $this->set('_serialize', ['building']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Building id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {

        $building = $this->Buildings->get($id);

        $user = $this->Auth->user();
        $data = $this->request->data;
        $data['updated_by'] = $user['id'];
        $data['updated_date'] = time();
        $data['status'] = 99;
        $building = $this->Buildings->patchEntity($building, $data);
        if ($this->Buildings->save($building)) {
            $this->Flash->success('The building has been deleted.');
        } else {
            $this->Flash->error('The building could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

}
