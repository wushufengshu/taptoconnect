<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SocialMediaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SocialMediaTable Test Case
 */
class SocialMediaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SocialMediaTable
     */
    protected $SocialMedia;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.SocialMedia',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('SocialMedia') ? [] : ['className' => SocialMediaTable::class];
        $this->SocialMedia = $this->getTableLocator()->get('SocialMedia', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->SocialMedia);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SocialMediaTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\SocialMediaTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
