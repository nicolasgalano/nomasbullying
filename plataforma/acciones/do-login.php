<?php
require '../autoload.php';

if(Auth::login($_POST['usuario'], $_POST['password'])) {
    //AGREGAR ID de USUARIO
    $usuario = Usuario::buscarPorUsuario($_POST['usuario']);
    $temporales = Temporal::buscarPorId($usuario->getID());
    if(count($temporales)>0){
        echo 'temp';
    }else{
        echo json_encode(true);
    }
    exit;
} else {
    echo 'Usuario y/o password incorrectos.';
    exit;
}

?>
