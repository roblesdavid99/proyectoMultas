<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Prestamos Model
 *
 * @property \App\Model\Table\EquiposTable&\Cake\ORM\Association\BelongsTo $Equipos
 *
 * @method \App\Model\Entity\Prestamo newEmptyEntity()
 * @method \App\Model\Entity\Prestamo newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Prestamo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Prestamo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Prestamo findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Prestamo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Prestamo[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Prestamo|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Prestamo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Prestamo[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Prestamo[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Prestamo[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Prestamo[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PrestamosTable extends Table
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

        $this->setTable('prestamos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Equipos', [
            'foreignKey' => 'equipo_id',
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
            ->date('fechaInicio')
            ->requirePresence('fechaInicio', 'create')
            ->notEmptyDate('fechaInicio');

        $validator
            ->date('fechaFin')
            ->requirePresence('fechaFin', 'create')
            ->notEmptyDate('fechaFin');

        // $validator
            // ->date('fechaEntrega')
            // ->requirePresence('fechaEntrega', 'create')
            // ->notEmptyDate('fechaEntrega');

        $validator
            ->scalar('usuario')
            ->maxLength('usuario', 255)
            ->requirePresence('usuario', 'create')
            ->notEmptyString('usuario');

        $validator
            ->scalar('estado')
            ->maxLength('estado', 255)
            ->requirePresence('estado', 'create')
            ->notEmptyString('estado');

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
        $rules->add($rules->existsIn('equipo_id', 'Equipos'), ['errorField' => 'equipo_id']);

        return $rules;
    }
}
