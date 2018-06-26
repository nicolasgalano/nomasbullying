<?php
require_once 'autoload.php';

$_SESSION['page'] = 'panel-institucion';

if(!Auth::userLogged()) {
    header('Location: login.php');
    exit;
}
?>

<!-- PANEL INSTITUCION -->

<?php
require 'partials/head.php';
?>
<body class="panel panel-institucion">

<!-- POPUPS -->
<div class="full-opacity"></div>
<?php
include 'partials/popups/agregar-usuario.php';
include 'partials/popups/editar-usuario.php';
include 'partials/popups/borrar-usuario.php';
?>

<?php
require 'partials/header.php';
?>

<div class="section-row section-row--panel-institucion">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3">
        <div class="rock">
          <h1 class="title">Panel Institucional</h1>
          <ul class="side-menu">
            <li><a class="active" href="#">Usuarios</a></li>
            <li><a href="#">Notificaciones</a></li>
            <li><a href="#">Situaciones</a></li>
            <li><a href="#">Contenido general</a></li>
            <li><a href="#">Alertas</a></li>
            <li><a href="#">Soporte técnico</a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-9 content-box">
        <div class="basic-box usuarios">
          <div class="box-top">
            <h4>
               Lista de usuarios</h4>
            <div class="btn add-more agregar-usuario open-popup-button" aria-popup=".popup-agregar-usuarios"><i class="glyphicon glyphicon-plus"></i>Agregar usuario</div>
          </div>
          <table>
            <tr>
              <th>Nombre</th>
              <th>Documento</th>
              <th>Grado</th>
              <th>Edad</th>
              <th>Genero</th>
              <th style="width:200px;">Acciones</th>
            </tr>
            <tr>
              <td>Nicolas Galano</td>
              <td>34180977</td>
              <td>4to B</td>
              <td>10</td>
              <td>M</td>
              <td>
                <div class="btn btn-blue open-popup-button" aria-popup=".popup-editar-usuarios">Editar</div>
                <div class="btn btn-red open-popup-button" aria-popup=".popup-borrar-usuario">Eliminar</div>
              </td>
            </tr>
            <tr>
              <td>Nicolas Galano</td>
              <td>34180977</td>
              <td>4to B</td>
              <td>10</td>
              <td>M</td>
              <td>
                <div class="btn btn-blue">Editar</div>
                <div class="btn btn-red">Eliminar</div>
              </td>
            </tr>
            <tr>
              <td>Nicolas Galano</td>
              <td>34180977</td>
              <td>4to B</td>
              <td>10</td>
              <td>M</td>
              <td>
                <div class="btn btn-blue">Editar</div>
                <div class="btn btn-red">Eliminar</div>
              </td>
            </tr>
            <tr>
              <td>Nicolas Galano</td>
              <td>34180977</td>
              <td>4to B</td>
              <td>10</td>
              <td>M</td>
              <td>
                <div class="btn btn-blue">Editar</div>
                <div class="btn btn-red">Eliminar</div>
              </td>
            </tr>
            <tr>
              <td>Nicolas Galano</td>
              <td>34180977</td>
              <td>4to B</td>
              <td>10</td>
              <td>M</td>
              <td>
                <div class="btn btn-blue">Editar</div>
                <div class="btn btn-red">Eliminar</div>
              </td>
            </tr>
            <tr>
              <td>Nicolas Galano</td>
              <td>34180977</td>
              <td>4to B</td>
              <td>10</td>
              <td>M</td>
              <td>
                <div class="btn btn-blue">Editar</div>
                <div class="btn btn-red">Eliminar</div>
              </td>
            </tr>
            <tr>
              <td>Nicolas Galano</td>
              <td>34180977</td>
              <td>4to B</td>
              <td>10</td>
              <td>M</td>
              <td>
                <div class="btn btn-blue">Editar</div>
                <div class="btn btn-red">Eliminar</div>
              </td>
            </tr>
            <tr>
              <td>Nicolas Galano</td>
              <td>34180977</td>
              <td>4to B</td>
              <td>10</td>
              <td>M</td>
              <td>
                <div class="btn btn-blue">Editar</div>
                <div class="btn btn-red">Eliminar</div>
              </td>
            </tr>
            <tr>
              <td>Nicolas Galano</td>
              <td>34180977</td>
              <td>4to B</td>
              <td>10</td>
              <td>M</td>
              <td>
                <div class="btn btn-blue">Editar</div>
                <div class="btn btn-red">Eliminar</div>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
require 'partials/footer.php';
?>
