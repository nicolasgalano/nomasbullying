<?php
require_once 'autoload.php';

if(isset($_SESSION['_input'])) {
    $input = $_SESSION['_input'];
    unset($_SESSION['_input']);
} else {
    $input = null;
}

if(isset($_SESSION['_error'])) {
    $error = $_SESSION['_error'];
    unset($_SESSION['_error']);
} else {
    $error = null;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
<h1>Iniciar Sesión</h1>
<p>*Aclaracion para el TP: Las contraseñas son idénticas al usuario. Ejemplo: usuario 'juan' contraseña 'juan'</p>
<?php
if($error): ?>
<div class="error"><?= $error;?></div>
<?php
endif; ?>

<form action="acciones/do-login.php" method="post">
    <div class="form-group">
        <label for="usuario">Usuario: </label>
        <input type="text" id="usuario" name="usuario" value="<?php
        if($input) {
            echo $input['usuario'];
        } ?>">
    </div>
    <div class="form-group">
        <label for="password">Password: </label>
        <input type="password" id="password" name="password">
    </div>
    <button>Ingresar</button>
</form>
</main>
</body>
</html>