<?php
require_once 'autoload.php';
$page = '';
if (isset($_SESSION['page'])) {
    $page = $_SESSION['page'];
}
?>
<!-- HEADER HOME -->
<nav class="navbar navbar-default navbar-fixed-top" id="top-nav">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar top-bar"></span><span class="icon-bar middle-bar"></span><span class="icon-bar bottom-bar"></span></button>
            <a class="navbar-brand" href="index.php" style="background-image: url(<?=($page=='home')?'images/logo-header.png':'images/instituto/logo.png';?>);"></a>
        </div>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="nav navbar-nav">
                <li><a class="informacion-link" href="informacion.php">Información y teléfonos útiles</a></li>

                <?php if(!Auth::userLogged()) { ?>
                    <li><a class="login-link" href="login.php">Login</a></li>
                <?php } else { ?>
                    <li><a class="panel-link" href="panel.php">Panel</a></li>
                    <li><a class="login-link" href="acciones/logout.php">Cerrar sesión</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<!-- HEADER NOT LOGGED
<nav class="navbar navbar-default navbar-fixed-top" id="top-nav">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar top-bar"></span><span class="icon-bar middle-bar"></span><span class="icon-bar bottom-bar"></span></button><a class="navbar-brand" href="index.html" style="background-image: url(images/instituto/logo.png);">
        </div>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="nav navbar-nav">
                <li><a class="informacion-link" href="informacion.html">Información y teléfonos útiles</a></li>
                <li><a class="login-link" href="login.html">Login</a></li>
            </ul>
        </div>
    </div>
</nav>
-->

<!-- HEADER LOGGED
<nav class="navbar navbar-default navbar-fixed-top" id="top-nav">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar top-bar"></span><span class="icon-bar middle-bar"></span><span class="icon-bar bottom-bar"></span></button><a class="navbar-brand" href="index.html" style="background-image: url(images/instituto/logo.png);">
        </div>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="nav navbar-nav">
                <li><a class="informacion-link" href="informacion.html">Información y teléfonos útiles</a></li>
                <li><a class="panel-link" href="panel.html">Mi Panel</a></li>
            </ul>
        </div>
    </div>
</nav>
-->
