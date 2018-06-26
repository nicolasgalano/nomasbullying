<?php
require_once 'autoload.php';
?>
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
