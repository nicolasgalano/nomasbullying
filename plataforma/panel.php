<?php
require_once 'autoload.php';

$_SESSION['page'] = 'panel';

if(!Auth::userLogged()) {
    header('Location: login.php');
    exit;
}
?>

<!-- CONTACTO -->

<?php
require 'partials/head.php';
?>
<body class="panel">

<!-- POPUPS -->
<div class="full-opacity"></div>
<div class="popup popup-agregar-situacion">
  <div class="popup-close"><i class="glyphicon glyphicon-remove"></i></div>
  <div class="popup-top green">
    <h5>Agregar situación</h5>
  </div>
  <div class="popup-content">
    <form>
      <div class="form-group form-group-lg">
        <input class="form-control" type="text" placeholder="Título resumido de la situación" name="full_name">
      </div>
      <div class="form-group form-group-lg fix-height">
        <input class="form-control small" type="text" placeholder="Agresor/es" name="email">
        <input class="form-control small margin-left" type="text" placeholder="Victima/s" name="email">
      </div>
      <div class="form-group form-group-lg">
        <select class="form-control" name="email" placeholder="Gravedad">
          <option disabled="disabled" selected="selected" name="topic">&nbsp;Nivel de gravedad</option>
          <option value="Collaborators">&nbsp;Alto</option>
          <option value="Sales">&nbsp;Medio</option>
          <option value="Partners">&nbsp;Bajo</option>
        </select>
      </div>
      <div class="form-group form-group-lg">
        <textarea class="form-control" placeholder="Descripción detallada del hecho/situación" rows="9" name="message"></textarea>
      </div>
      <button class="btn btn--center btn--m-t"><i class="fa fa-refresh fa-spin fa-fw hide"></i>Guardar/Crear</button>
    </form>
  </div>
</div>
<div class="popup popup-ver-situacion">
  <div class="popup-close"><i class="glyphicon glyphicon-remove"></i></div>
  <div class="popup-top green">
    <h5>Ver Situación</h5>
  </div>
  <div class="popup-content">
    <div class="situacion-item titulo"><span>Titulo:</span><b>"Me pegaron"</b></div>
    <div class="situacion-item descripcion"><span>Descripción:</span><b>Fui agredido en el patio de la escuela a las 12am cuando unos chicos se rieron de mis zapatillas y me empujaron, me lastime el codo y me tuve que ir de la escuela.</b></div>
    <div class="situacion-item involucrados"><span>Agresor/es:</span><b> <i>Matias Gomez</i><i>Pablo Emilio Gaviria.</i></b></div>
    <div class="situacion-item involucrados"><span>Victima/s:</span><b> <i>Nicolino Roche</i></b></div>
    <div class="situacion-item gravedad alto"><span>Nivel de gravedad de la situación:</span><b>Alto</b></div>
    <div class="situacion-item status"><span>Status:</span><b>Leido</b></div>
  </div>
</div>
<div class="popup popup-comentarios">
  <div class="popup-close"><i class="glyphicon glyphicon-remove"></i></div>
  <div class="popup-top blue">
    <h5>Comentarios</h5>
  </div>
  <div class="popup-content">
    <div class="comentarios">
      <ul>
        <li class="clearfix">
          <p>Que onda amigo todo mal esto, los rompo todo.</p><span>10/10/2018 14:54hs</span>
        </li>
        <li class="clearfix mio">
          <p>Que onda amigo todo mal esto, los rompo todo.</p><span>10/10/2018 14:54hs</span>
        </li>
        <li class="clearfix">
          <p>Que onda amigo todo mal esto, los rompo todo.</p><span>10/10/2018 14:54hs</span>
        </li>
        <li class="clearfix mio">
          <p>Que onda amigo todo mal esto, los rompo todo.</p><span>10/10/2018 14:54hs</span>
        </li>
        <li class="clearfix">
          <p>Que onda amigo todo mal esto, los rompo todo.</p><span>10/10/2018 14:54hs</span>
        </li>
        <li class="clearfix mio">
          <p>Que onda amigo todo mal esto, los rompo todo.</p><span>10/10/2018 14:54hs</span>
        </li>
        <li class="clearfix">
          <p>Que onda amigo todo mal esto, los rompo todo.</p><span>10/10/2018 14:54hs</span>
        </li>
        <li class="clearfix mio">
          <p>Que onda amigo todo mal esto, los rompo todo.</p><span>10/10/2018 14:54hs</span>
        </li>
        <li class="clearfix">
          <p>Que onda amigo todo mal esto, los rompo todo.</p><span>10/10/2018 14:54hs</span>
        </li>
        <li class="clearfix">
          <p>Que onda amigo todo mal esto, los rompo todo.</p><span>10/10/2018 14:54hs</span>
        </li>
      </ul>
    </div>
    <form>
      <div class="form-group form-group-lg">
        <textarea class="form-control" placeholder="Cometario" rows="9" name="message"></textarea>
      </div>
      <button class="btn btn--center btn--m-t"><i class="fa fa-refresh fa-spin fa-fw hide"></i>Enviar</button>
    </form>
  </div>
</div>


<?php
include 'partials/header.php';
?>


<div class="section-row section-row--panel">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1 class="title">Mi Panel</h1>
      </div>
      <div class="col-sm-12">
        <div class="basic-box">
          <div class="box-top">
            <h4>
               Mis situaciones</h4>
            <div class="btn add-more agregar-situacion open-popup-button" aria-popup=".popup-agregar-situacion"><i class="glyphicon glyphicon-plus"></i>Agregar situaciones</div>
          </div>
          <table>
            <tr>
              <th>Nombre</th>
              <th>Descripción</th>
              <th>Gravedad</th>
              <th>Estado</th>
              <th style="width:220px;">Acciones</th>
            </tr>
            <tr>
              <td>Me pegaron</td>
              <td>Fui agredido en el patio de la escuela a las 12am cuando...</td>
              <td>Alto</td>
              <td>Leido</td>
              <td>
                <div class="btn ver-ficha open-popup-button" aria-popup=".popup-ver-situacion">Ver ficha</div>
                <div class="btn btn-blue open-popup-button" aria-popup=".popup-comentarios">Mensajes</div>
              </td>
            </tr>
            <tr>
              <td>Me pegaron</td>
              <td>Fui agredido en el patio de la escuela a las 12am cuando...</td>
              <td>Alto</td>
              <td>Leido</td>
              <td>
                <div class="btn ver-ficha">Ver ficha</div>
                <div class="btn btn-blue open-popup-button" aria-popup=".popup-comentarios">Mensajes</div>
              </td>
            </tr>
            <tr>
              <td>Me pegaron</td>
              <td>Fui agredido en el patio de la escuela a las 12am cuando...</td>
              <td>Alto</td>
              <td>Leido</td>
              <td>
                <div class="btn ver-ficha">Ver ficha</div>
                <div class="btn btn-blue open-popup-button" aria-popup=".popup-comentarios">Mensajes</div>
              </td>
            </tr>
            <tr>
              <td>Me pegaron</td>
              <td>Fui agredido en el patio de la escuela a las 12am cuando...</td>
              <td>Alto</td>
              <td>Leido</td>
              <td>
                <div class="btn ver-ficha">Ver ficha</div>
                <div class="btn btn-blue open-popup-button" aria-popup=".popup-comentarios">Mensajes</div>
              </td>
            </tr>
            <tr>
              <td>Me pegaron</td>
              <td>Fui agredido en el patio de la escuela a las 12am cuando...</td>
              <td>Alto</td>
              <td>Leido</td>
              <td>
                <div class="btn ver-ficha">Ver ficha</div>
                <div class="btn btn-blue open-popup-button" aria-popup=".popup-comentarios">Mensajes</div>
              </td>
            </tr>
            <tr>
              <td>Me pegaron</td>
              <td>Fui agredido en el patio de la escuela a las 12am cuando...</td>
              <td>Alto</td>
              <td>Leido</td>
              <td>
                <div class="btn ver-ficha">Ver ficha</div>
                <div class="btn btn-blue open-popup-button" aria-popup=".popup-comentarios">Mensajes</div>
              </td>
            </tr>
            <tr>
              <td>Me pegaron</td>
              <td>Fui agredido en el patio de la escuela a las 12am cuando...</td>
              <td>Alto</td>
              <td>Leido</td>
              <td>
                <div class="btn ver-ficha">Ver ficha</div>
                <div class="btn btn-blue open-popup-button" aria-popup=".popup-comentarios">Mensajes</div>
              </td>
            </tr>
            <tr>
              <td>Me pegaron</td>
              <td>Fui agredido en el patio de la escuela a las 12am cuando...</td>
              <td>Alto</td>
              <td>Leido</td>
              <td>
                <div class="btn ver-ficha">Ver ficha</div>
                <div class="btn btn-blue open-popup-button" aria-popup=".popup-comentarios">Mensajes</div>
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
