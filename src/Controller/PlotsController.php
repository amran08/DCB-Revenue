<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Plots Controller
 *
 * @property \App\Model\Table\PlotsTable $Plots
 */
class PlotsController extends AppController {

    public $paginate = [
        'limit' => 15,
        'order' => [
            'Plots.id' => 'desc'
        ]
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $plots = $this->Plots->find('all', [
            //'conditions' =>['Plots.status !=' => 99],
            'contain' => ['Districts', 'Upazilas', 'RsMoujas', 'Dohss', 'LandType']
        ]);
        $this->set('plots', $this->paginate($plots));
        $this->set('_serialize', ['plots']);
    }

    /**
     * View method
     *
     * @param string|null $id Plot id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Auth->user();
        $plot = $this->Plots->get($id, [
            'contain' => ['Districts', 'Upazilas', 'RsMoujas', 'Dohss', 'LandType']
        ]);
        $this->set('plot', $plot);
        $this->set('_serialize', ['plot']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $user = $this->Auth->user();
        $time = time();
        $plot = $this->Plots->newEntity();
        if ($this->request->is('post')) {

            $data = $this->request->data;
            $data['create_by'] = $user['id'];
            $data['create_date'] = $time;
            $plot = $this->Plots->patchEntity($plot, $data);
            if ($this->Plots->save($plot)) {
                $this->Flash->success('The plot has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The plot could not be saved. Please, try again.');
            }
        }
        $districts = $this->Plots->Districts->find('list');
        $upazilas = $this->Plots->Upazilas->find('list');
        $moujas = $this->Plots->RsMoujas->find('list', ['conditions' => ['status' => 1]]);
        $dohs = $this->Plots->Dohss->find('list', ['conditions' => ['status' => 1]]);
        $landTypes = $this->Plots->LandType->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('plot', 'districts', 'upazilas', 'moujas', 'dohs', 'landTypes'));
        $this->set('_serialize', ['plot']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Plot id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Auth->user();
        $time = time();
        $plot = $this->Plots->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            $data['update_by'] = $user['id'];
            $data['update_date'] = $time;
            $plot = $this->Plots->patchEntity($plot, $data);
            if ($this->Plots->save($plot)) {
                $this->Flash->success('The plot has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The plot could not be saved. Please, try again.');
            }
        }
        $districts = $this->Plots->Districts->find('list');
        $upazilas = $this->Plots->Upazilas->find('list');
        $moujas = $this->Plots->RsMoujas->find('list', ['conditions' => ['status' => 1]]);
        $dohs = $this->Plots->Dohss->find('list', ['conditions' => ['status' => 1]]);
        $landTypes = $this->Plots->LandType->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('plot', 'districts', 'upazilas', 'moujas', 'dohs', 'landTypes'));
        $this->set('_serialize', ['plot']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Plot id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {

        $plot = $this->Plots->get($id);

        $user = $this->Auth->user();
        $data = $this->request->data;
        $data['updated_by'] = $user['id'];
        $data['updated_date'] = time();
        $data['status'] = 99;
        $plot = $this->Plots->patchEntity($plot, $data);
        if ($this->Plots->save($plot)) {
            $this->Flash->success('The plot has been deleted.');
        } else {
            $this->Flash->error('The plot could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

}
