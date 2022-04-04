<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MusicVideoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MusicVideoTable Test Case
 */
class MusicVideoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MusicVideoTable
     */
    protected $MusicVideo;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.MusicVideo',
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
        $config = $this->getTableLocator()->exists('MusicVideo') ? [] : ['className' => MusicVideoTable::class];
        $this->MusicVideo = $this->getTableLocator()->get('MusicVideo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->MusicVideo);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MusicVideoTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MusicVideoTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
