<?php
require_once '../autoload.php';

// Validación de datos...

try {
    Comentario::crear($_POST);
    header('Location: ../index.php');
} catch(Exception $e) {
    echo "Hubo un error en la creación del comentario. Por favor intentalo de nuevo";
}