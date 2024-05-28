<?php include_once 'Views/template/header-principal.php'; ?>


<div class="container-car">
    <div class="alerta">

        <h1>
            <i class="bi bi-bag-plus"></i>
            <?php echo  ucfirst($data['title']); ?>
        </h1>
    </div>

    <div class="container-tabla-car">
        <div class="">
            <div class="cont-tabla-card">
                <table class="custom-table" id="tableListaCarrito" style="width: 100%;">
                    <thead>
                        <tr>
                            <th><i class="bi bi-images"></i></th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th>eliminar</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

        </div>

        <div class="modal-footer">
            <h3 id="totalGeneral"></h3>

            <?php if (empty($_SESSION['correoCliente'])) : ?>
                <a class="btn-procesar" href="<?php echo BASE_URL . 'principal/iniciar'; ?>"><i class="bi bi-cash-coin"></i> Login</a>
            <?php else: ?>
                <a class="btn-procesar" href="<?php echo BASE_URL . 'clientes'; ?>"><i class="bi bi-cash-coin"></i> Pagar</a>
            <?php endif; ?>

        </div>

    </div>
</div>
</div>
<script src="<?php echo BASE_URL; ?>assets/js/carrito.js"></script>

<?php include_once 'Views/template/footer-principal.php'; ?>