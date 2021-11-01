<?php

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class EntrepriseFixture extends TestFixture
{
  // Facultatif. Définissez cette variable pour charger des fixtures avec
  // une base de données de test différente.
  public $connection = 'test';

  public function init(): void
  {
      $this->records = [
          [
            'nom' => 'Auto Generate one',
            'horaire' => 'Lundi a Mardi',
            'localisation' => 'Auto Generate one Le monde',
            'gpsx' => '15.1511615616156',
            'gpsy' => '-0.151651611',
            'siret_siren' => 'RGR5156185',
            'created' => date('Y-m-d H:i:s'),
            'modified' => date('Y-m-d H:i:s'),
          ],
      ];
      parent::init();
  }

  public $fields = [
        'id_entre' => ['type' => 'integer'],
        'nom' => ['type' => 'string', 'length' => 70, 'null' => false],
        'horaire' => ['type' => 'string', 'length' => 100, 'null' => false],
        'localisation' => ['type' => 'string', 'length' => 50, 'null' => false],
        'gpsx' => ['type' => 'string', 'length' => 100, 'null' => false],
        'gpsy' => ['type' => 'string', 'length' => 100, 'null' => false],
        'siret_siren' => ['type' => 'string', 'length' => 20, 'null' => false],
        'created' => 'datetime',
        'modified' => 'datetime',
        '_constraints' => [
        'primary' => ['type' => 'primary', 'columns' => ['id_entre']]
      ]
  ];
  public $records = [
      [
        'nom' => 'First Entreprise',
        'horaire' => 'Lundi a Mardi',
        'localisation' => 'Le monde',
        'gpsx' => '15.1511615616156',
        'gpsy' => '-0.151651611',
        'siret_siren' => 'RGR5156185',
        'created' => '2007-03-18 10:39:23',
        'modified' => '2007-03-18 10:41:31'
      ],
      [
        'nom' => 'Second Entreprise',
        'horaire' => 'Lundi a Mardi',
        'localisation' => 'Le monde',
        'gpsx' => '3.22185855',
        'gpsy' => '-6.285211585',
        'siret_siren' => '51FH156185',
        'created' => '2007-03-18 10:41:23',
        'modified' => '2007-03-18 10:43:31'
      ],
      [
        'nom' => 'Third Entreprise',
        'horaire' => 'Lundi a Mardi',
        'localisation' => 'Le monde',
        'gpsx' => '5.15151570856',
        'gpsy' => '-10.26520274',
        'siret_siren' => '18RH18R1R8',
        'created' => '2007-03-18 10:43:23',
        'modified' => '2007-03-18 10:45:31'
      ]
  ];
}