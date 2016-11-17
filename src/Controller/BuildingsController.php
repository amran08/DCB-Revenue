<?php

namespace App\Controller;

use App\Controller\AppController;
use App\View\Helper\SystemHelper;
use Cake\Core\Exception\Exception;
use Cake\I18n\Time;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;

//use Cake\Collection;


/**
 * Buildings Controller
 *
 * @property \App\Model\Table\BuildingsTable $Buildings
 */
class BuildingsController extends AppController
{

    public $paginate = [
        'limit' => 15,
        'order' => [
            'Buildings.id' => 'desc'
        ]
    ];
    //public  $helpers = ['System'];

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        parent::initialize();
        $this->loadComponent('Search.Prg', [
            'actions' => ['index']
        ]);

        $buildings = $this->Buildings
            ->find('search', ['search' => $this->Common->bn_to_en($this->request->data)])
            ->contain(['Dohss', 'Developers', 'BuildingPlotInfo.Plots'])
            ->where(['Buildings.status !=' => 99]);

        $dohs = $this->Buildings->Dohss->find('list', ['conditions' => ['status' => 1]]);
        $this->set('dohs', $dohs);

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
    public function view($id = null)
    {
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
    public function add()
    {
        //apartments , houses ,buildings
        $this->loadComponent('FileUpload');
        $user = $this->Auth->user();
        $time = Time::now();
        $building = $this->Buildings->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            // pr($data); die;
            $data['create_time'] = $time;
            //debug($data);
            $data['road_number'] = $this->Common->bn_to_en($data['road_number']);
            $data['apartment_number'] = $this->Common->bn_to_en($data['apartment_number']);
            $data['build_site_area'] = $this->Common->bn_to_en($data['build_site_area']);
            $data['build_site_north'] = $this->Common->bn_to_en($data['build_site_north']);
            $data['build_site_south'] = $this->Common->bn_to_en($data['build_site_south']);
            $data['build_site_east'] = $this->Common->bn_to_en($data['build_site_east']);
            $data['build_site_west'] = $this->Common->bn_to_en($data['build_site_west']);
            $data['estimate_cost'] = $this->Common->bn_to_en($data['estimate_cost']);
            $data['actual_cost'] = $this->Common->bn_to_en($data['actual_cost']);
            $data['floor_number'] = $this->Common->bn_to_en($data['floor_number']);

            $this->loadModel('BuildingPlotInfo');

            if ($data['apart_house'] == 'apartment') {
                $data['is_apartment'] = true;
            }
            if ($data['apart_house'] == 'house') {
                $data['is_house'] = true;
            }
            $building = $this->Buildings->patchEntity($building, $data);
            // debug($building);
            //die;
            $conn = ConnectionManager::get('default');

            $conn->transactional(function ($conn) use ($building,$time,$data) {
            if ($this->Buildings->save($building)) {
                $this->loadModel('Owners');
                $this->loadModel('Apartments');
                $property_type = "";
                $saved_apartments = [];
                //saving building owner
                foreach ($data['owner'] as $data['building_owner']) {
                    if (isset($data['building_owner']['is_building_owner'])) {
                        $building_owner_entity = $this->Owners->newEntity();
                        $building_owner['name_en'] = $data['building_owner']['name_en'];
                        $building_owner['name_bn'] = $data['building_owner']['name_bn'];
                        $building_owner['father_name_en'] = $data['building_owner']['father_name_en'];
                        $building_owner['father_name_bn'] = $data['building_owner']['father_name_bn'];
                        $building_owner['mother_name_en'] = $data['building_owner']['mother_name_en'];
                        $building_owner['mother_name_bn'] = $data['building_owner']['mother_name_bn'];
                        $building_owner['spouse_name_en'] = $data['building_owner']['spouse_name_en'];
                        $building_owner['spouse_name_bn'] = $data['building_owner']['spouse_name_bn'];

                        $building_owner['last_mutation_date'] = $data['building_owner']['last_mutation_date'];

                        $building_owner['dob'] = $data['building_owner']['dob'];
                        $building_owner['religion'] = $data['building_owner']['religion'];
                        $building_owner['gender'] = $data['building_owner']['gender'];
                        $building_owner['mobile_number'] = $this->Common->bn_to_en($data['building_owner']['mobile_number']);
                        $building_owner['phone_number'] = $this->Common->bn_to_en($data['building_owner']['phone_number']);
                        $building_owner['email'] = $data['building_owner']['email'];
                        $building_owner['present_address'] = $data['building_owner']['present_address'];
                        $building_owner['permanent_address'] = $data['building_owner']['permanent_address'];
                        $building_owner['nid'] = $this->Common->bn_to_en($data['building_owner']['nid']);
                        $building_owner['apartment_owned'] = $this->Common->bn_to_en($data['building_owner']['apartment_owned']);
                        $building_owner['lease_expire_date'] = $data['building_owner']['lease_expire_date'];
                        $building_owner['property_type_table_name'] = 'Buildings';
                        $building_owner['property_id'] = $building->id;
                        $building_owner['owner_type'] = $data['building_owner']['owner_type'];
                        $building_owner['own_percentage'] = $data['building_owner']['own_percentage'];
                        $building_owner['usage_type'] = $data['building_owner']['usage_type'];
                        //  $building_owner['holding_number_id'] = $data['building_owner']['holding_number_id'];
                        $building_owner['own_date'] = $data['building_owner']['own_date'];
                        $building_owner['create_time'] = $time;
                        $building_owner['status'] = 1;
                        $building_owner['ownership_type'] = $data['building_owner']['ownership_type'];

                        try {
                            $building_owner_entity = $this->Owners->patchEntity($building_owner_entity, $building_owner);
                            $this->Owners->save($building_owner_entity);

                        } catch (Exception $e) {
                            pr($e->getMessage());
                            die;
                        }
                    }

                }
                //saving apartments


                if ($data['apart_house'] == 'apartment') {
                    $property_type = 'Apartments';
                    foreach ($data['apartment'] as $key => $apartments) {
                        $apart_entity = $this->Apartments->newEntity();
                        $apartment_data['dohs_id'] = $data['dohs_id'];
                        $apartment_data['building_id'] = $building->id;
                        $apartment_data['apartment_type'] = $apartments['apartment_type'];
                        $apartment_data['apartment_number'] = $apartments['apartment_number'];
                        $apartment_data['floor_number'] = $this->Common->bn_to_en($apartments['floor_number']);
                        $apartment_data['floor_position'] = $this->Common->bn_to_en($apartments['floor_position']);
                        $apartment_data['total_area'] = $this->Common->bn_to_en($apartments['total_area']);
                        $apartment_data['status'] = 1;
                        $apartment_data['monthly_rent'] = $this->Common->bn_to_en($apartments['monthly_rent']);
                        //   $apartment_data['details'] = $apartments['details'];
                        $apartment_data['create_time'] = $time;
                        // debug($apartment_data);
                        $apart_entity = $this->Apartments->patchEntity($apart_entity, $apartment_data);
                        /// debug($apart_entity);
                        try {
                            $this->Apartments->save($apart_entity);

                            $saved_apartments[$key] = $apart_entity;
                        } catch (Exception $e) {
                            echo $e->getMessage();
                            die;
                        }

                    }

                    foreach ($data['owner'] as $apartment_owners) {
                        //debug($saved_apartments[$key]);
                        //die;
                        foreach ($saved_apartments as $key => $value) {
                            foreach ($apartment_owners['apartments'] as $k => $apartment_val) {
                                if ($apartment_val == $key) {
                                    $apart_owner_entity = $this->Owners->newEntity();
                                    // $owner_basic_entity = $this->OwnerBasicInfos->newEntity();

                                    $owner_data['owner_type'] = $apartment_owners['owner_type'];
                                    $owner_data['own_percentage'] = $apartment_owners['own_percentage'];
                                    $owner_data['usage_type'] = $apartment_owners['usage_type'];

                                    $owner_data['name_en'] = $apartment_owners['name_en'];
                                    $owner_data['name_bn'] = $apartment_owners['name_bn'];
                                    $owner_data['father_name_en'] = $apartment_owners['father_name_en'];
                                    $owner_data['father_name_bn'] = $apartment_owners['father_name_bn'];
                                    $owner_data['mother_name_en'] = $apartment_owners['mother_name_en'];
                                    $owner_data['mother_name_bn'] = $apartment_owners['mother_name_bn'];
                                    $owner_data['spouse_name_en'] = $apartment_owners['spouse_name_en'];
                                    $owner_data['spouse_name_bn'] = $apartment_owners['spouse_name_bn'];

                                    $owner_data['last_mutation_date'] = $this->Common->bn_to_en($apartment_owners['last_mutation_date']);
                                    $owner_data['own_date'] = $apartment_owners['own_date'];
                                    $owner_data['nid'] = $this->Common->bn_to_en($apartment_owners['nid']);
                                    $owner_data['dob'] = $apartment_owners['dob'];
                                    $owner_data['religion'] = $apartment_owners['religion'];
                                    $owner_data['gender'] = $apartment_owners['gender'];
                                    $owner_data['mobile_number'] = $this->Common->bn_to_en($apartment_owners['mobile_number']);
                                    $owner_data['phone_number'] = $this->Common->bn_to_en($apartment_owners['phone_number']);
                                    $owner_data['email'] = $apartment_owners['email'];
                                    $owner_data['present_address'] = $apartment_owners['present_address'];
                                    $owner_data['permanent_address'] = $apartment_owners['permanent_address'];
                                    $owner_data['status'] = 1;
                                    $owner_data['lease_expire_date'] = $apartment_owners['lease_expire_date'];

                                    $owner_data_['create_time'] = Time::now();
                                    $owner_data['apartment_owned'] = $this->Common->bn_to_en($apartment_owners['apartment_owned']);

                                    $owner_data['property_type_table_name'] = $property_type;
                                    $owner_data['property_id'] = $value['id'];
                                    $owner_data['ownership_type'] = $apartment_owners['ownership_type'];
                                    //debug($owner_data);
                                    //die;
                                    $apart_owner_entity = $this->Owners->patchEntity($apart_owner_entity, $owner_data);

                                    try {

                                        $this->Owners->save($apart_owner_entity);


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
                }

                //saving house information
                if ($data['apart_house'] == 'house') {
                    $property_type = 'Houses';
                    $this->loadModel('Houses');
                    $house_entity = $this->Houses->newEntity();
                    $house_data['dohs_id'] = $data['dohs_id'];
                    $house_data['building_id'] = $building->id;
                    $house_data['house_type'] = $data['house']['house_type'];
                    $house_data['house_number'] = $this->Common->bn_to_en($data['house']['house_number']);
                    $house_data['house_title'] = $data['house']['house_title'];
                    $house_data['is_commercial'] = $data['house']['is_commercial'];
                    $house_data['floor_number'] = $this->Common->bn_to_en($data['house']['floor_number']);
                    $house_data['details'] = $data['house']['details'];

                    $house_data['total_area'] = $this->Common->bn_to_en($data['house']['total_area']);

                    $house_data['status'] = 1;

                    //$house_data['details'] = $data['house']['details'];
                    $house_data['create_time'] = $time;
                    // debug($apartment_data);
                    $house_entity = $this->Houses->patchEntity($house_entity, $house_data);
                    $this->Houses->save($house_entity);

                    foreach ($data['house_owner'] as $house_owner) {

                        $house_owner_entity = $this->Owners->newEntity();
                        $owner_data['owner_type'] = $house_owner['owner_type'];
                        $owner_data['own_percentage'] = $this->Common->bn_to_en($house_owner['own_percentage']);
                        $owner_data['usage_type'] = $house_owner['usage_type'];

                        //$result = $this->FileUpload->upload_multiple_file_any_mime($house_owner['picture'], 'u_load/owner_photos');
                        //$dohs_files['file_name'] = $result['file_name'];

                        //  $owner_data['picture'] = $house_owner['picture'];
                        $owner_data['name_en'] = $house_owner['name_en'];
                        $owner_data['name_bn'] = $house_owner['name_bn'];
                        $owner_data['father_name_en'] = $house_owner['father_name_en'];
                        $owner_data['father_name_bn'] = $house_owner['father_name_bn'];
                        $owner_data['mother_name_en'] = $house_owner['mother_name_en'];
                        $owner_data['mother_name_bn'] = $house_owner['mother_name_bn'];
                        $owner_data['spouse_name_en'] = $house_owner['spouse_name_en'];
                        $owner_data['spouse_name_bn'] = $house_owner['spouse_name_bn'];
                        // $owner_data['apartment_owned'] = $house_owner['apartment_owned'];

                        $owner_data['last_mutation_date'] = $house_owner['last_mutation_date'];
                        $owner_data['own_date'] = $house_owner['own_date'];
                        $owner_data['nid'] = $this->Common->bn_to_en($house_owner['nid']);
                        $owner_data['dob'] = $house_owner['dob'];
                        $owner_data['religion'] = $house_owner['religion'];
                        $owner_data['gender'] = $house_owner['gender'];
                        $owner_data['mobile_number'] = $this->Common->bn_to_en($house_owner['mobile_number']);
                        $owner_data['phone_number'] = $this->Common->bn_to_en($house_owner['phone_number']);
                        $owner_data['email'] = $house_owner['email'];
                        $owner_data['present_address'] = $house_owner['present_address'];
                        $owner_data['permanent_address'] = $house_owner['permanent_address'];
                        $owner_data['status'] = $house_owner['status'];
                        $owner_data['lease_expire_date'] = $house_owner['lease_expire_date'];
                        $owner_data['create_time'] = $time;
                        $owner_data['property_type_table_name'] = $property_type;
                        $owner_data['property_id'] = $house_entity->id;
                        $owner_data['ownership_type'] = $house_owner['ownership_type'];

                        $house_owner_entity = $this->Owners->patchEntity($house_owner_entity, $owner_data);
                        $this->Owners->save($house_owner_entity);

                    }
                }

                //Building's file(related files)

                /*
                                $this->loadModel('BuildingFiles');

                                if (!empty($data['buildingFiles'][0]['file_url'][0]['name'])) //at least 1 file
                                    foreach ($data['buildingFiles'] as $building_files) {

                                        foreach ($building_files['file_url'] as $files_upload) {
                                            // debug($files_upload);
                                            $building_file_entity = $this->BuildingFiles->newEntity();
                                            $building_file_info['applicant_name_en'] = $data['applicant_name_en'];
                                            $building_file_info['applicant_address'] = $data['applicant_address'];
                                            $building_file_info['applicant_contact_number'] = $data['applicant_contact_number'];
                                            $building_file_info['create_time'] = $time;
                                            /// $building_file_info['file_url'] = $this->Fil
                                            $result = $this->FileUpload->upload_multiple_file_any_mime($files_upload, 'u_load/building_files');
                                            $building_file_info['file_url'] = $result['file_name'];

                                            $building_file_info['building_id'] = $building->id;
                                            $building_file_info['file_type'] = $building_files['file_type'];
                                            $building_file_info['submission_type'] = $building_files['submission_type'];
                                            $building_file_info['submit_date'] = $building_files['submit_date'];
                                            $building_file_info['status'] = $building_files['status'];
                                            $building_file_entity = $this->BuildingFiles->patchEntity($building_file_entity, $building_file_info);
                                            $this->BuildingFiles->save($building_file_entity);
                                        }
                                    }
                */
                ///saving plot data
                $data_plots_arr = [];
                $data_plots_arr = array_unique($data['plot_ids']);
                foreach ($data_plots_arr as $value) {
                    $building_plot_info = $this->BuildingPlotInfo->newEntity();
                    $building_plot_data['plot_id'] = $value;
                    $building_plot_data['building_id'] = $building->id;
                    $building_plot_data['status'] = '1';
                    $building_plot_data['create_time'] = $time;
                    //debug($building_plot_data);
                    $building_plot_info = $this->BuildingPlotInfo->patchEntity($building_plot_info, $building_plot_data);
                    $this->BuildingPlotInfo->save($building_plot_info);

                }

                // saving plot owners //not using right now

                /// debug($data); die;
                $this->Flash->success('The building has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The building could not be saved. Please, try again.');
            }
        });

        }

        $this->loadModel('Owners');
        $dohss = $this->Buildings->Dohss->find('list', ['conditions' => ['status' => 1]]);
        $developers = $this->Buildings->Developers->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('building', 'dohss', 'developers', 'holdingNumbers'));
        $this->set('_serialize', ['building']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Building id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Auth->user();
        $time = Time::now();
        $this->loadModel('BuildingPlotInfo');

        $this->Buildings->validator()->remove('plot_number');

        $building = $this->Buildings->get($id, [
            'contain' => ['BuildingPlotInfo', 'BuildingPlotInfo.Plots']
        ]);

        $building['plan_approve_date'] = $this->Common->bn_to_en($building['plan_approve_date']);
        $building['work_start_date'] = $this->Common->bn_to_en($building['work_start_date']);
        $building['work_finish_date'] = $this->Common->bn_to_en($building['work_finish_date']);

        $building['build_site_area'] = $this->Common->en_to_bn($building['build_site_area']);
        $building['build_site_north'] = $this->Common->en_to_bn($building['build_site_north']);
        $building['build_site_south'] = $this->Common->en_to_bn($building['build_site_south']);
        $building['build_site_east'] = $this->Common->en_to_bn($building['build_site_east']);
        $building['build_site_west'] = $this->Common->en_to_bn($building['build_site_west']);
        $building['estimate_cost'] = $this->Common->en_to_bn($building['estimate_cost']);
        $building['actual_cost'] = $this->Common->en_to_bn($building['actual_cost']);
        $building['floor_number'] = $this->Common->en_to_bn($building['floor_number']);
        $building['apartment_number'] = $this->Common->en_to_bn($building['apartment_number']);


        // die;
        $plot_ids_info = [];
        foreach ($building['building_plot_info'] as $plots_db) {
            array_push($plot_ids_info, $plots_db['plot_id']);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            $data['update_time'] = $time;

            ///pr($data);die;
            if (!empty($data['apartment_house'])) {
                switch ($data['apartment_house']) {
                    case "is_apartment":
                        $data['is_apartment'] = 1;
                        $data['is_house'] = 0;
                        break;
                    case "is_house":
                        $data['is_apartment'] = 0;
                        $data['is_house'] = 1;
                        break;
                }
            }

            $data['plan_approve_date'] = Time::parseDate($data['plan_approve_date'], 'yyyy-mm-dd');

            $data['build_site_area'] = $this->Common->bn_to_en($data['build_site_area']);
            $data['build_site_north'] = $this->Common->bn_to_en($data['build_site_north']);
            $data['build_site_south'] = $this->Common->bn_to_en($data['build_site_south']);
            $data['build_site_east'] = $this->Common->bn_to_en($data['build_site_east']);
            $data['build_site_west'] = $this->Common->bn_to_en($data['build_site_west']);
            $data['estimate_cost'] = $this->Common->bn_to_en($data['estimate_cost']);
            $data['actual_cost'] = $this->Common->bn_to_en($data['actual_cost']);
            $data['floor_number'] = $this->Common->bn_to_en($data['floor_number']);
            $data['apartment_number'] = $this->Common->bn_to_en($data['apartment_number']);

            $building = $this->Buildings->patchEntity($building, $data);

            $plot_id_from_input = [];
            if (isset($data['plot_ids'])) {
                $plot_id_from_input = array_unique($data['plot_ids']);
            }
            $plot_id_from_checkbox = [];
            if (isset($data['plot-id-checkbox-name'])) {
                $plot_id_from_checkbox = $data['plot-id-checkbox-name'];
            }

            $plot_id_combine = [];
            $plot_id_total = [];
            $plot_id_combine = array_merge($plot_id_from_checkbox, $plot_id_from_input);
            $plot_id_total = array_unique($plot_id_combine);

            //debug($plot_id_total);
            // die();
            if ($this->Buildings->save($building)) {

                $this->BuildingPlotInfo->deleteAll(['building_id' => $building->id]);

                foreach ($plot_id_combine as $key => $value) {
                    if ($value == '') {

                        unset($plot_id_combine[$key]);
                        $building_plot_data['plot_id'] = $value;
                        $building_plot_data['building_id'] = $building->id;
                        $building_plot_data['status'] = '1';

                        $building_plot_info = $this->BuildingPlotInfo->newEntity();
                        $building_plot_info = $this->BuildingPlotInfo->patchEntity($building_plot_info, $building_plot_data);
                        $this->BuildingPlotInfo->save($building_plot_info);
                    } else {

                        $building_plot_data['plot_id'] = $value;
                        $building_plot_data['building_id'] = $building->id;
                        $building_plot_data['status'] = '1';

                        $building_plot_info = $this->BuildingPlotInfo->newEntity();
                        $building_plot_info = $this->BuildingPlotInfo->patchEntity($building_plot_info, $building_plot_data);

                        $this->BuildingPlotInfo->save($building_plot_info);
                    }
                }

                $this->Flash->success('The building has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The building could not be saved. Please, try again.');
            }
        }
        $this->loadModel('Plots');
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
    public function delete($id = null)
    {

        $building = $this->Buildings->get($id);

        $user = $this->Auth->user();
        $data = $this->request->data;
        $data['updated_by'] = $user['id'];
        $data['updated_date'] = time();
        $data['status'] = 99;
        $building = $this->Buildings->patchEntity($building, $data);
        $conn = ConnectionManager::get('default');
        $conn->transactional(function ($conn) use ($building) {

            if ($this->Buildings->save($building)) {
                $building_id = $building->id;
                $this->loadModel('Owners');
                $this->loadModel('Apartments');
                $this->loadModel('Houses');

                $this->Owners->updateAll(
                    ['status' => 99],
                    ['property_type_table_name' => 'Buildings', 'property_id' => $building_id]
                );

                $conn->execute('UPDATE building_plot_info SET status = ? WHERE building_id = ?', [99, $building_id]);

                //getting apartment info

                $apartment_of_building = $this->Apartments->find('all', ['conditions' => ['Apartments.building_id' => $building_id]])->select(['id'])->toArray();
                $apartment_ids = [];

                if (!empty($apartment_of_building)) {
                    foreach ($apartment_of_building as $apt) {
                        // echo $apt['id'];
                        array_push($apartment_ids, $apt['id']);
                    }

                    $this->Apartments->updateAll(
                        ['status' => 99],
                        ['building_id' => $building_id]
                    );

                    $this->Owners->updateAll(
                        ['status' => 99],
                        ['property_type_table_name' => 'Apartments', 'property_id IN' => $apartment_ids]
                    );
                }

                //if this building has house/houses
                $house_id = $this->Houses->find('all', ['conditions' => ['Houses.building_id' => $building_id]])->select(['id'])->toArray();
                $house_ids = [];

                if (!empty($house_id)) {
                    foreach ($house_id as $house) {
                        array_push($house_ids, $house['id']);
                        //debug($house_ids);die;
                    }
                    $this->Houses->updateAll(
                        ['status' => 99],
                        ['building_id' => $building_id]
                    );
                    $this->Owners->updateAll(
                        ['status' => 99],
                        ['property_type_table_name' => 'Houses', 'property_id IN' => $house_ids]
                    );

                }
                $this->Flash->success('The building has been deleted.');

            } else {

                $this->Flash->error('The building could not be deleted. Please, try again.');
            }
        });
        return $this->redirect(['action' => 'index']);
    }

}
