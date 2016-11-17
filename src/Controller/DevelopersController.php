<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Developers Controller
 *
 * @property \App\Model\Table\DevelopersTable $Developers
 */
class DevelopersController extends AppController
{

	public $paginate = [
        'limit' => 15,
        'order' => [
            'Developers.id' => 'desc'
        ]
    ];

/**
* Index method
*
* @return void
*/
public function index()
{
			$developers = $this->Developers->find('all', [
	'conditions' =>['Developers.status !=' => 99]
	]);
		$this->set('developers', $this->paginate($developers) );
	$this->set('_serialize', ['developers']);
	}

    /**
     * View method
     *
     * @param string|null $id Developer id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user=$this->Auth->user();
        $developer = $this->Developers->get($id, [
            'contain' => []
        ]);
        $this->set('developer', $developer);
        $this->set('_serialize', ['developer']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user=$this->Auth->user();
        $time=time();
        $developer = $this->Developers->newEntity();
        if ($this->request->is('post'))
        {

            $data=$this->request->data;
            $data['create_by']=$user['id'];
            $data['create_date']=$time;
            $developer = $this->Developers->patchEntity($developer, $data);
            if ($this->Developers->save($developer))
            {
                $this->Flash->success('The developer has been saved.');
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('The developer could not be saved. Please, try again.');
            }
        }
        $this->set(compact('developer'));
        $this->set('_serialize', ['developer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Developer id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user=$this->Auth->user();
        $time=time();
        $developer = $this->Developers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $data=$this->request->data;
            $data['update_by']=$user['id'];
            $data['update_date']=$time;
            $developer = $this->Developers->patchEntity($developer, $data);
            if ($this->Developers->save($developer))
            {
                $this->Flash->success('The developer has been saved.');
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('The developer could not be saved. Please, try again.');
            }
        }
        $this->set(compact('developer'));
        $this->set('_serialize', ['developer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Developer id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $developer = $this->Developers->get($id);

        $user=$this->Auth->user();
        $data=$this->request->data;
        $data['updated_by']=$user['id'];
        $data['updated_date']=time();
        $data['status']=99;
        $developer = $this->Developers->patchEntity($developer, $data);
        if ($this->Developers->save($developer))
        {
            $this->Flash->success('The developer has been deleted.');
        }
        else
        {
            $this->Flash->error('The developer could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
