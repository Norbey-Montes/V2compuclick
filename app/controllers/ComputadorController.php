<?php

require_once __DIR__ . '/../models/Computador.php';

class ComputadorController
{

    public function index()
    {
        $computadorModel = new Computador();
        try {
            $computadores = $computadorModel->getAll();
        } catch (PDOException $e) {
            echo "Error al cargar computadores";
            $computadores = [];
        }
        require_once __DIR__ . '/../views/computadores/index.php';
    }

    public function crear()
    {
        require_once __DIR__ . '/../views/computadores/crear.php';
    }

    public function guardar()
    {
        // 1. Recoger datos del formulario
        $marca          = $_POST['marca'];
        $proveedor_id   = $_POST['proveedor_id'];
        $modelo         = $_POST['modelo'];
        $procesador     = $_POST['procesador'];
        $ram            = $_POST['ram'];
        $stock          = $_POST['stock'];
        $almacenamiento = $_POST['almacenamiento'];
        $preciocompra   = $_POST['preciocompra'];
        $precioventa    = $_POST['precioventa'];

        // 2. Guardar en la base de datos
        $computadorModel = new Computador();
        $resultado = $computadorModel->guardar($marca, $proveedor_id, $modelo, $procesador, $ram, $stock, $almacenamiento, $preciocompra, $precioventa);

        // 3. Validar con if y else
        if ($resultado) {
            echo "Computador guardado con éxito";
            $this->index();
        } else {
            echo "Error al guardar el computador";
        }
    }
}