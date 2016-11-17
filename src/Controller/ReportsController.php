<?php
/**
 * Created by PhpStorm.
 * User: amran08
 * Date: 10/7/2016
 * Time: 5:42 PM
 */
namespace App\Controller;

use App\Controller\AppController;


class ReportsController extends AppController

{
    public $paginate = [
        'limit' => 100,
        'order' => [
            'Buildings.id' => 'desc'
        ]
    ];


    public function ajaxOwnerLoad()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {

            $this->viewBuilder()->layout('ajax');
            //  $url = $this->url->build('/Owners/view/3');
            $data = "sasas";
            $this->response->body();
        }

    }

    public
    function index()
    {

        $this->loadModel('Dohss');
        $this->loadModel('Buildings');
        $this->loadModel('Apartments');
        $this->loadModel('Houses');
        $this->loadModel('Owners');
        $this->loadModel('BuildingPlotInfo');
        $reports = "";
        $result = "";
        if ($this->request->is('post')) {
            $data = $this->request->data;

            $dohs_id = $data['dohs_id'];
            $property = $data['property_type'];

            if ($property == 'apartment') {
                $result = $this->Buildings->find('all')
                    ->contain([
                        'Dohss' => function ($q) use ($dohs_id) {
                            return $q->where(['Dohss.id' => $dohs_id]);
                        },
                        'BuildingPlotInfo' => function ($q) {
                            return $q->contain(['Plots'])->where(['Plots.status'=>1]);
                        },
                        'Apartments' => function ($q) {
                            return $q->contain([
                                'Owners' => function ($q) {
                                    return $q->where(['Owners.status' => 1,'Owners.property_type_table_name'=>'Apartments']);
                                },
                            ])->where(['Apartments.status'=>1]);
                        },
                        'Owners' => function ($q) {
                            return $q->where(['Owners.status' => 1,'Owners.property_type_table_name'=>'Buildings']);
                        }
                    ])
                    ->where(['Buildings.is_apartment' => 1, 'Buildings.status' => 1]);

                $data_ap = 1;
                $this->set('data_ap', $data_ap);
                $this->set('result', $this->paginate($result));
                $this->set('_serialize', ['result']);
            }
            if ($property == 'house') {
                $result = $this->Buildings->find('all')
                    ->contain([
                        'Dohss','BuildingPlotInfo.Plots', 'Houses.Owners'
                    ])
                    ->where(['Dohss.id' => $dohs_id, 'Buildings.is_house' => true,'Buildings.status' => 1]);

                $data_house = 1;
                $this->set('data_house', $data_house);
                $this->set('result', $result);

                $this->set('result', $this->paginate($result));
                $this->set('_serialize', ['result']);

            }

            if ($property == 'market') {
                $result = $this->Buildings->find('all')
                    ->contain([
                        'Dohss', 'Owners'
                    ])
                    ->where(['Dohss.id' => $dohs_id, 'Buildings.is_market' => true]);

                $data_market = 1;


                $this->set('data_market', $data_market);
                $this->set('result', $result);

                $this->set('result', $this->paginate($result));
                $this->set('_serialize', ['result']);

            }

        }
        $dohs = $this->Dohss->find('list', ['conditions' => ['status' => 1]])->toArray();
        $this->set('dohs', $dohs);
        $this->set('reports', $reports);
        $this->set('result', $result);
        $this->set('_serialize', ['reports']);


    }

}