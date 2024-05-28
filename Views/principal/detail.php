<?php include_once 'Views/template/header-principal.php'; ?>



<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


<section class="detalle-pro">



    <div class="container-detail">
        <div class="img_container">
            <img src="<?php echo  BASE_URL . $data['producto']['imagen']; ?>" alt="" class="main_img">
            </a>
        </div>

        <div class="thumbnail_container">

            <?php for ($i = 0; $i < count($data['imagenes']); $i++) { ?>
            <img class="thumbnail active2"
                src="<?php echo  BASE_URL . 'assets/img/productos/' . $data['producto']['id'] . '/' . $data['imagenes'][$i]; ?>">
            <?php } ?>
        </div>
    </div>






    <div class="info-detalle">

        <div class="data-p">
            <h1><?php echo $data['producto']['nombre']; ?></h1>
            <p class="descripcion-detail">
                <?php echo $data['producto']['descripcion']; ?>
            </p>


            <div class="rating3">
                <span class="star1" data-value="1"><i class="bi bi-star-fill"></i></span>
                <span class="star1" data-value="2"><i class="bi bi-star-fill"></i></span>
                <span class="star1" data-value="3"><i class="bi bi-star-fill"></i></span>
                <span class="star1" data-value="4"><i class="bi bi-star-fill"></i></span>
                <span class="star1" data-value="5"><i class="bi bi-star-fill"></i></span>
            </div>
        </div>

        <div class="precio-talla">
            <span class="precio-p"><?php echo MONEDA . ' ' .   $data['producto']['precio']; ?></span>
            <div class="separador-talla">

                <h4>Tallas</h4>


                <!--  <form action="" method="GET">-->

                <input type="hidden" id="idProducto" value="<?php echo ($data['producto']['id']); ?>">




                <div class="separar-tallas">
                    <button class="btn-talla" onclick="seleccionarTalla(this)">S</button>
                    <button class="btn-talla" onclick="seleccionarTalla(this)">M</button>
                    <button class="btn-talla" onclick="seleccionarTalla(this)">L</button>
                    <button class="btn-talla" onclick="seleccionarTalla(this)">X</button>
                    <button class="btn-talla" onclick="seleccionarTalla(this)">XL</button>
                </div>
                <div class="cont-cantidad">
                    <span class="title">Cantidad</span>

                    <div class="btns-cantidad">
                        <input type="hidden" id="product-quanity" value="1">
                        </span>
                        <button class="btn-cantidad" id="btn-minus"><i class="bi bi-dash"></i></button>
                        <span class="contador" id="var-value">1</span>
                        <button class="btn-cantidad" id="btn-plus"><i class="bi bi-plus"></i></button>
                    </div>
                </div>

                <script src="script.js"></script>




                <!-- </form> -->
            </div>

        </div>



        <!-- CAMBIAR DESPUES DE LA PRESENTACION Y BORRAR EL DE ARRIBA
        <div class="cont-cantidad">
            <span class="title">Cantidad</span>

            <div class="btns-cantidad">
                <input type="hidden" id="product-quanity" value="1">
                </span>
                <button class="btn-cantidad" id="btn-minus"><i class="bi bi-dash"></i></button>
                <span class="contador" id="var-value">1</span>
                <button class="btn-cantidad" id="btn-plus"><i class="bi bi-plus"></i></button>
            </div>
        </div>
    -->



        <div class="agregar-deseos">
            <div class="separar-btn">

                <button prod="<?php echo $producto['id']; ?>" class="btn-cora btnAddDeseo"><i
                        class="bi bi-heart-fill"></i></button>
                <button type="button" class="btn-agregar-d" id="btnAddCart"> Comprar</button>

            </div>

        </div>


    </div>


</section>



<section class="relacionados">
    <h1>Productos relacionados</h1>

    <div class="cards-slider-container">
        <div class="cards-container">

            <?php foreach ($data['relacionados'] as $producto) { ?>
            <div class="card-product calculo">
                <!-- Contenido de la tarjeta del producto -->
                <figure>
                    <img class="fotos" src="<?php echo BASE_URL . $producto['imagen']; ?>"
                        alt="<?php echo $producto['imagen']; ?>">
                </figure>
                <div class="parte-inferior">
                    <div class="tittle-card">
                        <a href="<?php echo BASE_URL . 'principal/detail/' . $producto['id']; ?>">
                            <?php echo $producto['nombre']; ?>
                        </a>
                        <span class="precio"><?php echo MONEDA . ' ' . $producto['precio']; ?></span>
                    </div>
                    <div class="tallas-precio">
                        <div class="rating2">
                            <span class="sta" data-value="1"><i class="bi bi-star-fill"></i></span>
                            <span class="sta" data-value="2"><i class="bi bi-star-fill"></i></span>
                            <span class="sta" data-value="3"><i class="bi bi-star-fill"></i></span>
                            <span class="sta" data-value="4"><i class="bi bi-star-fill"></i></span>
                            <span class="sta" data-value="5"><i class="bi bi-star-fill"></i></span>
                        </div>
                        <div class="botones-card">
                            <a href="#!" prod="<?php echo $producto['id']; ?>" class="btn-cora btnAddDeseo">
                                <i class="bi bi-heart-fill"></i>
                            </a>
                            <a href="#!" prod="<?php echo $producto['id']; ?>" class="btn-carrito btnAddcarrito">
                                <i class="bi bi-bag-plus"></i>
                            </a>
                            <a href="<?php echo BASE_URL . 'principal/detail/' . $producto['id']; ?>" class="btn-vista">
                                <i class="bi bi-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>

    <!-- Puntos de navegación -->
    <div id="navigation-dots"></div>
</section>





<script>


const cardsContainer = document.querySelector('.cards-container');
const navigationDotsContainer = document.getElementById('navigation-dots');
const dots = [];

let currentIndex = 0;

function updateSlider() {
    cardsContainer.style.transform = `translateX(${-currentIndex * 110}px)`;

    // Actualizar estado de los puntos de navegación
    dots.forEach((dot, index) => {
        dot.classList.toggle('active', index === currentIndex);
    });
}

function createNavigationDots() {
    for (let i = 0; i < cardsContainer.children.length; i++) {
        const dot = document.createElement('div');
        dot.classList.add('dot');
        dot.addEventListener('click', () => {
            currentIndex = i;
            updateSlider();
        });
        dots.push(dot);
        navigationDotsContainer.appendChild(dot);
    }
}

createNavigationDots();

function autoSlide() {
    currentIndex = (currentIndex + 1) % cardsContainer.children.length;
    updateSlider();
}


const slideInterval = setInterval(autoSlide, 1000);


cardsContainer.addEventListener('mouseenter', () => clearInterval(slideInterval));
cardsContainer.addEventListener('mouseleave', () => slideInterval = setInterval(autoSlide, 5000));


updateSlider();

//selector de tallas 
function seleccionarTalla(boton) {
    // Obtener todos los botones de talla
    var botonesTalla = document.querySelectorAll('.btn-talla');

    // Quitar la clase 'active' de todos los botones
    botonesTalla.forEach(function(boton) {
        boton.classList.remove('active');
    });

    // Agregar la clase 'active' al botón clicado
    boton.classList.add('active');
}
</script>


<script>
const main_img = document.querySelector('.main_img')
const thumbnails = document.querySelectorAll('.thumbnail')


thumbnails.forEach(thumb => {
    thumb.addEventListener('click', function() {
        const active = document.querySelector('.active2')
        active.classList.remove('active2')
        thumb.classList.add('active2')
        main_img.src = thumb.src
    })
})


const stars = document.querySelectorAll(".star1");
let rating = 0;

stars.forEach(star => {
    star.addEventListener("click", () => {
        const value = parseInt(star.getAttribute("data-value"));
        rating = value;
        updateRating();
    });
});

function updateRating() {
    stars.forEach(star => {
        const value = parseInt(star.getAttribute("data-value"));
        if (value <= rating) {
            star.classList.add("active");
        } else {
            star.classList.remove("active");
        }
    });
}
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var lista = document.getElementById("todos");
    var boton = document.getElementById("mostrarLista");

    boton.addEventListener("click", function() {
        if (lista.style.display === "none" || lista.style.display === "") {
            lista.style.display = "block";
            boton.innerHTML = '<i class="bi bi-caret-up-fill"></i>';
        } else {
            lista.style.display = "none";
            boton.innerHTML = '<i class="bi bi-caret-down-fill"></i>';
        }
    });
});
</script>

<script>
const contadorElement = document.getElementById('var-value');
const sumarButton = document.getElementById('btn-plus');
const restarButton = document.getElementById('btn-minus');
const quantity = document.getElementById('product-quanity'); // Corregido el nombre de la variable aquí 

// Inicializar el contador 
let contador = 0;

// Función para sumar 1 al contador 
function sumar() {
    contador++;
    actualizarContador();
}

// Función para restar 1 al contador (con límite mínimo de 0) 
function restar() {
    if (contador > 0) {
        contador--;
        actualizarContador();
    }
}

// Función para actualizar el contenido del elemento del contador 
function actualizarContador() {
    contadorElement.textContent = contador;
    quantity.value = contador; // Actualizado el valor del campo de entrada de cantidad 
}

// Agregar eventos a los botones 
sumarButton.addEventListener('click', sumar);
restarButton.addEventListener('click', restar);
</script>


<script src="<?php echo BASE_URL . 'assets/js/starsdetalle.js'; ?>"> </script>
<script src="<?php echo BASE_URL . 'assets/js/modulos/detail.js'; ?>"> </script>
<script src="<?php echo BASE_URL . 'assets/js/fotoAmpliada.js'; ?>"> </script>


<script src="<?php echo BASE_URL; ?>assets/js/jquery.auto-complete.min.js"></script>

<?php include_once 'Views/template/footer-principal.php'; ?>