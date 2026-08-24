<?php
require_once __DIR__ . '/../models/Compra.php';

class CompraController {
    private $model;

    public function __construct() {
        $this->model = new Compra();
    }

    public function index() {
        $compras = $this->model->getAllCompras();
        require_once __DIR__ . '/../views/compras/index.php';
    }

    public function crear() {
        require_once __DIR__ . '/../views/compras/crear.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['productos']) || !is_array($_POST['productos'])) {
                http_response_code(400);
                exit('Debe agregar al menos un producto a la compra.');
            }

            $cabecera = [
                'proveedor_id' => $_POST['proveedor_id'],
                'fecha' => date('Y-m-d H:i:s'),
                'total' => $_POST['total']
            ];
            $detalles = $_POST['productos']; // Array de ítems comprados

            $this->model->registrarCompra($cabecera, $detalles);
            header('Location: index.php?controller=compra&action=index');
            exit;
        }
    }

    public function ver($id) {
        $compra = $this->model->getCompraById($id);
        if (!$compra) {
            http_response_code(404);
            exit('Compra no encontrada.');
        }
        $detalles = $this->model->getDescripCompra($id);
        require_once __DIR__ . '/../views/compras/ver.php';
    }
}
?>
