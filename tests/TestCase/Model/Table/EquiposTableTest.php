<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EquiposTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EquiposTable Test Case
 */
class EquiposTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EquiposTable
     */
    protected $Equipos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Equipos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Equipos') ? [] : ['className' => EquiposTable::class];
        $this->Equipos = $this->getTableLocator()->get('Equipos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Equipos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EquiposTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
