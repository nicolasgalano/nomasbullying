<?php
require_once 'autoload.php';

$_SESSION['page'] = 'ficha';

$idArticulo = 0;
if( isset($_GET['id']) ){
    $idArticulo = $_GET['id'];
}

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
                    <h1 class="title animated pulse"><?= $idArticulo?>Plataforma Anti-bullying</h1>
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
require 'partials/footer.php';
?>
