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
$ruta = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
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
if ($uri === "/computadores/editar" && $method === "GET") {
    $controller = new ComputadorController();
    $controller->editar();
}
if ($method === 'POST' && $uri === "/computadores/actualizar") {
    $controller = new ComputadorController();
    $controller->actualizar();
}
// RUTA CAMBIADA A MÉTODO POST PARA ELIMINAR:
if ($method === 'POST' && $uri === "/computadores/eliminar") {
    $controller = new ComputadorController();
    $controller->eliminar();
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
if ($uri === "/clientes/editar" && $method === "GET") {
    $controller = new ClienteController();
    $controller->editar();
}
if ($method === 'POST' && $uri === "/clientes/actualizar") {
    $controller = new ClienteController();
    $controller->actualizar();
}
// RUTA CAMBIADA A MÉTODO POST PARA ELIMINAR CLIENTE:
if ($method === 'POST' && $uri === "/clientes/eliminar") {
    $controller = new ClienteController();
    $controller->eliminar();
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
if ($uri === "/proveedores/editar" && $method === "GET") {
    $controller = new ProveedorController();
    $controller->editar();
}
if ($method === 'POST' && $uri === "/proveedores/actualizar") {
    $controller = new ProveedorController();
    $controller->actualizar();
}
// RUTA CAMBIADA A MÉTODO POST PARA ELIMINAR PROVEEDOR:
if ($method === 'POST' && $uri === "/proveedores/eliminar") {
    $controller = new ProveedorController();
    $controller->eliminar();
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
if ($uri === "/compras/ver" && $method === "GET") {
    $controller = new CompraController();
    $controller->ver();
}

// RUTA CAMBIADA A MÉTODO POST PARA ELIMINAR COMPRA:
if ($method === 'POST' && $uri === "/compras/eliminar") {
    $controller = new CompraController();
    $controller->eliminar();
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
if ($uri === "/personas/editar" && $method === "GET") {
    $controller = new PersonaController();
    $controller->editar();
}
if ($method === 'POST' && $uri === "/personas/actualizar") {
    $controller = new PersonaController();
    $controller->actualizar();
}

// RUTA CAMBIADA A MÉTODO POST PARA ELIMINAR PERSONA:
if ($method === 'POST' && $uri === "/personas/eliminar") {
    $controller = new PersonaController();
    $controller->eliminar();
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
if ($uri === "/ventas/ver" && $method === "GET") {
    $controller = new VentaController();
    $controller->ver();
}

// RUTA CAMBIADA A MÉTODO POST PARA ELIMINAR VENTA:
if ($method === 'POST' && $uri === "/ventas/eliminar") {
    $controller = new VentaController();
    $controller->eliminar();
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
if ($uri === "/categorias/editar" && $method === "GET") {
    $controller = new CategoriaController();
    $controller->editar();
}
if ($method === 'POST' && $uri === "/categorias/actualizar") {
    $controller = new CategoriaController();
    $controller->actualizar();
}

// RUTA CAMBIADA A MÉTODO POST PARA ELIMINAR CATEGORÍA:
if ($method === 'POST' && $uri === "/categorias/eliminar") {
    $controller = new CategoriaController();
    $controller->eliminar();
}