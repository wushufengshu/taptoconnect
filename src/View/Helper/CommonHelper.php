<?php

declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Common helper
 */
class CommonHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    function get_starred($str)
    {
        $len = strlen($str);

        return substr($str, 0, 1) . str_repeat('*', $len - 1);
    }
}
