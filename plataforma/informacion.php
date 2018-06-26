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
                <li>
                  <div class="large">Gobierno de la ciudad de buenos aires</div>
                  <div class="small">12312313123</div>
                </li>
                <li>
                  <div class="large">Ministerio anti-bullying</div>
                  <div class="small">*321</div>
                </li>
                <li>
                  <div class="large">Basta de Bullying</div>
                  <div class="small">12312313123</div>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="information-box">
              <h4>Sitios de ayuda anti-bullying</h4>
              <ul>
                <li>
                  <div class="large">Gobierno de la ciudad de buenos aires</div>
                  <div class="small"> <a href="#">www.lalalala.com</a></div>
                </li>
                <li>
                  <div class="large">Gobierno de la ciudad de buenos aires</div>
                  <div class="small"> <a href="#">www.lalalala.com</a></div>
                </li>
                <li>
                  <div class="large">Gobierno de la ciudad de buenos aires</div>
                  <div class="small"> <a href="#">www.lalalala.com</a></div>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="information-box">
              <h4>Teléfonos de la institución</h4>
              <ul>
                <li>
                  <div class="large">Gabinete pedagogico</div>
                  <div class="small">12312313123</div>
                </li>
                <li>
                  <div class="large">Dirección</div>
                  <div class="small">*321</div>
                </li>
                <li>
                  <div class="large">Zarlanga</div>
                  <div class="small">12312313123</div>
                </li>
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
