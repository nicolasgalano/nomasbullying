<?php
require_once 'autoload.php';

$_SESSION['page'] = 'login';

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

<!-- LOGIN -->

<?php
require 'partials/head.php';
?>
<body class="login">
<?php
require 'partials/header.php';
?>

<div class="section-row section-row--login">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <h1 class="title">Login</h1>

                <form id="login-form">

                    <div class="form-group form-group-lg">
                        <input class="form-control" type="text" placeholder="DNI" id="usuario" name="usuario" value="<?php
                        if($input) {
                            echo $input['usuario'];
                        } ?>">
                    </div>

                    <div class="form-group form-group-lg">
                        <input class="form-control" type="password" id="password" placeholder="Contraseña" name="password">
                    </div>

                    <button class="btn btn--center btn--m-t"><i class="fa fa-refresh fa-spin fa-fw hide"></i>Ingresar</button>

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
