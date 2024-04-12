<?php

use PHPMailer\PHPMailer\PHPMailer;

class SendMail
{
    public function send($name, $email, $message)
    {

        include "secret.php";
        $mail = new PHPMailer(true);
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = $USERNAME;                     //SMTP username
        $mail->Password = $PASSWORD;                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port = 465;


        //Recipients
        $mail->setFrom('from@example.com', 'Mailer');
        $mail->addAddress('fw1987@gmail.com', 'Joe User');     //Add a recipient


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email dal sito internet';
        $mail->Encoding = 'base64';

        $mail->Body = $name . ' ' . $email . ' ' . $message;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        return $mail->send();

    }
}