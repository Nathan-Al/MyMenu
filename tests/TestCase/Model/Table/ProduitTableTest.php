<?php

namespace App\Test\TestCase\Model\Table;

use App\Test\Factory\ProduitFactory;
use Cake\TestSuite\TestCase;

class ProduitTableTest extends TestCase
{
    // protected $fixtures = ['app.Produit'];

    // public function setUp(): void
    // {
    //     parent::setUp();
    //     $this->Produit = $this->getTableLocator()->get('Produit');
    //     $this->expected = [
    //         'nom' => 'First Article',
    //         'composant' => 'First Article Body',
    //         'prix' => 10,
    //         'type' => 'nouriture',
    //         'created' => '2007-03-18 10:39:23',
    //         'modified' => '2007-03-18 10:41:31',
    //         'id_entreprise_produit' => 1,
    //         'id_prod' => 1,
    //     ];
    // }

    // //Can't work with Factory and faker
    // public function testFindFirst(): void
    // {
    //     ProduitFactory::make(['first' => 1], 1)->persist();
    //     $query = $this->Produit->find('first')->all();
    //     $result = $this->Produit->find('first')->find('list')->toArray();
    //     $this->assertInstanceOf('Cake\ORM\ResultSet', $query);
    //     $this->assertNotEmpty($result);
    //     // Manual deletion (The frameworkd should do it himself)
    //     $entity = $this->Produit->get(1);
    //     $result = $this->Produit->delete($entity);
    // }
}
