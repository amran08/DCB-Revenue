<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * BuildingFiles Controller
 *
 * @property \App\Model\Table\BuildingFilesTable $BuildingFiles
 */
class BuildingFilesController extends AppController {

    public $paginate = [
        'limit' => 15,
        'order' => [
            'BuildingFiles.id' => 'desc'
        ]
    ];

    public function initialize() {
        parent::initialize(); // 

        $this->loadComponent('FileUpload');
        $this->loadComponent('RequestHandler');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $buildingFiles = $this->BuildingFiles->find('all', [
            'conditions' => ['BuildingFiles.status !=' => 99],
            'contain' => ['Buildings']
        ]);
        $this->set('buildingFiles', $this->paginate($buildingFiles));
        $this->set('_serialize', ['buildingFiles']);
    }

    /**
     * View method
     *
     * @param string|null $id Building File id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Auth->user();
        $buildingFile = $this->BuildingFiles->get($id, [
            'contain' => ['Buildings']
        ]);
        $this->set('buildingFile', $buildingFile);
        $this->set('_serialize', ['buildingFile']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $user = $this->Auth->user();
        $time = time();
        $buildingFile = $this->BuildingFiles->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $data['create_by'] = $user['id'];
            $data['create_date'] = $time;
            $buildingFile = $this->BuildingFiles->patchEntity($buildingFile, $data);
            if ($this->BuildingFiles->save($buildingFile)) {
                $this->Flash->success('The building file has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The building file could not be saved. Please, try again.');
            }
        }
        $buildings = $this->BuildingFiles->Buildings->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('buildingFile', 'buildings'));
        $this->set('_serialize', ['buildingFile']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Building File id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {

        $this->BuildingFiles->validator()->remove('file_url');
        $user = $this->Auth->user();
        $time = time();
        $buildingFile = $this->BuildingFiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $data = $this->request->data;

            $data['update_by'] = $user['id'];
            $data['update_date'] = $time;
            if ($data['file_url']['error']!=4) {                
                $result = $this->FileUpload->upload_multiple_file_any_mime($data['file_url'], 'u_load/building_files');
                $data['file_url'] = $result['file_name'];
            }
            else{
                
                $data['file_url']  = $buildingFile['file_url'];
            }
            
            
            $buildingFile = $this->BuildingFiles->patchEntity($buildingFile, $data);
            if ($this->BuildingFiles->save($buildingFile)) {
                $this->Flash->success('The building file has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The building file could not be saved. Please, try again.');
            }
        }
        $buildings = $this->BuildingFiles->Buildings->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('buildingFile', 'buildings'));
        $this->set('_serialize', ['buildingFile']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Building File id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {

        $buildingFile = $this->BuildingFiles->get($id);

        $user = $this->Auth->user();
        $data = $this->request->data;
        $data['updated_by'] = $user['id'];
        $data['updated_date'] = time();
        $data['status'] = 99;
        $buildingFile = $this->BuildingFiles->patchEntity($buildingFile, $data);
        if ($this->BuildingFiles->save($buildingFile)) {
            $this->Flash->success('The building file has been deleted.');
        } else {
            $this->Flash->error('The building file could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

}
