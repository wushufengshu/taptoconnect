<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SocialListTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SocialListTable Test Case
 */
class SocialListTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SocialListTable
     */
    protected $SocialList;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.SocialList',
        'app.SocialMedia',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('SocialList') ? [] : ['className' => SocialListTable::class];
        $this->SocialList = $this->getTableLocator()->get('SocialList', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->SocialList);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SocialListTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
