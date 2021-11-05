<?php
declare(strict_types=1);

namespace App\Controller;

use Authentication\PasswordHasher\DefaultPasswordHasher;

/**
 * Compte Controller
 *
 * @property \App\Model\Table\CompteTable $Compte
 * @method \App\Model\Entity\Compte[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CompteController extends AppController
{
    /**
     * Index method
     *
     * @return
     */
    // public function beforeFilter(\Cake\Event\EventInterface $event)
    // {
    //     parent::beforeFilter($event);
    //     // Configure the login action to not require authentication, preventing
    //     // the infinite redirect loop issue
    //     $this->Authentication->addUnauthenticatedActions(['login']);
    // }

    /**
     * Index method
     *
     * @return
     */
    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            // redirect to /articles after login success
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Articles',
                'action' => 'index',
            ]);

            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $compte = $this->paginate($this->Compte);

        $this->set(compact('compte'));
    }

    /**
     * View method
     *
     * @param string|null $id Compte id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $compte = $this->Compte->get($id, [
            'contain' => ['AppartenirCompte'],
        ]);

        $this->set(compact('compte'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $compte = $this->Compte->newEmptyEntity();
        if ($this->request->is('post')) {
            $compte = $this->Compte->patchEntity($compte, $this->request->getData());
            (new DefaultPasswordHasher())->hash($compte->get('mdp'));

            if ($this->Compte->save($compte)) {
                $this->Flash->success(__('The compte has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The compte could not be saved. Please, try again.'));
        }
        $this->set(compact('compte'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Compte id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $compte = $this->Compte->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $compte = $this->Compte->patchEntity($compte, $this->request->getData());
            if ($this->Compte->save($compte)) {
                $this->Flash->success(__('The compte has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The compte could not be saved. Please, try again.'));
        }
        $this->set(compact('compte'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Compte id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $compte = $this->Compte->get($id);
        if ($this->Compte->delete($compte)) {
            $this->Flash->success(__('The compte has been deleted.'));
        } else {
            $this->Flash->error(__('The compte could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
