<?php

echo "<h2>1. Ejercicio 1: De PHP a JSON</h2>";

$productosEjercicio1 = [
    [
        "id" => 1,
        "nombre" => "Mouse inalámbrico",
        "precio" => 35000,
        "stock" => 12,
        "disponibilidad" => true
    ],
    [
        "id" => 2,
        "nombre" => "Teclado mecánico",
        "precio" => 165000,
        "stock" => 8,
        "disponibilidad" => true
    ],
    [
        "id" => 3,
        "nombre" => "Monitor de 24 pulgadas",
        "precio" => 780000,
        "stock" => 6,
        "disponibilidad" => true
    ]
];

$jsonTresProductos = json_encode($productosEjercicio1);
echo "<p><strong>JSON inicial (3 productos):</strong></p>";
echo "<pre>" . $jsonTresProductos . "</pre>";

$productosEjercicio1[] = [
    "id" => 4,
    "nombre" => "Cable USB-C",
    "precio" => 25000,
    "stock" => 30,
    "disponibilidad" => true
];

$jsonCuatroProductos = json_encode($productosEjercicio1, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
echo "<p><strong>JSON con cuarto producto y JSON_PRETTY_PRINT:</strong></p>";
echo "<pre>" . $jsonCuatroProductos . "</pre>";



echo "<h2>2. Ejercicio 2: De JSON a PHP</h2>";

$rutaArchivo = __DIR__ . "/productos.json";

if (!file_exists($rutaArchivo)) {
    echo "<p>No se encontró <strong>productos.json</strong> en " . __DIR__ . "</p>";
    exit;
}

$contenidoJson = file_get_contents($rutaArchivo);
$decodificado = json_decode($contenidoJson, true);

$listaProductos = isset($decodificado["productos"]) ? $decodificado["productos"] : $decodificado;

echo "<p><strong>Todos los productos (Nombre y Precio):</strong></p>";
foreach ($listaProductos as $item) {
    echo "Nombre: {$item['nombre']} | Precio: $" . number_format($item['precio'], 0, ",", ".") . "<br>";
}

echo "<p><strong>Productos con precio superior a $100.000:</strong></p>";
foreach ($listaProductos as $item) {
    if ($item["precio"] > 100000) {
        echo "Nombre: {$item['nombre']} | Precio: $" . number_format($item['precio'], 0, ",", ".") . "<br>";
    }
}



echo "<h2>3. Ejercicio 3: Modificar y convertir información</h2>";

$idBuscar = 3;
$nuevoPrecio = 850000;
$encontrado = false;

foreach ($listaProductos as &$productoItem) {
    if ($productoItem["id"] == $idBuscar) {
        $productoItem["precio"] = $nuevoPrecio;
        $encontrado = true;
        break;
    }
}
unset($productoItem);

$jsonModificado = json_encode($listaProductos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

if ($encontrado) {
    echo "<p>Producto con ID <strong>{$idBuscar}</strong> actualizado a <strong>$" . number_format($nuevoPrecio, 0, ",", ".") . "</strong>:</p>";
} else {
    echo "<p>No se encontró un producto con ID <strong>{$idBuscar}</strong>.</p>";
}

echo "<pre>" . $jsonModificado . "</pre>";



echo "<h2>4. Respuesta JSON de referencia (HTTP 200)</h2>";
http_response_code(200);
echo "<pre>" . json_encode(["mensaje" => "Operación exitosa"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "</pre>";



echo "<h2>5. Actividad 2: Consulta del producto Mouse</h2>";
$productoMouse = [
    "id"     => 1,
    "nombre" => "Mouse",
    "precio" => 35000
];
$idBuscadoMouse = 1;

if ($idBuscadoMouse === $productoMouse["id"]) {
    http_response_code(200);
    echo "<p>Producto encontrado - HTTP 200</p>";
    echo "<pre>" . json_encode($productoMouse, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "</pre>";
} else {
    http_response_code(404);
    echo "<p>Producto no encontrado - HTTP 404</p>";
    echo "<pre>" . json_encode(["mensaje" => "Producto no encontrado"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "</pre>";
}



echo "<h2>6. Comprobación: Mouse no encontrado</h2>";
$idBuscadoMouseNoExiste = 10;

if ($idBuscadoMouseNoExiste === $productoMouse["id"]) {
    http_response_code(200);
    echo "<p>Producto encontrado - HTTP 200</p>";
    echo "<pre>" . json_encode($productoMouse, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "</pre>";
} else {
    http_response_code(404);
    echo "<p>Producto no encontrado - HTTP 404</p>";
    echo "<pre>" . json_encode(["mensaje" => "Producto no encontrado"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "</pre>";
}



echo "<h2>7. Actividad 3: Consulta del producto Monitor</h2>";
$productoMonitor = [
    "id"     => 3,
    "nombre" => "Monitor",
    "precio" => 780000,
    "stock"  => 6
];
$idBuscadoMonitor = 3;

if ($idBuscadoMonitor === $productoMonitor["id"]) {
    http_response_code(200);
    echo "<p>Producto encontrado - HTTP 200</p>";
    echo "<pre>" . json_encode($productoMonitor, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "</pre>";
} else {
    http_response_code(404);
    echo "<p>Producto no encontrado - HTTP 404</p>";
    echo "<pre>" . json_encode(["mensaje" => "El producto no existe"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "</pre>";
}



echo "<h2>8. Reto de comprobación: Monitor no encontrado</h2>";
$idBuscadoMonitorNoExiste = 5;

if ($idBuscadoMonitorNoExiste === $productoMonitor["id"]) {
    http_response_code(200);
    echo "<p>Producto encontrado - HTTP 200</p>";
    echo "<pre>" . json_encode($productoMonitor, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "</pre>";
} else {
    http_response_code(404);
    echo "<p>Producto no encontrado - HTTP 404</p>";
    echo "<pre>" . json_encode(["mensaje" => "El producto no existe"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "</pre>";
}

?>