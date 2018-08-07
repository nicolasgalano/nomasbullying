<?php
require_once 'autoload.php';

$_SESSION['page'] = 'informacion';
?>

<!-- INFORMACION -->

<?php
require 'partials/head.php';
?>
<body class="informacion">
<?php
require 'partials/header.php';
?>

<?php
    $links = Publicacion::buscarPorIdtipos(3);
    $telsayuda = Publicacion::buscarPorIdtipos(4);
    $telsinstitucion = Publicacion::buscarPorIdtipos(5);
?>

<div class="section-row section-row--informacion">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1 class="title">Información y teléfonos útiles</h1>
      </div>
      <div class="col-sm-12">
        <div class="row">
          <div class="col-sm-6">
            <div class="information-box">
                <h4>Teléfonos de ayuda</h4>
                <ul>
                    <?php foreach($telsayuda as $telayuda): ?>
                        <li>
                            <div class="large"><?= $telayuda->getTitulo();?></div>
                            <div class="small"><?= $telayuda->getContenido();?></div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="information-box">
                <h4>Sitios de ayuda anti-bullying</h4>
                <ul>
                    <?php foreach($links as $link): ?>
                        <li>
                            <div class="large"><?= $link->getTitulo();?></div>
                            <div class="small"><a target="_blank" href="http://<?= $link->getContenido();?>"><?= $link->getContenido();?></a></div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="information-box">
                <h4>Teléfonos de la institución</h4>
                <ul>
                    <?php foreach($telsinstitucion as $telinstitucion): ?>
                    <li>
                        <div class="large"><?= $telinstitucion->getTitulo();?></div>
                        <div class="small"><?= $telinstitucion->getContenido();?></div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
require 'partials/footer.php';
?>
