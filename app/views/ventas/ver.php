<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Venta - V2compuclick</title>
</head>
<body>
    <h1>Factura de Venta #<?= $venta['id'] ?></h1>
    <p><b>Cliente:</b> <?= $venta['cliente'] ?></p>
    <p><b>Método de Pago:</b> <?= $venta['tipopago'] ?></p>
    <p><b>Fecha:</b> <?= $venta['fecha'] ?></p>
    
    <h3>Productos Vendidos</h3>
    <table border="1">
        <thead>
            <tr>
                <th>Marca y Modelo</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detalles as $d): ?>
            <tr>
                <td><?= $d['marca'] . ' ' . $d['modelo'] ?></td>
                <td><?= $d['cantidad'] ?></td>
                <td>$<?= number_format($d['precio'], 2) ?></td>
                <td>$<?= number_format($d['cantidad'] * $d['precio'], 2) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h3>Total General: $<?= number_format($venta['total'], 2) ?></h3>
    <br><a href="index.php?controller=venta&action=index">Volver al listado</a>
</body>
</html>