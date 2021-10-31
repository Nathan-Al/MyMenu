<?php
declare(strict_types=1);

namespace App\Test\Factory;

use Cake\I18n\Date;
use CakephpFixtureFactories\Factory\BaseFactory as CakephpBaseFactory;
use Faker\Generator;

/**
 * ProduitFactory
 *
 * @method \App\Model\Entity\Produit getEntity()
 * @method \App\Model\Entity\Produit[] getEntities()
 * @method \App\Model\Entity\Produit|\App\Model\Entity\Produit[] persist()
 * @static \App\Model\Entity\Produit get(mixed $primaryKey, array $options)
 */
class ProduitFactory extends CakephpBaseFactory
{
    /**
     * Defines the Table Registry used to generate entities with
     *
     * @return string
     */
    protected function getRootTableRegistryName(): string
    {
        return 'Produit';
    }

    /**
     * Defines the factory's default values. This is useful for
     * not nullable fields. You may use methods of the present factory here too.
     *
     * @return void
     */
    protected function setDefaultTemplate(): void
    {
        $this->setDefaultData(function (Generator $faker) {
            return [
                'id_prod' => 1,
                'nom' => $faker->text(50),
                'composant' => $faker->text(200),
                'prix' => $faker->numberBetween(0,10),
                'type' => $faker->text(70),
                'created' => '2007-03-18 10:39:23',
                'modified' => '2007-03-18 10:39:23',
            ];
        });
    }
}
