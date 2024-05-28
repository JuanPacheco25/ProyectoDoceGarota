<?php include_once 'Views/template/header-principal.php'; ?>

<link href="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.css" rel="stylesheet">

<!-- AQUI ESTA LA ALERTA -->
<!-- DEJEN DE MOVER EL AVISO DE VERIFICACION DEL CORREO -->
<?php if ($data['verificar']['verify'] == 1) : ?>
    <div class="seccion-perfil">
        <div class="desplegables-pago">
            <!--div de la imagen-->
            <div class="tab">
                <button class="tablinks" data-target="#pagados-content">Pago</button>
                <button class="tablinks" data-target="#pendinetes-content">Pedidos</button>
                <button class="tablinks" data-target="#productos-content">Productos</button>
            </div>
            <!-- Tab content -->
            <div id="pagados-content" class="tabcontent active">
                <div class="cont-proceso-pago">
                    <div class="card-body">
                        <div class="">
                            <!--de aqui-->
                            <div class="cont-tabla-card">

                                <table class="custom-table" id="tableListaProductos">
                                    <thead>
                                        <tr>
                                            <th><i class="bi bi-images"></i></th>
                                            <th>Producto</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>SubTotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <h3 id="totalProducto"></h3>
                        <!--hasta aqui copie del carrito php-->
                    </div>
                </div>

                <div class="cuadro-pago">

                    <div class="items-pago">


                        <img class="img-thumbnail" src="<?php echo BASE_URL; ?>assets/img/logogrande.png" alt="">
                        <hr>
                        <p class="nombre"><?php echo $_SESSION['nombreCliente']; ?></p>
                        <p> <i class="fas fa-envelope"></i><?php echo $_SESSION['correoCliente']; ?></p>

                        <div class="accordion-item">
                            <div class="accordion-item-title  paypal-btn"><i class="bi bi-paypal"></i>Paypal</div>
                            <div class="accordion-item-content">
                                <div id="paypal-button-container"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div id="pendinetes-content" class="tabcontent">
                <table class="xd2" id="tblPendientes">
                    <thead>
                        <tr class="tr-tabla-pago">
                            <th>#</th>
                            <td>Monto</td>
                            <td>Fecha</td>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="tr-de-contenido">
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <div id="productos-content" class="tabcontent ">
                <div class="card-body">

                    <!--de aqui-->
                    <div class="cont-tabla-card">

                        <table class="custom-table" id="tblProductos">
                            <thead>
                                <tr>
                                    <!-- <th><i class="bi bi-images"></i></th>-->
                                    <th>#</th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>calificacion</th>
                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                    </div>


                </div>


            </div>

        </div>
        <!--hice una columna, agarre la columna de carritophp-->
    </div>
<?php else : ?>
    <div class="alerta">
        <h1><i class="bi bi-envelope-paper-heart-fill"></i> VERIFICA TU CORREO ELECTRONICO </h1>
    </div>





<?php endif; ?>

<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <p id="id-pedido">
        <h1>Estado del pedido</h1>
        <div class="row">
            <div class="modal-btn-cont">
                <div class="class-enviado">
                    <div class="h-100 py-5 services-icon-wap shadow" id="estadoEnviado">
                        <div class="h1 text-success text-center"><i class="fa fa-truck fa-lg"></i></div>
                        <h2 class="h2-modal " >Pendientes</h2>
                    </div>
                </div>

                <div class="class-enviado">
                    <div class="h-100 py-5 services-icon-wap shadow" id="estadoProceso">
                        <div class="h1 text-success text-center"><i class="fas fa-exchange-alt"></i></div>
                        <h2 class="h2-modal">Proceso</h2>
                    </div>
                </div>

                <div class="class-enviado">
                    <div class="h-100 py-5 services-icon-wap shadow" id="estadoCompletado">
                        <div class="h1 text-success text-center"><i class="fa fa-percent"></i></div>
                        <h2 class="h2-modal">Entregado</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class=" custom-table" id="tablePedidos">
                        <thead>
                            <tr>

                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <td>Subtotal</td>

                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>

</div>

<style>

</style>







<?php include_once 'Views/template/footer-principal.php'; ?>
<script>
    const accordionItems = document.querySelectorAll('.accordion-item');
    const tabLinks = document.querySelectorAll('.tablinks');
    accordionItems.forEach(item => {
        const title = item.querySelector('.accordion-item-title');
        const content = item.querySelector('.accordion-item-content');

        title.addEventListener('click', () => {
            content.style.display = content.style.display === 'none' ? 'block' : 'none';
        });
    });
    //NUEVA FUNCION
    tabLinks.forEach(tab => {
        tab.addEventListener("click", function() {
            const target = tab.dataset.target;
            //ocultar los otros tabs
            document.querySelectorAll(".tabcontent").forEach(content => {
                content.style.display = "none";
            })
            document.querySelector(target).style.display = "flex"
        })
    })
</script>

<script src="<?php echo BASE_URL . 'assets/DataTables/buttons.dataTables.js'; ?>"></script>
<script src="<?php echo BASE_URL . 'assets/DataTables/dataTables.buttons.js'; ?>"></script>
<script src="<?php echo BASE_URL . 'assets/DataTables/datatables.min.js'; ?>"></script>
<script src="<?php echo BASE_URL . 'assets/js/clientes.js'; ?>">
</script>