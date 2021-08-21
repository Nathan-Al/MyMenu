<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Controller\ProduitController;

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
        $this->viewBuilder()->setClassName('Json');
        $entity = $this->request->getParam('entity');
        $id = $this->request->getParam('id') ?? null;
        $datas = null;

        switch ($entity) {
            case 'entreprise' :
                $entreprise = new EntrepriseController();
                $datas = $entreprise->read($id);
                break;
            case 'produit':
                $produit = new ProduitController();
                $datas = $produit->read($id);
                break;
            default:
                break;
        }

        $this->set('response', $datas);
        $this->set('_jsonOptions', JSON_FORCE_OBJECT);
        $this->set('_serialize', ['response']);
        $this->viewBuilder()->setOption('serialize', ['response']);
    }

    /**
     * Add new data in the bdd
     * 
     * @return void
     */
    public function add(): void
    {
        $this->viewBuilder()->setClassName('Json');
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
        $this->set('_jsonOptions', JSON_FORCE_OBJECT);
        $this->set('_serialize', ['response']);
    }

    /**
     * Update datas in the bdd
     * 
     * @return void
     */
    public function update()
    {
        $this->viewBuilder()->setClassName('Json');
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
        $this->set('_jsonOptions', JSON_FORCE_OBJECT);
        $this->set('_serialize', ['response']);
    }

    /**
     * Delete datas in the bdd
     * 
     * @return void
     */
    public function delete()
    {
        $this->viewBuilder()->setClassName('Json');

        $entityExist = ['produit','entreprise'];
        $entity = $this->request->getParam('entity');
        $id = $this->request->getParam('id');
        $datas = null;

        if (isset($this->request->getData()['data'])) {
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
        }

        $this->set('response', $datas);
        $this->set('_jsonOptions', JSON_FORCE_OBJECT);
        $this->set('_serialize', ['response']);
    }
}