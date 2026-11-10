<?php
// public/index.php

$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = rtrim($uri, '/');
if ($uri === '') {
    $uri = '/';
}

// 1. RUTA RAÍZ O LOGIN: Si está en la raíz, carga ÚNICAMENTE la vista de login sin barra de navegación
if ($uri === '/' || $uri === '/login') {
    $loginFile = __DIR__ . '/../app/views/auth/login.php';
    if (file_exists($loginFile)) {
        require_once $loginFile;
    } else {
        echo "<h1>Error</h1><p>No se encuentra la vista de login en <code>app/views/auth/login.php</code></p>";
    }
    exit;
}

// Cargar controladores necesarios solo para las secciones protegidas del sistema
require_once __DIR__ . '/../app/controllers/ComputadorController.php';
require_once __DIR__ . '/../app/controllers/ClienteController.php';
require_once __DIR__ . '/../app/controllers/ProveedorController.php';
require_once __DIR__ . '/../app/controllers/CompraController.php';
require_once __DIR__ . '/../app/controllers/PersonaController.php';
require_once __DIR__ . '/../app/controllers/VentaController.php';
require_once __DIR__ . '/../app/controllers/CategoriaController.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V2compuclick - Panel</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>

<!-- Barra de Navegación con Saludo de Bienvenida Dinámico -->
<nav style="margin-bottom: 20px; background: #f8f9fa; padding: 10px; border-radius: 5px; border: 1px solid #ddd; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap;">
    <div>
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
    </div>

    <!-- Saludo del Usuario e Identificador de Sesión -->
    <div style="display: flex; align-items: center; gap: 15px; margin-top: 5px;">
        <span style="font-weight: bold; color: #333;">
            Bienvenido, <span data-user-name>Usuario</span>
        </span>
        <a href="#" id="btn-logout">
            <button style="background: #dc3545; color: white; cursor: pointer; border: none; padding: 5px 10px; border-radius: 4px;">Cerrar Sesión</button>
        </a>
    </div>
</nav>

<hr>

<?php
// --- COMPUTADORES ---
if ($method === 'GET' && $uri === '/computadores') {
    (new ComputadorController())->index();
} elseif ($method === 'GET' && $uri === '/computadores/crear') {
    (new ComputadorController())->crear();
} elseif ($method === 'POST' && $uri === '/computadores') {
    (new ComputadorController())->guardar();
} elseif ($method === 'GET' && $uri === '/computadores/editar') {
    (new ComputadorController())->editar();
} elseif ($method === 'POST' && $uri === '/computadores/actualizar') {
    (new ComputadorController())->actualizar();
} elseif ($method === 'POST' && $uri === '/computadores/eliminar') {
    (new ComputadorController())->eliminar();
}

// --- CLIENTES ---
elseif ($method === 'GET' && $uri === '/clientes') {
    (new ClienteController())->index();
} elseif ($method === 'GET' && $uri === '/clientes/crear') {
    (new ClienteController())->crear();
} elseif ($method === 'POST' && $uri === '/clientes') {
    (new ClienteController())->guardar();
} elseif ($method === 'GET' && $uri === '/clientes/editar') {
    (new ClienteController())->editar();
} elseif ($method === 'POST' && $uri === '/clientes/actualizar') {
    (new ClienteController())->actualizar();
} elseif ($method === 'POST' && $uri === '/clientes/eliminar') {
    (new ClienteController())->eliminar();
}

// --- PROVEEDORES ---
elseif ($method === 'GET' && $uri === '/proveedores') {
    (new ProveedorController())->index();
} elseif ($method === 'GET' && $uri === '/proveedores/crear') {
    (new ProveedorController())->crear();
} elseif ($method === 'POST' && $uri === '/proveedores') {
    (new ProveedorController())->guardar();
} elseif ($method === 'GET' && $uri === '/proveedores/editar') {
    (new ProveedorController())->editar();
} elseif ($method === 'POST' && $uri === '/proveedores/actualizar') {
    (new ProveedorController())->actualizar();
} elseif ($method === 'POST' && $uri === '/proveedores/eliminar') {
    (new ProveedorController())->eliminar();
}

// --- COMPRAS ---
elseif ($method === 'GET' && $uri === '/compras') {
    (new CompraController())->index();
} elseif ($method === 'GET' && $uri === '/compras/crear') {
    (new CompraController())->crear();
} elseif ($method === 'POST' && $uri === '/compras') {
    (new CompraController())->guardar();
} elseif ($method === 'GET' && $uri === '/compras/ver') {
    (new CompraController())->ver();
} elseif ($method === 'POST' && $uri === '/compras/eliminar') {
    (new CompraController())->eliminar();
}

// --- PERSONAS ---
elseif ($method === 'GET' && $uri === '/personas') {
    (new PersonaController())->index();
} elseif ($method === 'GET' && $uri === '/personas/crear') {
    (new PersonaController())->crear();
} elseif ($method === 'POST' && $uri === '/personas') {
    (new PersonaController())->guardar();
} elseif ($method === 'GET' && $uri === '/personas/editar') {
    (new PersonaController())->editar();
} elseif ($method === 'POST' && $uri === '/personas/actualizar') {
    (new PersonaController())->actualizar();
} elseif ($method === 'POST' && $uri === '/personas/eliminar') {
    (new PersonaController())->eliminar();
}

// --- VENTAS ---
elseif ($method === 'GET' && $uri === '/ventas') {
    (new VentaController())->index();
} elseif ($method === 'GET' && $uri === '/ventas/crear') {
    (new VentaController())->crear();
} elseif ($method === 'POST' && $uri === '/ventas') {
    (new VentaController())->guardar();
} elseif ($method === 'GET' && $uri === '/ventas/ver') {
    (new VentaController())->ver();
} elseif ($method === 'POST' && $uri === '/ventas/eliminar') {
    (new VentaController())->eliminar();
}

// --- CATEGORÍAS ---
elseif ($method === 'GET' && $uri === '/categorias') {
    (new CategoriaController())->index();
} elseif ($method === 'GET' && $uri === '/categorias/crear') {
    (new CategoriaController())->crear();
} elseif ($method === 'POST' && $uri === '/categorias') {
    (new CategoriaController())->guardar();
} elseif ($method === 'GET' && $uri === '/categorias/editar') {
    (new CategoriaController())->editar();
} elseif ($method === 'POST' && $uri === '/categorias/actualizar') {
    (new CategoriaController())->actualizar();
} elseif ($method === 'POST' && $uri === '/categorias/eliminar') {
    (new CategoriaController())->eliminar();
} else {
    http_response_code(404);
    echo "<h1>404 - Página no encontrada</h1><p>La ruta solicitada <code>" . htmlspecialchars($uri) . "</code> no existe en V2compuclick.</p>
          <br><a href='/computadores'><button>Ir a Computadores</button></a>";
}
?>

<!-- Scripts de Supabase y Guard -->
<script src="https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2"></script>
<script src="/asset/js/auth/config.js"></script>
<script src="/asset/js/auth/supabase-client.js"></script>
<script src="/asset/js/auth/guard.js"></script>
<script>
  document.getElementById('btn-logout')?.addEventListener('click', async (e) => {
    e.preventDefault();
    if (window.supabaseClient) {
      await window.supabaseClient.auth.signOut();
    }
    window.location.replace('/?logout=success');
  });
</script>
</body>
</html>