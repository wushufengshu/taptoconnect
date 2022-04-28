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
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = getEnv('EMAIL_USERNAME');                     //SMTP username
        $mail->Password   = getEnv('EMAIL_PASSWORD');                     //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        //put into .env file 
        $mail->setFrom(getEnv('EMAIL_USERNAME'), 'UB Tap');
        $mail->addAddress($user->email, $user->firstname . ' ' . $user->lastname);     //Add a recipient 
        $mail->addReplyTo('info@ubtap.com', 'Information');


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'UBTap Card Activation';
        $link = "https://ubtap.myubplus.com.ph/users/activatecard/".$user->token;

        $mail->Body    = 'Dear ' . ucfirst($user->firstname) . ',
        <br><br>
        Please click this link: <a href="'.$link.' target="_blank" >'.$link.'</a>'.' to verify/activate your account.
        <br><br>

        <strong>UBIVELOX - UBTap Team</strong>';

        $mail->AltBody = 'Dear ' . ucfirst($user->firstname) . ',
        <br><br>
        Please click this link: <a href="'.$link.' target="_blank" >'.$link.'</a>'.' to verify/activate your account.
        <br><br>

        <strong>UBIVELOX - UBTap Team</strong>';


        Please click this link: http://taptoconnect.local:8080/users/activatecard/' . $user->token . ' to verify/activate your account.
        
        UB Tap team';
        $mail->AltBody = 'Dear ' . ucfirst($user->firstname) . ',

        Please click this link: http://taptoconnect.local:8080/users/activatecard/' . $user->token . ' to verify/activate your account.
        
        UB Tap team';
 
        return $mail;
        // if (!$mail->send()) {
        //     return ['error' => true, 'message' => 'Mailer error: ' . $mail->ErrorInfo];
        // } else{
        //     // $response = $this->response->withType('application/json')
        //     //             ->withStringBody(json_encode(['data' => $user, 'msg' => 1]));
        //     //         return $response;
        //     return ['error' => false, 'message' => 1]; 
        // }
        // if($mail->send()){
        //     return $msg = 1;
        // }
    }
}
