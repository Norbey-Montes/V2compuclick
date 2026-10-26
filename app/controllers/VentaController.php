<?php

require_once __DIR__ . '/../models/Venta.php';

class VentaController {

    public function index() {
        $ventaModel = new Venta();
        try {
            $ventas = $ventaModel->getAll();
        } catch (PDOException $e) {
            echo "Error al cargar ventas";
            $ventas = [];
        }
        require_once __DIR__ . '/../views/ventas/index.php';
    }

    public function crear() {
        require_once __DIR__ . '/../views/ventas/crear.php';
    }

    public function ver() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) {
            echo "ID de venta no válido";
            return;
        }

        $ventaModel = new Venta();
        $venta = $ventaModel->getById($id);
        $detalles = $ventaModel->getDetallesByVentaId($id);

        if (!$venta) {
            echo "Venta no encontrada";
            return;
        }

        require_once __DIR__ . '/../views/ventas/ver.php';
    }

    public function guardar() {
        $cliente_id   = $_POST['cliente_id'] ?? null;
        $tipopago_id  = $_POST['tipopago_id'] ?? null;
        $total        = $_POST['total'] ?? 0;
        $computadores = $_POST['computadores'] ?? [];

        $ventaModel = new Venta();
        $resultado = $ventaModel->guardar($cliente_id, $tipopago_id, $total, $computadores);

        if ($resultado) {
            header('Location: /ventas?exito=registrado');
            exit;
        } else {
            echo "Error al registrar la venta";
        }
    }

    // --- MÉTODO ELIMINAR ACTUALIZADO A MÉTODO POST ---
    public function eliminar() {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        if (!$id) {
            echo "ID de venta no válido para eliminar.";
            return;
        }

        $ventaModel = new Venta();
        $resultado = $ventaModel->eliminar($id);

        if ($resultado) {
            header('Location: /ventas?exito=eliminado');
            exit;
        } else {
            echo "Error al eliminar la venta";
        }
    }
}