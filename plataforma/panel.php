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
<?php
include 'partials/popups/agregar-situacion.php';
include 'partials/popups/comentarios.php';
?>

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
                        <h4>Mis situaciones</h4>
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
