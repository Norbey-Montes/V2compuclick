<?php

require_once __DIR__ . '/../models/Venta.php';

class VentaController {

    public function index() {
        $ventaModel = new Venta();
        
        // Ejecutamos la consulta y aseguramos que $ventas sea siempre un array
        $ventas = $ventaModel->getAll();
        if (!$ventas) {
            $ventas = [];
        }

        require_once __DIR__ . '/../views/ventas/index.php';
    }

    public function crear() {
        require_once __DIR__ . '/../views/ventas/crear.php';
    }
}