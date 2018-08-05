<?php
require_once 'autoload.php';
?>
<div class="popup popup-editar-instituto">
    <div class="popup-close"><i class="glyphicon glyphicon-remove"></i></div>
    <div class="popup-top blue">
        <h5>Editar alumno</h5>
    </div>
    <div class="popup-content">
        <form id="editar-instituto-form" autocomplete="off">
            <input type="hidden" name="id" value="">
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

            <button class="btn btn--center btn--m-t" id="editar-usuario" aria-id-usuario="2"><i class="fa fa-refresh fa-spin fa-fw hide"></i>Guardar/Editar</button>
            <div class="form-response">
                <p></p>
            </div>
        </form>
    </div>
</div>
