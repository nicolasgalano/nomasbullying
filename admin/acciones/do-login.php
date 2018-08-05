<?php
require '../autoload.php';

if(Auth::login($_POST['usuario'], $_POST['password'])) {
    //AGREGAR ID de USUARIO
    echo json_encode(true);
    exit;
} else {
    echo 'Usuario y/o password incorrectos.';
    exit;
}
?>
