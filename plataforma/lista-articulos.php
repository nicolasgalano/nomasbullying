<?php
require_once 'autoload.php';

$_SESSION['page'] = 'ficha';

//LIMPIAR URL PARA PERMALINK
function cleanURL($string) {
    $unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                                'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                                'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                                'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                                'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );
    $string = strtr( $string, $unwanted_array );
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    return strtolower( preg_replace('/[^A-Za-z0-9\-]/', '', $string) ); // Removes special chars.
}
$title_string = 'Plataformá Anti-bullyíng';
//EJ:
$url = cleanURL($title_string);
//

?>

<!-- HOME PAGE -->

<?php
require 'partials/head.php';
?>
<body class="lista">
<?php
require 'partials/header.php';
?>

<div class="jumbotron main-slider" style="background-image: url('images/instituto/home-bg.jpg');">
    <div class="opacity-white">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="title animated pulse">Articulos sobre bullying</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-row section-row--home section-row--articulos drop-shadow">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">

                <div class="row lista-post">

                    <div class="col-md-4 item-post">
                        <a class="content" href="<?= $url ?>">
                            <div class="img" style="background-image:url('images/instituto/post-1.png');">
                                <div class="opacity">
                                    <div class="btn">Leer nota</div>
                                </div>
                                <img src="images/instituto/post-1.png">
                            </div>
                            <h3>Como tratar a tus compañeros</h3>
                            <p>Esta es la descripcion de un taller dado por la institucion en pos de educar a los apdres y docentes y gente que necesite ayuda.</p>
                        </a>
                    </div>

                    <div class="col-md-4 item-post">
                        <a class="content" href="#">
                            <div class="img" style="background-image:url('images/instituto/post-1.png');">
                                <div class="opacity">
                                    <div class="btn">Leer nota</div>
                                </div>
                                <img src="images/instituto/post-1.png">
                            </div>
                            <h3>Como tratar a tus compañeros</h3>
                            <p>Esta es la descripcion de un taller dado por la institucion en pos de educar a los apdres y docentes y gente que necesite ayuda.</p>
                        </a>
                    </div>

                    <div class="col-md-4 item-post">
                        <a class="content" href="#">
                            <div class="img" style="background-image:url('images/instituto/post-1.png');">
                                <div class="opacity">
                                    <div class="btn">Leer nota</div>
                                </div>
                                <img src="images/instituto/post-1.png">
                            </div>
                            <h3>Como tratar a tus compañeros</h3>
                            <p>Esta es la descripcion de un taller dado por la institucion en pos de educar a los apdres y docentes y gente que necesite ayuda.</p>
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<?php
require 'partials/footer.php';
?>
