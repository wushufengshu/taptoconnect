<?php

declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// require 'vendor/autoload.php';

/**
 * Email component
 */
class EmailComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function initialize(array $_defaultConfig): void
    {
    }

    public function send_verification_email($user)
    {
        $mail = new PHPMailer(true);
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'casepack123@gmail.com';                     //SMTP username
        $mail->Password   = 'Casepacc123';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        //put into .env file 
        $mail->setFrom('casepack123@gmail.com', 'Mailer');
        $mail->addAddress($user->email, $user->firstname . ' ' . $user->lastname);     //Add a recipient 
        $mail->addReplyTo('info@ubitap.com', 'Information');


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'UBTap Card Activation';
        $mail->Body    = 'Dear ' . ucfirst($user->firstname) . ',

        Please click this link: http://taptoconnect.local:8080/users/activatecard/' . $user->token . ' to verify/activate your account.
        
        UB Tap team';
        $mail->AltBody = 'Dear ' . ucfirst($user->firstname) . ',

        Please click this link: http://taptoconnect.local:8080/users/activatecard/' . $user->token . ' to verify/activate your account.
        
        UB Tap team';

        // $mail->send();
        // echo 'Message has been sent';

        if (!$mail->send()) {
            return ['error' => true, 'message' => 'Mailer error: ' . $mail->ErrorInfo];
        } else {
            return ['error' => true, 'message' => 'OK '];
        }
    }
}
