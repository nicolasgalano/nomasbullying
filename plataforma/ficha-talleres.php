<?php
require_once 'autoload.php';

$_SESSION['page'] = 'ficha';

$idArticulo = 0;
if( isset($_GET['id']) ){
    $idArticulo = $_GET['id'];
}
?>

<?php
require 'partials/head.php';
?>
<body class="ficha">
<?php
require 'partials/header.php';
?>

<?php
$articulo = Publicacion::buscarPorId2($idArticulo);
?>

<div class="jumbotron main-slider" style="background-image: url('../images/instituto/home-bg.jpg');">
    <div class="opacity-white">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="title animated pulse"><?= $articulo[0]->getTitulo();?></h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-row section-row--ficha">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">

                <p>
                    <?= $articulo[0]->getContenido();?>
                </p>

            </div>
        </div>
    </div>
</div>

<?php
if(Auth::userLogged()) {

    $usuario = Usuario::buscarPorUsuarioId( (int)str_replace(' ', '', $_SESSION['user']->getID() ) );
    $usuarioAdmin = Usuario::buscarPorUsuarioId(1);

?>
<div class="section-row section-row--contact-ficha">
    <div class="container">
        <div class="row">
            <div class="col-sm-7 col-md-6 vertical-align">
                <h1 class="title">Inscripción</h1>
                <h5 class="subtitle">Hola <?= $usuario['nombre'];?>, en caso de estar interesado/a en el taller, nos gustaría que te sumes!</h5>
            </div>
            <div class="col-sm-5">
                <form id="taller-contact-form">
                    <input type="hidden" name="titulo" value="<?= $articulo[0]->getTitulo();?>">
                    <input type="hidden" name="nombre" value="<?= $usuario['nombre'];?>">
                    <input type="hidden" name="apellido" value="<?= $usuario['apellido'];?>">
                    <input type="hidden" name="to-mail" value="<?= $usuarioAdmin['mail'];?>">
                    <div class="form-group form-group-lg">
                        <input class="form-control" type="email" placeholder="E-mail" name="email">
                    </div>
                    <div class="form-group form-group-lg">
                        <textarea class="form-control" placeholder="¿Por que te gustaría inscribirte en el taller?" rows="9" name="message"></textarea>
                    </div>
                    <button class="btn btn--center btn--m-t btn--small"><i class="fa fa-refresh fa-spin fa-fw hide"></i>ENVIAR</button>
                    <div class="form-response green" id="form-response">
                        <p>Gracias por ponerse en contacto, le responderemos a la brevedad.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
}
?>

<?php
require 'partials/footer.php';
?>
