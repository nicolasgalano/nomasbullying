<?php
require_once 'autoload.php';
?>
<div class="popup popup-agregar-situacion">
    <div class="popup-close"><i class="glyphicon glyphicon-remove"></i></div>
    <div class="popup-top green">
        <h5>Agregar situación</h5>
    </div>
    <div class="popup-content">
        <form id="agregar-situacion-form">
            <div class="form-group form-group-lg">
                <input class="form-control" type="text" placeholder="Título resumido de la situación" name="titulo">
            </div>
            <div class="form-group form-group-lg fix-height">
                <input class="form-control small" type="text" placeholder="Agresor/es" name="agresor">
                <input class="form-control small margin-left" type="text" placeholder="Victima/s" name="victima">
            </div>
            <div class="form-group form-group-lg">
                <select class="form-control" name="gravedad" placeholder="Gravedad">
                    <option disabled="disabled" selected="selected">&nbsp;Nivel de gravedad</option>
                    <option value="Collaborators">&nbsp;Alto</option>
                    <option value="Sales">&nbsp;Medio</option>
                    <option value="Partners">&nbsp;Bajo</option>
                </select>
            </div>
            <div class="form-group form-group-lg">
                <textarea class="form-control" placeholder="Descripción detallada del hecho/situación" rows="9" name="descripcion"></textarea>
            </div>
            <button class="btn btn--center btn--m-t"><i class="fa fa-refresh fa-spin fa-fw hide"></i>Guardar/Crear</button>

            <div class="form-response" id="form-response">
                <p></p>
            </div>

        </form>
    </div>
</div>
