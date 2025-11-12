<?php
$page_title = 'Mis Pedidos - Mi Cuenta';
include 'header.php'; 
?>

<style>
    /* Estilos personalizados para la paginación en tema oscuro */
    .pagination .page-link {
        background-color: transparent;
        border-color: var(--glass-border);
        color: var(--text-secondary);
    }
    .pagination .page-item.active .page-link {
        background: linear-gradient(90deg, var(--brand-accent-orange), var(--brand-accent-yellow));
        border-color: var(--brand-accent-yellow);
        color: var(--text-primary);
    }
    .pagination .page-link:hover {
        background-color: var(--glass-bg);
        border-color: var(--glass-border);
        color: var(--text-primary);
    }
    .pagination .page-item.disabled .page-link {
        color: #6c757d;
    }
</style>

<div class="container-fluid">
    <h1 class="page-title">Historial de Pedidos</h1>

    <div class="card card-glass">
        <div class="card-header">
            <h3 class="mb-0 text-center">Todos tus pedidos en un solo lugar</h3>
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
                        <!-- Pedido 1 -->
                        <tr>
                            <td><strong>#PLAS-105</strong></td>
                            <td>28/07/2024</td>
                            <td>$150.00</td>
                            <td><span class="badge bg-success">Entregado</span></td>
                            <td class="text-center"><a href="/users/pedido-detalles" class="btn btn-sm btn-primary"><i class="fas fa-eye me-1"></i>Ver Detalles</a></td>
                        </tr>
                        <!-- Pedido 2 -->
                        <tr>
                            <td><strong>#PLAS-104</strong></td>
                            <td>15/07/2024</td>
                            <td>$85.50</td>
                            <td><span class="badge bg-success">Entregado</span></td>
                            <td class="text-center"><a href="/users/pedido-detalles" class="btn btn-sm btn-primary"><i class="fas fa-eye me-1"></i>Ver Detalles</a></td>
                        </tr>
                        <!-- Pedido 3 -->
                        <tr>
                            <td><strong>#PLAS-103</strong></td>
                            <td>01/07/2024</td>
                            <td>$220.00</td>
                            <td><span class="badge bg-warning text-dark">En Proceso</span></td>
                            <td class="text-center"><a href="/users/pedido-detalles" class="btn btn-sm btn-primary"><i class="fas fa-eye me-1"></i>Ver Detalles</a></td>
                        </tr>
                        <!-- Pedido 4 -->
                        <tr>
                            <td><strong>#PLAS-102</strong></td>
                            <td>20/06/2024</td>
                            <td>$45.00</td>
                            <td><span class="badge bg-danger">Cancelado</span></td>
                            <td class="text-center"><a href="#" class="btn btn-sm btn-secondary disabled"><i class="fas fa-eye-slash me-1"></i>No Disponible</a></td>
                        </tr>
                        <!-- Pedido 5 -->
                        <tr>
                            <td><strong>#PLAS-101</strong></td>
                            <td>10/06/2024</td>
                            <td>$310.75</td>
                            <td><span class="badge bg-success">Entregado</span></td>
                            <td class="text-center"><a href="/users/pedido-detalles" class="btn btn-sm btn-primary"><i class="fas fa-eye me-1"></i>Ver Detalles</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!-- Paginación con nuevo estilo -->
            <nav aria-label="Paginación de pedidos">
                <ul class="pagination justify-content-center mt-4">
                    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Anterior</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
                </ul>
            </nav>

        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
