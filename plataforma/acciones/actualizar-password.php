<?php
require '../autoload.php';

if(!Auth::userLogged()) {

    echo 'No estas logueado, por favor vuelva hacer el login para poder hacer esta acción';

}else{

    try {
        $result = Usuario::actualizarPassword($_POST);

        if($result){
            Temporal::eliminar($_POST['id']);
        }

        echo json_encode($result);
    } catch(Exception $e) {
        echo "Hubo un error en la creación del alumno. Por favor intentalo de nuevo.";
    }

}
?>
