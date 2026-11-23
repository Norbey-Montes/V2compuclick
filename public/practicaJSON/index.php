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

// 1 y 2. Convertir el arreglo completo a JSON y mostrar con echo
$jsonTresProductos = json_encode($productosEjercicio1);
echo "<p><strong>JSON inicial (3 productos):</strong></p>";
echo "<pre>" . $jsonTresProductos . "</pre>";

// 3 y 4. Agregar un cuarto producto y aplicar JSON_PRETTY_PRINT
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

// 1 y 2. Leer el archivo con file_get_contents() y convertir a arreglo asociativo
$contenidoJson = file_get_contents($rutaArchivo);
$decodificado = json_decode($contenidoJson, true);

// Soporta tanto {"productos": [...]} como [...] directamente
$listaProductos = isset($decodificado["productos"]) ? $decodificado["productos"] : $decodificado;

// 3 y 4. Recorrer con foreach y mostrar nombre y precio de cada producto
echo "<p><strong>Todos los productos (Nombre y Precio):</strong></p>";
foreach ($listaProductos as $item) {
    echo "Nombre: {$item['nombre']} | Precio: $" . number_format($item['precio'], 0, ",", ".") . "<br>";
}

// 5. Mostrar únicamente los productos cuyo precio sea superior a $100.000
echo "<p><strong>Productos con precio superior a $100.000:</strong></p>";
foreach ($listaProductos as $item) {
    if ($item["precio"] > 100000) {
        echo "Nombre: {$item['nombre']} | Precio: $" . number_format($item['precio'], 0, ",", ".") . "<br>";
    }
}


echo "<h2>3. Ejercicio 3: Modificar y convertir información</h2>";

// 1. Ya tenemos el JSON convertido en arreglo PHP ($listaProductos)
$idBuscar = 3;         
$nuevoPrecio = 850000;
$encontrado = false;

// 2 y 3. Buscar producto por identificador y modificar su precio dentro del arreglo
foreach ($listaProductos as &$producto) {
    if ($producto["id"] == $idBuscar) {
        $producto["precio"] = $nuevoPrecio;
        $encontrado = true;
        break;
    }
}
unset($producto);

// 4 y 5. Convertir nuevamente los datos a JSON y mostrar resultado
$jsonModificado = json_encode($listaProductos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

if ($encontrado) {
    echo "<p>Producto con ID <strong>{$idBuscar}</strong> actualizado a <strong>$" . number_format($nuevoPrecio, 0, ",", ".") . "</strong>:</p>";
} else {
    echo "<p>No se encontró un producto con ID <strong>{$idBuscar}</strong>.</p>";
}

echo "<pre>" . $jsonModificado . "</pre>";

