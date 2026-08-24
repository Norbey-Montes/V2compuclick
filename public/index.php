<?php
require_once '../config/Database.php';

$database = new Database();
$db = $database->getConnection();

if ($db) {
    echo "<h2>¡Proyecto CompuClick. listo y conectado a MySQL!</h2>";
} else {
    echo "<h2>Error al conectar a la base de datos.</h2>";
}
