<?php
require_once 'autoload.php';
?>
<div class="popup popup-editar-usuarios">
    <div class="popup-close"><i class="glyphicon glyphicon-remove"></i></div>
    <div class="popup-top blue">
        <h5>Editar alumno</h5>
    </div>
    <div class="popup-content">
        <form id="editar-usuario-form" autocomplete="off">
            <input type="hidden" name="id" value="">
            <input type="hidden" name="password-old" value="">
            <input type="hidden" name="idnacionalidad" value="">
            <input type="hidden" name="mail" value="">
            <input type="hidden" name="tipo" value="">
            <div class="form-group form-group-lg fix-height">
                <input class="form-control small" type="text" placeholder="Nombre" name="nombre" value="">
                <input class="form-control small margin-left" type="text" placeholder="Apellido" name="apellido" value="">
            </div>
            <div class="form-group form-group-lg">
                <input class="form-control" type="text" placeholder="DNI" name="identificacion">
            </div>
            <div class="form-group form-group-lg fix-height">
                <select class="form-control small" name="grado" placeholder="Grado">
                    <option disabled="disabled" name="topic">&nbsp;Grado</option>
                    <option value="Primero" selected="selected" id="grado-dummie">&nbsp;1ro</option>
                </select>
                <input class="form-control small margin-left" type="text" placeholder="Edad" name="edad" value="" autocomplete="off">
            </div>
            <div class="form-group form-group-lg fix-height">
                <select class="form-control small" name="sexo" placeholder="Género">
                    <option disabled="disabled" name="topic">&nbsp;Género</option>
                    <option value="Masculino" selected="selected" id="sexo-dummie">&nbsp;Masculino</option>
                </select>
                <input class="form-control small margin-left" type="password" placeholder="Nueva contraseña" name="password-new" value="" autocomplete="off">
            </div>
            <button class="btn btn--center btn--m-t" id="editar-usuario" aria-id-usuario="2"><i class="fa fa-refresh fa-spin fa-fw hide"></i>Guardar/Editar</button>
            <div class="form-response">
                <p></p>
            </div>
        </form>
    </div>
</div>
