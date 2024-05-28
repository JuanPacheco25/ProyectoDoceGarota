<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?php echo TITLE . ' - ' . $data['title']; ?></title>
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.7/datatables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="<?php echo BASE_URL; ?>assetsAdmin/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assetsAdmin/css/admin.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="<?php echo BASE_URL . 'assets/DataTables/datatables.min.js'; ?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/sweetalert2.all.min.js"></script>
    <script src="<?php echo BASE_URL . 'assets/DataTables/datatables.min.js'; ?>"></script>
    <link href="<?php echo BASE_URL; ?>assetsAdmin/css/dropzone.css" rel="stylesheet" type="text/css" />
    <script>
        const base_url = '<?php echo BASE_URL; ?>'
    </script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <img src="<?php echo BASE_URL; ?>assets/img/logo2.png" alt="imagen logo" class="img-fluid" style="max-width: 70px;">

        <a class="navbar-brand ps-3" href="<?php echo BASE_URL; ?>admin/home"><?php echo TITLE; ?></a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
            <img src="<?php echo BASE_URL; ?>assets/img/logo2.png" alt="imagen logo" class="img-fluid" style="max-width: 70px;">
            </div>
        </form>
        <!-- Navbar-->
        
           
           

        </div>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class=""  class="user-info ps-3"> <?php echo $_SESSION['nombre_usuario']; ?> <br> <?php echo $_SESSION['email']; ?></i>
            
                
                    
                
            
                
               
            </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Configuracion</a></li>
                
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="<?php echo BASE_URL . 'admin/salir'; ?>">Salir</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="<?php echo BASE_URL . 'admin/home' ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <a class="nav-link" href="<?php echo BASE_URL . 'usuarios' ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Usuarios
                        </a>

                        <a class="nav-link" href="<?php echo BASE_URL . 'categorias' ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>
                            Categorias
                        </a>

                        <a class="nav-link" href="<?php echo BASE_URL . 'productos' ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                            Productos
                        </a>

                        <a class="nav-link" href="<?php echo BASE_URL . 'pedidos' ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-bell"></i></div>
                            Pedidos
                        </a>



                    </div>

            </nav>