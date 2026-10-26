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
        $marca = $_POST['marca'] ?? '';
        $proveedor_id = $_POST['proveedor_id'] ?? '';
        $modelo = $_POST['modelo'] ?? '';
        $procesador = $_POST['procesador'] ?? '';
        $ram = $_POST['ram'] ?? '';
        $stock = $_POST['stock'] ?? '';
        $almacenamiento = $_POST['almacenamiento'] ?? '';
        $preciocompra = $_POST['preciocompra'] ?? '';
        $precioventa = $_POST['precioventa'] ?? '';

        $computadorModel = new Computador();
        $resultado = $computadorModel->guardar($marca, $proveedor_id, $modelo, $procesador, $ram, $stock, $almacenamiento, $preciocompra, $precioventa);

        if ($resultado) {
            header('Location: /computadores?exito=guardado');
            exit;
        } else {
            echo "Error al guardar el computador";
        }
    }

    public function actualizar()
    {
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

        $computadorModel = new Computador();
        $resultado = $computadorModel->actualizar($id, $modelo, $procesador, $ram, $almacenamiento, $preciocompra, $precioventa);

        if ($resultado) {
            header('Location: /computadores?exito=actualizado');
            exit;
        } else {
            echo "Error al actualizar el computador";
        }
    }

    // --- MÉTODO ELIMINAR ACTUALIZADO A MÉTODO POST ---
    public function eliminar()
    {
        // 1. Capturar el ID que viene de forma segura por el método POST (filtro entero)
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        if (!$id) {
            echo "ID no válido para eliminar.";
            return;
        }

        // 2. Llamar al modelo para ejecutar el DELETE
        $computadorModel = new Computador();
        $resultado = $computadorModel->eliminar($id);

        // 3. Redireccionar con éxito o mostrar error
        if ($resultado) {
            header('Location: /computadores?exito=eliminado');
            exit;
        } else {
            echo "Error al eliminar el computador";
        }
    }
}