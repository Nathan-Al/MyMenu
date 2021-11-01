<?php

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class ProduitFixture extends TestFixture
{
  // Facultatif. Définissez cette variable pour charger des fixtures avec
  // une base de données de test différente.
  public $connection = 'test';

  public $fields = [
        'id_prod' => ['type' => 'integer'],
        'nom' => ['type' => 'string', 'length' => 50, 'null' => false],
        'composant' => ['type' => 'string', 'length' => 200, 'null' => false],
        'prix' => ['type' => 'integer', 'default' => '0', 'null' => false],
        'type' => ['type' => 'string', 'length' => 70, 'null' => false],
        'created' => 'datetime',
        'modified' => 'datetime',
        'id_entreprise_produit' => ['type' => 'integer'],
        '_constraints' => [
        'primary' => ['type' => 'primary', 'columns' => ['id_prod']]
      ]
  ];
  public $records = [
      [
        'nom' => 'First Article',
        'composant' => 'First Article Body',
        'prix' => 1000,
        'type' => 'nouriture',
        'created' => '2007-03-18 10:39:23',
        'modified' => '2007-03-18 10:41:31',
        'id_entreprise_produit' => 1
      ],
      [
        'nom' => 'Second Article',
        'composant' => 'Second Article Body',
        'prix' => 20,
        'type' => 'nouriture',
        'created' => '2007-03-18 10:41:23',
        'modified' => '2007-03-18 10:43:31',
        'id_entreprise_produit' => 2
      ],
      [
        'nom' => 'Third Article',
        'composant' => 'Third Article Body',
        'prix' => 30,
        'type' => 'nouriture',
        'created' => '2007-03-18 10:43:23',
        'modified' => '2007-03-18 10:45:31',
        'id_entreprise_produit' => 1
      ]
  ];
 }