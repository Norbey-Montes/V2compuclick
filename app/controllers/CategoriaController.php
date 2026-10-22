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
        // 1. Recoger datos del formulario
        $nombre = $_POST['nombre'] ?? '';

        // 2. Guardar en la base de datos
        $categoriaModel = new Categoria();
        $resultado = $categoriaModel->guardar($nombre);

        // 3. Redireccionar al listado principal con mensaje de éxito
        if ($resultado) {
            header('Location: /categorias?exito=guardado');
            exit;
        } else {
            echo "Error al guardar la categoría";
        }
    }

    public function actualizar()
    {
        // 1. Recoger datos del formulario incluyendo el ID oculto
        $id     = $_POST['id'] ?? null;
        $nombre = $_POST['nombre'] ?? '';

        if (!$id) {
            echo "ID no válido para actualizar.";
            return;
        }

        // 2. Ejecutar la actualización en la base de datos
        $categoriaModel = new Categoria();
        $resultado = $categoriaModel->actualizar($id, $nombre);

        // 3. Redireccionar al listado principal con mensaje de éxito
        if ($resultado) {
            header('Location: /categorias?exito=actualizado');
            exit;
        } else {
            echo "Error al actualizar la categoría";
        }
    }
}