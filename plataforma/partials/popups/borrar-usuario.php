<?php
require_once 'autoload.php';
?>
<div class="popup popup-borrar-usuario">
    <div class="popup-close"><i class="glyphicon glyphicon-remove"></i></div>
    <div class="popup-top red">
        <h5>Borrar alumno</h5>
    </div>
    <div class="popup-content">
        <form>
            <div class="form-group form-group-lg">
                <p>¿Esta seguro de querer borrar a este alumno del sistema?</p>
            </div>
            <a class="btn btn--center btn--m-t" id="borrar-usuario" aria-id-usuario="2"><i class="fa fa-refresh fa-spin fa-fw hide"></i>Si</a>

            <div class="form-response">
                <p></p>
            </div>

        </form>
    </div>
</div>
