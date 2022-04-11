<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\EmailComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\EmailComponent Test Case
 */
class EmailComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\EmailComponent
     */
    protected $Email;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Email = new EmailComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Email);

        parent::tearDown();
    }
}
