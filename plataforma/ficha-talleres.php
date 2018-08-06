<?php
require_once 'autoload.php';

$_SESSION['page'] = 'ficha';
?>

<!-- HOME PAGE -->

<?php
require 'partials/head.php';
?>
<body class="ficha">
<?php
require 'partials/header.php';
?>

<div class="jumbotron main-slider" style="background-image: url('images/instituto/home-bg.jpg');">
    <div class="opacity-white">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="title animated pulse">Titulo de taller</h1>
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
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>

            </div>
        </div>
    </div>
</div>

<?php
if(Auth::userLogged()) {

    $usuario = Usuario::buscarPorUsuarioId( (int)str_replace(' ', '', $_SESSION['user']->getID() ) );

?>
<div class="section-row section-row--contact-ficha">
    <div class="container">
        <div class="row">
            <div class="col-sm-7 col-md-6 vertical-align">
                <h1 class="title">Inscripción</h1>
                <h5 class="subtitle">Hola <?= $usuario['nombre'];?>, en caso de estar interesado/a en el taller, nos gustaría que te sumes!</h5>
            </div>
            <div class="col-sm-5">
                <form id="contact-form">
                    <input type="hidden" name="nombre" value="<?= $usuario['nombre'];?>">
                    <input type="hidden" name="apellido" value="<?= $usuario['apellido'];?>">
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
