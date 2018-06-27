<?php
require_once 'autoload.php';

if(!Auth::userLogged()) {
    header('Location: login.php');
    exit;
}else{
    if($_SESSION['user']->getID() != 1){
        header('Location: panel.php');
    }
}

$_SESSION['page'] = 'panel-institucion';

if(isset($_GET['tab'])) {
    $openTab = $_GET['tab'];
}else{
    $openTab = 'usuarios';
}

//GET CLASES
$usuarios = Usuario::traerTodos();
$situaciones = Situacion::traerTodos();

?>

<!-- PANEL INSTITUCION -->

<?php
require 'partials/head.php';
?>
<body class="panel panel-institucion">

<!-- POPUPS -->
<div class="full-opacity"></div>
<?php
include 'partials/popups/agregar-usuario.php';
include 'partials/popups/editar-usuario.php';
include 'partials/popups/borrar-usuario.php';
include 'partials/popups/agregar-situacion.php';
include 'partials/popups/ver-situacion.php';
include 'partials/popups/comentarios.php';
?>

<?php
require 'partials/header.php';
?>

<div class="section-row section-row--panel-institucion">
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-3">
                <div class="rock">
                    <h1 class="title">Panel Institucional</h1>
                    <ul class="side-menu">
                        <li><a <?=($openTab=='usuarios')?'class="active"':'';?> href="panel-institucion.php?tab=usuarios">Usuarios</a></li>
                        <li><a <?=($openTab=='notificaciones')?'class="active"':'';?> href="panel-institucion.php?tab=notificaciones">Notificaciones</a></li>
                        <li><a <?=($openTab=='situaciones')?'class="active"':'';?> href="panel-institucion.php?tab=situaciones">Situaciones</a></li>
                        <li><a <?=($openTab=='contenido')?'class="active"':'';?> href="panel-institucion.php?tab=contenido">Contenido general</a></li>
                        <li><a <?=($openTab=='alertas')?'class="active"':'';?> href="panel-institucion.php?tab=alertas">Alertas</a></li>
                        <li><a <?=($openTab=='soporte')?'class="active"':'';?> href="panel-institucion.php?tab=soporte">Soporte técnico</a></li>
                    </ul>
                </div>
            </div>

            <?php if($openTab == 'usuarios'){?>
            <!-- USUARIOS -->
            <div class="col-sm-9 content-box" id="tab-usuarios">
                <div class="basic-box usuarios">
                    <div class="box-top">
                        <h4>Lista de usuarios</h4>
                        <div class="btn add-more agregar-usuario open-popup-button" aria-popup=".popup-agregar-usuarios"><i class="glyphicon glyphicon-plus"></i>Agregar usuario</div>
                    </div>
                    <table>
                        <tr>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Grado</th>
                            <th>Edad</th>
                            <th>Genero</th>
                            <th style="width:200px;">Acciones</th>
                        </tr>

                        <?php foreach($usuarios as $usuario): ?>
                        <?php if( $usuario->getId() != 1 ){ ?>

                        <tr>
                            <td><?= $usuario->getNombre();?> <?= $usuario->getApellido();?></td>
                            <td><?= $usuario->getIdentificacion();?></td>
                            <td><?= $usuario->getGrado();?></td>
                            <td><?= $usuario->getEdad();?></td>
                            <td><?= $usuario->getSexo();?></td>
                            <td>
                                <div class="btn btn-blue open-popup-button" aria-popup=".popup-editar-usuarios" aria-id="<?= $usuario->getId();?>">Editar</div>
                                <div class="btn btn-red open-popup-button" aria-popup=".popup-borrar-usuario" aria-id="<?= $usuario->getId();?>">Eliminar</div>
                            </td>
                        </tr>

                        <?php } endforeach; ?>

                    </table>
                </div>
            </div>
            <!-- END of USUARIOS -->
            <?php } ?>

            <?php if($openTab == 'notificaciones'){ ?>
            <!-- NOTIFICACIONES -->
            <div class="col-sm-9 content-box" id="tab-notificaciones">
                <div class="basic-box notificaciones">
                    <div class="box-top">
                        <h4>Notificaciones</h4>
                    </div>
                </div>
            </div>
            <!-- END of NOTIFICACIONES -->
            <?php } ?>

            <?php if($openTab == 'situaciones'){ ?>
            <!-- SITUACIONES -->
            <div class="col-sm-9 content-box" id="tab-situaciones">
                <div class="basic-box situaciones">
                    <div class="box-top">
                        <h4>Situaciones</h4>
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
                                <div class="btn btn-blue open-popup-button" aria-popup=".popup-comentarios" aria-id="<?= $situacion->getId();?>" aria-id-usuario="<?= $_SESSION['user']->getID() ?>">Mensajes</div>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                    </table>
                </div>
            </div>
            <!-- END of SITUACIONES -->
            <?php } ?>


        </div>
    </div>
</div>

<?php
require 'partials/footer.php';
?>
