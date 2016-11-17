<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * Plots Controller
 *
 * @property \App\Model\Table\PlotsTable $Plots
 */
class PlotsController extends AppController
{

    public $paginate = [
        'limit' => 20,
        'order' => [
            'Plots.id' => 'desc'
        ]
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {

        parent::initialize();
        $this->loadComponent('Search.Prg', [
            // This is default config. You can modify "actions" as needed to make
            // the PRG component work only for specified methods.
            'actions' => ['index']
        ]);

        //debug($this->Common->bn_to_en($this->request->data));

        // $lease_blank_residential = $this->request->data['lease_blank_residential'];
        /*
                if($lease_blank_residential==1)
                {
                   $this->request->data['is_lease']=1;
                }
                elseif($lease_blank_residential==2)
                {
                    $this->request->data['is_blank']=1;

                }
                else{
                    $this->request->data['is_residential']=1;
                }
        */
        // $raw_data_lease_blank_residential = array_search($lease_blank_residential,$this->request->data);
        //unset($this->request->data[$raw_data_lease_blank_residential]);

        $plots = $this->Plots
            ->find('search', ['search' => $this->Common->bn_to_en($this->request->data)])
            ->where(['Plots.status !=' => 99])
            ->contain(['Districts', 'Upazilas', 'RsMoujas', 'Dohss', 'LandType']);

        $dohs = $this->Plots->Dohss->find('list', ['conditions' => ['status' => 1]]);
        $this->set('plots', $this->paginate($plots));

        $this->set('dohs', $dohs);
        $this->set('_serialize', ['plots']);


        /*  $plots = $this->Plots
            ->find('all',['search'=>$this->Common->bn_to_en($this->request->data)])
            ->where(['Plots.status !='=>99])
            ->contain(['Districts', 'Upazilas', 'RsMoujas', 'Dohss', 'LandType']);

        $dohs = $this->Plots->Dohss->find('list', ['conditions' => ['status' => 1]]);
        $this->set('plots', $this->paginate($plots));

        $this->set('dohs',$dohs);
        $this->set('_serialize', ['plots']);
`
         * */

    }

    public function plotGridData()
    {
        $this->autoRender = false;

        $plots = $this->Plots
            ->find('all')
            //'conditions' =>['Plots.status !=' => 99],
            ->contain(['Districts', 'Upazilas', 'RsMoujas', 'Dohss', 'LandType']);

        $this->response->body(json_encode($plots));
    }

    /**
     * View method
     *
     * @param string|null $id Plot id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
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
    public function add()
    {
        $user = $this->Auth->user();
        $time = Time::now();
        $plot = $this->Plots->newEntity();
        if ($this->request->is('post')) {

            $data = $this->request->data;
            $data['create_by'] = $user['id'];
            $data['create_time'] = $time;
            if (!empty($data['lease_blank_residential'])) {
                switch ($data['lease_blank_residential']) {
                    case "is_lease":
                        $data['is_lease'] = 1;
                        break;
                    case "is_blank":
                        $data['is_blank'] = 1;
                        break;
                    case "is_residential":
                        $data['is_residential'] = 1;
                        break;

                }
            }
            $plot['plot_number'] = $this->Common->bn_to_en($plot['plot_number']);
            $plot['road_number'] = $this->Common->bn_to_en($plot['road_number']);
            $plot['total_area'] = $this->Common->bn_to_en($plot['total_area']);
            $plot['north'] = $this->Common->bn_to_en($plot['north']);
            $plot['south'] = $this->Common->bn_to_en($plot['south']);
            $plot['east'] = $this->Common->bn_to_en($plot['east']);
            $plot['west'] = $this->Common->bn_to_en($plot['west']);
            $plot['status'] = 1;
            $plot['create_time'] = $time;

            $plot = $this->Plots->patchEntity($plot, $data);

            $conn = ConnectionManager::get('default');

            // $conn->transactional(function ($conn) use ($plot) {
            if ($this->Plots->save($plot)) {
                $this->loadModel('Owners');
                if (isset($data['has_plot_owner']) && $data['has_plot_owner'] == 1) {
                    foreach ($data['plot_owner'] as $data['plot_owner']) {
                        $plot_owner_entity = $this->Owners->newEntity();
                        $plot_owner['name_en'] = $data['plot_owner']['name_en'];
                        $plot_owner['name_bn'] = $data['plot_owner']['name_bn'];
                        $plot_owner['father_name_en'] = $data['plot_owner']['father_name_en'];
                        $plot_owner['father_name_bn'] = $data['plot_owner']['father_name_bn'];
                        $plot_owner['mother_name_en'] = $data['plot_owner']['mother_name_en'];
                        $plot_owner['mother_name_bn'] = $data['plot_owner']['mother_name_bn'];
                        $plot_owner['spouse_name_en'] = $data['plot_owner']['spouse_name_en'];
                        $plot_owner['spouse_name_bn'] = $data['plot_owner']['spouse_name_bn'];

                        $plot_owner['last_mutation_date'] = $data['plot_owner']['last_mutation_date'];
                        $plot_owner['dob'] = $data['plot_owner']['dob'];
                        $plot_owner['religion'] = $data['plot_owner']['religion'];
                        $plot_owner['gender'] = $data['plot_owner']['gender'];
                        $plot_owner['mobile_number'] = $this->Common->bn_to_en($data['plot_owner']['mobile_number']);
                        $plot_owner['phone_number'] = $this->Common->bn_to_en($data['plot_owner']['phone_number']);
                        $plot_owner['email'] = $data['plot_owner']['email'];
                        $plot_owner['present_address'] = $data['plot_owner']['present_address'];
                        $plot_owner['permanent_address'] = $data['plot_owner']['permanent_address'];
                        $plot_owner['nid'] = $this->Common->bn_to_en($data['plot_owner']['nid']);

                        $plot_owner['lease_expire_date'] = $data['plot_owner']['lease_expire_date'];
                        $plot_owner['property_type_table_name'] = 'Plots';

                        $plot_owner['property_id'] = $plot->id;

                        $plot_owner['owner_type'] = $data['plot_owner']['owner_type'];
                        $plot_owner['own_percentage'] = $data['plot_owner']['own_percentage'];
                        $plot_owner['usage_type'] = $data['plot_owner']['usage_type'];
                        $plot_owner['own_date'] = $data['plot_owner']['own_date'];
                        $plot_owner['create_time'] = $time;
                        $plot_owner['status'] = $data['plot_owner']['status'];
                        $plot_owner['ownership_type'] = $data['plot_owner']['ownership_type'];

                        try {
                            $plot_owner_entity = $this->Owners->patchEntity($plot_owner_entity, $plot_owner);
                            $this->Owners->save($plot_owner_entity);

                        } catch (Exception $e) {
                            pr($e->getMessage());
                            die;
                        }

                    }

                }
                $this->Flash->success('The plot has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The plot could not be saved. Please, try again.');
            }

            // });

        }
        $this->loadModel('Districts');

        $districts = $this->Districts->find('list');
        $dohs = $this->Plots->Dohss->find('list', ['conditions' => ['status' => 1]]);
        $landTypes = $this->Common->landTypes();
        $this->set(compact('plot', 'districts', 'upazilas', 'moujas', 'dohs', 'landTypes'));
        $this->set('_serialize', ['plot']);
    }

    public function districtCode($district_id)
    {
        $this->autoRender = false;

        $this->loadModel('Districts');
        $district_list = $this->Districts->find('all', [

            'conditions' => ['Districts.id' => $district_id]
        ])->select(['id', 'district_bbs_code', 'name_en'])->first()->toArray();

        $this->response->body(json_encode($district_list));
    }

//not working...cause we got 4 dohs only so need to populate them
    public function dohsList($district_id, $upazila_id)
    {
        $this->autoRender = false;
        $this->loadModel('Dohss');
        //$this->loadModel('Upazilas');
        $dohs_list = $this->Dohss->find('all', [
            'conditions' => ['Dohss.district_id' => $district_id, 'Dohss.upazila_id' => $upazila_id]
        ])->select(['id', 'title_en', 'title_bn']);

        $this->response->body(json_encode($dohs_list));
    }

    public function upazilaList($district_bbs_code)
    {
        $this->autoRender = false;

        $this->loadModel('Upazilas');
        $upazilas = $this->Upazilas->find('all', [

            'conditions' => ['Upazilas.district_bbs_code' => $district_bbs_code]
        ])->select(['id', 'name_bd'])->toArray();

        $this->response->body(json_encode($upazilas));
    }

    public function moujaList($upazila_id)
    {
        $this->autoRender = false;

        $this->loadModel('RsMoujas');
        $moujas = $this->RsMoujas->find('all', [
            'conditions' => ['RsMoujas.upazila_id' => $upazila_id]
        ])->select(['id', 'upazila_id', 'name_bd'])->toArray();

        $this->response->body(json_encode($moujas));
    }

    public function checkPlot($dohs_id, $plot_number)
    {
        $this->autoRender = false;

        $plot_number = $this->Common->bn_to_en($this->request->query['plot_number']);

        $plots = $this->Plots->find('all',
            ['conditions' => ['Plots.dohs_id' => $dohs_id, 'Plots.status !=' => 99, 'Plots.plot_number' => $plot_number]])
            ->select(['id', 'dohs_id', 'plot_number'])->toArray();

        if (empty($plots)) {
            $response ['msg'] = "Plot is ok";
            $response ['code'] = "200";
            $this->response->body(json_encode($response));
        } else {
            $response ['code'] = "400";
            $response['msg'] = "Plot is entered before";
            $this->response->body(json_encode($response));
        }


    }

    public function plotList($dohs_id, $plot_number, $action = null)
    {
        $this->autoRender = false;
        $filter_plots = [];

        $plot_number = $this->Common->bn_to_en($plot_number);

        if ($action == "edit") {
            if (!empty($this->request->query('checked_plots'))) {

                $filter_plots = explode(',', $this->request->query('checked_plots'));

                $plots = $this->Plots->find('all', ['conditions' => ['Plots.dohs_id' => $dohs_id, 'Plots.status !=' => 99, 'Plots.plot_number LIKE' => '%' . $plot_number . '%', 'Plots.id NOT IN' => $filter_plots]])->select(['id', 'dohs_id', 'plot_number']);

                $this->response->body(json_encode($plots));
            } else {

                $plots = $this->Plots->find('all', ['conditions' => ['Plots.dohs_id' => $dohs_id, 'Plots.status !=' => 99, 'Plots.plot_number LIKE' => '%' . $plot_number . '%']])->select(['id', 'dohs_id', 'plot_number']);

                $this->response->body(json_encode($plots));
            }

            // $plots = $this->Plots->find('all', ['conditions' => ['Plots.dohs_id' => $dohs_id, 'Plots.plot_number LIKE' => '%' . $plot_number . '%', 'Plots.id NOT IN' => $filter_plots]])->select([ 'id', 'dohs_id', 'plot_number']);
        } else {

            $plots = $this->Plots->find('all', ['conditions' => ['Plots.dohs_id' => $dohs_id, 'Plots.status !=' => 99, 'Plots.plot_number LIKE' => '%' . $plot_number . '%']])->select(['id', 'dohs_id', 'plot_number', 'status'])->toArray();

            // foreach ($plots as $plots)
            // {
            //    $plots['plot_number'] = $this->Common->en_to_bn($plots['plot_number']);

            //  }

            $this->response->body(json_encode($plots));
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Plot id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Auth->user();
        $time = time();

        $plot = $this->Plots->get($id, [
            'contain' => ['Districts', 'Dohss', 'LandType']
        ]);

        $plot['allotment_date'] = $this->Common->bn_to_en($plot['allotment_date']);
        $plot['plot_number'] = $this->Common->en_to_bn($plot['plot_number']);
        $plot['road_number'] = $this->Common->en_to_bn($plot['road_number']);
        $plot['total_area'] = $this->Common->en_to_bn($plot['total_area']);
        $plot['area_north'] = $this->Common->en_to_bn($plot['area_north']);
        $plot['area_south'] = $this->Common->en_to_bn($plot['area_south']);
        $plot['area_east'] = $this->Common->en_to_bn($plot['area_east']);
        $plot['area_west'] = $this->Common->en_to_bn($plot['area_west']);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            $data['update_by'] = $user['id'];
            $data['update_date'] = $time;
            $data['plot_number'] = $this->Common->bn_to_en($data['plot_number']);
            $data['road_number'] = $this->Common->bn_to_en($data['road_number']);
            $data['total_area'] = $this->Common->bn_to_en($data['total_area']);
            $data['area_north'] = $this->Common->bn_to_en($data['area_north']);
            $data['area_south'] = $this->Common->bn_to_en($data['area_south']);
            $data['area_east'] = $this->Common->bn_to_en($data['area_east']);
            $data['area_west'] = $this->Common->bn_to_en($data['area_west']);


            if (!empty($data['lease_blank_residential'])) {


                switch ($data['lease_blank_residential']) {
                    case "is_lease":
                        $data['is_lease'] = 1;
                        $data['is_blank'] = 0;
                        $data['is_residential'] = 0;
                        break;
                    case "is_blank":
                        $data['is_lease'] = 0;
                        $data['is_blank'] = 1;
                        $data['is_residential'] = 0;

                        break;
                    case "is_residential":
                        $data['is_lease'] = 0;
                        $data['is_blank'] = 0;
                        $data['is_residential'] = 1;
                        break;

                }

            }
            $plot = $this->Plots->patchEntity($plot, $data);


            if ($this->Plots->save($plot)) {
                $this->Flash->success('The plot has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The plot could not be saved. Please, try again.');
            }
        }
        $this->loadModel('Districts');

//        $districts = $this->Districts->find('list', [
//                    'keyField' => 'district_bbs_code',
//                    'keyValue' => 'name_en'
//                ])->toArray();
//                
        $districts = $this->Districts->find('list');
        //  $upazilas = $this->Plots->Upazilas->find('list');
        // $moujas = $this->Plots->RsMoujas->find('list', ['conditions' => ['status' => 1]]);
        $dohs = $this->Plots->Dohss->find('list', ['conditions' => ['status' => 1]]);

        $landTypes = $this->Plots->LandType->find('list', ['conditions' => ['status' => 1]]);

        $this->set(compact('plot', 'districts', 'dohs', 'landTypes'));
        $this->set('_serialize', ['plot']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Plot id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {

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
