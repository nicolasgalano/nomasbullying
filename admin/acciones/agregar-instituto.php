<?php
require '../autoload.php';

if(!Auth::userLogged()) {

    echo 'No estas logueado, por favor vuelva a hacer el login para poder hacer esta acción';

}else{

    try {

        $result = Institucion::crear($_POST);

        if($result){

            include("../classes/xmlapi.php");
            $cpanelusr = 'nomasbul';
            $cpanelpass = 'zrn6Dl18M6';//HACER ALGUN TIPO DE HASH
            $xmlapi = new xmlapi('127.0.0.1');
            $xmlapi->set_port( 2083 );
            $xmlapi->password_auth($cpanelusr,$cpanelpass);
            $xmlapi->set_debug(0);

            //$resultado = $xmlapi->api1_query($cpanelusr, 'SubDomain', 'addsubdomain', array($_POST['sdominio'],'nomasbullying.com.ar',0,0, '/'.$_POST['sdominio']));

            $databasename = $_POST['sdominio'];
            $databaseuser = $_POST['sdominio']; //¡Tener cuidado! Esto puede tener un máximo de 7 caracteres
            $databasepass = 'asdf1234asdf1234';

            $createdb = $xmlapi->api1_query($cpanelusr, "Mysql", "adddb", array($databasename)); //crea la base de datos
            $usr = $xmlapi->api1_query($cpanelusr, "Mysql", "adduser", array($databaseuser, $databasepass)); //crea el usuario
            $addusr = $xmlapi->api1_query($cpanelusr, "Mysql", "adduserdb", array("".$cpanelusr."_".$databasename."", "".$cpanelusr."_".$databaseuser."", 'all')); //concede todos los privilegios al usuario que acabamos de crear

        }

        echo json_encode($result);

    } catch(Exception $e) {
        echo "Hubo un error en la creación del instituto. Por favor intentalo de nuevo.";
    }

}
?>
