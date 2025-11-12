<?php
$page_title = 'Detalles del Pedido - Mi Cuenta';
include 'header.php'; 

// En un sistema real, el ID del pedido vendría de la URL, ej: /users/pedido-detalles?id=105
$order_id = '#PLAS-105';
?>

<div class="container-fluid">
    <h1 class="page-title">Detalles del Pedido <span class="text-primary"><?= $order_id ?></span></h1>

    <!-- Resumen del Pedido -->
    <div class="card card-glass mb-4">
        <div class="card-body">
            <div class="row text-center">
                <div class="col-md-4">
                    <h5 class="text-muted">Fecha del Pedido</h5>
                    <p class="fs-5">28 de Julio, 2024</p>
                </div>
                <div class="col-md-4">
                    <h5 class="text-muted">Estado</h5>
                    <p class="fs-5"><span class="badge bg-success">Entregado</span></p>
                </div>
                <div class="col-md-4">
                    <h5 class="text-muted">Total</h5>
                    <p class="fs-5 fw-bold">$150.00</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Columna de Productos -->
        <div class="col-lg-8">
            <div class="card card-glass">
                <div class="card-header">
                    <h3 class="mb-0 text-center">Artículos en este Pedido</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless table-glass">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th class="text-center">Cantidad</th>
                                    <th class="text-end">Precio Unitario</th>
                                    <th class="text-end">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Producto de ejemplo 1 -->
                                <tr>
                                    <td>Contenedor de Plástico 5L</td>
                                    <td class="text-center">10</td>
                                    <td class="text-end">$5.00</td>
                                    <td class="text-end">$50.00</td>
                                </tr>
                                <!-- Producto de ejemplo 2 -->
                                <tr>
                                    <td>Botella PET 1L (Paquete 100)</td>
                                    <td class="text-center">1</td>
                                    <td class="text-end">$75.00</td>
                                    <td class="text-end">$75.00</td>
                                </tr>
                                <!-- Producto de ejemplo 3 -->
                                <tr>
                                    <td>Tapas de Rosca (Paquete 1000)</td>
                                    <td class="text-center">1</td>
                                    <td class="text-end">$20.00</td>
                                    <td class="text-end">$20.00</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr><td colspan="4"><hr class="border-primary"></td></tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td class="text-end"><strong>Subtotal</strong></td>
                                    <td class="text-end">$145.00</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td class="text-end"><strong>Envío</strong></td>
                                    <td class="text-end">$5.00</td>
                                </tr>
                                <tr class="fs-5">
                                    <td colspan="2"></td>
                                    <td class="text-end"><strong>Total</strong></td>
                                    <td class="text-end"><strong>$150.00</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Columna de Envío -->
        <div class="col-lg-4">
            <div class="card card-glass">
                 <div class="card-header">
                    <h3 class="mb-0 text-center">Información de Envío</h3>
                </div>
                <div class="card-body">
                    <h5 class="fw-bold">Dirección de Envío</h5>
                    <p>
                        Juan Pérez<br>
                        Calle Falsa 123, Colonia Centro<br>
                        Ciudad de México, CP 06000<br>
                        México
                    </p>
                    <hr>
                    <h5 class="fw-bold">Método de Envío</h5>
                    <p>Envío Estándar (3-5 días hábiles)</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="text-center mt-4">
        <a href="/users/pedidos" class="btn btn-outline-light"><i class="fas fa-arrow-left me-2"></i>Volver a Mis Pedidos</a>
    </div>
</div>

<?php include 'footer.php'; ?>
