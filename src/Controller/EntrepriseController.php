<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

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
        $entreprise = null;
        $query = null;

        if ($id != null) {
            $entreprise = TableRegistry::getTableLocator()->get('entreprise');
            $query = $entreprise->find()->where(['id_entre' => $id]);
        } else {
            $entreprise = TableRegistry::getTableLocator()->get('entreprise');
            $query = $entreprise->find();
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
        $entrepriseTable = TableRegistry::getTableLocator()->get('entreprise');

        $exist = $entrepriseTable->exists(['siren' => $requete['siren']]);

        if (!$exist) {
            $entreprise = [
                'nom' => $requete['nom'],
                'horaire' => $requete['horaire'],
                'localisation' => $requete['address'],
                'gpsx' => $requete['gpsx'],
                'gpsy' => $requete['gpsy'],
                'siren' => $requete['siren'],
            ];
            $entity = $entrepriseTable->newEntity($entreprise);
            if ($entrepriseTable->save($entity)) {
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
     *
     * @return array
     */
    public function update($requete, $id): array
    {
        $datas = null;

        $entrepriseTable = TableRegistry::getTableLocator()->get('entreprise');

        $entreprise = $entrepriseTable->get($id);

        foreach ($requete as $index => $row) {
            if ($index != 'id') {
                $entreprise->$index = $requete[$index];
                $datas[$index] = $row;
            }
        }

        if ($entrepriseTable->save($entreprise)) {
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
        $connection = ConnectionManager::get('default');
        $connection->delete('entreprise', ['id' => $id]);

        return ['Ok'];
    }
}
