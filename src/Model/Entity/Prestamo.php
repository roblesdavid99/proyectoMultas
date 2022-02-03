<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Prestamo Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $fechaInicio
 * @property \Cake\I18n\FrozenDate $fechaFin
 * @property \Cake\I18n\FrozenDate $fechaEntrega
 * @property string $usuario
 * @property string $estado
 * @property string $equipo_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Equipo $equipo
 */
class Prestamo extends Entity
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
        'fechaInicio' => true,
        'fechaFin' => true,
        'fechaEntrega' => true,
        'usuario' => true,
        'estado' => true,
        'equipo_id' => true,
        'created' => true,
        'modified' => true,
        'equipo' => true,
    ];
}
