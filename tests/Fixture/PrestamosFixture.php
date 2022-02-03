<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PrestamosFixture
 */
class PrestamosFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'fechaInicio' => '2022-02-02',
                'fechaFin' => '2022-02-02',
                'fechaEntrega' => '2022-02-02',
                'usuario' => 'Lorem ipsum dolor sit amet',
                'estado' => 'Lorem ipsum dolor sit amet',
                'equipo_id' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-02-02 17:19:59',
                'modified' => '2022-02-02 17:19:59',
            ],
        ];
        parent::init();
    }
}
