<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Multas Model
 *
 * @property \App\Model\Table\PrestamosTable&\Cake\ORM\Association\BelongsTo $Prestamos
 *
 * @method \App\Model\Entity\Multa newEmptyEntity()
 * @method \App\Model\Entity\Multa newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Multa[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Multa get($primaryKey, $options = [])
 * @method \App\Model\Entity\Multa findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Multa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Multa[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Multa|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Multa saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Multa[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Multa[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Multa[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Multa[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MultasTable extends Table
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

        $this->setTable('multas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Prestamos', [
            'foreignKey' => 'prestamo_id',
            'joinType' => 'INNER',
        ]);
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('nombreEquipo')
            ->maxLength('nombreEquipo', 255)
            ->requirePresence('nombreEquipo', 'create')
            ->notEmptyString('nombreEquipo');

        $validator
            ->scalar('usuario')
            ->maxLength('usuario', 255)
            ->requirePresence('usuario', 'create')
            ->notEmptyString('usuario');

        $validator
            ->decimal('multa')
            ->requirePresence('multa', 'create')
            ->notEmptyString('multa');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('prestamo_id', 'Prestamos'), ['errorField' => 'prestamo_id']);

        return $rules;
    }
}
