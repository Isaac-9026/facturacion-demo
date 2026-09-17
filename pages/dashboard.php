<?php
require_once '../config.php';
require_once '../includes/helpers.php';
?>
<?php include '../includes/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3 text-gray-800">Dashboard</h2>
    <span class="badge bg-primary fs-6"><?php echo get_empresa_activa()['nombre']; ?></span>
</div>

<!-- KPIs -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2 card-stats">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Ventas (Mes)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">S/ 45,000.00</div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-currency-dollar fs-2 text-secondary opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2 card-stats">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Compras (Mes)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">S/ 25,000.00</div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-cart fs-2 text-secondary opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2 card-stats">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Valor Inventario</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">S/ 372,500.00</div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-box-seam fs-2 text-secondary opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2 card-stats">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Alertas Stock</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">2 Productos</div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-exclamation-triangle fs-2 text-secondary opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Gráficos y Tablas -->
<div class="row">
    <!-- Operaciones Recientes -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4 h-100">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Operaciones Recientes</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Tipo</th>
                                <th>Documento</th>
                                <th class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>16/09/2026</td>
                                <td><span class="badge bg-warning">Venta</span></td>
                                <td>F001-00421</td>
                                <td class="text-end">S/ 1,500.00</td>
                            </tr>
                            <tr>
                                <td>15/09/2026</td>
                                <td><span class="badge bg-success">Compra</span></td>
                                <td>F001-00125</td>
                                <td class="text-end">S/ 3,500.00</td>
                            </tr>
                            <tr>
                                <td>14/09/2026</td>
                                <td><span class="badge bg-warning">Venta</span></td>
                                <td>B001-00100</td>
                                <td class="text-end">S/ 250.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Alertas de Stock -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4 h-100">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-danger">Alertas de Stock Mínimo</h6>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Producto A (P001)
                        <span class="badge bg-danger rounded-pill">2 un</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Producto B (P002)
                        <span class="badge bg-danger rounded-pill">4 un</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
