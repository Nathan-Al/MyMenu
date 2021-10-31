<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\IndexController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Index\UpdateController Test Case
 *
 * @uses \App\Controller\Index\UpdateController
 */
class UpdateControllerTest extends TestCase
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
     * Test update method
     *
     * @return void
     * @uses \App\Controller\IndexController::update()
     */
    public function testUpdate(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}