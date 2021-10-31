<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Index\ReadController Test Case
 *
 * @uses \App\Controller\Index\ReadController
 */
class ReadControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Produit',
        'app.Entreprise',
    ];

    public function setUp(): void
    {
        parent::setUp();
        $this->nullResponse = '{"response":null}';
        $this->Produit = $this->getTableLocator()->get('Produit');
        $this->Entreprise = $this->getTableLocator()->get('Entreprise');
    }

    /**
     * Test readProduit method
     *
     * @return void
     * @uses \App\Controller\Index\ReadController::read()
     */
    public function testReadAllProduit(): void
    {
        $this->get('/ask/produit');
        $this->assertResponseOk();
        $this->assertContentType('json');
        $this->assertResponseNotEmpty();
        $bodyResponse = preg_replace('/\s+/', '', preg_replace("/<br>|\n/", '', $this->_response->getBody()->__toString()));
        $this->assertTextNotEquals($this->nullResponse, $bodyResponse);
        parent::tearDown();
    }

    /**
     * Test readEntreprise method
     *
     * @return void
     * @uses \App\Controller\Index\ReadController::read()
     */
    public function testReadAllEntreprise(): void
    {
        $this->get('/ask/entreprise');
        $this->assertResponseOk();
        $this->assertContentType('json');
        $this->assertResponseNotEmpty();
        $bodyResponse = preg_replace('/\s+/', '', preg_replace("/<br>|\n/", '', $this->_response->getBody()->__toString()));
        $this->assertTextNotEquals($this->nullResponse, $bodyResponse);
        parent::tearDown();
    }

    /**
     * Test readCompte method
     *
     * @return void
     * @uses \App\Controller\Index\ReadController::read()
     */
    // public function testReadCompte(): void
    // {
    //     $this->post('/utilisateur');
    //     $this->assertResponseOk();
    //     $this->assertContentType('json');
    //     $this->assertResponseNotEmpty();
    //     $bodyResponse = preg_replace('/\s+/', '', preg_replace("/<br>|\n/", '', $this->_response->getBody()->__toString()));
    //     $this->assertTextNotEquals($this->nullResponse, $bodyResponse);
    //     parent::tearDown();
    // }
}
