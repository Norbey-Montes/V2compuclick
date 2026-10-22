<?php

require_once __DIR__ . '/../models/Persona.php';

class PersonaController
{
    public function index()
    {
        $personaModel = new Persona();
        try {
            $personas = $personaModel->getAll();
        } catch (PDOException $e) {
            echo "Error al cargar personas";
            $personas = [];
        }
        require_once __DIR__ . '/../views/personas/index.php';
    }

    public function crear()
    {
        require_once __DIR__ . '/../views/personas/crear.php';
    }

    public function editar()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $personaModel = new Persona();
        $persona = $personaModel->getById($id);

        if (!$persona) {
            echo "Persona no encontrada";
            return;
        }

        require_once __DIR__ . '/../views/personas/editar.php';
    }

    public function guardar()
    {
        // 1. Recoger datos del formulario
        $tipodoc_id     = $_POST['tipodoc_id'] ?? '';
        $documento      = $_POST['documento'] ?? '';
        $nombres        = $_POST['nombres'] ?? '';
        $apellidos      = $_POST['apellidos'] ?? '';
        $direccion      = $_POST['direccion'] ?? '';
        $telefono       = $_POST['telefono'] ?? '';
        $email          = $_POST['email'] ?? '';
        $tipopersona_id = $_POST['tipopersona_id'] ?? '';
        $ciudad_id      = $_POST['ciudad_id'] ?? '';

        // 2. Guardar en la base de datos
        $personaModel = new Persona();
        $resultado = $personaModel->guardar($tipodoc_id, $documento, $nombres, $apellidos, $direccion, $telefono, $email, $tipopersona_id, $ciudad_id);

        // 3. Validar con if y else
        if ($resultado) {
            header('Location: /personas');
            exit;
        } else {
            echo "Error al guardar la persona";
        }
    }

    public function actualizar()
    {
        // 1. Recoger datos del formulario incluyendo el ID oculto
        $id             = $_POST['id'] ?? null;
        $tipodoc_id     = $_POST['tipodoc_id'] ?? '';
        $documento      = $_POST['documento'] ?? '';
        $nombres        = $_POST['nombres'] ?? '';
        $apellidos      = $_POST['apellidos'] ?? '';
        $direccion      = $_POST['direccion'] ?? '';
        $telefono       = $_POST['telefono'] ?? '';
        $email          = $_POST['email'] ?? '';
        $tipopersona_id = $_POST['tipopersona_id'] ?? '';
        $ciudad_id      = $_POST['ciudad_id'] ?? '';

        if (!$id) {
            echo "ID no válido para actualizar.";
            return;
        }

        // 2. Ejecutar la actualización en la base de datos
        $personaModel = new Persona();
        $resultado = $personaModel->actualizar($id, $tipodoc_id, $documento, $nombres, $apellidos, $direccion, $telefono, $email, $tipopersona_id, $ciudad_id);

        // 3. Redireccionar al listado principal con alerta de éxito si es exitoso
        if ($resultado) {
            header('Location: /personas?exito=actualizado');
            exit;
        } else {
            echo "Error al actualizar la persona";
        }
    }
}