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

    public function guardar()
    {
        // Recoger datos con validación para evitar nulos
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
            echo "Cliente guardado con éxito";
            $this->index();
        } else {
            echo "Error al guardar el cliente";
        }
    }
}