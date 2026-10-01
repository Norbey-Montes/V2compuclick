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
        require_once __DIR__ . '/../views/compras/ver.php';
    }

    public function guardar() {
        // 1. Recoger datos del formulario
        $proveedor_id = $_POST['proveedor_id'];
        $fecha        = $_POST['fecha'];
        $total        = $_POST['total'];
        $productos    = $_POST['productos'];

        // 2. Guardar en la base de datos
        $compraModel = new Compra();
        $resultado = $compraModel->guardar($proveedor_id, $fecha, $total, $productos);

        // 3. Validar con if y else
        if ($resultado) {
            echo "Compra registrada con éxito";
            $this->index();
        } else {
            echo "Error al registrar la compra";
        }
    }
}