<?php
require_once __DIR__ . '/../models/Venta.php';

class VentaController {
    private $model;

    public function __construct() {
        $this->model = new Venta();
    }

    public function index() {
        $ventas = $this->model->getAllVentas();
        require_once __DIR__ . '/../views/ventas/index.php';
    }

    public function crear() {
        require_once __DIR__ . '/../views/ventas/crear.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['productos']) || !is_array($_POST['productos'])) {
                http_response_code(400);
                exit('Debe agregar al menos un producto a la venta.');
            }

            $cabecera = [
                'cliente_id' => $_POST['cliente_id'],
                'tipopago_id' => $_POST['tipopago_id'],
                'fecha' => date('Y-m-d H:i:s'),
                'total' => $_POST['total']
            ];
            $detalles = $_POST['productos']; // Array de ítems (computador_id, cantidad, precio)
            
            $this->model->registrarVenta($cabecera, $detalles);
            header('Location: index.php?controller=venta&action=index');
            exit;
        }
    }

    public function ver($id) {
        $venta = $this->model->getVentaById($id);
        if (!$venta) {
            http_response_code(404);
            exit('Venta no encontrada.');
        }
        $detalles = $this->model->getDescripVenta($id);
        require_once __DIR__ . '/../views/ventas/ver.php';
    }
}
?>
