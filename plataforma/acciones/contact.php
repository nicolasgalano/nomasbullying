<?php
if($_SERVER['REQUEST_METHOD'] == 'GET')
    die("nah nah nah...");

$name = $_POST['full_name'];
$email = $_POST['email'];
$topic = $_POST['topic'];
$message = $_POST['message'];

$body = "Name: ". $name . "\r\n"
        . "Email: ". $email . "\r\n"
        . "Topic: ". $topic . "\r\n"
        . "Message: \r\n" . $message;

$headers = 'From: hi@wedoweb.co' . "\r\n" .
    'Reply-To: ' . $email . "\r\n";

mail('hi@wedoweb.co', 'wedoweb.co / '+$topic, $body, $headers);

echo json_encode(true);

?>
