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
require 'partials/footer.php';
?>
