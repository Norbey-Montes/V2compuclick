<?php
require_once '../app/models/Compra.php';

class CompraController {
    private $model;

    public function __construct() {
        $this->model = new Compra();
    }

    public function index() {
        $compras = $this->model->getAllCompras();
        require_once '../app/views/compras/index.php';
    }

    public function crear() {
        require_once '../app/views/compras/crear.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $cabecera = [
                'proveedor_id' => $_POST['proveedor_id'],
                'fecha' => date('Y-m-d H:i:s'),
                'total' => $_POST['total']
            ];
            $detalles = $_POST['productos']; // Array de ítems comprados

            $this->model->registrarCompra($cabecera, $detalles);
            header('Location: index.php?controller=compra&action=index');
        }
    }

    public function ver($id) {
        $compra = $this->model->getCompraById($id);
        $detalles = $this->model->getDescripCompra($id);
        require_once '../app/views/compras/ver.php';
    }
}
?>