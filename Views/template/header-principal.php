<!DOCTYPE html>
<html>

<head>



    <!DOCTYPE html>
    <html>

    <head>


        
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=7">
        <link rel="preconnect" href="https://fonts.googleapis.com">


        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/detalle.css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/tienda.css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/deseos.css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/carrito.css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/TyC.css">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
        <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?><?php echo MONEDA; ?>"
            data-sdk-integration-source="button-factory"></script>
        <title><?php echo TITLE . ' - ' . $data['title']; ?></title>

        <title>Doce Garota</title>
        <script>
        const base_url = '<?php echo BASE_URL; ?>';
        let listaDeseo = [],
            listaCarrito = [];
        if (localStorage.getItem('listaDeseo') != null) {
            listaDeseo = JSON.parse(localStorage.getItem('listaDeseo'))
        }
        if (localStorage.getItem('listaCarrito') != null) {
            listaCarrito = JSON.parse(localStorage.getItem('listaCarrito'))
        }
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    </head>

<body>

    <header class="header">

        <a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>assets/img/logo2.png" alt="imagen logo"></a>
        <input type="checkbox" id="nav-check" hidden>
        <nav>
            <ul>
                <li>
                    <a href="<?php echo BASE_URL; ?>">Inicio</a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL; ?>principal/producto/">Tienda</a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL; ?>principal/nosotros/">Nosotros</a>
                </li>
            </ul>

        </nav>

        <div class="iconos">


            <div class="cart">
                <a class="lupa-btn" onclick="mostrarCampoBusqueda()"><i class="bi bi-search"></i></a>

            </div>
            <div class="cart">
                <a href="<?php echo BASE_URL . 'principal/deseo' ?>"><i class="bi bi-heart "></i></a>
                <span class="numero-span" id="btnCantidadDeseo">0</span>
            </div>
            <div class="cart">
                <a href="<?php echo BASE_URL . 'principal/carrito' ?>" id="vercarrito"><i
                        class="bi bi-bag-plus"></i></a>
                <span class="numero-span" id="btnCantidadCarrito">0</span>
            </div>

            <div class="cart">
                <!-- SI NO INICIÓ SESIÓN QUE LO MANDE A INICIAR SESION -->

                <?php if (empty($_SESSION['correoCliente'])) : ?>
                <a href="<?php echo BASE_URL . 'principal/iniciar' ?>" id="btnModalLogin" rel="noopener noreferrer">
                    <i class="bi bi-person-circle"></i>
                </a>
                <!-- SI INICIÓ SESIÓN QUE LO MANDE AL APARTADO DE CLIENTES -->
                <?php else : ?>
                <a href="<?php echo BASE_URL . 'clientes' ?>" rel="noopener noreferrer">
                    <i class="bi bi-person-bounding-box"></i>
                </a>
                <?php endif; ?>
            </div>
            <!-- SI INICIÓ SESIÓN QUE APAREZCA PARA CERRAR SESIÓN -->
            <?php if (!empty($_SESSION['correoCliente'])) : ?>
            <div class="cart">
                <a href="<?php echo BASE_URL . 'clientes/cerrarSesion' ?>"><i class="bi bi-box-arrow-in-right"></i></a>
            </div>
            <?php endif; ?>
            <label for="nav-check" class="menu"><i class="bi bi-list"></i> </label>
        </div>
    </header>

    <div class="search-box" id="searchBox">
        <label for="inputBusqueda"></label>
        <input id="inputBusqueda" type="text" placeholder="buscar">
    </div>





    <script>
    function mostrarCampoBusqueda() {
        var searchBox = document.getElementById("searchBox");
        if (searchBox.style.display === "none") {
            searchBox.style.display = "block";
        } else {
            searchBox.style.display = "none";
        }
    }
    </script>