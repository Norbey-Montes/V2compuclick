<?php

require_once __DIR__ . '/../models/Proveedor.php';

class ProveedorController {

    public function index() {
        $proveedorModel = new Proveedor();
        try {
            $proveedores = $proveedorModel->getAll();
        } catch (PDOException $e) {
            echo "Error al cargar proveedores";
        }
        require_once __DIR__ . '/../views/proveedores/index.php';
    }

    public function crear() {
        require_once __DIR__ . '/../views/proveedores/crear.php';
    }

    public function guardar() {
        // Aquí iría la lógica para guardar el proveedor
    }
}