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

        try {
            $computadorConsultado = $computadorModel->getById("5");
        } catch (PDOException $e) {
            echo "Error al cargar el computador consultado: ";
        }

        require_once __DIR__ . '/../views/computadores/index.php';
    }
}