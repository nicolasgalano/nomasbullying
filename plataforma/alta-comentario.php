<?php
require_once 'autoload.php';
$categorias = Categoria::traerTodos();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Comentario</title>
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
<h1>Nuevo Comentario</h1>

<form action="acciones/guardar.php" method="post">
    <div>
        <label for="titulo">Título: </label>
        <input id="titulo" type="text" name="titulo">
    </div>
    <div>
        <label for="juego">Título del juego: </label>
        <input id="juego" type="text" name="juego">
    </div>
    <div>
        <label for="comentario">Comentario: </label>
        <textarea id="comentario" rows="10" cols="40" name="comentario"></textarea>
    </div>
    <div>
        <label for="categoria">Categoria del comentario:</label>
        <select name="categoria">
            <?php
            foreach($categorias as $cat): ?>
            <option value="<?= $cat->getId();?>"><?= $cat->getCategoria();?></option>
            <?php
            endforeach; ?>
        </select>
        <input type="hidden" name="fkusuario" value="<?= Auth::getUser()->getId();?>">
    </div>

    <button>Grabar</button>
</form>
<hr />
<a href="index.php">Volver</a>
</main>
</body>
</html>