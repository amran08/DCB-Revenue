<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Cache\Cache;

/**
 * Dashborad Controller
 *
 * @property \App\Model\Table\DashboradTable $Dashborad
 */
class DashboardController extends AppController {

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
//        echo '<pre>';
//        print_r((new DefaultPasswordHasher)->hash('123456'));
//        echo '</pre>';
//        die;

        $this->loadModel('Plots');
        $this->loadModel('Apartments');
        $this->loadModel('Buildings');
        $this->loadModel('Houses');
        $this->loadModel('Dohss');

        $total_plots = $this->Plots->find('all',['conditions'=>['Plots.status !='=>99]])->select(['id'])->toArray();
        $this->set('total_plots',count($total_plots));

        $total_dohs = $this->Dohss->find('all',['conditions'=>['Dohss.status !='=>99]])->select(['id'])->toArray();
        $this->set('total_dohs',count($total_dohs));

        $total_buildings = $this->Buildings->find('all',['conditions'=>['Buildings.status !='=>99]])->select(['id'])->toArray();
        $this->set('total_buildings',count($total_buildings));

        $total_apartments = $this->Apartments->find('all',['conditions'=>['Apartments.status !='=>99]])->select(['id'])->toArray();
        $this->set('total_apartments',count($total_apartments));

        $total_houses = $this->Houses->find('all',['conditions'=>['Houses.status !='=>99]])->select(['id'])->toArray();
        $this->set('total_houses',count($total_houses));




    }

    public function report(){
        
    }

    public function reportShow() {
         $this->autoRender =false;
       if ($this->request->is('post')) {
        
          
           
         //  $this->response->body($this->render('/Dashboard/result'));
           
       }
        
    }

    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $this->Flash->success(__('Your Have succesfully loged in'));
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Your username or password is incorrect.'));
        }
        $this->viewBuilder()->layout('login');
    }

    public function logout() {
        $this->Flash->success(__('You are now logged out'));
//        Cache::clear(false);
        return $this->redirect($this->Auth->logout());
    }

}
