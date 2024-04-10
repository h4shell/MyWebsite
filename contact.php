<?php
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


    $msg = "name" . $name . "\nemail" . $email . "\n\nmessage" . $message;

    $headers = "From: mittente@example.com\r\n";
    $headers .= "Reply-To: mittente@example.com\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();



    if(mail("fw1987@gmail.com", "Messaggio dal sito", $msg, $headers)){
        $status = true;
    } else {
        $status = false;
    };

    


    if ($status === false){
        echo json_encode(array("status"=> false,"message"=> "Errore nell'invio del messaggio"));
    } else if ($status === true){
        echo json_encode(array("status"=> true,"message"=> "Messaggio inviato con successo"));
    }

}