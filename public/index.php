<?php

require_once __DIR__ . '/../app/controllers/ComputadorController.php';
require_once __DIR__ . '/../app/controllers/ClienteController.php';
require_once __DIR__ . '/../app/controllers/ProveedorController.php';

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
?>

<a href="/computadores"><button>Computadores</button></a>
<a href="/clientes"><button>Clientes</button></a>
<a href="/proveedores"><button>Proveedores</button></a>

<br><br>

<?php

if ($method === 'GET' && $uri === "/computadores") {
    $computadorController = new ComputadorController();
    $computadorController->index();
}

if ($method === 'GET' && $uri === "/clientes") {
    $clienteController = new ClienteController();
    $clienteController->index();
}

if ($method === 'GET' && $uri === "/proveedores") {
    $proveedorController = new ProveedorController();
    $proveedorController->index();
}

// $computadorController = new ComputadorController();
// $computadorController->index();

// $clienteController = new ClienteController();
// $clienteController->index();    