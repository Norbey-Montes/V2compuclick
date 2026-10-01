<?php

require_once __DIR__ . '/../app/controllers/ComputadorController.php';
require_once __DIR__ . '/../app/controllers/ClienteController.php';
require_once __DIR__ . '/../app/controllers/ProveedorController.php';
require_once __DIR__ . '/../app/controllers/CompraController.php';
require_once __DIR__ . '/../app/controllers/PersonaController.php';
require_once __DIR__ . '/../app/controllers/VentaController.php';
require_once __DIR__ . '/../app/controllers/CategoriaController.php';

$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
?>

<!-- Barra de Navegación -->
<a href="/computadores"><button>Computadores</button></a>
<a href="/computadores/crear"><button>Crear Computador</button></a>

<a href="/clientes"><button>Clientes</button></a>
<a href="/clientes/crear"><button>Crear Cliente</button></a>

<a href="/proveedores"><button>Proveedores</button></a>
<a href="/proveedores/crear"><button>Crear Proveedor</button></a>

<a href="/compras"><button>Compras</button></a>
<a href="/compras/crear"><button>Crear Compra</button></a>

<a href="/personas"><button>Personas</button></a>
<a href="/personas/crear"><button>Crear Persona</button></a>

<a href="/ventas"><button>Ventas</button></a>
<a href="/ventas/crear"><button>Crear Venta</button></a>

<a href="/categorias"><button>Categorías</button></a>
<a href="/categorias/crear"><button>Crear Categoría</button></a>

<br><br>

<?php

// --- COMPUTADORES ---
if ($method === 'GET' && $uri === "/computadores") {
    $controller = new ComputadorController();
    $controller->index();
}
if ($method === 'GET' && $uri === "/computadores/crear") {
    $controller = new ComputadorController();
    $controller->crear();
}
if ($method === 'POST' && $uri === "/computadores") {
    $controller = new ComputadorController();
    $controller->guardar();
}

// --- CLIENTES ---
if ($method === 'GET' && $uri === "/clientes") {
    $controller = new ClienteController();
    $controller->index();
}
if ($method === 'GET' && $uri === "/clientes/crear") {
    $controller = new ClienteController();
    $controller->crear();
}
if ($method === 'POST' && $uri === "/clientes") {
    $controller = new ClienteController();
    $controller->guardar();
}

// --- PROVEEDORES ---
if ($method === 'GET' && $uri === "/proveedores") {
    $controller = new ProveedorController();
    $controller->index();
}
if ($method === 'GET' && $uri === "/proveedores/crear") {
    $controller = new ProveedorController();
    $controller->crear();
}
if ($method === 'POST' && $uri === "/proveedores") {
    $controller = new ProveedorController();
    $controller->guardar();
}

// --- COMPRAS ---
if ($method === 'GET' && $uri === "/compras") {
    $controller = new CompraController();
    $controller->index();
}
if ($method === 'GET' && $uri === "/compras/crear") {
    $controller = new CompraController();
    $controller->crear();
}
if ($method === 'POST' && $uri === "/compras") {
    $controller = new CompraController();
    $controller->guardar();
}

// --- PERSONAS ---
if ($method === 'GET' && $uri === "/personas") {
    $controller = new PersonaController();
    $controller->index();
}
if ($method === 'GET' && $uri === "/personas/crear") {
    $controller = new PersonaController();
    $controller->crear();
}
if ($method === 'POST' && $uri === "/personas") {
    $controller = new PersonaController();
    $controller->guardar();
}

// --- VENTAS ---
if ($method === 'GET' && $uri === "/ventas") {
    $controller = new VentaController();
    $controller->index();
}
if ($method === 'GET' && $uri === "/ventas/crear") {
    $controller = new VentaController();
    $controller->crear();
}
if ($method === 'POST' && $uri === "/ventas") {
    $controller = new VentaController();
    $controller->guardar();
}

// --- CATEGORÍAS ---
if ($method === 'GET' && $uri === "/categorias") {
    $controller = new CategoriaController();
    $controller->index();
}
if ($method === 'GET' && $uri === "/categorias/crear") {
    $controller = new CategoriaController();
    $controller->crear();
}
if ($method === 'POST' && $uri === "/categorias") {
    $controller = new CategoriaController();
    $controller->guardar();
}