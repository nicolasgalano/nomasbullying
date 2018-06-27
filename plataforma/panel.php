<?php
require_once 'autoload.php';

$_SESSION['page'] = 'panel';

if(!Auth::userLogged()) {
    header('Location: login.php');
    exit;
}else{
    if($_SESSION['user']->getID() == 1){
        header('Location: panel-institucion.php');
    }
}

//GET CLASES
$situaciones = Situacion::traerTodosId($_SESSION['user']->getID());

?>

<!-- CONTACTO -->

<?php
require 'partials/head.php';
?>
<body class="panel">

<!-- POPUPS -->
<div class="full-opacity"></div>
<?php
include 'partials/popups/agregar-situacion.php';
include 'partials/popups/comentarios.php';
include 'partials/popups/ver-situacion.php';
include 'partials/popups/comentarios.php';
?>

<?php
include 'partials/header.php';
?>

<div class="section-row section-row--panel">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="title">Mi Panel</h1>
            </div>
            <div class="col-sm-12">
                <div class="basic-box">
                    <div class="box-top">
                        <h4>Mis situaciones</h4>
                        <div class="btn add-more agregar-situacion open-popup-button" aria-popup=".popup-agregar-situacion"><i class="glyphicon glyphicon-plus"></i>Agregar situaciones</div>
                    </div>
                    <table>
                        <tr>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Gravedad</th>
                            <!-- <th>Estado</th> -->
                            <th style="width:220px;">Acciones</th>
                        </tr>

                        <?php foreach($situaciones as $situacion): ?>
                        <tr>
                            <td><?= $situacion->getTitulo();?></td>
                            <td><?= $situacion->getDescripcion();?></td>
                            <td><?= $situacion->getNivel();?></td>
                            <!-- <td><?= $situacion->getEstatus();?></td> -->
                            <td>
                                <div class="btn ver-ficha open-popup-button" aria-popup=".popup-ver-situacion" aria-id="<?= $situacion->getId();?>">Ver ficha</div>
                                <div class="btn btn-blue open-popup-button" aria-popup=".popup-comentarios" aria-id="<?= $situacion->getId();?>">Mensajes</div>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require 'partials/footer.php';
?>
