<?php

declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * Message component
 */
class MessageComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function emailMsg($msg, $user, $link = null)
    {
        $messages = [
            'web_process_message' => 'Dear ' . ucfirst($user->firstname) . ',
            <br><br>
            Welcome and Thank you for using UBTap!
            <br><br>
            We would like to inform you that you have successfully registered your account.
            <br><br>
            Please use this link: <a href="' . $link . '">' . $link . '</a>' . ' to activate your account.
            <br><br>
            Have a great day!
            <br><br>
            Regards, 
            <br>
    
            <strong>UBIVELOX - UBTap Team</strong>',

            'card_process_message' => 'Dear ' . ucfirst($user->firstname) . ',
            <br><br>
            Welcome and Thank you for using UBTap!
            <br><br>
            We would like to inform you that you have successfully registered your account and card.
            <br><br>
            Please use this link: <a href="' . $link . '">' . $link . '</a>' . ' to  login your account.
            <br><br>
            Have a great day!
            <br><br>
            Regards, 
            <br>
            <strong>UBIVELOX - UBTap Team</strong>',
        ];

        return $messages[$msg];
    }
}
