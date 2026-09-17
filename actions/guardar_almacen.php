<?php
require_once '../config.php';
require_once '../includes/helpers.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $almacenes = get_data('almacenes');
    
    $is_edit = isset($_POST['id']) && !empty($_POST['id']);
    
    $alm_data = [
        'nombre' => $_POST['nombre'] ?? '',
        'ubicacion' => $_POST['ubicacion'] ?? '',
        'estado' => $_POST['estado'] ?? 'Activo'
    ];
    
    if ($is_edit) {
        $id = (int)$_POST['id'];
        $alm_data['id'] = $id;
        foreach ($almacenes as $key => $a) {
            if ($a['id'] == $id) {
                $alm_data['empresa_id'] = $a['empresa_id'] ?? 1;
                $almacenes[$key] = $alm_data;
                break;
            }
        }
    } else {
        $max_id = 0;
        foreach ($almacenes as $a) {
            if (isset($a['id']) && $a['id'] > $max_id) $max_id = $a['id'];
        }
        $alm_data['id'] = $max_id + 1;
        $alm_data['empresa_id'] = $_SESSION['empresa_id'];
        $almacenes[] = $alm_data;
    }
    
    save_data('almacenes', $almacenes);
}

header("Location: " . BASE_URL . "pages/almacenes/index.php");
exit;
