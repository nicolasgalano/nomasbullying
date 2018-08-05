<?php
require_once 'autoload.php';

$_SESSION['page'] = '404';
?>

<!-- INFORMACION -->

<?php
require 'partials/head.php';
?>
<body class="informacion">
<?php
require 'partials/header.php';
?>

<div class="section-row section-row--informacion">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="title">Perdón, pero no hemos encontrado la página que estas buscando :(</h1>
                <p style="text-align:center;font-size:20px;"><a href="index.php">Ir a la Home</a></p>
            </div>
        </div>
    </div>
</div>

<?php
require 'partials/footer.php';
?>
