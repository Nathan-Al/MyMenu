<?php
// src/Model/Table/ProduitTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class ProduitTable extends Table
{
    public function initialize(array $config): void
    {
        $this->addBehavior('Timestamp');
    }
}
