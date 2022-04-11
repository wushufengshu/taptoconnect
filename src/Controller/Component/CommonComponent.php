<?php

declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Utility\Security;

/**
 * Common component
 */
class CommonComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public $components = [
        'Authentication.Authentication',
        'RequestHandler'
    ];
    public function initialize(array $_defaultConfig): void
    {
    }
    public function generateToken($length_of_string)
    {
        return Security::hash(Security::randomBytes($length_of_string));
    }
}
