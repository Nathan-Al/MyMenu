<?php

namespace App\Controller;

use App\Controller\AppController;

// src/Controller/EntrepriseController.php
class EntrepriseController extends AppController
{
    /**
     * Read : only use get actions to read the bdd
     *
     * @param int $id id
     * @return array
     */
    public function read($id): array
    {
        $this->loadModel('Entreprise');
        $query = null;

        if ($id != null) {
            $query = $this->Entreprise->find()->where(['id_entre' => $id]);
        } else {
            $query = $this->Entreprise->find();
        }

        foreach ($query as $row) {
            $datas[] = [
                'id' => $row->id_entre,
                'nom' => $row->nom,
                'horaire' => $row->horaire,
                'localisation' => $row->localisation,
                'gpsX' => $row->gpsx,
                'gpsY' => $row->gpsy,
                'siren' => $row->siren,
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
        $this->loadModel('Entreprise');

        $exist = $this->Entreprise->exists(['siren' => $requete['siren']]);

        if (!$exist) {
            $entreprise = [
                'nom' => $requete['nom'],
                'horaire' => $requete['horaire'],
                'localisation' => $requete['address'],
                'gpsx' => $requete['gpsx'],
                'gpsy' => $requete['gpsy'],
                'siren' => $requete['siren'],
            ];
            $entity = $this->Entreprise->newEntity($entreprise);
            if ($this->Entreprise->save($entity)) {
                return $entreprise;
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

        $this->loadModel('Entreprise');

        $entreprise = $this->Entreprise->get($id);

        foreach ($requete as $index => $row) {
            if ($index != 'id') {
                $entreprise->$index = $requete[$index];
                $datas[$index] = $row;
            }
        }

        if ($this->Entreprise->save($entreprise)) {
            return $datas;
        } else {
            return ['Impossible to update'];
        }
    }

    /**
     * update : only use delete actions to delete in bdd
     *
     * @param int $id id
     * @return array
     */
    public function delete($id): array
    {
        $this->loadModel('Entreprise');
        $entity = $this->Produit->get($id);
        $result = $this->Produit->delete($entity);

        return [$result];
    }
}
