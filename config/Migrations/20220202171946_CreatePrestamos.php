<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreatePrestamos extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('prestamos');
        $table->addColumn('fechaInicio', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('fechaFin', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('fechaEntrega', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('usuario', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('estado', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('equipo_id', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
