<?php

namespace App\Controller;

use App\Controller\AppController;

// src/Controller/ProduitController.php
class ProduitController extends AppController
{
    /**
     * Read : only use get actions to read the bdd
     *
     * @param int $id id
     * @return array
     */
    public function read($id): array
    {
        $this->loadModel('Produit');
        $datas = null;

        if ($id != null) {
            $query = $this->Produit->find()->where(['id_prod' => $id]);
        } else {
            $query = $this->Produit->find()->all();
        }

        foreach ($query as $row) {
            $datas[] = [
                'id' => $row->id_prod,
                'nom' => $row->nom,
                'composant' => $row->composant,
            ];
        }

        return $datas;
    }

    /**
     * insert : only use post actions to insert in bdd
     *
     * @param \Cake\Http\ServerRequest $requete requete
     * @return array
     */
    public function insert($requete): array
    {
        $this->loadModel('Produit');

        $exist = $this->Produit->exists(['id_entreprise_produit' => $requete['relation'], 'nom' => $requete['nom']]);

        if (!$exist) {
            $produit = [
                'nom' => $requete['nom'],
                'composant' => $requete['component'],
                'prix' => $requete['price'],
                'id_entreprise_produit' => $requete['relation'],
            ];
            $entity = $this->Produit->newEntity($produit);

            if ($this->Produit->save($entity)) {
                return $produit;
            }
        } else {
            return ['Already exist'];
        }

        return ['Impossible to insert'];
    }

    /**
     * update : only use put actions to update in bdd
     *
     * @param \Cake\Http\ServerRequest $requete requete
     * @param int $id id
     * @return array
     */
    public function update($requete, $id): array
    {
        $datas = null;

        $this->loadModel('Produit');

        $produit = $this->Produit->get($id);

        foreach ($requete as $index => $row) {
            if ($index != 'id') {
                $produit->$index = $requete[$index];
                $datas[$index] = $row;
            }
        }

        if ($this->Produit->save($produit)) {
            return $datas;
        } else {
            return ['Impossible to update'];
        }
    }

    /**
     * delete : only use delete actions to delete in bdd
     *
     * @param int $id id
     * @return array
     */
    public function delete($id): array
    {
        $this->loadModel('Produit');
        $entity = $this->Produit->get($id);
        $result = $this->Produit->delete($entity);

        return [$result];
    }
}
