<?php

require_once __DIR__ . '/../models/Categoria.php';

class CategoriaController {

    public function index() {
        $categoriaModel = new Categoria();
        $categorias = $categoriaModel->getAll();

        require_once __DIR__ . '/../views/categorias/index.php';
    }

    public function crear() {
        require_once __DIR__ . '/../views/categorias/crear.php';
    }

    public function guardar() {
        $nombre = $_POST['nombre'];

        $categoriaModel = new Categoria();
        $categoriaModel->guardar($nombre);

        header("Location: /categorias");
    }
}