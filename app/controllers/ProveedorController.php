<?php
require_once __DIR__ . '/../models/Proveedor.php';

class ProveedorController {
    private $model;

    public function __construct() {
        $this->model = new Proveedor();
    }

    public function index() {
        $proveedores = $this->model->getAllProveedores();
        require_once __DIR__ . '/../views/proveedores/index.php';
    }

    public function crear() {
        require_once __DIR__ . '/../views/proveedores/crear.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'persona_id' => $_POST['persona_id'],
                'empresa' => $_POST['empresa']
            ];
            $this->model->insert($data);
            header('Location: index.php?controller=proveedor&action=index');
            exit;
        }
    }

    public function editar($id) {
        $proveedor = $this->model->getById($id);
        if (!$proveedor) {
            http_response_code(404);
            exit('Proveedor no encontrado.');
        }
        require_once __DIR__ . '/../views/proveedores/editar.php';
    }

    public function actualizar($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'persona_id' => $_POST['persona_id'],
                'empresa' => $_POST['empresa']
            ];
            $this->model->update($id, $data);
            header('Location: index.php?controller=proveedor&action=index');
            exit;
        }
    }
}
?>
