<?php

namespace App\Controller;

use App\Controller\AppController;

// src/Controller/AdminController.php
class CompteController extends AppController
{
    /**
     * Compte user using credential in the bdd
     *
     * @return void
     */
    public function connect()
    {

    }

    /**
     * Read : only use get actions to read the bdd
     *
     * @param int $id id
     * @return array
     */
    public function read($id)
    {
        $this->loadModel('Compte');
        $query = null;

        if ($id != null) {
            $query = $this->Compte->find()->where(['id_compt' => $id]);
        } else {
            $query = $this->Compte->find();
        }

        foreach ($query as $row) {
            $datas[] = [
                'id' => $row->id_compt,
                'pseudo' => $row->pseudo,
                'nom' => $row->nom,
                'prenom' => $row->prenom,
                'mdp' => $row->mdp,
                'created' => $row->created,
                'modified' => $row->modified,
                'type' => $row->type,
            ];
        }

        return $datas;
    }
}
