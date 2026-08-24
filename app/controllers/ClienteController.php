<?php
require_once __DIR__ . '/../models/Cliente.php';

class ClienteController {
    private $model;

    public function __construct() {
        $this->model = new Cliente();
    }

    public function index() {
        $clientes = $this->model->getAllClientes();
        require_once __DIR__ . '/../views/clientes/index.php';
    }

    public function crear() {
        require_once __DIR__ . '/../views/clientes/crear.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'persona_id' => $_POST['persona_id']
            ];
            $this->model->insert($data);
            header('Location: index.php?controller=cliente&action=index');
            exit;
        }
    }

    public function editar($id) {
        $cliente = $this->model->getById($id);
        if (!$cliente) {
            http_response_code(404);
            exit('Cliente no encontrado.');
        }
        require_once __DIR__ . '/../views/clientes/editar.php';
    }

    public function actualizar($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'persona_id' => $_POST['persona_id']
            ];
            $this->model->update($id, $data);
            header('Location: index.php?controller=cliente&action=index');
            exit;
        }
    }
}
?>
