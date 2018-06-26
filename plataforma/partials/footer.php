<?php
require_once 'autoload.php';
?>
<!-- FOOTER -->
<footer>
    <div class="navbar navbar-default">
        <div class="container"><a class="navbar-brand" href="#" style="background-image: url(images/logo-footer.png);"></a>
            <ul class="nav navbar-nav">
                <li><a class="home-link" href="index.php">Home</a></li>
                <li><a class="informacion-link" href="informacion.php">Información</a></li>
                <li><a class="contacto-link" href="contacto.php">Contacto</a></li>
                <?php if(!Auth::userLogged()) { ?>
                    <li><a class="login-link" href="login.php">Login</a></li>
                <?php } else { ?>
                    <li><a class="panel-link" href="panel.php">Panel</a></li><!-- panel-institucion.php si Institucion-->
                    <li><a class="cerrarsesion-link" href="acciones/logout.php">Cerrar sesión</a></li>
                <?php } ?>
            </ul>
            <ul class="navbar-right social clearfix">
                <li><a target="_blank" href="https://www.facebook.com/No-M%C3%A1s-Bullying-173551566654506"><i class="fa fa-facebook"></i></a></li>
                <li><a target="_blank" href="https://twitter.com/NoMas_Bullying_"><i class="fa fa-twitter"></i></a></li>
            </ul>
        </div>
    </div>
</footer>

<script src="js/vendor.js"></script>
<script src="js/app.js"></script>

</body>

</html>
