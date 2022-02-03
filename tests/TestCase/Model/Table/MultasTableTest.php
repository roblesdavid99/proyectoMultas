<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MultasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MultasTable Test Case
 */
class MultasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MultasTable
     */
    protected $Multas;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Multas',
        'app.Prestamos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Multas') ? [] : ['className' => MultasTable::class];
        $this->Multas = $this->getTableLocator()->get('Multas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Multas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MultasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MultasTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
