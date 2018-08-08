<?php
require_once 'autoload.php';

$_SESSION['page'] = 'panel';

if(!Auth::userLogged()) {
    header('Location: /login');
    exit;
}else{
    if($_SESSION['user']->getID() == 1){
        header('Location: /panel-institucion');
    }
}

// ORDER
$situacionOrder = "ORDER BY id DESC";
//if( $_GET['order']=='ASC' || $_GET['order']=='DESC' ){
//    $situacionOrder = $_GET['order'];
//}

// GET CLASES
$situaciones = Situacion::traerTodosId($_SESSION['user']->getID(), $situacionOrder);

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
include 'partials/popups/ver-situacion.php';
include 'partials/popups/comentarios.php';
include 'partials/popups/comentarios-notificacion.php';
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
                        <thead>
                            <tr>
                                <th>Creador del reporte</th>
                                <th>Título</th>
                                <th>Descripción</th>
                                <th>Gravedad</th>
                                <th>Estado</th>
                                <th style="width:220px;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($situaciones as $situacion): ?>
                            <?php
                                $denunciante = Usuario::buscarPorUsuarioId( (int)str_replace(' ', '', $situacion->getDenunciante()) );
                                $comentariosNuevoSit = Comentario::noLeidosSit( $situacion->getId(), $_SESSION['user']->getID() );
                            ?>
                            <tr>
                                <td><?= $denunciante['apellido'];?> <?= $denunciante['nombre'];?></td>
                                <td><?= $situacion->getTitulo();?></td>
                                <td><?= $situacion->getDescripcion();?></td>
                                <td><?= $situacion->getNivel();?></td>
                                <td><?= ($situacion->getEstatus()==0)?'No leído':'Leído';?></td>
                                <td>
                                    <div class="btn ver-ficha open-popup-button" aria-popup=".popup-ver-situacion" aria-id-usuario-activo="<?= $_SESSION['user']->getID() ?>" aria-id-usuario="<?= $situacion->getDenunciante();?>" aria-id="<?= $situacion->getId();?>">Ver ficha</div>
                                    <div class="btn btn-blue open-popup-button" aria-popup=".popup-comentarios" aria-id="<?= $situacion->getId();?>" aria-id-usuario="<?= $_SESSION['user']->getID() ?>">Mensajes<?php if(count($comentariosNuevoSit) > 0){ ?><span class="nuevos"></span><?php } ?></div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>


                <?php if($_SESSION['user']->getTipo() == 3){ ?>

                    <?php
                        $notificaciones = Notificacion::traerTodosIdPadre($_SESSION['user']->getID());
                    ?>

                    <div class="basic-box notificaciones">
                        <div class="box-top">
                            <h4>Notificaciones</h4>
                        </div>

                        <table>
                            <thead>
                                <tr>
                                    <th>Implicado</th>
                                    <th>Rol</th>
                                    <th>Padre</th>
                                    <!-- <th>Leido por el padre</th> -->
                                    <th style="width:100px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($notificaciones as $notificacion): ?>
                                <?php
                                    $implicadoU = Usuario::buscarPorUsuarioId( (int)str_replace(' ', '', $notificacion->getImplicado()) );
                                    $padreU = Usuario::buscarPorUsuarioId( (int)str_replace(' ', '', $notificacion->getPadre()) );
                                    $comentariosNuevoNot = Comentario::noLeidosNot( $notificacion->getId(), $_SESSION['user']->getID() );
                                ?>
                                <tr>
                                    <td><?= $implicadoU['apellido'];?> <?= $implicadoU['nombre'];?></td>
                                    <td><?= ($notificacion->getRol()==1)?'Víctima':'';?><?= ($notificacion->getRol()==2)?'Agresor':'';?></td>
                                    <td><?= $padreU['apellido'];?> <?= $padreU['nombre'];?></td>
                                    <!--<td><?= ($notificacion->getLeido()==0)?'No leído':'Leído';?></td>-->
                                    <td>
                                        <div class="btn btn-blue open-popup-button" aria-popup=".popup-comentarios-notificacion" aria-id="<?= $notificacion->getId();?>" aria-id-usuario="<?= $_SESSION['user']->getID() ?>">Mensajes<?php if(count($comentariosNuevoNot) > 0){ ?><span class="nuevos"></span><?php } ?></div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>

                <?php } ?>

            </div>
        </div>
    </div>
</div>


<?php
require 'partials/footer.php';
?>
