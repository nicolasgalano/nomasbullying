<?php
require '../autoload.php';

if(!Auth::userLogged()) {

    echo 'No estas logueado, por favor vuelva a hacer el login para poder hacer esta acción';

}else{

    echo json_encode(true);

}
?>
