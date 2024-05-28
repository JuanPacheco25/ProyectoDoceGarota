<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/login.css">

    <title>Document</title>
</head>

<body>
    <div id="tittleLogin">
        <form class="login" action="" method="POST" id="frmLogin">
            <div class="img-login">
                <img class="img-fondo-login" src="<?php echo BASE_URL; ?>assets/img/imagen.png" alt="">
                <img class="img-logo" src="<?php echo BASE_URL; ?>assets/img/logo2.png" alt="">
            </div>

            <div class="formulario">
                <h1>Bienvenido de regreso</h1>
                <span>Los campos marcados con <b>*</b> son obligatorios</span>
                <input class="inp-email" type="email" name="correoLogin" id="correoLogin" placeholder="Email*">
                <input class="inp-email" type="password" name="claveLogin" id="claveLogin" placeholder="Contraseña*">
                <button class="btn-enviar btn-lg" id="login">Iniciar</button>
                <div class="enlaces-a">
                    <a href="<?php echo BASE_URL . 'principal/recupera' ?>">Olvidaste tu contraseña?</a>
                    <a href="<?php echo BASE_URL . 'principal/registrar' ?>">No tienes cuenta?</a>
                </div>
            </div>
        </form>
    </div>
</body>
<script> const base_url = "<?= BASE_URL ?>"; </script>
<script src="<?php echo BASE_URL;?>assets/js/sweetalert2.all.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/login.js"></script>
</html>