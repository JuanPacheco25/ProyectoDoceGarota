<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> <?php  $data['title']; ?> </title>
    <link href="<?php echo BASE_URL; ?>assetsAdmin/css/styles.css" rel="stylesheet" />
    <link href="<?php echo BASE_URL; ?>assetsAdmin/css/login.css" rel="stylesheet" />

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="mayor d-flex justify-content-center align-items-center">
        <img src="<?php echo BASE_URL; ?>assetsAdmin/img/fondologinadimin.png" alt="imagen logo">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container justify-content-center align-items-center">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-lg-5">
                               
                                <div class="card bg-transparent shadow-lg border-0 rounded-lg mt-5 glass-box">
                                    <div class="card-body text-center">
                                    <h1 class="custom-text" >ADMIN</h1>
                                   
                                        <form id="formulario">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="email" name="email" type="email"
                                                    placeholder="name@example.com" />
                                                <label for="email">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="clave" name="clave" type="password"
                                                    placeholder="Password" />
                                                <label for="clave">Password</label>
                                            </div>

                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small custom-text" href="password.html">Forgot Password?</a>
                                                <button type="submit" class="btn btn-primary custom-button"
                                                    href="index.html">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small "><a class="custom-text" href="register.html ">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="<?php echo BASE_URL; ?>assetsAdmin/js/scripts.js"></script>
    <script>
    const base_url = '<?php echo BASE_URL; ?>';
    </script>
    <script src="<?php echo BASE_URL; ?>assetsAdmin/js/loginAdmin.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/sweetalert2.all.min.js"></script>


</body>




</html>