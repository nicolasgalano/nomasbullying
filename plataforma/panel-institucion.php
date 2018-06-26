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

<div class="popup popup-borrar-usuario">
    <div class="popup-close"><i class="glyphicon glyphicon-remove"></i></div>
    <div class="popup-top red">
        <h5>Borrar alumno</h5>
    </div>
    <div class="popup-content">
        <form>
            <div class="form-group form-group-lg">
                <p>¿Esta seguro de querer borrar a este alumno del sistema?</p>
            </div><a class="btn btn--center btn--m-t"><i class="fa fa-refresh fa-spin fa-fw hide"></i>Si</a>
        </form>
    </div>
</div>

<div class="popup popup-agregar-usuarios">
    <div class="popup-close"><i class="glyphicon glyphicon-remove"></i></div>
    <div class="popup-top green">
        <h5>Agregar alumno</h5>
    </div>
    <div class="popup-content">
        <form>
            <div class="form-group form-group-lg">
                <input class="form-control" type="text" placeholder="Nombre completo del alumno" name="full_name">
            </div>
            <div class="form-group form-group-lg">
                <input class="form-control" type="text" placeholder="DNI" name="dni">
            </div>
            <div class="form-group form-group-lg fix-height">
                <select class="form-control small" name="grado" placeholder="Grado">
                    <option disabled="disabled" selected="selected" name="topic">&nbsp;Grado</option>
                    <option value="1">&nbsp;1ro A</option>
                    <option value="2">&nbsp;1ro B</option>
                    <option value="3">&nbsp;2do A</option>
                    <option value="4">&nbsp;2do B</option>
                    <option value="5">&nbsp;3ro A</option>
                </select>
                <input class="form-control small margin-left" type="text" placeholder="Edad" name="edad">
            </div>
            <div class="form-group form-group-lg fix-height">
                <select class="form-control small" name="genero" placeholder="Género">
                    <option disabled="disabled" selected="selected" name="topic">&nbsp;Género</option>
                    <option value="1">&nbsp;Masculino</option>
                    <option value="2">&nbsp;Femenina</option>
                </select>
            </div>
            <button class="btn btn--center btn--m-t"><i class="fa fa-refresh fa-spin fa-fw hide"></i>Guardar/Crear</button>
        </form>
    </div>
</div>

<div class="popup popup-editar-usuarios">
    <div class="popup-close"><i class="glyphicon glyphicon-remove"></i></div>
    <div class="popup-top blue">
        <h5>Editar alumno</h5>
    </div>
    <div class="popup-content">
        <form>
            <div class="form-group form-group-lg">
                <input class="form-control" type="text" placeholder="Nombre completo del alumno" name="full_name">
            </div>
            <div class="form-group form-group-lg">
                <input class="form-control" type="text" placeholder="DNI" name="dni">
            </div>
            <div class="form-group form-group-lg fix-height">
                <select class="form-control small" name="grado" placeholder="Grado">
                    <option disabled="disabled" selected="selected" name="topic">&nbsp;Grado</option>
                    <option value="1">&nbsp;1ro A</option>
                    <option value="2">&nbsp;1ro B</option>
                    <option value="3">&nbsp;2do A</option>
                    <option value="4">&nbsp;2do B</option>
                    <option value="5">&nbsp;3ro A</option>
                </select>
                <input class="form-control small margin-left" type="text" placeholder="Edad" name="edad">
            </div>
            <div class="form-group form-group-lg fix-height">
                <select class="form-control small" name="genero" placeholder="Género">
                    <option disabled="disabled" selected="selected" name="topic">&nbsp;Género</option>
                    <option value="1">&nbsp;Masculino</option>
                    <option value="2">&nbsp;Femenina</option>
                </select>
            </div>
            <button class="btn btn--center btn--m-t"><i class="fa fa-refresh fa-spin fa-fw hide"></i>Guardar/Editar</button>
        </form>
    </div>
</div>

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
