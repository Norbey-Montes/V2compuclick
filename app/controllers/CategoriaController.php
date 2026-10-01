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

    public function guardar()
    {
        // 1. Recoger datos del formulario
        $nombre = $_POST['nombre'];

        // 2. Guardar en la base de datos
        $categoriaModel = new Categoria();
        $resultado = $categoriaModel->guardar($nombre);

        // 3. Validar con if y else
        if ($resultado) {
            echo "Categoría guardada con éxito";
            $this->index();
        } else {
            echo "Error al guardar la categoría";
        }
    }
}