<?php
require_once '../app/models/Proveedor.php';

class ProveedorController {
    private $model;

    public function __construct() {
        $this->model = new Proveedor();
    }

    public function index() {
        $proveedores = $this->model->getAllProveedores();
        require_once '../app/views/proveedores/index.php';
    }

    public function crear() {
        require_once '../app/views/proveedores/crear.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'persona_id' => $_POST['persona_id'],
                'empresa' => $_POST['empresa']
            ];
            $this->model->insert($data);
            header('Location: index.php?controller=proveedor&action=index');
        }
    }

    public function editar($id) {
        $proveedor = $this->model->getById($id);
        require_once '../app/views/proveedores/editar.php';
    }

    public function actualizar($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'persona_id' => $_POST['persona_id'],
                'empresa' => $_POST['empresa']
            ];
            $this->model->update($id, $data);
            header('Location: index.php?controller=proveedor&action=index');
        }
    }
}
?>