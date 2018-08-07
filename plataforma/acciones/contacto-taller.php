<?php
if($_SERVER['REQUEST_METHOD'] == 'GET')
    die("nah nah nah...");

$titulo = $_POST['titulo'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$tomail = $_POST['to-mail'];
$email = $_POST['email'];
$message = $_POST['message'];

$body = "Título de taller: ". $titulo . "\r\n"
        . "Nombre: ". $nombre . "\r\n"
        . "Apellido: ". $apellido . "\r\n"
        . "Email: ". $email . "\r\n"
        . "Mensaje: \r\n" . $message;

$headers = 'From: ' . $tomail . "\r\n" .
    'Reply-To: ' . $email . "\r\n";

mail($tomail, 'No Mas Bullying / Inscripción a Taller / '.$titulo , $body, $headers);

echo json_encode($body);

?>
