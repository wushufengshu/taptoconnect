<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\MessageComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\MessageComponent Test Case
 */
class MessageComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\MessageComponent
     */
    protected $Message;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Message = new MessageComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Message);

        parent::tearDown();
    }
}
