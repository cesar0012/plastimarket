<?php
$page_title = 'Dashboard - Mi Cuenta';
include 'header.php'; 
?>

<div class="container-fluid">
    <h1 class="page-title">Bienvenido de Nuevo</h1>

    <!-- Tarjetas de Resumen con estilo Glassmorphism -->
    <div class="row mb-5">
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card card-glass text-center h-100">
                <div class="card-body d-flex flex-column justify-content-center">
                    <i class="fas fa-box-open fa-3x text-primary mb-3"></i>
                    <h3 class="card-title fw-bold">5</h3>
                    <p class="card-text text-secondary">Pedidos Totales</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card card-glass text-center h-100">
                <div class="card-body d-flex flex-column justify-content-center">
                    <i class="fas fa-truck fa-3x text-success mb-3"></i>
                    <h3 class="card-title fw-bold">3</h3>
                    <p class="card-text text-secondary">Pedidos Enviados</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 mb-4">
            <div class="card card-glass text-center h-100">
                <div class="card-body d-flex flex-column justify-content-center">
                    <i class="fas fa-user-shield fa-3x text-info mb-3"></i>
                    <h3 class="card-title fw-bold">Cliente Mayorista</h3>
                    <p class="card-text text-secondary">Nivel de Cuenta</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Pedidos Recientes con estilo Glassmorphism -->
    <div class="card card-glass">
        <div class="card-header">
            <h3 class="mb-0 text-center">Tus Pedidos Recientes</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-glass table-hover">
                    <thead>
                        <tr>
                            <th>ID Pedido</th>
                            <th>Fecha</th>
                            <th>Total</th>
                            <th>Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>#PLAS-105</strong></td>
                            <td>28/07/2024</td>
                            <td>$150.00</td>
                            <td><span class="badge bg-success">Entregado</span></td>
                            <td class="text-center"><a href="/users/pedido-detalles" class="btn btn-sm btn-primary">Ver Detalles</a></td>
                        </tr>
                        <tr>
                            <td><strong>#PLAS-104</strong></td>
                            <td>15/07/2024</td>
                            <td>$85.50</td>
                            <td><span class="badge bg-success">Entregado</span></td>
                            <td class="text-center"><a href="/users/pedido-detalles" class="btn btn-sm btn-primary">Ver Detalles</a></td>
                        </tr>
                        <tr>
                            <td><strong>#PLAS-103</strong></td>
                            <td>01/07/2024</td>
                            <td>$220.00</td>
                            <td><span class="badge bg-warning text-dark">En Proceso</span></td>
                            <td class="text-center"><a href="/users/pedido-detalles" class="btn btn-sm btn-primary">Ver Detalles</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-center bg-transparent border-0 pt-4">
            <a href="/users/pedidos" class="btn btn-outline-light">Ver Historial Completo</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
