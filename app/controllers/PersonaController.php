<?php

require_once __DIR__ . '/../models/Persona.php';

class PersonaController {

    public function index() {
        $personaModel = new Persona();
        try {
            $personas = $personaModel->getAll();
        } catch (PDOException $e) {
            echo "Error al cargar personas";
        }
        require_once __DIR__ . '/../views/personas/index.php';
    }

    public function crear() {
        require_once __DIR__ . '/../views/personas/crear.php';
    }

    public function guardar() {
        // Aquí iría la lógica para guardar la persona
    }
}