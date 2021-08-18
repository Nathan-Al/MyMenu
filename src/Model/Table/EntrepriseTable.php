<?php
// src/Model/Table/EntrepriseTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class EntrepriseTable extends Table
{
    public function initialize(array $config): void
    {
        $this->addBehavior('Timestamp');
    }
}