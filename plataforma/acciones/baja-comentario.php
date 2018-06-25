<?php
require_once '../autoload.php';

$id = $_GET['id'];
try {
    Comentario::eliminar($id);
    header('Location: ../index.php');
} catch(Exception $e) {
    echo "Hubo un error en el borrado del comentario.";
}