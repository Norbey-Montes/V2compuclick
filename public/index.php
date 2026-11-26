<?php

require_once __DIR__ . '/../app/controllers/ComputadorController.php';
require_once __DIR__ . '/../app/controllers/ClienteController.php';
require_once __DIR__ . '/../app/controllers/ProveedorController.php';
require_once __DIR__ . '/../app/controllers/CompraController.php';
require_once __DIR__ . '/../app/controllers/PersonaController.php';
require_once __DIR__ . '/../app/controllers/VentaController.php';
require_once __DIR__ . '/../app/controllers/CategoriaController.php';
require_once __DIR__ . '/../app/controllers/homecontroller.php';


require dirname(__DIR__) . '/rutas/web.php';

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$ruta = parse_url($uri, PHP_URL_PATH);

$enrutamiento = $rutas[$method][$ruta] ?? null;

if ($enrutamiento !== null) {
    $ncontrolador = $enrutamiento[0];
    $nmetodo = $enrutamiento[1];

    $controlador = new $ncontrolador();
    $controlador->$nmetodo();
} else {
    echo "Error 404: Ruta no encontrada";
}