<?php
// src/Model/Table/AppartenirCompteTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class AppartenirCompteTable extends Table
{
    /**
     * Initialize AppartenirCompteTable Table function
     *
     * @param array $config config
     * @return void
     */
    public function initialize(array $config): void
    {
        $this->addBehavior('Timestamp');

        // $this->hasOne('Compte')
        // ->setForeignKey('id_compt')
        // ->setDependent(true)
        // ->setCascadeCallbacks(true);

        // $this->hasOne('Entreprise')
        // ->setForeignKey('id_entre')
        // ->setDependent(true)
        // ->setCascadeCallbacks(true);
    }
}
