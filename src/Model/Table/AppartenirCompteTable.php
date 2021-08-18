<?php
// src/Model/Table/AppartenirCompteTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class AppartenirCompteTable extends Table
{
    public function initialize(array $config): void
    {
        $this->addBehavior('Timestamp');
    }
}