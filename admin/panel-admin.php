<?php
require_once 'autoload.php';

if(!Auth::userLogged()) {
    header('Location: /');
}

$_SESSION['page'] = 'panel-admin';

if(isset($_GET['tab'])) {
    $openTab = $_GET['tab'];
}else{
    $openTab = 'clientes';
}

//GET CLASES
//$instituciones = []//Institucion::traerTodos( $situacionOrder );
$instituciones = Institucion::traerTodos();
?>

<!-- PANEL INSTITUCION -->

<?php
require 'partials/head.php';
?>
<body class="panel panel-institucion">

<!-- POPUPS -->
<div class="full-opacity"></div>
<?php
include 'partials/popups/agregar-instituto.php';
include 'partials/popups/borrar-instituto.php';
include 'partials/popups/editar-instituto.php';
?>

<?php
require 'partials/header.php';
?>

<div class="section-row section-row--panel-institucion">
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-3">
                <div class="rock">
                    <h1 class="title">Panel Administrador</h1>
                    <ul class="side-menu">
                        <li><a <?=($openTab=='clientes')?'class="active"':'';?> href="panel/clientes">Clientes</a></li>
                    </ul>
                </div>
            </div>

            <?php if($openTab == 'clientes'){?>
            <!-- CLIENTES -->
            <div class="col-sm-9 content-box" id="tab-clientes">
                <div class="basic-box situaciones">
                    <div class="box-top">
                        <h4>Institutos</h4>
                        <div class="btn add-more agregar-instituto a open-popup-button" aria-popup=".popup-agregar-instituto"><i class="glyphicon glyphicon-plus"></i>Agregar instituto</div>
                    </div>
                    <table>

                        <tr>
                            <th>Nombre</th>
                            <th style="width:220px;">Acciones</th>
                        </tr>

                        <?php foreach($instituciones as $institucion): ?>
                        <tr>
                            <td><?= $institucion->getInstitucion();?></td>
                            <td>
                                <div class="btn btn-blue open-popup-button" aria-popup=".popup-editar-instituto" aria-id="<?= $institucion->getId();?>">Editar</div>
                                <div class="btn btn-red open-popup-button" aria-popup=".popup-borrar-instituto" aria-id="<?= $institucion->getId();?>">Eliminar</div>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                    </table>
                </div>
            </div>
            <!-- END of CLIENTES -->
            <?php } ?>


        </div>
    </div>
</div>

<?php
require 'partials/footer.php';
?>
