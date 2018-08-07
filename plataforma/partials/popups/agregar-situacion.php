<?php
require_once 'autoload.php';

$usuarios = Usuario::buscarPorTipo(2);

?>
<div class="popup popup-agregar-situacion">
    <div class="popup-close"><i class="glyphicon glyphicon-remove"></i></div>
    <div class="popup-top green">
        <h5>Agregar situación</h5>
    </div>
    <div class="popup-content">
        <form id="agregar-situacion-form">
            <input type="hidden" name="denunciante" value="<?= $_SESSION['user']->getID() ?>"> <!-- ID USUARIO DENUNCIANTE HARDCODED -->
            <div class="form-group form-group-lg">
                <input class="form-control" type="text" placeholder="Título resumido de la situación" name="titulo">
            </div>
            <div class="form-group form-group-lg fix-height">
                <select class="form-control small" name="agresor" placeholder="Agresor">
                    <option disabled="disabled" selected="selected" name="topic">&nbsp;Agresor</option>
                    <?php
                        foreach($usuarios as $usuario):
                        if($usuario->getId() != 1){
                    ?>
                        <option value="<?= $usuario->getId();?>">&nbsp;<?= $usuario->getApellido();?> <?= $usuario->getNombre();?></option>
                    <?php } endforeach; ?>
                </select>
                <select class="form-control small margin-left" name="victima" placeholder="Victima">
                    <option disabled="disabled" selected="selected" name="topic">&nbsp;Victima</option>
                    <?php
                        foreach($usuarios as $usuario):
                        if($usuario->getId() != 1){
                    ?>
                        <option value="<?= $usuario->getId();?>">&nbsp;<?= $usuario->getApellido();?> <?= $usuario->getNombre();?></option>
                    <?php } endforeach; ?>
                </select>
            </div>
            <div class="form-group form-group-lg">
                <select class="form-control" name="nivel_situacion" placeholder="Gravedad">
                    <option disabled="disabled" selected="selected">&nbsp;Nivel de gravedad</option>
                    <option value="alto">&nbsp;Alto</option>
                    <option value="medio">&nbsp;Medio</option>
                    <option value="bajo">&nbsp;Bajo</option>
                </select>
            </div>
            <div class="form-group form-group-lg">
                <textarea class="form-control" placeholder="Descripción detallada del hecho/situación" rows="9" name="descripcion"></textarea>
            </div>
            <button class="btn btn--center btn--m-t"><i class="fa fa-refresh fa-spin fa-fw hide"></i>Guardar/Crear</button>

            <div class="form-response">
                <p></p>
            </div>

        </form>
    </div>
</div>
