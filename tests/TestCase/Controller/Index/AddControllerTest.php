<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Index\AddController Test Case
 *
 * @uses \App\Controller\Index\AddController
 */
class AddControllerTest extends TestCase
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
     * @uses \App\Controller\Index\AddController::add()
     */
    public function testaddAllProduit(): void
    {
        $data = [
            'data' =>
                    [
                        [
                            'nom' => 'Testy',
                            'component' => 'Inconnue3',
                            'price' => '223',
                            'relation' => '1',
                            'type' => 'créole',
                        ],
                        [
                            'nom' => 'Testy4',
                            'component' => 'Inconnue4',
                            'price' => '2224',
                            'relation' => '1',
                            'type' => 'mexicain',
                        ],
                    ],
                ];

        $this->post('/add/produit', $data);
        $this->assertResponseOk();
        $this->assertContentType('json');
        $this->assertResponseNotEmpty();
        $bodyResponse = preg_replace('/\s+/', '', preg_replace('/<br>|\n/', '', $this->_response->getBody()->__toString()));
        $this->assertTextNotEquals($this->nullResponse, $bodyResponse);

        // Delete when Fixture is fixed
        $query = $this->Produit->find()->where(['nom' => $data['data'][0]['nom']])->toArray();
        $idTab = $query[0]->get('id_prod');
        $entity = $this->Produit->get($idTab);
        $this->Produit->delete($entity);

        // Delete when Fixture is fixed
        $query = $this->Produit->find()->where(['nom' => $data['data'][1]['nom']])->toArray();
        $idTab = $query[0]->get('id_prod');
        $entity = $this->Produit->get($idTab);
        $this->Produit->delete($entity);
        parent::tearDown();
    }

    /**
     * Test readEntreprise method
     *
     * @return void
     * @uses \App\Controller\Index\AddController::add()
     */
    public function testaddAllEntreprise(): void
    {
        $data = [
            'data' =>
                [
                    [
                    'nom' => 'CCora',
                    'horaire' => 'Lundi a Mardi de 8h a 12h',
                    'address' => '502010 Murisia Local Chester',
                    'gpsx' => '145896',
                    'gpsy' => '-1245896',
                    'siren' => 'HFBFIEH15hefj2E0',
                    ],
                ],
            ];

        $this->post('/add/entreprise', $data);
        $this->assertResponseOk();
        $this->assertContentType('json');
        $this->assertResponseNotEmpty();
        $bodyResponse = preg_replace('/\s+/', '', preg_replace('/<br>|\n/', '', $this->_response->getBody()->__toString()));
        $this->assertTextNotEquals($this->nullResponse, $bodyResponse);

        // Delete when Fixture is fixed
        $query = $this->Entreprise->find()->where(['nom' => $data['data'][0]['nom']])->toArray();
        $idTab = $query[0]->get('id_entre');
        $entity = $this->Entreprise->get($idTab);
        $this->Entreprise->delete($entity);
        parent::tearDown();
    }
}
