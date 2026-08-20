<?php
// Requerir el archivo de conexión
require_once __DIR__ . '/../config/Database.php';

use Config\Database;

// Probar la conexión de forma limpia
$db = Database::getInstance()->getConnection();

if ($db) {
    echo "<h3>Conexión exitosa CompuClick</h3>";
    echo "<hr>";
}

// Sistema de rutas básico por parámetros (GET)
// Ejemplo: http://localhost/V2compuclick/public/index.php?controller=computador&action=index
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) . 'Controller' : 'Computador';
$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

// Aquí puedes empezar a cargar tus controladores dinámicamente o dejar tu menú principal
echo "<p>Bienvenido al sistema V2compuclick. El enrutador MVC está activo.</p>";
?>