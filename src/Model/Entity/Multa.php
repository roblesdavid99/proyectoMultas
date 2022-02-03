<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Multa Entity
 *
 * @property int $id
 * @property string $nombreEquipo
 * @property string $usuario
 * @property string $multa
 * @property string $prestamo_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Prestamo $prestamo
 */
class Multa extends Entity
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
        'nombreEquipo' => true,
        'usuario' => true,
        'multa' => true,
        'prestamo_id' => true,
        'created' => true,
        'modified' => true,
        'prestamo' => true,
    ];
}
