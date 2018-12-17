<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 14.11.2018
 * Time: 22:13
 */

namespace App\Core;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class Sms
{

    public static function send($email, $resetPassLink)
    {
        $configs = include('./config.php');
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = $configs['smtp_user'];              // SMTP username
            $mail->Password = $configs['smtp_pass'];              // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('musso@list.ru', 'Mailer');
            $mail->addAddress('musso@list.ru', 'Joe User');     // Add a recipient

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Reset password';
            $mail->Body    = 'Dear '. $email .' <br/>To reset your password, visit the following link: <a href="'.$resetPassLink.'">'.$resetPassLink.'</a>
                <br/><br/>Best Regards, <br/>Musso Mirkholov';
            $mail->AltBody = 'Reset password';

            if($mail->send()){
               return "success";
            }

        } catch (Exception $e) {
            header("Location: /login");
        }
    }
}