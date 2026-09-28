<?php

require_once __DIR__ . '/../models/Compra.php';

class CompraController {

    public function index() {
        $compraModel = new Compra();
        try {
            $compras = $compraModel->getAll();
        } catch (PDOException $e) {
            echo "Error al cargar compras";
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
        // Aquí iría la lógica para guardar en la base de datos
    }
}