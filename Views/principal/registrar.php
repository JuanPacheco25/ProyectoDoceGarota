<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/login.css">
    <title>Document</title>
</head>
<body>
    <form class="login" action="#" method="POST" id="frmRegister">
        <div class="img-login">
            <img class="img-fondo-login" src="<?php echo BASE_URL; ?>assets/img/imagen.png" alt="">
            <img class="img-logo" src="<?php echo BASE_URL; ?>assets/img/logo2.png" alt="">
        </div>

        <div class="formulario">
            <h1>Bienvenido a doce garota</h1>
            
            <span>Los campos marcados con  <b>*</b> son obligatorios</span>

            <div class="name-lastname">
                    <input type="text" id="nombreRegistro" name="nombreRegistro" placeholder="Nombre*">
                    <input type="text" id="apellidoRegistro" name="apellidoRegistro" placeholder="Apellidos*">
            </div>
            
            <input class="inp-email" type="email" name="correoRegistro" id="correoRegistro" placeholder="Email*">
            <input class="inp-email" type="password" name="claveRegistro" id="claveRegistro" placeholder="Contraseña*">
            <input class="inp-email" type="password" name="veriRegistro" id="veriRegistro" placeholder="Verificar contraseña*">
           
            <button class="btn-enviar btn-lg" id="registrarse">registro</button>
            <a href="<?php echo BASE_URL . 'principal/iniciar' ?>">Ya tengo una cuenta</a>


        </div>
    </form>
</body>
<script> const base_url = "<?= BASE_URL ?>"; </script>
<script src="<?php echo BASE_URL;?>assets/js/sweetalert2.all.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/registro.js"></script>

</html>