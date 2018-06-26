<?php
require_once 'autoload.php';

if(!Auth::userLogged()) {
    header('Location: login.php');
    exit;
}
$comentarios = Comentario::traerTodos();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Trabajo practico 1</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="estilos/estilo.css" />
</head>
<body>
    <header>
    <div id="head">
    <img src="imagenes/titulo.png" alt="Encabezado de GG" width="1024" height="150"/>
    </div>
    </header>
    <main>
        <h1>ABM de la tabla COMENTARIOS</h1>
        <p>Bienvenido <?= Auth::getUser()->getUsuario();?> (<a href="acciones/logout.php">Cerrar Sesión</a>)</p>
    <a href="alta-comentario.php">Nuevo Comentario</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Comentario</th>
            <th>Titulo del Juego</th>
            <th>ID Usuario</th>
            <th>ID Categoría</th>
            <th>Acciones</th>
        </tr>

        <?php
        foreach($comentarios as $comment): ?>
            <tr>
                <td><?= $comment->getId();?></td>
                <td><?= $comment->getTitulo();?></td>
                <td><?= $comment->getComentario();?></td>
                <td><?= $comment->getTituloJuego();?></td>
                <td><?= $comment->getFkusuarios();?></td>
                <td><?= $comment->getFkcategorias();?></td>
                <td><a href='acciones/baja-comentario.php?id=<?= $comment->getId();?>'>Borrar  </a><a href='edit-comentario.php?id=<?= $comment->getId();?>'> Editar</a></td>
            </tr>
        <?php
        endforeach; ?>
    </table>
   </main>
</body>
</html>