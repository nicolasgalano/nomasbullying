<?php
require '../autoload.php';

if(!Auth::userLogged()) {

    echo 'No estas logueado, por favor vuelva hacer el login para poder hacer esta acción';

}else{

    try {

        $result = Situacion::editarEstatus($_GET['idsituacion']);
        echo json_encode($result);

    } catch(Exception $e) {
        echo "Hubo un error al traer los datos. Por favor intentalo de nuevo.";
    }

}
?>
