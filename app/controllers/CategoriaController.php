<?php

require_once __DIR__ . '/../models/Categoria.php';

class CategoriaController
{
    public function index()
    {
        $categoriaModel = new Categoria();
        try {
            $categorias = $categoriaModel->getAll();
        } catch (PDOException $e) {
            echo "Error al cargar categorías";
            $categorias = [];
        }
        require_once __DIR__ . '/../views/categorias/index.php';
    }

    public function crear()
    {
        require_once __DIR__ . '/../views/categorias/crear.php';
    }

    public function editar()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $categoriaModel = new Categoria();
        $categoria = $categoriaModel->getById($id);

        if (!$categoria) {
            echo "Categoría no encontrada";
            return;
        }

        require_once __DIR__ . '/../views/categorias/editar.php';
    }

    public function guardar()
    {
        $nombre = $_POST['nombre'] ?? '';

        $categoriaModel = new Categoria();
        $resultado = $categoriaModel->guardar($nombre);

        if ($resultado) {
            header('Location: /categorias?exito=guardado');
            exit;
        } else {
            echo "Error al guardar la categoría";
        }
    }

    public function actualizar()
    {
        $id     = $_POST['id'] ?? null;
        $nombre = $_POST['nombre'] ?? '';

        if (!$id) {
            echo "ID no válido para actualizar.";
            return;
        }

        $categoriaModel = new Categoria();
        $resultado = $categoriaModel->actualizar($id, $nombre);

        if ($resultado) {
            header('Location: /categorias?exito=actualizado');
            exit;
        } else {
            echo "Error al actualizar la categoría";
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

        $categoriaModel = new Categoria();
        $resultado = $categoriaModel->eliminar($id);

        if ($resultado) {
            header('Location: /categorias?exito=eliminado');
            exit;
        } else {
            echo "Error al eliminar la categoría";
        }
    }
}