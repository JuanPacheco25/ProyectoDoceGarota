<?php include_once 'Views/template/header-principal.php'; ?>


<!-- slider nuevo-->

<section class="container-slider">
    <div class="arrow  l" onclick="prev()">
        <i class="bi bi-caret-left"></i>
    </div>

    <div class="slide slide-1">

        <div class="container-video">
            <video muted autoplay loop>
                <source src="<?php echo BASE_URL; ?>assets/videos/videoNuevo.mp4" type="video/mp4">
            </video>
            <div class="capa">
                <img src="<?php echo BASE_URL; ?>assets/img/logogrande.png" alt="">
            </div>
        </div>

    </div>


    <div class="slide slide-2">

        <div class="container-video">
            <video muted autoplay loop>
                <source src="<?php echo BASE_URL; ?>assets/videos/otrovideo.mp4" type="video/mp4">
            </video>
            <div class="capa">
                <img src="<?php echo BASE_URL; ?>assets/img/logogrande.png" alt="">
            </div>
        </div>
    </div>



    <div class="slide slide-3">

        <div class="container-video">
            <video muted autoplay loop>
                <source src="<?php echo BASE_URL; ?>assets/videos/hermanas.mp4" type="video/mp4">
            </video>
            <div class="capa">
                <img src="<?php echo BASE_URL; ?>assets/img/logogrande.png" alt="">
            </div>
        </div>
    </div>
    <div class="slide slide-3">

        <div class="container-video">
            <video muted autoplay loop>
                <source src="<?php echo BASE_URL; ?>assets/videos/hermanas2.mp4" type="video/mp4">
            </video>
            <div class="capa">
                <img src="<?php echo BASE_URL; ?>assets/img/logogrande.png" alt="">
            </div>
        </div>




    </div>

    <div class="slide slide-3">

        <div class="container-video">
            <video muted autoplay loop>
                <source src="<?php echo BASE_URL; ?>assets/videos/hermanas3.mp4" type="video/mp4">
            </video>
            <div class="capa">
                <img src="<?php echo BASE_URL; ?>assets/img/logogrande.png" alt="">
            </div>
        </div>




    </div>

    <div class="arrow  r" onclick="next()">
        <i class="bi bi-caret-right"></i>
    </div>

</section>

<!-- slider nuevo-->


<section class="categorias">
    <h2>Categorias</h2>



    <span>!Se la envidia de la playa¡</span>

    <div class="contenedor-cat">
        <?php foreach ($data['categorias'] as  $categoria) { ?>

        <div class="card">


            <img src="<?php echo $categoria['imagen']; ?>" alt="">
            <div class="info">
                <h2><?php echo $categoria['categoria']; ?></h2>

                <a class="btn-categorias" href="<?php echo BASE_URL . 'principal/categorias/' . $categoria['id']; ?>"
                    class="btn-categorias">Ver mas</a>
            </div>

        </div>
        <?php  } ?>
    </div>

</section>


<!--inicio de mejores promos-->
<section class="promotion">

    <div class="promotion-content ">

        <div class="promotion-txt">
            <h2>Nueva coleccion</h2>

            <p>
                Sumérgete en el estilo y la comodidad con nuestra nueva colección de trajes de baño para mujeres.
                Inspirada en la naturaleza y la frescura del verano, esta colección presenta bikinis y trajes de una
                sola pieza con cortes favorecedores, estampados vibrantes y detalles elegantes. Confeccionados con
                tejidos de alta calidad, nuestros trajes de baño ofrecen un ajuste cómodo y suave al tacto.
            </p>


        </div>

        <div class="promotion-img">

            <img src="<?php echo BASE_URL; ?>assets/img/promo1.jpg" alt="">

        </div>

    </div>
</section>
<!--Final de mejores promos-->

<main class="main-index">

    <h1>Productos</h1>


    <div class="container-index">
        <?php foreach ($data['nuevoProductos'] as $producto) { ?>

        <div class="card-product">

            <figure>
                <img class="fotos" src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['imagen']; ?>">
            </figure>

            <div class="parte-inferior">

                <div class="tittle-card">

                    <a
                        href="<?php echo BASE_URL . 'principal/detail/' . $producto['id']; ?>"><?php echo $producto['nombre']; ?></a>
                    <span class="precio"><?php echo MONEDA . ' ' . $producto['precio']; ?></span>

                </div>

                <div class="tallas-precio">

                    <ul>
                        <li class="rating">
                            <span class="sta" data-value="1"><i class="bi bi-star-fill"></i></span>
                            <span class="sta" data-value="2"><i class="bi bi-star-fill"></i></span>
                            <span class="sta" data-value="3"><i class="bi bi-star-fill"></i></span>
                            <span class="sta" data-value="4"><i class="bi bi-star-fill"></i></span>
                            <span class="sta" data-value="5"><i class="bi bi-star-fill"></i></span>
                        </li>
                    </ul>
                    <div class="botones-card">

                        <a href="#!" prod="<?php echo $producto['id']; ?>" class="btn-cora btnAddDeseo"><i
                                class="bi bi-heart-fill"></i></a>
                        <a href="#!" prod="<?php echo $producto['id']; ?>" class="btn-carrito btnAddcarrito"><i
                                class="bi bi-bag-plus"></i></a>
                        <a href="<?php echo BASE_URL . 'principal/detail/' . $producto['id']; ?>" class="btn-vista"><i
                                class="bi bi-eye"></i></a>

                    </div>

                </div>

            </div>

        </div>
        <?php } ?>
    </div>
</main>


<section class="seccion-mapa">
    <div class="mapa">
        <div class="texto-mapa">


            <h3>Ubicación en cartagena</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. <br>
                Pariatur laboriosam unde esse libero nihil voluptatibus.</p>

        </div>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3924.3558104961407!2d-75.48975212426684!3d10.393288766142497!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8ef62597d37ea915%3A0x3a357558224f02e!2sCentro%20Comercial%20Paseo%20de%20La%20Castellana!5e0!3m2!1ses-419!2sco!4v1696621568748!5m2!1ses-419!2sco"
            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>


    <div class="mapa">
        <div class="texto-mapa">


            <h3>Ubicación en yopal</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. <br>
                Pariatur laboriosam unde esse libero nihil voluptatibus.</p>

        </div>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31779.72704133566!2d-72.4089885947925!3d5.345629756505409!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e6b0c52f15603c3%3A0xc5fbb62d46bea2a8!2sCentro%20Comercial%20El%20Hobo!5e0!3m2!1ses-419!2sco!4v1696627595748!5m2!1ses-419!2sco"
            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>


    </div>


</section>


<script src="<?php echo BASE_URL . 'assets/js/slider.js'; ?>"> </script>


<?php include_once 'Views/template/footer-principal.php'; ?>