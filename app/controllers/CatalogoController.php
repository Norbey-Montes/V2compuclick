<?php
require_once __DIR__ . '/../models/Parametrica.php';

class CatalogoController {
    private $model;

    public function __construct() {
        $this->model = new Parametrica();
    }

    // Gestiona catálogos auxiliares: marca, ciudad, departamento, tipodoc, tipopago, tipopersona
    public function index() {
        $tabla = $_GET['tabla'] ?? 'marca';
        $datos = $this->model->getAllFromTable($tabla);
        require_once __DIR__ . '/../views/parametros/index.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tabla = $_POST['tabla'];
            $data = ['nombre' => $_POST['nombre']];
            $this->model->insertIntoTable($tabla, $data);
            header('Location: index.php?controller=catalogo&action=index&tabla=' . $tabla);
            exit;
        }
    }
}
?>
