<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserVouchersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserVouchersTable Test Case
 */
class UserVouchersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UserVouchersTable
     */
    protected $UserVouchers;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.UserVouchers',
        'app.Users',
        'app.Vouchers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('UserVouchers') ? [] : ['className' => UserVouchersTable::class];
        $this->UserVouchers = $this->getTableLocator()->get('UserVouchers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->UserVouchers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UserVouchersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UserVouchersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
