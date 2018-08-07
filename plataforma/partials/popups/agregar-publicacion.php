<?php
require_once 'autoload.php';
?>
<div class="popup popup-agregar-publicacion">
    <div class="popup-close"><i class="glyphicon glyphicon-remove"></i></div>
    <div class="popup-top green">
        <h5>Agregar publicacion</h5>
    </div>
    <div class="popup-content">
        <form id="agregar-publicacion-form">

            <input type="hidden" name="tipo" value="1">
            <input type="hidden" name="creador" value="1">

            <div class="form-group form-group-lg">
                <input class="form-control" type="text" placeholder="Título" name="titulo">
            </div>
            <div class="form-group form-group-lg">
                <textarea class="form-control" placeholder="Contenido" rows="9" name="contenido"></textarea>
            </div>

            <button class="btn btn--center btn--m-t"><i class="fa fa-refresh fa-spin fa-fw hide"></i>Guardar/Crear</button>

            <div class="form-response">
                <p></p>
            </div>

        </form>
    </div>
</div>
