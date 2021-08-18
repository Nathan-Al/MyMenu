<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

// src/Controller/ProduitController.php
class ProduitController extends AppController
{
    /**
     * Read : only use get actions to read the bdd
     * 
     * @param int $id id
     *
     * @return array
     */
    public function read($id): array
    {
        $datas = null;

        if ($id != null) {
            $produit = TableRegistry::getTableLocator()->get('produit');
            $query = $produit->find()->where(['id_prod' => $id]);
        } else {
            $produit = TableRegistry::getTableLocator()->get('produit');
            $query = $produit->find();
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
     *
     * @return array
     */
    public function insert($requete): array
    {
        $produitTable = TableRegistry::getTableLocator()->get('produit');

        $exist = $produitTable->exists(['id_entreprise_produit' => $requete['relation'], 'nom' => $requete['nom']]);

        if (!$exist) {
            $produit = [
                'nom' => $requete['nom!'],
                'composant' => $requete['component'],
                'prix' => $requete['price'],
                'id_entreprise_produit' => $requete['relation'],
            ];
            $entity = $produitTable->newEntity($produit);
    
            if ($produitTable->save($entity)) {
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
     *
     * @return array
     */
    public function update($requete, $id): array
    {
        $datas = null;

        $produitTable = TableRegistry::getTableLocator()->get('produit');

        $produit = $produitTable->get($id);

        foreach ($requete as $index => $row) {
            if ($index != 'id') {
                $produit->$index = $requete[$index];
                $datas[$index] = $row;
            }
        }

        if ($produitTable->save($produit)) {
            return $datas;
        } else {
            return ['Impossible to update'];
        }
    }

    /**
     * update : only use delete actions to delete in bdd
     * 
     * @param \Cake\Http\ServerRequest $requete requete
     *
     * @return array
     */
    public function delete($id): array
    {
        var_dump($id);
        $connection = ConnectionManager::get('default');
        $connection->delete('produit', ['id' => $id]);

        return ['Ok'];
    }
}
