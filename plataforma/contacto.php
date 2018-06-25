<!-- CONTACTO -->

<?php
require 'partials/head.php';
?>
<body class="contacto">
<?php
require 'partials/header.php';
?>

<div class="section-row section-row--contact" id="contacto">
    <div class="container">
        <div class="row">
            <div class="col-sm-7 col-md-6 vertical-align">
                <h1 class="title">Contactese con nuestro equipo!</h1>
                <h5 class="subtitle">Tenemos un equipo de profecionales enfocados en mejorar nuestra herramienta y ayudar a quienes necesiten contención.</h5>
            </div>
            <div class="col-sm-5">
                <form id="contact-form">
                    <div class="form-group form-group-lg">
                        <input class="form-control" type="text" placeholder="Nombre completo" name="full_name">
                    </div>
                    <div class="form-group form-group-lg">
                        <input class="form-control" type="email" placeholder="E-mail" name="email">
                    </div>
                    <div class="form-group form-group-lg">
                        <textarea class="form-control" placeholder="¿Por que te pones en contacto?" rows="9" name="message"></textarea>
                    </div>
                    <button class="btn btn--center btn--m-t btn--small"><i class="fa fa-refresh fa-spin fa-fw hide"></i>SEND</button>
                    <div class="form-response" id="form-response">
                        <p>We're glad to hear from you, we'll contact you pretty soon.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
require 'partials/footer.php';
?>
