<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\HomeController Test Case
 *
 * @uses \App\Controller\HomeController
 */
class HomeControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Entreprise',
        //'app.AppartenirCompte',
        'app.Produit',
    ];

    public function setUp(): void
    {
        parent::setUp();
        $this->nullResponse = '{"response":null}';
    }

    public function testIndex(): void
    {
        $this->get('/');

        $this->assertResponseOk();
        // More asserts.
    }
}
