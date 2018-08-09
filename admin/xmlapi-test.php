<?php

//https://documentation.cpanel.net/display/DD/cPanel+API+1+Functions+-+Fileman%3A%3Adofileop

//https://documentation.cpanel.net/display/DD/cPanel+API+1+Functions+-+SubDomain%3A%3Alistsubdomainsop


if(isset($_GET)){

    include("classes/xmlapi.php");

    $cpanelusr = 'nomasbul';
    $cpanelpass = 'zrn6Dl18M6';//HACER ALGUN TIPO DE HASH
    $xmlapi = new xmlapi('127.0.0.1');

    $xmlapi->set_port( 2083 );
    $xmlapi->password_auth($cpanelusr,$cpanelpass);
    $xmlapi->set_debug(0);

    ///////////////

    $result1 = $xmlapi->api1_query($cpanelusr, 'SubDomain', 'listsubdomainsop');

    $result2 = $xmlapi->api1_query($cpanelusr, 'Mysql', 'listdbsopt');//listdbs

    //$result1 = $xmlapi->api1_query($cpanelusr, 'SubDomain', 'addsubdomain', array($_POST['sdominio'],'nomasbullying.com.ar',0,0, '/'.$_POST['sdominio']));

    /*
    // $databasename y $databaseuser contendrán el prefijo de cPanel Ej: prefix_dbname y prefix_dbuser
    $databasename = 'db_name';
    $databaseuser = 'db_usr'; //¡Tener cuidado! Esto puede tener un máximo de 7 caracteres
    $databasepass = 'passwordforthenewuser';

    $createdb = $xmlapi->api1_query($cpanelusr, "Mysql", "adddb", array($databasename)); //crea la base de datos
    $usr = $xmlapi->api1_query($cpanelusr, "Mysql", "adduser", array($databaseuser, $databasepass)); //crea el usuario
    $addusr = $xmlapi->api1_query($cpanelusr, "Mysql", "adduserdb", array("".$cpanelusr."_".$databasename."", "".$cpanelusr."_".$databaseuser."", 'all')); //concede todos los privilegios al usuario que acabamos de crear
    */

    echo '<pre>';
    var_dump($result1);
    echo '</pre>';

    echo '<pre>';
    var_dump($result2);
    echo '</pre>';

    /*
    echo '<pre>';
    var_dump($createdb);
    echo '</pre>';

    echo '<pre>';
    var_dump($usr);
    echo '</pre>';

    echo '<pre>';
    var_dump($addusr);
    echo '</pre>';
    */
}

?>
