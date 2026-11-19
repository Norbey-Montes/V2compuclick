<?php

require_once __DIR__ . '/../app/controllers/ComputadorController.php';
require_once __DIR__ . '/../app/controllers/ClienteController.php';
require_once __DIR__ . '/../app/controllers/ProveedorController.php';
require_once __DIR__ . '/../app/controllers/CompraController.php';
require_once __DIR__ . '/../app/controllers/PersonaController.php';
require_once __DIR__ . '/../app/controllers/VentaController.php';
require_once __DIR__ . '/../app/controllers/CategoriaController.php';

require dirname(__DIR__) . '/rutas/web.php';

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$ruta = parse_url($uri, PHP_URL_PATH);
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

$enrutamiento = $rutas[$method][$ruta] ?? null;

if ($enrutamiento!== null) {
    $ncontrolador = $enrutamiento[0];
    $nmetodo = $enrutamiento[1];

    $controlador = new $ncontrolador();
    $controlador->$nmetodo();
} else{
    echo "Error 404: Ruta no encontrada";
}