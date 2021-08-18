<?php
// src/Model/Table/CompteTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class CompteTable extends Table
{
    public function initialize(array $config): void
    {
        $this->addBehavior('Timestamp');
    }
}