<?php

require_once __DIR__ . '/../app/controllers/ComputadorController.php';
require_once __DIR__ . '/../app/controllers/ClienteController.php';
require_once __DIR__ . '/../app/controllers/ProveedorController.php';
require_once __DIR__ . '/../app/controllers/CompraController.php';
require_once __DIR__ . '/../app/controllers/PersonaController.php';
require_once __DIR__ . '/../app/controllers/VentaController.php';
require_once __DIR__ . '/../app/controllers/CategoriaController.php';
require_once __DIR__ . '/../rutas/web.php';

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

switch ($uri) {
    case '/':
        if ($method === 'GET') {
            $controller = new ComputadorController();
            $controller->index();
            exit;
        }
        break;

    /* --- COMPUTADORES --- */
    case '/computadores':
        if ($method === 'GET') {
            $controller = new ComputadorController();
            $controller->index();
            exit;
        }
        if ($method === 'POST') {
            $controller = new ComputadorController();
            $controller->guardar();
            exit;
        }
        break;

    case '/computadores/crear':
        if ($method === 'GET') {
            $controller = new ComputadorController();
            $controller->crear();
            exit;
        }
        break;

    case '/computadores/editar':
        if ($method === 'GET') {
            $controller = new ComputadorController();
            $controller->editar();
            exit;
        }
        break;

    case '/computadores/actualizar':
        if ($method === 'POST') {
            $controller = new ComputadorController();
            $controller->actualizar();
            exit;
        }
        break;

    case '/computadores/eliminar':
        if ($method === 'POST') {
            $controller = new ComputadorController();
            $controller->eliminar();
            exit;
        }
        break;

    /* --- CLIENTES --- */
    case '/clientes':
        if ($method === 'GET') {
            $controller = new ClienteController();
            $controller->index();
            exit;
        }
        if ($method === 'POST') {
            $controller = new ClienteController();
            $controller->guardar();
            exit;
        }
        break;

    case '/clientes/crear':
        if ($method === 'GET') {
            $controller = new ClienteController();
            $controller->crear();
            exit;
        }
        break;

    case '/clientes/editar':
        if ($method === 'GET') {
            $controller = new ClienteController();
            $controller->editar();
            exit;
        }
        break;

    case '/clientes/actualizar':
        if ($method === 'POST') {
            $controller = new ClienteController();
            $controller->actualizar();
            exit;
        }
        break;

    case '/clientes/eliminar':
        if ($method === 'POST') {
            $controller = new ClienteController();
            $controller->eliminar();
            exit;
        }
        break;

    /* --- PROVEEDORES --- */
    case '/proveedores':
        if ($method === 'GET') {
            $controller = new ProveedorController();
            $controller->index();
            exit;
        }
        if ($method === 'POST') {
            $controller = new ProveedorController();
            $controller->guardar();
            exit;
        }
        break;

    case '/proveedores/crear':
        if ($method === 'GET') {
            $controller = new ProveedorController();
            $controller->crear();
            exit;
        }
        break;

    case '/proveedores/editar':
        if ($method === 'GET') {
            $controller = new ProveedorController();
            $controller->editar();
            exit;
        }
        break;

    case '/proveedores/actualizar':
        if ($method === 'POST') {
            $controller = new ProveedorController();
            $controller->actualizar();
            exit;
        }
        break;

    case '/proveedores/eliminar':
        if ($method === 'POST') {
            $controller = new ProveedorController();
            $controller->eliminar();
            exit;
        }
        break;

    /* --- COMPRAS --- */
    case '/compras':
        if ($method === 'GET') {
            $controller = new CompraController();
            $controller->index();
            exit;
        }
        if ($method === 'POST') {
            $controller = new CompraController();
            $controller->guardar();
            exit;
        }
        break;

    case '/compras/crear':
        if ($method === 'GET') {
            $controller = new CompraController();
            $controller->crear();
            exit;
        }
        break;

    case '/compras/ver':
        if ($method === 'GET') {
            $controller = new CompraController();
            $controller->ver();
            exit;
        }
        break;

    case '/compras/eliminar':
        if ($method === 'POST') {
            $controller = new CompraController();
            $controller->eliminar();
            exit;
        }
        break;

    /* --- PERSONAS --- */
    case '/personas':
        if ($method === 'GET') {
            $controller = new PersonaController();
            $controller->index();
            exit;
        }
        if ($method === 'POST') {
            $controller = new PersonaController();
            $controller->guardar();
            exit;
        }
        break;

    case '/personas/crear':
        if ($method === 'GET') {
            $controller = new PersonaController();
            $controller->crear();
            exit;
        }
        break;

    case '/personas/editar':
        if ($method === 'GET') {
            $controller = new PersonaController();
            $controller->editar();
            exit;
        }
        break;

    case '/personas/actualizar':
        if ($method === 'POST') {
            $controller = new PersonaController();
            $controller->actualizar();
            exit;
        }
        break;

    case '/personas/eliminar':
        if ($method === 'POST') {
            $controller = new PersonaController();
            $controller->eliminar();
            exit;
        }
        break;

    /* --- VENTAS --- */
    case '/ventas':
        if ($method === 'GET') {
            $controller = new VentaController();
            $controller->index();
            exit;
        }
        if ($method === 'POST') {
            $controller = new VentaController();
            $controller->guardar();
            exit;
        }
        break;

    case '/ventas/crear':
        if ($method === 'GET') {
            $controller = new VentaController();
            $controller->crear();
            exit;
        }
        break;

    case '/ventas/ver':
        if ($method === 'GET') {
            $controller = new VentaController();
            $controller->ver();
            exit;
        }
        break;

    case '/ventas/eliminar':
        if ($method === 'POST') {
            $controller = new VentaController();
            $controller->eliminar();
            exit;
        }
        break;

    /* --- CATEGORÍAS --- */
    case '/categorias':
        if ($method === 'GET') {
            $controller = new CategoriaController();
            $controller->index();
            exit;
        }
        if ($method === 'POST') {
            $controller = new CategoriaController();
            $controller->guardar();
            exit;
        }
        break;

    case '/categorias/crear':
        if ($method === 'GET') {
            $controller = new CategoriaController();
            $controller->crear();
            exit;
        }
        break;

    case '/categorias/editar':
        if ($method === 'GET') {
            $controller = new CategoriaController();
            $controller->editar();
            exit;
        }
        break;

    case '/categorias/actualizar':
        if ($method === 'POST') {
            $controller = new CategoriaController();
            $controller->actualizar();
            exit;
        }
        break;

    case '/categorias/eliminar':
        if ($method === 'POST') {
            $controller = new CategoriaController();
            $controller->eliminar();
            exit;
        }
        break;

    default:
        http_response_code(404);
        echo "Ruta no encontrada";
        break;
}