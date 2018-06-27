<?php
require_once 'autoload.php';

if(!Auth::userLogged()) {
    header('Location: login.php');
    exit;
}else{
    if($_SESSION['user']->getID() == 1){
        header('Location: panel-institucion.php');
    }else{
        header('Location: panel.php');
    }
}
?>
