<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Compra - V2compuclick</title>
</head>
<body>
    <h1>Orden de Compra #<?= $compra['id'] ?></h1>
    <p><b>Proveedor / Empresa:</b> <?= $compra['empresa'] ?></p>
    <p><b>Fecha:</b> <?= $compra['fecha'] ?></p>
    
    <h3>Equipos Adquiridos</h3>
    <table border="1">
        <thead>
            <tr>
                <th>Marca y Modelo</th>
                <th>Cantidad</th>
                <th>Costo Unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detalles as $dc): ?>
            <tr>
                <td><?= $dc['marca'] . ' ' . $dc['modelo'] ?></td>
                <td><?= $dc['cantidad'] ?></td>
                <td>$<?= number_format($dc['precio'], 2) ?></td>
                <td>$<?= number_format($dc['cantidad'] * $dc['precio'], 2) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h3>Total Inversión: $<?= number_format($compra['total'], 2) ?></h3>
    <br><a href="index.php?controller=compra&action=index">Volver al listado</a>
</body>
</html>