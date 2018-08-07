<?php
require_once 'autoload.php';
?>
<div class="popup popup-editar-publicacion">
    <div class="popup-close"><i class="glyphicon glyphicon-remove"></i></div>

    <div class="popup-top blue">
        <h5>Editar publicación</h5>
    </div>

    <div class="popup-content">
        <form id="editar-publicacion-form" autocomplete="off">

            <input type="hidden" name="id" value="">
            <input type="hidden" name="tipo" value="">
            <input type="hidden" name="creador" value="1">

            <div class="form-group form-group-lg">
                <input class="form-control" type="text" placeholder="Título" name="titulo">
            </div>
            <div class="form-group form-group-lg">
                <textarea class="form-control" placeholder="Contenido" rows="9" name="contenido"></textarea>
            </div>

            <button class="btn btn--center btn--m-t" id="editar-publicacion" aria-id-publicacion="2"><i class="fa fa-refresh fa-spin fa-fw hide"></i>Guardar/Editar</button>

            <div class="form-response">
                <p></p>
            </div>

        </form>
    </div>
</div>
