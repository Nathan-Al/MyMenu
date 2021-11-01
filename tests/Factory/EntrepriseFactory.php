<?php
declare(strict_types=1);

namespace App\Test\Factory;

use CakephpFixtureFactories\Factory\BaseFactory as CakephpBaseFactory;
use Faker\Generator;

/**
 * EntrepriseFactory
 *
 * @method \App\Model\Entity\Entreprise getEntity()
 * @method \App\Model\Entity\Entreprise[] getEntities()
 * @method \App\Model\Entity\Entreprise|\App\Model\Entity\Entreprise[] persist()
 * @static \App\Model\Entity\Entreprise get(mixed $primaryKey, array $options)
 */
class EntrepriseFactory extends CakephpBaseFactory
{
    /**
     * Defines the Table Registry used to generate entities with
     *
     * @return string
     */
    protected function getRootTableRegistryName(): string
    {
        return 'Entreprise';
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
                'id_entre' => 1,
                'nom' => $faker->text(70),
                'horaire' => $faker->text(100),
                'localisation' => $faker->text(50),
                'gpsx' => $faker->text(100),
                'gpsy' => $faker->text(100),
                'siret_siren' => $faker->text(100),
                'created' => '2007-03-18 10:39:23',
                'modified' => '2007-03-18 10:39:23',
            ];
        });
    }
}
