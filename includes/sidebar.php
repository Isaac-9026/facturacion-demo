<!-- Sidebar -->
<div class="border-end bg-dark text-white sidebar-wrapper shadow" id="sidebar-wrapper" style="width: 250px; min-height: 100vh;">
    <div class="sidebar-heading border-bottom p-3 d-flex align-items-center bg-dark">
        <i class="bi bi-box-seam text-primary fs-4 me-2"></i>
        <span class="fs-5 fw-bold">Gestión ERP</span>
    </div>
    
    <div class="list-group list-group-flush pt-3">
        
        <!-- DASHBOARD -->
        <div class="px-3 text-uppercase text-muted fw-bold mb-1" style="font-size: 0.75rem;">Principal</div>
        <a href="<?php echo url('pages/dashboard.php'); ?>" class="list-group-item list-group-item-action bg-dark text-white border-0 py-2">
            <i class="bi bi-speedometer2 me-2 text-primary"></i> Dashboard
        </a>
        
        <!-- GESTIÓN -->
        <div class="px-3 text-uppercase text-muted fw-bold mb-1 mt-3" style="font-size: 0.75rem;">Gestión</div>
        <a href="<?php echo url('pages/empresas/index.php'); ?>" class="list-group-item list-group-item-action bg-dark text-white border-0 py-2">
            <i class="bi bi-buildings me-2"></i> Empresas
        </a>
        <a href="<?php echo url('pages/clientes/index.php'); ?>" class="list-group-item list-group-item-action bg-dark text-white border-0 py-2">
            <i class="bi bi-people me-2"></i> Clientes
        </a>
        <a href="<?php echo url('pages/proveedores/index.php'); ?>" class="list-group-item list-group-item-action bg-dark text-white border-0 py-2">
            <i class="bi bi-truck me-2"></i> Proveedores
        </a>
        <a href="<?php echo url('pages/productos/index.php'); ?>" class="list-group-item list-group-item-action bg-dark text-white border-0 py-2">
            <i class="bi bi-box me-2"></i> Productos
        </a>
        <a href="<?php echo url('pages/almacenes/index.php'); ?>" class="list-group-item list-group-item-action bg-dark text-white border-0 py-2">
            <i class="bi bi-shop me-2"></i> Almacenes
        </a>
        
        <!-- OPERACIONES -->
        <div class="px-3 text-uppercase text-muted fw-bold mb-1 mt-3" style="font-size: 0.75rem;">Operaciones</div>
        <a href="<?php echo url('pages/compras/index.php'); ?>" class="list-group-item list-group-item-action bg-dark text-white border-0 py-2">
            <i class="bi bi-cart-plus me-2 text-success"></i> Compras
        </a>
        <a href="<?php echo url('pages/ventas/index.php'); ?>" class="list-group-item list-group-item-action bg-dark text-white border-0 py-2">
            <i class="bi bi-receipt me-2 text-warning"></i> Ventas / Facturación
        </a>
        <a href="<?php echo url('pages/inventario/index.php'); ?>" class="list-group-item list-group-item-action bg-dark text-white border-0 py-2">
            <i class="bi bi-boxes me-2"></i> Inventario
        </a>
        
        <!-- KARDEX -->
        <div class="px-3 text-uppercase text-muted fw-bold mb-1 mt-3" style="font-size: 0.75rem;">Kardex</div>
        <a href="<?php echo url('pages/kardex/index.php'); ?>" class="list-group-item list-group-item-action bg-dark text-white border-0 py-2">
            <i class="bi bi-file-earmark-spreadsheet me-2 text-info"></i> Kardex Valorizado
        </a>
        <a href="<?php echo url('pages/kardex/importacion.php'); ?>" class="list-group-item list-group-item-action bg-dark text-white border-0 py-2">
            <i class="bi bi-cloud-upload me-2"></i> Importación Histórica
        </a>
        
        <!-- REPORTES -->
        <div class="px-3 text-uppercase text-muted fw-bold mb-1 mt-3" style="font-size: 0.75rem;">Reportes</div>
        <a href="<?php echo url('pages/reportes/index.php'); ?>" class="list-group-item list-group-item-action bg-dark text-white border-0 py-2">
            <i class="bi bi-pie-chart me-2"></i> Reportes Generales
        </a>
        <a href="<?php echo url('pages/historial/index.php'); ?>" class="list-group-item list-group-item-action bg-dark text-white border-0 py-2">
            <i class="bi bi-clock-history me-2"></i> Historial
        </a>
        
    </div>
    
    <!-- Prototipo Banner -->
    <div class="mt-auto p-3 m-3 bg-primary bg-opacity-25 rounded text-center" style="font-size: 0.8rem;">
        <i class="bi bi-info-circle mb-1 d-block fs-4 text-primary"></i>
        <strong>Modo Prototipo</strong><br>
        <span class="text-white-50">Los datos mostrados son simulados para validación.</span>
    </div>
</div>
