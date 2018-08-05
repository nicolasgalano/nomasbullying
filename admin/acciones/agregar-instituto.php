<?php
require '../autoload.php';

if(!Auth::userLogged()) {

    echo 'No estas logueado, por favor vuelva a hacer el login para poder hacer esta acción';

}else{

    try {

        $result = Institucion::crear($_POST);
        echo json_encode($result);

    } catch(Exception $e) {
        echo "Hubo un error en la creación del instituto. Por favor intentalo de nuevo.";
    }

}
?>
