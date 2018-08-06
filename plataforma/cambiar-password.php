<?php
require_once 'autoload.php';

$_SESSION['page'] = 'pass';

if(isset($_SESSION['_input'])) {
    $input = $_SESSION['_input'];
    unset($_SESSION['_input']);
} else {
    $input = null;
}

if(isset($_SESSION['_error'])) {
    $error = $_SESSION['_error'];
    unset($_SESSION['_error']);
} else {
    $error = null;
}
?>

<!-- CAMBIAR CONTRASEÑA -->

<?php
require 'partials/head.php';
?>
<body class="pass">
<?php
require 'partials/header.php';
?>

<div class="section-row section-row--login">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <h1 class="title">Cambiar Contraseña</h1>

                <form id="password-form">

                    <input type="hidden" name="id" value="<?=$_SESSION['user']->getID()?>">

                    <div class="form-group form-group-lg">
                        <input class="form-control" type="password" id="password_old" placeholder="Contraseña actual" name="password_old">
                    </div>

                    <div class="form-group form-group-lg">
                        <input class="form-control" type="password" id="password_new" placeholder="Contraseña nueva" name="password_new">
                    </div>

                    <div class="form-group form-group-lg">
                        <input class="form-control" type="password" id="password_new2" placeholder="Repetir contraseña nueva" name="password_new2">
                    </div>

                    <button class="btn btn--center btn--m-t"><i class="fa fa-refresh fa-spin fa-fw hide"></i>Cambiar</button>

                    <div class="form-response" id="form-response" style="display:block;">
                        <p></p>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>


<?php
require 'partials/footer.php';
?>
