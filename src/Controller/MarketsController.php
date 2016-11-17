<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Exception\Exception;
use Cake\I18n\Time;

/**
 * Markets Controller
 *
 * @property \App\Model\Table\MarketsTable $Markets
 */
class MarketsController extends AppController
{

    public $paginate = [
        'limit' => 15,
        'order' => [
            'Markets.id' => 'desc'
        ]
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $markets = $this->Markets->find('all', [
            'conditions' => ['Markets.status !=' => 99],
            'contain' => ['Dohss', 'Buildings']
        ]);
        $this->set('markets', $this->paginate($markets));
        $this->set('_serialize', ['markets']);
    }

    /**
     * View method
     *
     * @param string|null $id Market id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Auth->user();
        $market = $this->Markets->get($id, [
            'contain' => ['Dohss', 'Buildings']
        ]);
        $this->set('market', $market);
        $this->set('_serialize', ['market']);
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
        $this->loadModel('Buildings');
        $this->loadModel('Owners');
        $this->loadModel('Shops');
        $market = $this->Markets->newEntity();
        $market_building_entity = $this->Buildings->newEntity();

        if ($this->request->is('post')) {
            $data = $this->request->data;


            $data['create_by'] = $user['id'];
            $data['road_number'] = $this->Common->bn_to_en($data['road_number']);
            $data['total_area'] = $this->Common->bn_to_en($data['total_area']);
            $data['total_shop_number'] = $this->Common->bn_to_en($data['total_shop_number']);
            $data['floor_number'] = $this->Common->bn_to_en($data['floor_number']);
            $data['create_time'] = Time::now();

            $market = $this->Markets->patchEntity($market, $data);

            if ($data['building_info_market'] == '1') {

                $building_data['title_en'] = $data['title_en'];
                $building_data['title_bn'] = $data['title_bn'];
                $building_data['dohs_id'] = $data['dohs_id'];
                $building_data['build_site_area'] = $data['build_site_area'];
                $building_data['build_site_north'] = $data['build_site_north'];
                $building_data['build_site_south'] = $data['build_site_south'];
                $building_data['build_site_east'] = $data['build_site_east'];
                $building_data['build_site_west'] = $data['build_site_west'];
                $building_data['estimate_cost'] = $data['estimate_cost'];
                $building_data['actual_cost'] = $data['actual_cost'];
                // $building_data['total_area'] = $data['total_area'];
                $building_data['roof_type'] = $data['roof_type'];
                $building_data['floor_number'] = $data['floor_number'];
                $building_data['build_type'] = $data['build_type'];
                $building_data['road_number'] = $data['road_number'];
                $building_data['create_time'] = $time;
                $building_data['status'] = 1;
                $building_data['build_site_soil_type'] = $data['build_site_soil_type'];
                $building_data['plan_approve_date'] = $data['plan_approve_date'];
                $building_data['work_start_date'] = $data['work_start_date'];
                $building_data['work_finish_date'] = $data['work_finish_date'];

                $market_building_entity = $this->Buildings->patchEntity($market_building_entity, $building_data);

                if ($this->Buildings->save($market_building_entity)) {


                    $data['building_id'] = $market_building_entity->id;

                    $market = $this->Markets->patchEntity($market, $data);
                    if ($this->Markets->save($market)) {
                        $market_id = $market->id;
                        foreach ($data['shop'] as $key => $shops) {
                            $shop_entity = $this->Shops->newEntity();
                            $shops['market_id'] = $market_id;
                            $shops['total_area'] = $this->Common->bn_to_en($shops['total_area']);
                            $shops['shop_number'] = $this->Common->bn_to_en($shops['total_area']);
                            $shops['floor_number'] = $this->Common->bn_to_en($shops['total_area']);
                            $shops['create_time'] = $time;
                            $shop_entity = $this->Shops->patchEntity($shop_entity, $shops);
                            $this->Shops->save($shop_entity);
                            $saved_shops[$key] = $shop_entity;
                        }
                        foreach ($data['owner'] as $shop_owners) {
                            foreach ($saved_shops as $key => $value) {
                                foreach ($shop_owners['shops'] as $k => $shop_val) {
                                    if ($shop_val == $key) {

                                        $shop_owner_entity = $this->Owners->newEntity();

                                        $owner_data['owner_type'] = $shop_owners['owner_type'];
                                        $owner_data['own_percentage'] = $shop_owners['own_percentage'];
                                        $owner_data['usage_type'] = $shop_owners['usage_type'];

                                        $owner_data['name_en'] = $shop_owners['name_en'];
                                        $owner_data['name_bn'] = $shop_owners['name_bn'];
                                        $owner_data['father_name_en'] = $shop_owners['father_name_en'];
                                        $owner_data['father_name_bn'] = $shop_owners['father_name_bn'];
                                        $owner_data['mother_name_en'] = $shop_owners['mother_name_en'];
                                        $owner_data['mother_name_bn'] = $shop_owners['mother_name_bn'];
                                        $owner_data['spouse_name_en'] = $shop_owners['spouse_name_en'];
                                        $owner_data['spouse_name_bn'] = $shop_owners['spouse_name_bn'];

                                        $owner_data['own_date'] = $shop_owners['own_date'];
                                        $owner_data['nid'] = $this->Common->bn_to_en($shop_owners['nid']);
                                        $owner_data['dob'] = $shop_owners['dob'];
                                        $owner_data['religion'] = $shop_owners['religion'];
                                        $owner_data['gender'] = $shop_owners['gender'];
                                        $owner_data['mobile_number'] = $this->Common->bn_to_en($shop_owners['mobile_number']);
                                        $owner_data['phone_number'] = $this->Common->bn_to_en($shop_owners['phone_number']);
                                        $owner_data['email'] = $shop_owners['email'];
                                        $owner_data['present_address'] = $shop_owners['present_address'];
                                        $owner_data['permanent_address'] = $shop_owners['permanent_address'];
                                        $owner_data['status'] = $shop_owners['status'];
                                        $owner_data['lease_expire_date'] = $shop_owners['lease_expire_date'];

                                        $owner_data_['create_time'] = $time;


                                        $owner_data['property_type_table_name'] = 'Shops';
                                        $owner_data['property_id'] = $value['id'];
                                        $owner_data['ownership_type'] = $shop_owners['ownership_type'];

                                        $shop_owner_entity = $this->Owners->patchEntity($shop_owner_entity, $owner_data);

                                        try {
                                            $this->Owners->save($shop_owner_entity);
                                            //debug($shop_owner_entity);
                                            //die;

                                        } catch (Exception $e) {
                                            echo $e->getMessage();
                                            pr($e->getFile());
                                            pr($e->getLine());
                                            die;
                                        }
                                    }
                                }
                            }
                        }
                        $this->Flash->success('The market has been saved.');
                        return $this->redirect(['action' => 'index']);

                    }

                    $this->Flash->success('The market has been saved.');
                    return $this->redirect(['action' => 'index']);
                } else {

                    $this->Flash->error('The market could not be saved. Please, try again.');
                }
            }
            $saved_shops = [];
            try {
                if ($data['building_info_market'] == '0' || $data['building_info_market'] == '') {

                    if ($this->Markets->save($market)) {
                        $market_id = $market->id;

                        foreach ($data['shop'] as $key => $shops) {
                            $shop_entity = $this->Shops->newEntity();
                            $this->loadModel('ShopAllotmentInfos');
                            $shop_allotment_entity = $this->ShopAllotmentInfos->newEntity();

                            $shops['market_id'] = $market_id;
                            $shops['total_area'] = $this->Common->bn_to_en($shops['total_area']);
                            $shops['shop_number'] = $this->Common->bn_to_en($shops['total_area']);
                            $shops['floor_number'] = $this->Common->bn_to_en($shops['total_area']);
                            $shops['lease_amount'] = $this->Common->bn_to_en($shops['lease_amount']);
                            $shops['current_condition'] = $shops['current_condition'];
                            $shops['create_time'] = $time;

                            $shop_entity = $this->Shops->patchEntity($shop_entity, $shops);
                            $this->Shops->save($shop_entity);
                            $saved_shops[$key] = $shop_entity;

if($shops['current_condition']=="rent") {
    $shop_alloted_whom['name_en'] = $shops['name_en'];
    $shop_alloted_whom['market_id'] = $market_id;
    $shop_alloted_whom['shop_id'] = $shop_entity->id;
    $shop_alloted_whom['name_bn'] = $shops['name_bn'];
    $shop_alloted_whom['mobile_number'] = $this->Common->bn_to_en($shops['mobile_number']);
    $shop_alloted_whom['name_bn'] = $shops['name_bn'];
    $shop_alloted_whom['father_name_en'] = $shops['father_name_en'];
    $shop_alloted_whom['father_name_bn'] = $shops['father_name_bn'];
    $shop_alloted_whom['mother_name_en'] = $shops['mother_name_en'];
    $shop_alloted_whom['mother_name_bn'] = $shops['mother_name_bn'];
    $shop_alloted_whom['mother_name_bn'] = $shops['mother_name_bn'];
    $shop_alloted_whom['allotment_date'] = $shops['allotment_date'];
    $shop_alloted_whom['expire_date'] = $shops['expire_date'];
    $shop_alloted_whom['status'] = 1;
    $shop_alloted_whom['create_time'] = $time;


    $shop_allotment_entity = $this->ShopAllotmentInfos->patchEntity($shop_allotment_entity, $shop_alloted_whom);
    $this->ShopAllotmentInfos->save($shop_allotment_entity);
}
                            //shop files section
                            /*
                            $shop_files['shop_id'] = $shop_entity->id;
                            $shop_files['allotment_type'] = $shops['allotment_type'];
                            $shop_files['allotment_issue_date'] = $shops['allotment_issue_date'];
                            $shop_files['allotment_expire_date'] = $shops['allotment_expire_date'];
                            $shop_files['contract_value'] = $shops['contract_value'];
                            $shop_files['allotment_type'] = $shops['allotment_type'];


                            if ($shops['application_form_file']['name'] != "") {

                                $shop_files['application_form_file'] = $shops['application_form_file'];
                            }
                            if ($shops['contract_file']['name'] != "") {

                                $shop_files['contract_file'] = $shops['contract_file'];
                            }
                            if ($shops['floor_map']['name'] != "") {

                                $shop_files['floor_map'] = $shops['floor_map'];
                            }

                            $shop_files['create_time'] = $time;
                            $shop_files['status'] = 1;
                            $shop_files_entity = $this->ShopFiles->patchEntity($shop_files_entity, $shop_files);

                            */

                        }
                        foreach ($data['owner'] as $shop_owners) {

                            foreach ($saved_shops as $key => $value) {

                                foreach ($shop_owners['shops'] as $k => $shop_val) {
                                    if ($shop_val == $key) {

                                        $shop_owner_entity = $this->Owners->newEntity();

                                        $owner_data['owner_type'] = $shop_owners['owner_type'];
                                        $owner_data['own_percentage'] = $shop_owners['own_percentage'];
                                        $owner_data['usage_type'] = $shop_owners['usage_type'];

                                        $owner_data['name_en'] = $shop_owners['name_en'];
                                        $owner_data['name_bn'] = $shop_owners['name_bn'];
                                        $owner_data['father_name_en'] = $shop_owners['father_name_en'];
                                        $owner_data['father_name_bn'] = $shop_owners['father_name_bn'];
                                        $owner_data['mother_name_en'] = $shop_owners['mother_name_en'];
                                        $owner_data['mother_name_bn'] = $shop_owners['mother_name_bn'];
                                        $owner_data['spouse_name_en'] = $shop_owners['spouse_name_en'];
                                        $owner_data['spouse_name_bn'] = $shop_owners['spouse_name_bn'];

                                        $owner_data['own_date'] = $shop_owners['own_date'];
                                        $owner_data['nid'] = $this->Common->bn_to_en($shop_owners['nid']);
                                        $owner_data['dob'] = $shop_owners['dob'];
                                        $owner_data['religion'] = $shop_owners['religion'];
                                        $owner_data['gender'] = $shop_owners['gender'];
                                        $owner_data['mobile_number'] = $this->Common->bn_to_en($shop_owners['mobile_number']);
                                        $owner_data['phone_number'] = $this->Common->bn_to_en($shop_owners['phone_number']);
                                        $owner_data['email'] = $shop_owners['email'];
                                        $owner_data['present_address'] = $shop_owners['present_address'];
                                        $owner_data['permanent_address'] = $shop_owners['permanent_address'];
                                        $owner_data['status'] = $shop_owners['status'];
                                        $owner_data['lease_expire_date'] = $shop_owners['lease_expire_date'];

                                        $owner_data_['create_time'] = $time;


                                        $owner_data['property_type_table_name'] = 'Shops';
                                        $owner_data['property_id'] = $value['id'];
                                        $owner_data['ownership_type'] = $shop_owners['ownership_type'];

                                        $shop_owner_entity = $this->Owners->patchEntity($shop_owner_entity, $owner_data);

                                        try {
                                            $this->Owners->save($shop_owner_entity);
                                            //debug($shop_owner_entity);
                                            //die;

                                        } catch (Exception $e) {
                                            echo $e->getMessage();
                                            pr($e->getFile());
                                            pr($e->getLine());
                                            die;
                                        }
                                    }
                                }
                            }
                        }
                        $this->Flash->success('The market has been saved.');
                        return $this->redirect(['action' => 'index']);
                    } else {
                        $this->Flash->error('The market could not be saved. Please, try again.');
                    }
                }

            } catch (Exception $e) {

                echo $e->getMessage();
                die;
            }
        }
        $dohs = $this->Markets->Dohss->find('list', ['conditions' => ['status' => 1]]);
        $buildings = $this->Markets->Buildings->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('market', 'dohs', 'buildings'));
        $this->set('_serialize', ['market']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Market id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Auth->user();
        $time = time();
        $market = $this->Markets->get($id, [
            'contain' => ['Dohss', 'Buildings']
        ]);

        $market['total_shop_number'] = $this->Common->en_to_bn($market['total_shop_number']);
        $market['road_number'] = $this->Common->en_to_bn($market['road_number']);
        $market['total_area'] = $this->Common->en_to_bn($market['total_area']);
        $market['floor_number'] = $this->Common->en_to_bn($market['floor_number']);
        $market['start_date'] = $this->Common->bn_to_en($market['start_date']);


        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            $data['update_by'] = $user['id'];
            $data['update_date'] = $time;
            $data['total_shop_number'] = $this->Common->bn_to_en($data['total_shop_number']);
            $data['road_number'] = $this->Common->bn_to_en($data['road_number']);
            $data['total_area'] = $this->Common->bn_to_en($data['total_area']);
            $data['floor_number'] = $this->Common->bn_to_en($data['floor_number']);

            $market = $this->Markets->patchEntity($market, $data);
            if ($this->Markets->save($market)) {
                $this->Flash->success('The market has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The market could not be saved. Please, try again.');
            }
        }
        $dohs = $this->Markets->Dohss->find('list', ['conditions' => ['status' => 1]]);
        $buildings = $this->Markets->Buildings->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('market', 'dohs', 'buildings'));
        $this->set('_serialize', ['market']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Market id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $market = $this->Markets->get($id);

        $user = $this->Auth->user();
        $data = $this->request->data;
        $data['updated_by'] = $user['id'];
        $data['updated_date'] = time();
        $data['status'] = 99;
        $market = $this->Markets->patchEntity($market, $data);
        if ($this->Markets->save($market)) {
            $this->Flash->success('The market has been deleted.');
        } else {
            $this->Flash->error('The market could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function buildingList($dohs_id, $building_name)
    {
        $this->autoRender = false;
        $this->loadModel('Buildings');

        $buildings = $this->Buildings->find('all', ['conditions' => ['Buildings.dohs_id' => $dohs_id, 'Buildings.title_en LIKE' => '%' . $building_name . '%']])->select(['id', 'title_en', 'title_bn']);

        $this->response->body(json_encode($buildings));

    }
}
