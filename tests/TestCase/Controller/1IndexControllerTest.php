<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         1.2.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Test\TestCase\Controller;

use App\Controller\IndexController;
use App\Test\Factory\ProduitFactory;
use Cake\Controller\Controller;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * IndexControllerTest class
 *
 * @uses \App\Controller\IndexControllerTest
 */
class IndexControllerTest extends TestCase
{
    use IntegrationTestTrait;

    public $autoFixtures = false;
    protected $fixtures = ['app.Produit'];
    //protected $fixtures = ['app.Produit', 'app.Entreprise'];

    public function setUp(): void
    {
        parent::setUp();
        $Controller = new Controller();
        $this->Index = new IndexController();
    }

        /**
     * testreadall method
     *
     * @return void
     */
    public function testReadAllProduit(): void
    {
        $this->get('/ask/produit');

        //$this->assertNotEmpty($result);
        $this->assertResponseOk();
        parent::tearDown();
    }

    /**
     * testread method
     *
     * @return void
     */
    public function testReadProduit(): void
    {
        $model = $this->getMockForModel('Produit', ['getAll']);
        $model->expects($this->once())
            ->method('getAll')
            ->will($this->returnValue(['OK']));
    
        $model->getAll();
        $this->getTableLocator()->clear();
        //ProduitFactory::make(['published' => 1], 3)->persist();
        // var_dump($produit);
        // $produit = ProduitFactory::make(4)->getEntity();
        // var_dump($produit);

        //$this->get('/ask/produit/1');

        //$this->assertNotEmpty($result);
        //$this->assertResponseOk();
        //parent::tearDown();
    }

    /**
     * testMultipleGet method
     *
     * @return void
     */
    // public function testAdd(): void
    // {
    //     $this->post('/add/produit/');
    //     $this->assertResponseOk();
    // }

    /**
     * testDisplay method
     *
     * @return void
     */
    // public function testUpdate(): void
    // {
    //     $this->put('/upd/produit/1');
    //     $this->assertResponseOk();
    // }

    /**
     * Test that missing template renders 404 page in production
     *
     * @return void
     */
    // public function testDelete(): void
    // {
    //     $this->delete('/del/produit/1');
    //     $this->assertResponseOk();
    // }

        /**
     * Test that missing template renders 404 page in production
     *
     * @return void
     */
    // public function testConnect(): void
    // {
    //     $this->post('/utilisateur');
    //     $this->assertResponseOk();
    // }
}
