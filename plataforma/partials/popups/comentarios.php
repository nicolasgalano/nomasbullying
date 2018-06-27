<?php
require_once 'autoload.php';
?>
<div class="popup popup-comentarios">
    <div class="popup-close"><i class="glyphicon glyphicon-remove"></i></div>
    <div class="popup-top blue">
        <h5>Comentarios</h5>
    </div>
    <div class="popup-content">
        <div class="comentarios">
            <ul>

            </ul>
        </div>
        <form id="form-agregar-comentario">
            <div class="form-group form-group-lg">
                <textarea class="form-control" placeholder="Escribir Mensaje" rows="9" name="message" id="mensaje-comentario"></textarea>
            </div>
            <button class="btn btn--center btn--m-t" id="enviar-comentario"><i class="fa fa-refresh fa-spin fa-fw hide"></i>Enviar</button>
        </form>
    </div>
</div>
