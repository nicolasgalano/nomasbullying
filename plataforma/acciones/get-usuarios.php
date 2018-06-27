<?php
require '../autoload.php';

if(!Auth::userLogged()) {

    echo 'No estas logueado, por favor vuelva hacer el login para poder hacer esta acción';

}else{

    try {

        $result = Usuario::getAll();
        echo json_encode($result);

    } catch(Exception $e) {
        echo "Hubo un error en la edición del usuario. Por favor intentalo de nuevo.";
    }

}
?>
