<?php

namespace App\Test\TestCase\Model\Table;

use App\Test\Factory\EntrepriseFactory;
use Cake\TestSuite\TestCase;

class EntrepriseTableTest extends TestCase
{
    // protected $fixtures = ['app.Entreprise'];

    // public function setUp(): void
    // {
    //     parent::setUp();
    //     $this->Entreprise = $this->getTableLocator()->get('Entreprise');
    //     $this->expected = [
    //         'nom' => 'First Entreprise',
    //         'horaire' => 'Lundi a Mardi',
    //         'localisation' => 'Le monde',
    //         'gpsx' => '15.1511615616156',
    //         'gpsy' => '-0.151651611',
    //         'siret_siren' => 'RGR5156185',
    //         'created' => '2007-03-18 10:39:23',
    //         'modified' => '2007-03-18 10:41:31',
    //         'id_entre' => 1,
    //     ];
    // }

    // //Can't work with Factory and faker
    // public function testFindFirst(): void
    // {
    //     EntrepriseFactory::make(['first' => 1], 1)->persist();
    //     $query = $this->Entreprise->find('first')->all();
    //     $result = $this->Entreprise->find('first')->find('list')->toArray();
    //     $this->assertInstanceOf('Cake\ORM\ResultSet', $query);
    //     $this->assertNotEmpty($result);
    //     $entity = $this->Entreprise->get(1);
    //     $result = $this->Entreprise->delete($entity);
    // }
}
