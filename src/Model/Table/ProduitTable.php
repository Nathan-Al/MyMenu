<?php
// src/Model/Table/ProduitTable.php
namespace App\Model\Table;

use Cake\ORM\Query;
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

    public function findFirst(Query $query, array $options): Query
    {
        $query->where([
           'id_prod' => 1
        ]);
        return $query;
    }
}
