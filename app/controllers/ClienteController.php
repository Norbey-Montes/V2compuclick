<?php

require_once __DIR__ . '/../models/Cliente.php';

class ClienteController
{
    public function index()
    {
        $clienteModel = new Cliente();
        try {
            $clientes = $clienteModel->getAll();
        } catch (PDOException $e) {
            echo "Error al cargar clientes";
            $clientes = [];
        }
        require_once __DIR__ . '/../views/clientes/index.php';
    }

    public function crear()
    {
        require_once __DIR__ . '/../views/clientes/crear.php';
    }

    public function editar()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $clienteModel = new Cliente();
        $cliente = $clienteModel->getById($id);

        if (!$cliente) {
            echo "Cliente no encontrado";
            return;
        }

        require_once __DIR__ . '/../views/clientes/editar.php';
    }

    public function guardar()
    {
        $tipodoc_id     = !empty($_POST['tipodoc_id']) ? $_POST['tipodoc_id'] : 1;
        $tipopersona_id = !empty($_POST['tipopersona_id']) ? $_POST['tipopersona_id'] : 1;
        $ciudad_id      = !empty($_POST['ciudad_id']) ? $_POST['ciudad_id'] : 1;
        $nombres        = $_POST['nombres'] ?? '';
        $apellidos      = $_POST['apellidos'] ?? '';
        $documento      = $_POST['documento'] ?? '';
        $telefono       = $_POST['telefono'] ?? '';
        $email          = $_POST['email'] ?? '';
        $direccion      = $_POST['direccion'] ?? '';

        $clienteModel = new Cliente();
        $resultado = $clienteModel->guardar($tipodoc_id, $tipopersona_id, $ciudad_id, $nombres, $apellidos, $documento, $telefono, $email, $direccion);

        if ($resultado) {
            header('Location: /clientes');
            exit;
        } else {
            echo "Error al guardar el cliente";
        }
    }

    public function actualizar()
    {
        $id             = $_POST['id'] ?? null;
        $persona_id     = $_POST['persona_id'] ?? null;
        $tipodoc_id     = $_POST['tipodoc_id'] ?? '';
        $tipopersona_id = $_POST['tipopersona_id'] ?? '';
        $ciudad_id      = $_POST['ciudad_id'] ?? '';
        $nombres        = $_POST['nombres'] ?? '';
        $apellidos      = $_POST['apellidos'] ?? '';
        $documento      = $_POST['documento'] ?? '';
        $telefono       = $_POST['telefono'] ?? '';
        $email          = $_POST['email'] ?? '';
        $direccion      = $_POST['direccion'] ?? '';

        if (!$id || !$persona_id) {
            echo "IDs no válidos para actualizar.";
            return;
        }

        $clienteModel = new Cliente();
        $resultado = $clienteModel->actualizar($id, $persona_id, $tipodoc_id, $tipopersona_id, $ciudad_id, $nombres, $apellidos, $documento, $telefono, $email, $direccion);

        if ($resultado) {
            header('Location: /clientes?exito=actualizado');
            exit;
        } else {
            echo "Error al actualizar el cliente";
        }
    }

    // --- MÉTODO ELIMINAR ACTUALIZADO A MÉTODO POST ---
    public function eliminar()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        if (!$id) {
            echo "ID no válido para eliminar.";
            return;
        }

        $clienteModel = new Cliente();
        $resultado = $clienteModel->eliminar($id);

        if ($resultado) {
            header('Location: /clientes?exito=eliminado');
            exit;
        } else {
            echo "Error al eliminar el cliente";
        }
    }
}