<?php
require_once '../app/models/Venta.php';

class VentaController {
    private $model;

    public function __construct() {
        $this->model = new Venta();
    }

    public function index() {
        $ventas = $this->model->getAllVentas();
        require_once '../app/views/ventas/index.php';
    }

    public function crear() {
        require_once '../app/views/ventas/crear.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $cabecera = [
                'cliente_id' => $_POST['cliente_id'],
                'tipopago_id' => $_POST['tipopago_id'],
                'fecha' => date('Y-m-d H:i:s'),
                'total' => $_POST['total']
            ];
            $detalles = $_POST['productos']; // Array de ítems (computador_id, cantidad, precio)
            
            $this->model->registrarVenta($cabecera, $detalles);
            header('Location: index.php?controller=venta&action=index');
        }
    }

    public function ver($id) {
        $venta = $this->model->getVentaById($id);
        $detalles = $this->model->getDescripVenta($id);
        require_once '../app/views/ventas/ver.php';
    }
}
?>