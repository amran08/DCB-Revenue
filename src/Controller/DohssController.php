<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\File;

/**
 * Dohss Controller
 *
 * @property \App\Model\T)able\DohssTable $Dohss
 */
class DohssController extends AppController {

    public function initialize() {
        parent::initialize(); // 

        $this->loadComponent('FileUpload');
        $this->loadComponent('RequestHandler');
    }

    public $paginate = [
        'limit' => 15,
        'order' => [
            'Dohss.id' => 'desc'
        ]
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $dohss = $this->Dohss->find('all', [
            'conditions' => ['Dohss.status !=' => 99]
        ]);
        // debug($dohss);
        $this->set('dohss', $this->paginate($dohss));
        $this->set('_serialize', ['dohss']);
    }

    /**
     * View method
     *
     * @param string|null $id Dohs id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Auth->user();
        $dohs = $this->Dohss->get($id, [
            'contain' => []
        ]);
        $this->set('dohs', $dohs);
        $this->set('_serialize', ['dohs']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $user = $this->Auth->user();
        $time = time();
        $dohs = $this->Dohss->newEntity();
        if ($this->request->is('post')) {

            $data = $this->request->data;
            //$data['create_by'] = $user['id'];
            $data['create_time'] = $time;
            $result = $this->FileUpload->upload_file($data['map_file'], 'u_load/map_files', ['jpg', 'png']);

            //echo "<pre>";print_r($result);die();
            $data['map_file'] = $result['file_name'];


            $dohs = $this->Dohss->patchEntity($dohs, $data);

            if ($this->Dohss->save($dohs)) {
                $this->Flash->success('The dohs has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The dohs could not be saved. Please, try again.');
            }
        }
        $this->set(compact('dohs'));
        $this->set('_serialize', ['dohs']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Dohs id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {

        $this->Dohss->validator()->remove('map_file');

        $user = $this->Auth->user();
        $time = time();
        $dohs = $this->Dohss->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            //$data['update_by'] = $user['id'];
            $data['update_time'] = $time;
//there must be file during new entry of dohs 

            if (empty($data['map_file']['name'])) {
                echo "empty";
                $data['map_file'] = $dohs['map_file'];
            } else {
                $previous_file_location = WWW_ROOT . 'u_load/map_files/' . $dohs['map_file'];
                unlink($previous_file_location); //deleting previous file

                $result = $this->FileUpload->upload_file($data['map_file'], 'u_load/map_files', ['jpg', 'png']);
                $data['map_file'] = $result['file_name'];
            }

            $dohs = $this->Dohss->patchEntity($dohs, $data);
            if ($this->Dohss->save($dohs)) {
                $this->Flash->success('The dohs has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The dohs could not be saved. Please, try again.');
            }
        }
        $this->set(compact('dohs'));
        $this->set('_serialize', ['dohs']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Dohs id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {

        $dohs = $this->Dohss->get($id);

        $user = $this->Auth->user();
        $data = $this->request->data;
        $data['updated_by'] = $user['id'];
        $data['updated_date'] = time();
        $data['status'] = 99;
        $dohs = $this->Dohss->patchEntity($dohs, $data);
        if ($this->Dohss->save($dohs)) {
            $this->Flash->success('The dohs has been deleted.');
        } else {
            $this->Flash->error('The dohs could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

}
