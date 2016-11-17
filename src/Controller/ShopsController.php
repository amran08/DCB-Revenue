<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Shops Controller
 *
 * @property \App\Model\Table\ShopsTable $Shops
 */
class ShopsController extends AppController
{

    public $paginate = [
        'limit' => 15,
        'order' => [
            'Shops.id' => 'desc'
        ]
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $shops = $this->Shops->find('all', [
            'conditions' => ['Shops.status !=' => 99],
            'contain' => ['Markets']
        ]);
        $this->set('shops', $this->paginate($shops));
        $this->set('_serialize', ['shops']);
    }

    /**
     * View method
     *
     * @param string|null $id Shop id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Auth->user();
        $shop = $this->Shops->get($id, [
            'contain' => ['Markets']
        ]);
        $this->set('shop', $shop);
        $this->set('_serialize', ['shop']);
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
        $shop = $this->Shops->newEntity();
        if ($this->request->is('post')) {

            $data = $this->request->data;
            $data['create_by'] = $user['id'];
            $data['create_time'] = $time;

            $data['shop_number'] = $this->Common->bn_to_en($data['shop_number']);
            $data['total_area'] = $this->Common->bn_to_en($data['total_area']);
            $data['floor_number'] = $this->Common->bn_to_en($data['floor_number']);
            $data['lease_amount'] = $this->Common->bn_to_en($data['lease_amount']);

            $shop = $this->Shops->patchEntity($shop, $data);
            if ($this->Shops->save($shop)) {

                $this->Flash->success('The shop has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The shop could not be saved. Please, try again.');
            }
        }
        $markets = $this->Shops->Markets->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('shop', 'markets'));
        $this->set('_serialize', ['shop']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Shop id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Auth->user();
        $time = time();
        $shop = $this->Shops->get($id, [
            'contain' => []
        ]);

        $shop['shop_number'] = $this->Common->en_to_bn($shop['shop_number']);
        $shop['total_area'] = $this->Common->en_to_bn($shop['total_area']);
        $shop['floor_number'] = $this->Common->en_to_bn($shop['floor_number']);
        $shop['lease_amount'] = $this->Common->en_to_bn($shop['lease_amount']);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;

            $data['shop_number'] = $this->Common->bn_to_en($data['shop_number']);
            $data['total_area'] = $this->Common->bn_to_en($data['total_area']);
            $data['floor_number'] = $this->Common->bn_to_en($data['floor_number']);
            $data['lease_amount'] = $this->Common->bn_to_en($data['lease_amount']);

            $data['update_by'] = $user['id'];
            $data['update_time'] = $time;

            $shop = $this->Shops->patchEntity($shop, $data);

            if ($this->Shops->save($shop)) {
                $this->Flash->success('The shop has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The shop could not be saved. Please, try again.');
            }
        }
        $markets = $this->Shops->Markets->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('shop', 'markets'));
        $this->set('_serialize', ['shop']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Shop id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $shop = $this->Shops->get($id);

        $user = $this->Auth->user();
        $data = $this->request->data;
        $data['updated_by'] = $user['id'];
        $data['updated_date'] = time();
        $data['status'] = 99;
        $shop = $this->Shops->patchEntity($shop, $data);
        if ($this->Shops->save($shop)) {
            $this->Flash->success('The shop has been deleted.');
        } else {
            $this->Flash->error('The shop could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
