<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\IndexController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Index\DeleteController Test Case
 *
 * @uses \App\Controller\Index\DeleteController
 */
class DeleteControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Entreprise',
        'app.Produit',
    ];

    public function setUp(): void
    {
        parent::setUp();
        $this->nullResponse = '{"response":null}';
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\IndexController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
