<?php
// src/Model/Table/ProduitTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class ProduitTable extends Table
{
    /**
     * Initialize Produit Table function
     *
     * @param array $config config
     * @return void
     */
    public function initialize(array $config): void
    {
        $this->addBehavior('Timestamp');
    }
}
