<?php
require '../autoload.php';

if(!Auth::userLogged()) {

    echo 'No estas logueado, por favor vuelva hacer el login para poder hacer esta acción';

}else{

    try {

        $result = Comentario::traerTodosId($_GET['idsituacion']);

        //MARCAR MENSAJES NO LEIDOS COMO LEIDOS
        Comentario::marcarComoLeidoSit($_GET['idsituacion'], $_SESSION['user']->getID());

        echo json_encode($result);

    } catch(Exception $e) {
        echo "Hubo un error al traer los datos. Por favor intentalo de nuevo.";
    }

}
?>
