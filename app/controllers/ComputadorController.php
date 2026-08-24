<?php
require_once __DIR__ . '/../models/Computador.php';

class ComputadorController {
    private $model;

    public function __construct() {
        $this->model = new Computador();
    }

    public function index() {
        $computadores = $this->model->getAllComputadores();
        require_once __DIR__ . '/../views/computadores/index.php';
    }

    public function crear() {
        require_once __DIR__ . '/../views/computadores/crear.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'marca_id' => $_POST['marca_id'],
                'modelo' => $_POST['modelo'],
                'procesador' => $_POST['procesador'],
                'ram' => $_POST['ram'],
                'almacenamiento' => $_POST['almacenamiento'],
                'precio' => $_POST['precio'],
                'stock' => $_POST['stock']
            ];
            $this->model->insert($data);
            header('Location: index.php?controller=computador&action=index');
            exit;
        }
    }

    public function editar($id) {
        $computador = $this->model->getById($id);
        if (!$computador) {
            http_response_code(404);
            exit('Computador no encontrado.');
        }
        require_once __DIR__ . '/../views/computadores/editar.php';
    }

    public function actualizar($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'marca_id' => $_POST['marca_id'],
                'modelo' => $_POST['modelo'],
                'procesador' => $_POST['procesador'],
                'ram' => $_POST['ram'],
                'almacenamiento' => $_POST['almacenamiento'],
                'precio' => $_POST['precio'],
                'stock' => $_POST['stock']
            ];
            $this->model->update($id, $data);
            header('Location: index.php?controller=computador&action=index');
            exit;
        }
    }
}
?>
