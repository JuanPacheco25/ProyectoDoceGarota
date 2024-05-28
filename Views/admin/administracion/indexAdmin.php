<?php include_once 'Views/template/header-admin.php'; ?>


</div>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Panel Administrativo</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Doce Garota</li>
            </ol>
            <div class="row mb-4 mt-4 g-5">
                <div class="col-xl-3 col-md-6">
                    <div class="card radius-10 border-start border-10 border-5 border-warning">
                        <div class="card-body">Pedidos Pendientes</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <h4 class="my-1 text-warning"><?php echo $data['pendientes']['total']; ?> </h4>
                            <a class="small text-black stretched-link" href="<?php echo BASE_URL . 'pedidos' ?>">Ver Detalles</a>
                            <div class="small text-black"><i class="fas fa-exclamation-circle"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card radius-10 border-start border-10 border-5 border-info">
                        <div class="card-body">Pedidos en Proceso</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <h4 class="my-1 text-info"><?php echo $data['procesos']['total']; ?></h4>
                            <a class="small text-black stretched-link" href="<?php echo BASE_URL . 'pedidos' ?>">Ver Detalles</a>
                            <div class="small text-black"><i class="fas fa-spinner"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card radius-10 border-start border-10 border-5 border-success">
                        <div class="card-body">Pedidos Finalizados</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <h4 class="my-1 text-success"><?php echo $data['finalizados']['total']; ?></h4>
                            <a class="small text-black stretched-link" href="<?php echo BASE_URL . 'pedidos' ?>">Ver Detalles</a>
                            <div class="small text-black"><i class="fas fa-check-circle"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card radius-10 border-start border-10 border-5 border-danger">
                        <div class="card-body">Total productos</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <h4 class="my-1 text-danger"><?php echo $data['productos']['total']; ?></h4>
                            <a class="small text-white stretched-link" href="<?php echo BASE_URL . 'productos' ?>">Ver Detalles</a>
                            <div class="small text-black"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-12 col-md-4 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">
                            <i class="fas fa-chart-pie me-1"></i>Pedidos</h5>
                        <div class="card-body">
                            <canvas id="reportePedidos" width="220" height="155"></canvas>
                            <div class="chart-widget-list">
                                <p>
                                    <span class="fa-xs text-warning mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span><span class="legend-text">Pendientes </span>
                                    <span class="float-right"><?php echo $data['pendientes']['total']; ?></span>
                                </p>
                                <p>
                                    <span class="fa-xs text-info mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span>
                                    <span class="legend-text">Proceso</span>
                                    <span class="float-right"><?php echo $data['procesos']['total']; ?></span>
                                </p>
                                <p>
                                    <span class="fa-xs text-success mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span> <span class="legend-text">Finalizados</span>
                                    <span class="float-right"><?php echo $data['finalizados']['total']; ?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-pie me-1"></i>
                            Productos con Stock Minimo
                        </div>
                        <div class="card-body"><canvas id="myPieChart2" width="100%" height="50"></canvas></div>
                        <div class="card-footer small text-muted">Actualizado ayer a las  11:59 PM</div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-pie me-1"></i>
                            Productos más Vendidos
                        </div>
                        <div class="card-body"><canvas id="topProductos" width="100%" height="50"></canvas></div>
                        <div class="card-footer small text-muted">Actualizado ayer a las  11:59 PM</div>
                    </div>
                </div>
            </div>

           
        </div>
    </main>
    <?php include_once 'Views/template/footer-admin.php'; ?>
    <script>
        var ctx = document.getElementById("reportePedidos").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    
    data: {
        labels: ["Pendientes", "Procesos", "Finalizados"],
        datasets: [{
            backgroundColor: [
                "#EACD15",
                "#10F0C7",
                "#27992B"
                
            ],
            data: [<?php echo $data['pendientes']['total']; ?>,
            <?php echo $data['procesos']['total']; ?>,
            <?php echo $data['finalizados']['total']; ?>]
        }]
    },
    options: {
        legend: {
            display: false

        }
    }

});
    </script>