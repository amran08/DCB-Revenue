<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * HoldingNumbers Controller
 *
 * @property \App\Model\Table\HoldingNumbersTable $HoldingNumbers
 */
class HoldingNumbersController extends AppController {

    public $paginate = [
        'limit' => 15,
        'order' => [
            'HoldingNumbers.id' => 'desc'
        ]
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $holdingNumbers = $this->HoldingNumbers->find('all', [
            'conditions' => ['HoldingNumbers.status !=' => 99],
            'contain' => ['Buildings']
        ]);
        $this->set('holdingNumbers', $this->paginate($holdingNumbers));
        $this->set('_serialize', ['holdingNumbers']);
    }

    /**
     * View method
     *
     * @param string|null $id Holding Number id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Auth->user();
        $holdingNumber = $this->HoldingNumbers->get($id, [
            'contain' => ['Buildings']
        ]);
        $this->set('holdingNumber', $holdingNumber);
        $this->set('_serialize', ['holdingNumber']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $user = $this->Auth->user();
        $time = time();
        $holdingNumber = $this->HoldingNumbers->newEntity();
        if ($this->request->is('post')) {

            $data = $this->request->data;
            $data['create_by'] = $user['id'];
            $data['create_time'] = $time;
            $holdingNumber = $this->HoldingNumbers->patchEntity($holdingNumber, $data);
            if ($this->HoldingNumbers->save($holdingNumber)) {
                $this->Flash->success('The holding number has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The holding number could not be saved. Please, try again.');
            }
        }

        $buildings = $this->HoldingNumbers->Buildings->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('holdingNumber', 'plots', 'buildings'));
        $this->set('_serialize', ['holdingNumber']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Holding Number id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Auth->user();
        $time = time();
        $holdingNumber = $this->HoldingNumbers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            $data['update_by'] = $user['id'];
            $data['update_time'] = $time;
            $holdingNumber = $this->HoldingNumbers->patchEntity($holdingNumber, $data);
            if ($this->HoldingNumbers->save($holdingNumber)) {
                $this->Flash->success('The holding number has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The holding number could not be saved. Please, try again.');
            }
        }

        $buildings = $this->HoldingNumbers->Buildings->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('holdingNumber', 'plots', 'buildings'));
        $this->set('_serialize', ['holdingNumber']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Holding Number id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {

        $holdingNumber = $this->HoldingNumbers->get($id);

        $user = $this->Auth->user();
        $data = $this->request->data;
        $data['updated_by'] = $user['id'];
        $data['updated_date'] = time();
        $data['status'] = 99;
        $holdingNumber = $this->HoldingNumbers->patchEntity($holdingNumber, $data);
        if ($this->HoldingNumbers->save($holdingNumber)) {
            $this->Flash->success('The holding number has been deleted.');
        } else {
            $this->Flash->error('The holding number could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

}
