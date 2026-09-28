<?php

require_once __DIR__ . '/../models/Computador.php';

class ComputadorController {

    public function index() {
        $computadorModel = new Computador();
        try {
            $computadores = $computadorModel->getAll();
        } catch (PDOException $e) {
            echo "Error al cargar computadores";
        }
        require_once __DIR__ . '/../views/computadores/index.php';
    }

    public function crear() {
        require_once __DIR__ . '/../views/computadores/crear.php';
    }

    public function guardar() {
        // Aquí iría la lógica para guardar el computador
    }
}