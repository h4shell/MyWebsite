<?php

require './vendor/autoload.php';
require './lib/sendmail.php';
include "lib/cors.php";

// Gestisci richieste OPTIONS per verificare le richieste CORS preflight
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    header("HTTP/1.1 200 OK");
    $data = json_decode(file_get_contents("php://input"), true);
    $name = $data["name"];
    $email = $data["email"];
    $message = $data["message"];
    // echo json_encode(array("name" => $name));
    $mail_lib = new SendMail();
    echo $mail_lib->send($name, $email, $message);
}
