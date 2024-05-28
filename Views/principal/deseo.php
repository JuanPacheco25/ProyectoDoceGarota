<?php include_once 'Views/template/header-principal.php'; ?>


<!-- AQUI ESTA LA ALERTA -->
<div class="container-list-deseo">
    <div class="alerta">
        
        <h1 >
        <i class="bi bi-envelope-paper-heart-fill"></i>
            <?php echo  ucfirst($data['title']); ?>
        </h1>
    </div>

    <div class="container-pro">
        <div class="">
            <div class="cont-table">
                <table class=" custom-table" id="tableListaDeseo" >
                    <thead>
                        <tr>
                            <th><i class="bi bi-images"></i></th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            
                           
                        </tr>
                    </thead>
                    <tbody>
                
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>


<?php include_once 'Views/template/footer-principal.php'; ?>
<script src="<?php echo BASE_URL . 'assets/js/modulos/listaDeseo.js'; ?>"> </script>



    
 