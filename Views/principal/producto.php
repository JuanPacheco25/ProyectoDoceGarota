<?php include_once 'Views/template/header-principal.php'; ?>




<div class="contenedor-principal">

   

    <main class="main-tienda">


        <div class="container-pro">
            <?php foreach ($data['productos'] as $producto) { ?>

            <div class="card-product">

                <figure>
                    <img class="fotos" src="<?php echo  BASE_URL. $producto['imagen']; ?>"
                        alt="<?php echo BASE_URL . $producto['imagen']; ?>">
                </figure>

                <div class="parte-inferior">

                    <div class="tittle-card">

                        <a
                            href="<?php echo BASE_URL . 'principal/detail/' . $producto['id']; ?>"><?php echo $producto['nombre']; ?></a>
                        <span class="precio"><?php echo MONEDA . ' ' . $producto['precio']; ?></span>

                    </div>

                    <div class="tallas-precio">


                        <div class="rating">
                            <span class="star" data-value="1"><i class="bi bi-star-fill"></i></span>
                            <span class="star" data-value="2"><i class="bi bi-star-fill"></i></span>
                            <span class="star" data-value="3"><i class="bi bi-star-fill"></i></span>
                            <span class="star" data-value="4"><i class="bi bi-star-fill"></i></span>
                            <span class="star" data-value="5"><i class="bi bi-star-fill"></i></span>
                        </div>
                        <div class="botones-card">

                            <a href="#!" prod="<?php echo $producto['id']; ?>" class="btn-cora btnAddDeseo"><i
                                    class="bi bi-heart-fill"></i></a>
                            <a href="#!" prod="<?php echo $producto['id']; ?>" class="btn-carrito btnAddcarrito"><i
                                    class="bi bi-bag-plus"></i></a>
                            <a href="<?php echo BASE_URL . 'principal/detail/' . $producto['id']; ?>"
                                class="btn-vista"><i class="bi bi-eye"></i></a>

                        </div>

                    </div>
                
                </div>

            </div>

            <?php } ?>

    </main>



</div>



<div class="container-tienda-btns">

    <div class="btns">


        <?php
        $anterior = $data['pagina'] - 1;
        $siguiente = $data['pagina'] + 1;
        $url = BASE_URL . 'principal/producto';

        if ($data['pagina'] > 1) {
            echo '<a href="' . $url . '/' . $anterior . '" class="btn-siguiente"> Anterior</a>';
        }
        if ($data['total'] >= $siguiente) {
            echo '  <a href="' . $url . '/' . $siguiente . '" class="btn-siguiente"> Siguiente</a>';
        }
        ?>
    </div>

</div>

<script>
// Función para mostrar/ocultar la lista
function toggleLista() {
    const lista = document.getElementById("todos");
    if (lista.style.display === "none" || lista.style.display === "") {
        lista.style.display = "block";
    } else {
        lista.style.display = "none";
    }
}
</script>




<script src="<?php echo BASE_URL; ?>assets/js/main.js"></script>

<?php include_once 'Views/template/footer-principal.php'; ?>