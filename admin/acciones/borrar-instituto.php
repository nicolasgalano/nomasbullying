<?php
require '../autoload.php';

if(!Auth::userLogged()) {

    echo 'No estas logueado, por favor vuelva hacer el login para poder hacer esta acción';

}else{

    try {
        Institucion::eliminar($_POST);
        echo json_encode(true);
    } catch(Exception $e) {
        echo "Hubo un error al borrar el instituto. Por favor intentalo de nuevo.";
    }

}
?>
