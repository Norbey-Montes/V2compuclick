<?php

require_once __DIR__ . '/../models/Compra.php';

class CompraController {

    public function index() {
        $compraModel = new Compra();
        try {
            $compras = $compraModel->getAll();
        } catch (PDOException $e) {
            echo "Error al cargar compras";
            $compras = [];
        }
        require_once __DIR__ . '/../views/compras/index.php';
    }

    public function crear() {
        require_once __DIR__ . '/../views/compras/crear.php';
    }

    public function ver() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) {
            echo "ID de compra no válido";
            return;
        }

        $compraModel = new Compra();
        $compra = $compraModel->getById($id);
        $detalles = $compraModel->getDetallesByCompraId($id);

        if (!$compra) {
            echo "Compra no encontrada";
            return;
        }

        require_once __DIR__ . '/../views/compras/ver.php';
    }

    public function guardar() {
        $proveedor_id = $_POST['proveedor_id'] ?? '';
        $fecha        = $_POST['fecha'] ?? '';
        $total        = $_POST['total'] ?? '';
        $productos    = $_POST['productos'] ?? [];

        $compraModel = new Compra();
        $resultado = $compraModel->guardar($proveedor_id, $fecha, $total, $productos);

        if ($resultado) {
            header('Location: /compras?exito=registrado');
            exit;
        } else {
            echo "Error al registrar la compra";
        }
    }

    // --- MÉTODO ELIMINAR ACTUALIZADO A MÉTODO POST ---
    public function eliminar() {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        if (!$id) {
            echo "ID de compra no válido para eliminar.";
            return;
        }

        $compraModel = new Compra();
        $resultado = $compraModel->eliminar($id);

        if ($resultado) {
            header('Location: /compras?exito=eliminado');
            exit;
        } else {
            echo "Error al eliminar la compra";
        }
    }
}