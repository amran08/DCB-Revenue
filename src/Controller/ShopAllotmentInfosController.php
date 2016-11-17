<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ShopAllotmentInfos Controller
 *
 * @property \App\Model\Table\ShopAllotmentInfosTable $ShopAllotmentInfos
 */
class ShopAllotmentInfosController extends AppController
{

    public $paginate = [
        'limit' => 15,
        'order' => [
            'ShopAllotmentInfos.id' => 'desc'
        ]
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $shopAllotmentInfos = $this->ShopAllotmentInfos->find('all', [
            'conditions' => ['ShopAllotmentInfos.status !=' => 99],
            'contain' => ['Shops', 'Markets']
        ]);
        $this->set('shopAllotmentInfos', $this->paginate($shopAllotmentInfos));
        $this->set('_serialize', ['shopAllotmentInfos']);
    }

    /**
     * View method
     *
     * @param string|null $id Shop Allotment Info id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Auth->user();
        $shopAllotmentInfo = $this->ShopAllotmentInfos->get($id, [
            'contain' => ['Shops', 'Markets']
        ]);
        $this->set('shopAllotmentInfo', $shopAllotmentInfo);
        $this->set('_serialize', ['shopAllotmentInfo']);
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
        $shopAllotmentInfo = $this->ShopAllotmentInfos->newEntity();

        $shopAllotmentInfo['mobile_number'] = $this->Common->bn_to_en($shopAllotmentInfo['mobile_number']);
        $shopAllotmentInfo['nid'] = $this->Common->bn_to_en($shopAllotmentInfo['nid']);

        if ($this->request->is('post')) {

            $data = $this->request->data;
            $data['create_by'] = $user['id'];
            $data['create_date'] = $time;
            $shopAllotmentInfo = $this->ShopAllotmentInfos->patchEntity($shopAllotmentInfo, $data);
            if ($this->ShopAllotmentInfos->save($shopAllotmentInfo)) {
                $this->Flash->success('The shop allotment info has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The shop allotment info could not be saved. Please, try again.');
            }
        }
        $shops = $this->ShopAllotmentInfos->Shops->find('list', ['conditions' => ['status' => 1]]);
        $markets = $this->ShopAllotmentInfos->Markets->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('shopAllotmentInfo', 'shops', 'markets'));
        $this->set('_serialize', ['shopAllotmentInfo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Shop Allotment Info id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Auth->user();
        $time = time();
        $shopAllotmentInfo = $this->ShopAllotmentInfos->get($id, [
            'contain' => ['Markets', 'Shops']
        ]);

        $shop_number = $shopAllotmentInfo['shop']['shop_number'];

        $this->set('shop_number', $shop_number);
        $shopAllotmentInfo['mobile_number'] = $this->Common->en_to_bn($shopAllotmentInfo['mobile_number']);
        $shopAllotmentInfo['nid'] = $this->Common->en_to_bn($shopAllotmentInfo['nid']);

        $shopAllotmentInfo['allotment_date'] = $this->Common->bn_to_en($shopAllotmentInfo['allotment_date']);
        $shopAllotmentInfo['expire_date'] = $this->Common->bn_to_en($shopAllotmentInfo['expire_date']);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            $data['update_by'] = $user['id'];
            $data['update_date'] = $time;
            $shopAllotmentInfo['mobile_number'] = $this->Common->bn_to_en($shopAllotmentInfo['mobile_number']);
            $shopAllotmentInfo['nid'] = $this->Common->bn_to_en($shopAllotmentInfo['nid']);

            $shopAllotmentInfo = $this->ShopAllotmentInfos->patchEntity($shopAllotmentInfo, $data);
            if ($this->ShopAllotmentInfos->save($shopAllotmentInfo)) {
                $this->Flash->success('The shop allotment info has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The shop allotment info could not be saved. Please, try again.');
            }
        }
        $shops = $this->ShopAllotmentInfos->Shops->find('list', ['conditions' => ['status' => 1]]);
        $markets = $this->ShopAllotmentInfos->Markets->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('shopAllotmentInfo', 'shops', 'markets'));
        $this->set('_serialize', ['shopAllotmentInfo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Shop Allotment Info id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */

    public function shopList($market_id)

    {
        $this->autoRender = false;
        $this->loadModel('Shops');
        //$this->loadModel('Upazilas');
        $shop_list = $this->Shops->find('all', [
            'conditions' => ['Shops.market_id' => $market_id]
        ])->select(['id', 'shop_number']);

        $this->response->body(json_encode($shop_list));

    }

    public function delete($id = null)
    {

        $shopAllotmentInfo = $this->ShopAllotmentInfos->get($id);

        $user = $this->Auth->user();
        $data = $this->request->data;
        $data['updated_by'] = $user['id'];
        $data['updated_date'] = time();
        $data['status'] = 99;
        $shopAllotmentInfo = $this->ShopAllotmentInfos->patchEntity($shopAllotmentInfo, $data);
        if ($this->ShopAllotmentInfos->save($shopAllotmentInfo)) {
            $this->Flash->success('The shop allotment info has been deleted.');
        } else {
            $this->Flash->error('The shop allotment info could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
