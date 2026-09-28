<?php

require_once __DIR__ . '/../models/Cliente.php';

class ClienteController {

    public function index() {
        $clienteModel = new Cliente();
        try {
            $clientes = $clienteModel->getAll();
        } catch (PDOException $e) {
            echo "Error al cargar clientes";
        }
        require_once __DIR__ . '/../views/clientes/index.php';
    }

    public function crear() {
        require_once __DIR__ . '/../views/clientes/crear.php';
    }

    public function guardar() {
        // Aquí iría la lógica para guardar el cliente
    }
}