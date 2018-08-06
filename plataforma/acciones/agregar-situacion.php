<?php
require '../autoload.php';

if(!Auth::userLogged()) {

    echo 'No estas logueado, por favor vuelva a hacer el login para poder hacer esta acción';

}else{

    try {
        $idSituacion = Situacion::crear($_POST);

        //Implicados BUG SEGURADO
        Implicado::crear($idSituacion,$_POST['victima'],1);
        $result = Implicado::crear($idSituacion,$_POST['agresor'],2);

        echo json_encode($result);

    } catch(Exception $e) {
        echo "Hubo un error en la creación del alumno. Por favor intentalo de nuevo.";
    }

}
?>
