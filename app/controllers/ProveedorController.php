<?php

require_once __DIR__ . '/../models/Proveedor.php';

class ProveedorController {

    public function index() {
        $proveedorModel = new Proveedor();
        try {
            $proveedores = $proveedorModel->getAll();
        } catch (PDOException $e) {
            echo "Error al cargar proveedores";
            $proveedores = [];
        }
        require_once __DIR__ . '/../views/proveedores/index.php';
    }

    public function crear() {
        require_once __DIR__ . '/../views/proveedores/crear.php';
    }

    public function editar()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $proveedorModel = new Proveedor();
        $proveedor = $proveedorModel->getById($id);

        if (!$proveedor) {
            echo "Proveedor no encontrado";
            return;
        }

        require_once __DIR__ . '/../views/proveedores/editar.php';
    }

    public function guardar() {
        // 1. Recoger datos del formulario
        $empresa        = $_POST['empresa'] ?? '';
        $tipodoc_id     = !empty($_POST['tipodoc_id']) ? $_POST['tipodoc_id'] : 1;
        $tipopersona_id = !empty($_POST['tipopersona_id']) ? $_POST['tipopersona_id'] : 2; // Persona Jurídica por defecto
        $ciudad_id      = !empty($_POST['ciudad_id']) ? $_POST['ciudad_id'] : 1;
        $nombres        = $_POST['nombres'] ?? '';
        $apellidos      = $_POST['apellidos'] ?? '';
        $documento      = $_POST['documento'] ?? '';
        $telefono       = $_POST['telefono'] ?? '';
        $email          = $_POST['email'] ?? '';
        $direccion      = $_POST['direccion'] ?? '';

        // 2. Guardar en la base de datos
        $proveedorModel = new Proveedor();
        $resultado = $proveedorModel->guardar($empresa, $tipodoc_id, $tipopersona_id, $ciudad_id, $nombres, $apellidos, $documento, $telefono, $email, $direccion);

        // 3. Redireccionar al listado
        if ($resultado) {
            header('Location: /proveedores');
            exit;
        } else {
            echo "Error al guardar el proveedor";
        }
    }

    public function actualizar()
    {
        $id             = $_POST['id'] ?? null;
        $persona_id     = $_POST['persona_id'] ?? null;
        $empresa        = $_POST['empresa'] ?? '';
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

        $proveedorModel = new Proveedor();
        $resultado = $proveedorModel->actualizar($id, $persona_id, $empresa, $tipodoc_id, $tipopersona_id, $ciudad_id, $nombres, $apellidos, $documento, $telefono, $email, $direccion);

        if ($resultado) {
            header('Location: /proveedores?exito=actualizado');
            exit;
        } else {
            echo "Error al actualizar el proveedor";
        }
    }
}