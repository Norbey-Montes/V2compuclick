<?php
require_once '../app/models/Cliente.php';

class ClienteController {
    private $model;

    public function __construct() {
        $this->model = new Cliente();
    }

    public function index() {
        $clientes = $this->model->getAllClientes();
        require_once '../app/views/clientes/index.php';
    }

    public function crear() {
        require_once '../app/views/clientes/crear.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'persona_id' => $_POST['persona_id']
            ];
            $this->model->insert($data);
            header('Location: index.php?controller=cliente&action=index');
        }
    }

    public function editar($id) {
        $cliente = $this->model->getById($id);
        require_once '../app/views/clientes/editar.php';
    }

    public function actualizar($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'persona_id' => $_POST['persona_id']
            ];
            $this->model->update($id, $data);
            header('Location: index.php?controller=cliente&action=index');
        }
    }
}
?>