<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ShopFiles Controller
 *
 * @property \App\Model\Table\ShopFilesTable $ShopFiles
 */
class ShopFilesController extends AppController
{

    public $paginate = [
        'limit' => 15,
        'order' => [
            'ShopFiles.id' => 'desc'
        ]
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $shopFiles = $this->ShopFiles->find('all', [
           // 'conditions' => ['ShopFiles.status !=' => 99],
            'contain' => ['Markets', 'Shops', 'Owners']
        ]);
        $this->set('shopFiles', $this->paginate($shopFiles));
        $this->set('_serialize', ['shopFiles']);
    }

    /**
     * View method
     *
     * @param string|null $id Shop File id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Auth->user();
        $shopFile = $this->ShopFiles->get($id, [
            'contain' => ['Markets', 'Shops', 'Owners']
        ]);
        $this->set('shopFile', $shopFile);
        $this->set('_serialize', ['shopFile']);
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
        $shopFile = $this->ShopFiles->newEntity();
        if ($this->request->is('post')) {

            $data = $this->request->data;
            $data['create_by'] = $user['id'];
            $data['create_date'] = $time;
            $shopFile = $this->ShopFiles->patchEntity($shopFile, $data);
            if ($this->ShopFiles->save($shopFile)) {
                $this->Flash->success('The shop file has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The shop file could not be saved. Please, try again.');
            }
        }
        $markets = $this->ShopFiles->Markets->find('list', ['conditions' => ['status' => 1]]);
        $shops = $this->ShopFiles->Shops->find('list', ['conditions' => ['status' => 1]]);
        $owners = $this->ShopFiles->Owners->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('shopFile', 'markets', 'shops', 'owners'));
        $this->set('_serialize', ['shopFile']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Shop File id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Auth->user();
        $time = time();
        $shopFile = $this->ShopFiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            $data['update_by'] = $user['id'];
            $data['update_date'] = $time;
            $shopFile = $this->ShopFiles->patchEntity($shopFile, $data);
            if ($this->ShopFiles->save($shopFile)) {
                $this->Flash->success('The shop file has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The shop file could not be saved. Please, try again.');
            }
        }
        $markets = $this->ShopFiles->Markets->find('list', ['conditions' => ['status' => 1]]);
        $shops = $this->ShopFiles->Shops->find('list', ['conditions' => ['status' => 1]]);
        $owners = $this->ShopFiles->Owners->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('shopFile', 'markets', 'shops', 'owners'));
        $this->set('_serialize', ['shopFile']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Shop File id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $shopFile = $this->ShopFiles->get($id);

        $user = $this->Auth->user();
        $data = $this->request->data;
        $data['updated_by'] = $user['id'];
        $data['updated_date'] = time();
        $data['status'] = 99;
        $shopFile = $this->ShopFiles->patchEntity($shopFile, $data);
        if ($this->ShopFiles->save($shopFile)) {
            $this->Flash->success('The shop file has been deleted.');
        } else {
            $this->Flash->error('The shop file could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
