<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * Compte Entity
 *
 * @property int $id_compt
 * @property string $pseudo
 * @property string $nom
 * @property string $prenom
 * @property string $mdp
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property bool|null $type
 */
class Compte extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'pseudo' => true,
        'nom' => true,
        'prenom' => true,
        'mdp' => true,
        'created' => true,
        'modified' => true,
        'type' => true,
    ];

    /**
     * Generate crypted mdp
     *
     * @return Authentication\PasswordHasher\DefaultPasswordHasher
     */
    protected function _setMdp(string $mdp): ?string
    {
        if (strlen($mdp) > 0) {
            return (new DefaultPasswordHasher())->hash($mdp);
        }
    }
}
