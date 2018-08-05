<?php
require_once 'autoload.php';

$usuarios = Usuario::buscarPorTipo(3);
?>
<div class="popup popup-agregar-notificacion">
    <div class="popup-close"><i class="glyphicon glyphicon-remove"></i></div>
    <div class="popup-top green">
        <h5>Crear Notificación</h5>
    </div>
    <div class="popup-content">

        <p>Seleccionar al padre a quien queremos asignarle la notificación sobre su hijo</p>

        <form id="agregar-notificacion-form">

            <input type="hidden" name="alumno" value="">
            <input type="hidden" name="rol" value="">
            <input type="hidden" name="cantidad" value="">

            <div class="form-group form-group-lg fix-height">

                <select class="form-control small" name="padre" placeholder="Padre">
                    <option disabled="disabled" selected="selected" name="topic">&nbsp;Seleccionar Padre</option>
                    <?php
                        foreach($usuarios as $usuario):
                    ?>
                        <option value="<?= $usuario->getId();?>">&nbsp;<?= $usuario->getNombre();?> <?= $usuario->getApellido();?></option>
                    <?php endforeach; ?>
                </select>

            </div>

            <button class="btn btn--center btn--m-t"><i class="fa fa-refresh fa-spin fa-fw hide"></i>Generar notificación</button>

            <div class="form-response">
                <p></p>
            </div>

        </form>
    </div>
</div>
