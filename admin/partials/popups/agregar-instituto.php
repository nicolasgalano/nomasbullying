<?php
require_once 'autoload.php';

$instituciones = Institucion::traerTodos();

?>
<div class="popup popup-agregar-instituto">
    <div class="popup-close"><i class="glyphicon glyphicon-remove"></i></div>
    <div class="popup-top green">
        <h5>Agregar instituto</h5>
    </div>
    <div class="popup-content">
        <form id="agregar-instituto-form">

            <div class="form-group form-group-lg fix-height">
                <input class="form-control" type="text" placeholder="Institución" name="institucion">
            </div>
            <div class="form-group form-group-lg fix-height">
                <input class="form-control" type="text" placeholder="Nombre" name="nombre">
            </div>
            <div class="form-group form-group-lg">
                <input class="form-control" type="text" placeholder="Sub Dominio" name="sdominio">
            </div>
            <div class="form-group form-group-lg fix-height">
                <select class="form-control small" name="estado" placeholder="Activo?">
                    <option disabled="disabled" selected="selected" name="topic">&nbsp;Activo?</option>
                    <option value="a">&nbsp;Si</option>
                    <option value="i">&nbsp;No</option>
                </select>
                <input class="form-control small margin-left" type="text" placeholder="Fecha de Inscripción" name="fecha_ins">
            </div>

            <button class="btn btn--center btn--m-t"><i class="fa fa-refresh fa-spin fa-fw hide"></i>Guardar/Crear</button>

            <div class="form-response">
                <p></p>
            </div>

        </form>
    </div>
</div>
