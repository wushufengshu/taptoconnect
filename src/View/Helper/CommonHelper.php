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

    function put_asterisk(string $string = NULL){
    if (!$string) {
        return NULL;
    }
    $length = strlen($string);
    $visibleCount = (int) round($length / 4);
    $hiddenCount = $length - ($visibleCount * 2);
    return substr($string, 0, $visibleCount) . str_repeat('*', $hiddenCount) . substr($string, ($visibleCount * -1), $visibleCount);
    }
}
