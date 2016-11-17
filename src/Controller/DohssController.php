<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\File;

/**
 * Dohss Controller
 *
 * @property \App\Model\T)able\DohssTable $Dohss
 */
class DohssController extends AppController
{

    public function initialize()
    {
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
    public function index()
    {
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
    public function view($id = null)
    {
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
    public function add()
    {
        $user = $this->Auth->user();
        $time = time();
        $dohs = $this->Dohss->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            //$data['create_by'] = $user['id'];
            $data['create_time'] = $time;

            $data['total_plot_number'] = $this->Common->bn_to_en($data['total_plot_number']);
            $data['total_area'] = $this->Common->bn_to_en($data['total_area']);
            $data['total_building_number'] = $this->Common->bn_to_en($data['total_building_number']);
            $data['total_house_number'] = $this->Common->bn_to_en($data['total_house_number']);
            $data['total_plot_number'] = $this->Common->bn_to_en($data['total_plot_number']);
            $data['total_market_number'] = $this->Common->bn_to_en($data['total_plot_number']);
            $data['total_apartment_number'] = $this->Common->bn_to_en($data['total_apartment_number']);
            $data['total_shop_number'] = $this->Common->bn_to_en($data['total_shop_number']);

            $dohs = $this->Dohss->patchEntity($dohs, $data);
            if ($this->Dohss->save($dohs)) {
                $this->loadModel('DohsMaps');
                if ($data['map_file'][0]['name'] != 0) {

                    foreach ($data['map_file'] as $files) {
                        $dohs_files_save = $this->DohsMaps->newEntity();
                        $dohs_files['dohs_id'] = $dohs->id;
                        $result = $this->FileUpload->upload_multiple_file_any_mime($files, 'u_load/map_files');
                        $dohs_files['file_name'] = $result['file_name'];
                        $dohs_files['file_location'] = WWW_ROOT . "u_load/map_files" . DS . $result['file_name'];
                        // debug($dohs_files);
                        if (!empty($dohs_files['file_name'])) {
                            $dohs_files_save = $this->DohsMaps->patchEntity($dohs_files_save, $dohs_files);
                            $this->DohsMaps->save($dohs_files_save);
                        }
                    }
                }

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
    public function edit($id = null)
    {

        $this->Dohss->validator()->remove('map_file');

        $user = $this->Auth->user();
        $time = time();
        $dohs = $this->Dohss->get($id, [
            'contain' => ['DohsMaps']
        ]);
        $dohs['total_plot_number'] = $this->Common->en_to_bn($dohs['total_plot_number']);
        $dohs['total_area'] = $this->Common->en_to_bn($dohs['total_area']);
        $dohs['total_building_number'] = $this->Common->en_to_bn($dohs['total_building_number']);
        $dohs['total_house_number'] = $this->Common->en_to_bn($dohs['total_house_number']);
        $dohs['total_plot_number'] = $this->Common->en_to_bn($dohs['total_plot_number']);
        $dohs['total_market_number'] = $this->Common->en_to_bn($dohs['total_plot_number']);
        $dohs['total_apartment_number'] = $this->Common->en_to_bn($dohs['total_apartment_number']);
        $dohs['total_shop_number'] = $this->Common->en_to_bn($dohs['total_shop_number']);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            //$data['update_by'] = $user['id'];
            $data['total_plot_number'] = $this->Common->bn_to_en($data['total_plot_number']);
            $data['total_area'] = $this->Common->bn_to_en($data['total_area']);
            $data['total_building_number'] = $this->Common->bn_to_en($data['total_building_number']);
            $data['total_house_number'] = $this->Common->bn_to_en($data['total_house_number']);
            $data['total_plot_number'] = $this->Common->bn_to_en($data['total_plot_number']);
            $data['total_market_number'] = $this->Common->bn_to_en($data['total_plot_number']);
            $data['total_apartment_number'] = $this->Common->bn_to_en($data['total_apartment_number']);
            $data['total_shop_number'] = $this->Common->bn_to_en($data['total_shop_number']);
            $data['update_time'] = $time;

//there must be file during editing  of dohs 
//
//            if (empty($data['map_file']['name'])) {
//                echo "empty";
//                $data['map_file'] = $dohs['map_file'];
//            } else {
//                $previous_file_location = WWW_ROOT . 'u_load/map_files/' . $dohs['map_file'];
//
//                if (is_file($previous_file_location)) {
//                    unlink($previous_file_location); //deleting previous file
//                }
//                $result = $this->FileUpload->upload_file_any_mime($data['map_file'], 'u_load/map_files');
//                $data['map_file'] = $result['file_name'];
//            }

            $dohs = $this->Dohss->patchEntity($dohs, $data);

            if ($this->Dohss->save($dohs)) {
                $this->loadModel('DohsMaps');
                if ($data['map_file'][0]['name'] != 0) {

                    foreach ($data['map_file'] as $files) {

                        // if (!empty($files['map_file']['name'])) {
                        // echo "Aaaa";
                        $dohs_files_save = $this->DohsMaps->newEntity();
                        $dohs_files['dohs_id'] = $dohs->id;
                        $result = $this->FileUpload->upload_multiple_file_any_mime($files, 'u_load/map_files');
                        $dohs_files['file_name'] = $result['file_name'];
                        $dohs_files['file_location'] = WWW_ROOT . "u_load/map_files" . DS . $result['file_name'];
                        // debug($dohs_files);
                        if (!empty($dohs_files['file_name'])) {
                            $dohs_files_save = $this->DohsMaps->patchEntity($dohs_files_save, $dohs_files);
                            $this->DohsMaps->save($dohs_files_save);
                        }
                        //}
                    }
                }

                $this->Flash->success('The dohs has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The dohs could not be saved. Please, try again.');
            }
        }
        $this->set(compact('dohs'));
        $this->set('_serialize', ['dohs']);
    }

    public function RemoveMapfile()
    {

        $this->autoRender = false;
        $this->loadModel('DohsMaps');
        $file_name = $this->request->data['file'];
        $dohs_map_id = $this->request->data['dohs_map_id'];

        if (unlink(WWW_ROOT . 'u_load' . DS . 'map_files' . DS . $file_name)) {
            $entry = $this->DohsMaps->get($dohs_map_id);
            $this->DohsMaps->delete($entry);
            $this->response->body("Map File Deleted -->" . $file_name);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Dohs id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {

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
