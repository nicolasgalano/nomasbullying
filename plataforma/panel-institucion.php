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

// OBTENER DATOS DE ULTIMA FECHA AL ENTRAR AL PANEL A LA SECCION DE SITUACIONES

$_SESSION['page'] = 'panel-institucion';

if(isset($_GET['tab'])) {
    $openTab = $_GET['tab'];
}else{
    $openTab = 'usuarios';
}

// ORDER
$situacionOrder = "ORDER BY id DESC";

//GET CLASES
$usuarios = Usuario::traerTodos();
$situaciones = Situacion::traerTodos( $situacionOrder );
$situacionesNotReadCount = Situacion::getCountNotRead();
$alertas = Alerta::traerTodos();
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
                        <li><a <?=($openTab=='situaciones')?'class="active"':'';?> href="panel-institucion.php?tab=situaciones">Situaciones (<?= count($situacionesNotReadCount) ?>)</a></li>
                        <li><a <?=($openTab=='contenido')?'class="active"':'';?> href="panel-institucion.php?tab=contenido">Contenido general</a></li>
                        <li><a <?=($openTab=='config_alertas')?'class="active"':'';?> href="panel-institucion.php?tab=config_alertas">Config. de Alertas</a></li>
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
                            <th>Creador del reporte</th>
                            <th>Título</th>
                            <th>Gravedad</th>
                            <th>Estado</th>
                            <th style="width:220px;">Acciones</th>
                        </tr>

                        <?php foreach($situaciones as $situacion): ?>
                        <?php
                            $denunciante = Usuario::buscarPorUsuarioId( (int)str_replace(' ', '', $situacion->getDenunciante()) );
                        ?>
                        <tr>
                            <td><?= $denunciante['nombre'];?> <?= $denunciante['apellido'];?></td>
                            <td><?= $situacion->getTitulo();?></td>
                            <td class="gravedad <?= $situacion->getNivel();?>"><b><?= $situacion->getNivel();?></b></td>
                            <td><?= ($situacion->getEstatus()==0)?'No leído':'Leído';?></td>
                            <td>
                                <div class="btn ver-ficha open-popup-button" aria-popup=".popup-ver-situacion" aria-id-usuario="<?= $situacion->getDenunciante();?>" aria-id="<?= $situacion->getId();?>">Ver ficha</div>
                                <div class="btn btn-blue open-popup-button" aria-popup=".popup-comentarios" aria-id="<?= $situacion->getId();?>" aria-id-usuario="<?= $_SESSION['user']->getID() ?>">Mensajes</div>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                    </table>
                </div>
            </div>
            <!-- END of SITUACIONES -->
            <?php } ?>

            <?php if($openTab == 'config_alertas'){ ?>
            <!-- CONFIG ALERTAS -->
            <div class="col-sm-9 content-box" id="tab-alertas">
                <div class="basic-box alertas">
                    <div class="box-top">
                        <h4>Configuración de Alertas</h4>
                    </div>

                    <p>Aquí pueden elegir la cantidad maxima de tolerancia para que el sistema genere notificaciones en caso de recurrentes casos tanto de víctimas como de agresores.</p>

                    <form id="editar-alertas-form" autocomplete="off">

                        <table>

                            <tr>
                                <th>Nº max. de tolerancia en casos de victima de un usuario</th>
                                <td><input class="form-control" type="text" placeholder="Nº" name="n_victima" value="<?= $alertas[0]->getCantidad() ?>"></td>
                            </tr>
                            <tr>
                                <th>Nº max. de tolerancia en casos de agresion de un usuario</th>
                                <td><input class="form-control" type="text" placeholder="Nº" name="n_agresor" value="<?= $alertas[1]->getCantidad() ?>"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button class="btn btn--center btn--m-t" id="editar-alertas"><i class="fa fa-refresh fa-spin fa-fw hide"></i>Guardar cambio</button>
                                    <div class="form-response">
                                        <p></p>
                                    </div>
                                </td>
                            </tr>

                        </table>

                    </form>
                    <br>
                    <p><i>(Si un alumno genero más agresiones del numero elegido, o fue victima más veces que el numero elegido una notificacion será generada)</i></p>

                </div>
            </div>
            <!-- END of CONFIG ALERTAS -->
            <?php } ?>


        </div>
    </div>
</div>

<?php
require 'partials/footer.php';
?>
