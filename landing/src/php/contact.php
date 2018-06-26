<?php
if($_SERVER['REQUEST_METHOD'] == 'GET')
    die("nah nah nah...");

$name = $_POST['full_name'];
$email = $_POST['email'];
$message = $_POST['message'];

$body = "Name: ". $name . "\r\n"
        . "Email: ". $email . "\r\n"
        . "Message: \r\n" . $message;

$headers = 'From: contacto@nomasbullying.com.ar' . "\r\n" .
    'Reply-To: ' . $email . "\r\n";

mail('contacto@nomasbullying.com.ar', 'No Mas Bullying / Contacto Landing', $body, $headers);

echo json_encode(true);

?>
