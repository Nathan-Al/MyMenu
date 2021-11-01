<?php
// src/Model/Table/CompteTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class CompteTable extends Table
{
    /**
     * Initialize Compte Table function
     *
     * @param array $config config
     * @return void
     */
    public function initialize(array $config): void
    {
        $this->addBehavior('Timestamp');
        $this->hasOne('AppartenirCompte');
    }
}
