<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Compte Model
 *
 * @method \App\Model\Entity\Compte newEmptyEntity()
 * @method \App\Model\Entity\Compte newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Compte[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Compte get($primaryKey, $options = [])
 * @method \App\Model\Entity\Compte findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Compte patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Compte[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Compte|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Compte saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Compte[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Compte[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Compte[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Compte[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CompteTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('compte');
        $this->setDisplayField('id_compt');
        $this->setPrimaryKey('id_compt');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id_compt')
            ->allowEmptyString('id_compt', null, 'create');

        $validator
            ->scalar('pseudo')
            ->maxLength('pseudo', 20)
            ->requirePresence('pseudo', 'create')
            ->notEmptyString('pseudo');

        $validator
            ->scalar('nom')
            ->maxLength('nom', 30)
            ->requirePresence('nom', 'create')
            ->notEmptyString('nom');

        $validator
            ->scalar('prenom')
            ->maxLength('prenom', 25)
            ->requirePresence('prenom', 'create')
            ->notEmptyString('prenom');

        $validator
            ->scalar('mdp')
            ->maxLength('mdp', 100)
            ->requirePresence('mdp', 'create')
            ->notEmptyString('mdp');

        $validator
            ->boolean('type')
            ->allowEmptyString('type');

        return $validator;
    }
}
