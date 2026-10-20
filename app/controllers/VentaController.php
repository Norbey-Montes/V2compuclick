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

    public function guardar() {
        // 1. Recoger datos del formulario
        $cliente_id  = $_POST['cliente_id'] ?? null;
        $tipopago_id = $_POST['tipopago_id'] ?? null;
        $total       = $_POST['total'] ?? 0;
        $computadores = $_POST['computadores'] ?? [];

        // 2. Guardar en la base de datos
        $ventaModel = new Venta();
        $resultado = $ventaModel->guardar($cliente_id, $tipopago_id, $total, $computadores);

        // 3. Validar resultado
        if ($resultado) {
            echo "<p style='color:green;'><b>Venta registrada con éxito</b></p>";
            $this->index();
        } else {
            echo "<p style='color:red;'><b>Error al registrar la venta</b></p>";
        }
    }
}