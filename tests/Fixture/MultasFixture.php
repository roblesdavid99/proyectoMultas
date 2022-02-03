<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MultasFixture
 */
class MultasFixture extends TestFixture
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
                'nombreEquipo' => 'Lorem ipsum dolor sit amet',
                'usuario' => 'Lorem ipsum dolor sit amet',
                'multa' => 1.5,
                'prestamo_id' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-02-02 19:36:00',
                'modified' => '2022-02-02 19:36:00',
            ],
        ];
        parent::init();
    }
}
