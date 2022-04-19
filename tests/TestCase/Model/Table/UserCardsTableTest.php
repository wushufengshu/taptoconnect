<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserCardsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserCardsTable Test Case
 */
class UserCardsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UserCardsTable
     */
    protected $UserCards;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.UserCards',
        'app.Users',
        'app.Cards',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('UserCards') ? [] : ['className' => UserCardsTable::class];
        $this->UserCards = $this->getTableLocator()->get('UserCards', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->UserCards);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UserCardsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UserCardsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
