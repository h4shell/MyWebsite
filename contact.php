<?php

include "secret.php";

use PHPMailer\PHPMailer\PHPMailer;

require './vendor/autoload.php';
// Verifica che l'origine della richiesta corrisponda a localhost sulla porta 5500
$allowed_origin = 'http://127.0.0.1:5500';


if (isset($_SERVER['HTTP_ORIGIN']) && $_SERVER['HTTP_ORIGIN'] == $allowed_origin) {
    // L'origine è consentita, quindi impostiamo l'intestazione CORS
    header("Access-Control-Allow-Origin: $allowed_origin");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Expose-Headers: X-My-Custom-Header, X-Another-Custom-Header");
}

// Gestisci richieste OPTIONS per verificare le richieste CORS preflight
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header("HTTP/1.1 200 OK");

    $data = json_decode(file_get_contents("php://input"), true);

    $name = $data["name"];
    $email = $data["email"];
    $message = $data["message"];
    // echo json_encode(array("name" => $name));


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


    echo $mail->send();
}
