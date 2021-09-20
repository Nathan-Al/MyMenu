<?php

// src/Model/Table/EntrepriseTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class EntrepriseTable extends Table
{
    /**
     * Initialize Entreprise Table function
     *
     * @param array $config config
     * @return void
     */
    public function initialize(array $config): void
    {
        $this->addBehavior('Timestamp');

        $this->hasOne('AppartenirCompte')
        ->setForeignKey('id_compt')
        ->setDependent(true)
        ->setCascadeCallbacks(true);

        $this->hasMany('Produit')
        ->setForeignKey('id_entreprise_produit')
        ->setDependent(true)
        ->setCascadeCallbacks(true);
    }
}
