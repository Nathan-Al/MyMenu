<?php

namespace App\Controller;

use App\Controller\AppController;

// src/Controller/IndexController.php
class IndexController extends AppController
{
    /**
     * Read
     *
     * @return void
     */
    public function read()
    {
        $this->response = $this->response->cors($this->request)
            ->allowOrigin(['*'])
            ->allowMethods(['GET'])
            // ->allowHeaders(['X-CSRF-Token'])
            // ->allowCredentials()
            // ->exposeHeaders(['Link'])
            ->maxAge(300)
            ->build();

        $entity = $this->request->getParam('entity');
        $id = $this->request->getParam('id') ?? null;
        $datas = null;

        switch ($entity) {
            case 'entreprise':
                $entreprise = new EntrepriseController();
                $datas = $entreprise->read($id);
                break;
            case 'produit':
                $produit = new ProduitController();
                $datas = $produit->read($id);
                break;
            case 'compte':
                $compte = new CompteController();
                $datas = $compte->read($id);
                break;
            default:
                break;
        }

        $this->set('response', $datas);
        $this->viewBuilder()->setClassName('Json');
        $this->viewBuilder()->setOption('serialize', ['response']);
        $this->viewBuilder()->setOption('jsonOptions', JSON_FORCE_OBJECT);
    }

    /**
     * Add new data in the bdd
     *
     * @return void
     */
    public function add(): void
    {
        $entityExist = ['produit','entreprise'];
        $entity = $this->request->getParam('entity');

        $datas = null;
        $requete = null;

        if (isset($this->request->getData()['data'])) {
            $requete = $this->request->getData()['data'];

            if (in_array($entity, $entityExist)) {
                switch ($entity) {
                    case 'produit':
                        $produit = new ProduitController();
                        $datas = $produit->insert($requete);

                        break;
                    case 'entreprise':
                        $entrerprise = new EntrepriseController();
                        $datas = $entrerprise->insert($requete);

                        break;
                }
            }
        }

        $this->set('response', $datas);
        $this->viewBuilder()->setClassName('Json');
        $this->viewBuilder()->setOption('serialize', ['response']);
        $this->viewBuilder()->setOption('jsonOptions', JSON_FORCE_OBJECT);
    }

    /**
     * Update datas in the bdd
     *
     * @return void
     */
    public function update()
    {
        $entityExist = ['produit','entreprise'];
        $entity = $this->request->getParam('entity');
        $id = $this->request->getParam('id');

        $datas = null;
        $requete = null;

        if (isset($this->request->getData()['data'])) {
            $requete = $this->request->getData()['data'];

            if (in_array($entity, $entityExist)) {
                switch ($entity) {
                    case 'produit':
                        $produit = new ProduitController();
                        $datas = $produit->update($requete, $id);

                        break;
                    case 'entreprise':
                        $entrerprise = new EntrepriseController();
                        $datas = $entrerprise->update($requete, $id);

                        break;
                }
            }
        }

        $this->set('response', $datas);
        $this->viewBuilder()->setClassName('Json');
        $this->viewBuilder()->setOption('serialize', ['response']);
        $this->viewBuilder()->setOption('jsonOptions', JSON_FORCE_OBJECT);
    }

    /**
     * Delete datas in the bdd
     *
     * @return void
     */
    public function delete()
    {
        $entityExist = ['produit','entreprise'];
        $entity = $this->request->getParam('entity');
        $id = $this->request->getParam('id');
        $datas = null;

        if (in_array($entity, $entityExist)) {
            switch ($entity) {
                case 'produit':
                    $produit = new ProduitController();
                    $datas = $produit->delete($id);

                    break;
                case 'entreprise':
                    $entrerprise = new EntrepriseController();
                    $datas = $entrerprise->delete($id);

                    break;
            }
        }

        $this->set('response', $datas);
        $this->viewBuilder()->setClassName('Json');
        $this->viewBuilder()->setOption('serialize', ['response']);
        $this->viewBuilder()->setOption('jsonOptions', JSON_FORCE_OBJECT);
    }

    /**
     * Delete datas in the bdd
     *
     * @return void
     */
    public function connect()
    {
        $datas = null;

        if (isset($this->request->getData()['data'])) {
            $requete = $this->request->getData()['data'];
            $utilisateur = new UtilisateurController();
            $datas = $utilisateur->connexion($requete);
        }

        $this->set('response', $datas);
        $this->viewBuilder()->setClassName('Json');
        $this->viewBuilder()->setOption('serialize', ['response']);
        $this->viewBuilder()->setOption('jsonOptions', JSON_FORCE_OBJECT);
    }
}
