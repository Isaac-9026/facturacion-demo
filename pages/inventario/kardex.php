<?php
require_once '../../config.php';
require_once '../../includes/helpers.php';

$productos = get_data('productos');
$kardex_all = get_data('kardex');
$almacenes = get_data('almacenes');

$producto_id = $_GET['producto_id'] ?? null;
$almacen_id = $_GET['almacen_id'] ?? null;
$movimientos = [];
$producto_seleccionado = null;
$almacen_seleccionado = null;

if ($producto_id) {
    foreach ($productos as $p) {
        if ($p['id'] == $producto_id) {
            $producto_seleccionado = $p;
            break;
        }
    }
    
    if ($almacen_id) {
        foreach ($almacenes as $a) {
            if ($a['id'] == $almacen_id) {
                $almacen_seleccionado = $a;
                break;
            }
        }
    }
    
    foreach ($kardex_all as $k) {
        if ($k['producto_id'] == $producto_id && $k['almacen_id'] == $almacen_id && $k['empresa_id'] == $_SESSION['empresa_id']) {
            $movimientos[] = $k;
        }
    }
    
    // Ordenar por fecha y luego por ID (para mantener el orden temporal real de inserción)
    // Ordenar por ID (para mantener el orden temporal real de inserción)
    usort($movimientos, function($a, $b) {
        return $a['id'] - $b['id'];
    });
}
?>
<?php include '../../includes/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3 text-gray-800">Kardex Valorizado</h2>
</div>

<!-- Filtro de Búsqueda -->
<div class="card shadow mb-4">
    <div class="card-header py-3 bg-white">
        <h6 class="m-0 font-weight-bold text-primary">Consulta de Producto</h6>
    </div>
    <div class="card-body">
        <form action="" method="GET" class="row align-items-center">
            <div class="col-md-5">
                <select name="producto_id" class="form-select" required>
                    <option value="">-- Seleccione un Producto --</option>
                    <?php foreach($productos as $p): ?>
                        <?php if(($p['empresa_id'] ?? 1) == $_SESSION['empresa_id']): ?>
                        <option value="<?php echo $p['id']; ?>" <?php echo ($producto_id == $p['id']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($p['sku'] . ' - ' . $p['nombre']); ?>
                        </option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-3">
                <select name="almacen_id" class="form-select" required>
                    <option value="">-- Seleccione Almacén --</option>
                    <?php foreach($almacenes as $a): ?>
                        <?php if(($a['empresa_id'] ?? 1) == $_SESSION['empresa_id']): ?>
                        <option value="<?php echo $a['id']; ?>" <?php echo ($almacen_id == $a['id']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($a['nombre']); ?>
                        </option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-search me-1"></i> Consultar
                </button>
            </div>
            <div class="col-md-2 text-end">
                <a href="<?php echo url('pages/inventario/index.php'); ?>" class="btn btn-outline-secondary">
                    Volver a Stock
                </a>
            </div>
        </form>
    </div>
</div>

<?php if (!$producto_id): ?>
    <div class="alert alert-info shadow-sm text-center py-5">
        <i class="bi bi-arrow-up-circle fs-1 d-block mb-3"></i>
        <h4>Seleccione un producto para visualizar su Kardex Valorizado</h4>
        <p>El Kardex mostrará el historial completo de entradas, salidas y el recálculo del Costo Promedio Ponderado.</p>
    </div>
<?php elseif (!$producto_seleccionado): ?>
    <div class="alert alert-danger shadow-sm">
        Producto no encontrado.
    </div>
<?php else: ?>

    <div class="card shadow mb-4 border-top-info">
        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-white">
            <h6 class="m-0 font-weight-bold text-info-emphasis">
                Kardex: <?php echo htmlspecialchars($producto_seleccionado['nombre']); ?> | Almacén: <?php echo htmlspecialchars($almacen_seleccionado['nombre'] ?? 'Desconocido'); ?>
            </h6>
            <span class="badge bg-secondary">Método: Promedio Ponderado</span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-sm align-middle mb-0" style="font-size: 0.85rem;">
                    <thead class="table-light text-center align-middle">
                        <tr>
                            <th rowspan="2" width="90">Fecha</th>
                            <th rowspan="2" width="120">Documento</th>
                            <th rowspan="2" width="100">Operación</th>
                            <th colspan="3" class="bg-success text-white bg-opacity-75">ENTRADAS</th>
                            <th colspan="3" class="bg-danger text-white bg-opacity-75">SALIDAS</th>
                            <th colspan="3" class="bg-primary text-white bg-opacity-75">SALDOS</th>
                        </tr>
                        <tr>
                            <!-- Entradas -->
                            <th width="60" class="bg-success bg-opacity-10">Cant.</th>
                            <th width="85" class="bg-success bg-opacity-10">C. Unit.</th>
                            <th width="90" class="bg-success bg-opacity-10">Total</th>
                            <!-- Salidas -->
                            <th width="60" class="bg-danger bg-opacity-10">Cant.</th>
                            <th width="85" class="bg-danger bg-opacity-10">C. Unit.</th>
                            <th width="90" class="bg-danger bg-opacity-10">Total</th>
                            <!-- Saldos -->
                            <th width="60" class="bg-primary bg-opacity-10 fw-bold">Cant.</th>
                            <th width="90" class="bg-primary text-warning-emphasis bg-opacity-10 fw-bold">CPP</th>
                            <th width="95" class="bg-primary bg-opacity-10 fw-bold">V. Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($movimientos)): ?>
                            <tr><td colspan="12" class="text-center py-4">No hay movimientos registrados para este producto en la empresa actual.</td></tr>
                        <?php else: ?>
                            <?php foreach($movimientos as $m): ?>
                                <tr>
                                    <td class="text-center"><?php echo date('d/m/Y', strtotime($m['fecha'])); ?></td>
                                    <td><?php echo htmlspecialchars($m['documento']); ?></td>
                                    <td class="text-center">
                                        <?php if($m['tipo_operacion'] === 'COMPRA'): ?>
                                            <span class="badge bg-success bg-opacity-75 text-white w-100">COMPRA</span>
                                        <?php elseif($m['tipo_operacion'] === 'VENTA'): ?>
                                            <span class="badge bg-danger bg-opacity-75 text-white w-100">VENTA</span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary w-100"><?php echo htmlspecialchars($m['tipo_operacion']); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    
                                    <!-- Entradas -->
                                    <td class="text-center bg-success bg-opacity-10"><?php echo $m['entrada_cantidad'] > 0 ? $m['entrada_cantidad'] : ''; ?></td>
                                    <td class="text-end bg-success bg-opacity-10"><?php echo $m['entrada_cantidad'] > 0 ? number_format($m['entrada_costo'], 2) : ''; ?></td>
                                    <td class="text-end bg-success bg-opacity-10 fw-bold"><?php echo $m['entrada_cantidad'] > 0 ? number_format($m['entrada_valor'], 2) : ''; ?></td>
                                    
                                    <!-- Salidas -->
                                    <td class="text-center bg-danger bg-opacity-10"><?php echo $m['salida_cantidad'] > 0 ? $m['salida_cantidad'] : ''; ?></td>
                                    <td class="text-end bg-danger bg-opacity-10"><?php echo $m['salida_cantidad'] > 0 ? number_format($m['salida_costo'], 2) : ''; ?></td>
                                    <td class="text-end bg-danger bg-opacity-10 fw-bold text-danger"><?php echo $m['salida_cantidad'] > 0 ? number_format($m['salida_valor'], 2) : ''; ?></td>
                                    
                                    <!-- Saldos -->
                                    <td class="text-center bg-primary bg-opacity-10 fw-bold"><?php echo $m['saldo_cantidad']; ?></td>
                                    <td class="text-end bg-primary bg-opacity-10 fw-bold text-warning-emphasis"><?php echo number_format($m['cpp'], 2); ?></td>
                                    <td class="text-end bg-primary bg-opacity-10 fw-bold text-primary"><?php echo number_format($m['saldo_valor'], 2); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php endif; ?>

<?php include '../../includes/footer.php'; ?>
