<?php
require_once '../autoload.php';

try {
    Comentario::editar($_POST);
    header('Location: ../index.php');
} catch(Exception $e) {
    echo "Hubo un error en la edición del comentario. Por favor intentalo de nuevo";
}
