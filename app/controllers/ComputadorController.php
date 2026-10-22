<?php

require_once __DIR__ . '/../models/Computador.php';

class ComputadorController
{
    public function index()
    {
        $computadorModel = new Computador();
        try {
            $computadores = $computadorModel->getAll();
        } catch (PDOException $e) {
            echo "Error al cargar computadores";
            $computadores = [];
        }
        require_once __DIR__ . '/../views/computadores/index.php';
    }

    public function crear()
    {
        require_once __DIR__ . '/../views/computadores/crear.php';
    }

    public function editar()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $computadorModel = new Computador();
        $computador = $computadorModel->getById($id);

        if (!$computador) {
            echo "Computador no encontrado";
            return;
        }

        require_once __DIR__ . '/../views/computadores/editar.php';
    }

    public function guardar()
    {
        // 1. Recoger datos del formulario
        $marca = $_POST['marca'] ?? '';
        $proveedor_id = $_POST['proveedor_id'] ?? '';
        $modelo = $_POST['modelo'] ?? '';
        $procesador = $_POST['procesador'] ?? '';
        $ram = $_POST['ram'] ?? '';
        $stock = $_POST['stock'] ?? '';
        $almacenamiento = $_POST['almacenamiento'] ?? '';
        $preciocompra = $_POST['preciocompra'] ?? '';
        $precioventa = $_POST['precioventa'] ?? '';

        // 2. Guardar en la base de datos
        $computadorModel = new Computador();
        $resultado = $computadorModel->guardar($marca, $proveedor_id, $modelo, $procesador, $ram, $stock, $almacenamiento, $preciocompra, $precioventa);

        // 3. Redireccionar al listado principal con alerta opcional si deseas (o dejarlo normal)
        if ($resultado) {
            header('Location: /computadores?exito=guardado');
            exit;
        } else {
            echo "Error al guardar el computador";
        }
    }

    public function actualizar()
    {
        // 1. Recoger datos del formulario incluyendo el ID oculto
        $id = $_POST['id'] ?? null;
        $modelo = $_POST['modelo'] ?? '';
        $procesador = $_POST['procesador'] ?? '';
        $ram = $_POST['ram'] ?? '';
        $almacenamiento = $_POST['almacenamiento'] ?? '';
        $preciocompra = $_POST['preciocompra'] ?? '';
        $precioventa = $_POST['precioventa'] ?? '';

        if (!$id) {
            echo "ID no válido para actualizar.";
            return;
        }

        // 2. Ejecutar la actualización en la base de datos
        $computadorModel = new Computador();
        $resultado = $computadorModel->actualizar($id, $modelo, $procesador, $ram, $almacenamiento, $preciocompra, $precioventa);

        // 3. Redireccionar al listado principal con el parámetro de éxito
        if ($resultado) {
            header('Location: /computadores?exito=actualizado');
            exit;
        } else {
            echo "Error al actualizar el computador";
        }
    }
}