<?php
require '../autoload.php';

if(Auth::login($_POST['usuario'], $_POST['password'])) {
    header('Location: ../index.php');
    exit;
} else {
    $_SESSION['_error'] = "<p>Usuario y/o password incorrectos.</p>";
    $_SESSION['_input'] = $_POST;
    header('Location: ../login.php');
}