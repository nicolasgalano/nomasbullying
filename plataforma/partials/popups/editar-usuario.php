<?php
require_once 'autoload.php';
?>
<div class="popup popup-editar-usuarios">
    <div class="popup-close"><i class="glyphicon glyphicon-remove"></i></div>
    <div class="popup-top blue">
        <h5>Editar alumno</h5>
    </div>
    <div class="popup-content">
        <form id="editar-usuario-form">
            <input type="hidden" name="id" value="">
            <input type="hidden" name="password" value="1234" value="">
            <input type="hidden" name="idnacionalidad" value="">
            <input type="hidden" name="mail" value="">
            <input type="hidden" name="tipo" value="">
            <div class="form-group form-group-lg fix-height">
                <input class="form-control small" type="text" placeholder="Nombre" name="nombre" value="">
                <input class="form-control small" type="text" placeholder="Apellido" name="apellido" value="">
            </div>
            <div class="form-group form-group-lg">
                <input class="form-control" type="text" placeholder="DNI" name="identificacion">
            </div>
            <div class="form-group form-group-lg fix-height">
                <select class="form-control small" name="grado" placeholder="Grado">
                    <option disabled="disabled" selected="selected" name="topic">&nbsp;Grado</option>
                    <option value="Primero">&nbsp;1ro</option>
                    <option value="Segundo">&nbsp;2do</option>
                    <option value="Tercero">&nbsp;3ro</option>
                    <option value="Cuarto">&nbsp;4to</option>
                    <option value="Quinto">&nbsp;5to</option>
                </select>
                <input class="form-control small margin-left" type="text" placeholder="Edad" name="edad">
            </div>
            <div class="form-group form-group-lg fix-height">
                <select class="form-control small" name="sexo" placeholder="Género">
                    <option disabled="disabled" selected="selected" name="topic">&nbsp;Género</option>
                    <option value="Masculino">&nbsp;Masculino</option>
                    <option value="Femenino">&nbsp;Femenino</option>
                </select>
            </div>
            <button class="btn btn--center btn--m-t" id="editar-usuario" aria-id-usuario="2"><i class="fa fa-refresh fa-spin fa-fw hide"></i>Guardar/Editar</button>
            <div class="form-response">
                <p></p>
            </div>
        </form>
    </div>
</div>
