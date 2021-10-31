<?php
// src/Controller/ArticlesController.php

namespace App\Controller;

class UtilisateurController extends AppController
{
    /**
     * Read : only use get actions to read the bdd
     *
     * @param \Cake\Http\ServerRequest $requete requete
     * @return array
     */
    public function connexion($requete)
    {
        $this->loadModel('Compte');
        $datas = null;

        $query = $this->Compte->find()->where(['pseudo' => $requete['pseudo'], 'mdp' => $requete['mdp']]);

        foreach ($query as $row) {
            $datas[] = [
                'id' => $row->id_compt,
                'pseudo' => $row->pseudo,
                'nom' => $row->nom,
                'prenom' => $row->prenom,
                'created' => $row->created,
                'modified' => $row->modified,
                'type' => $row->type,
            ];
        }

        return $datas;
    }
}
