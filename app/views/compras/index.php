<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial de Compras - V2compuclick</title>
</head>
<body>
    <h1>Gestión de Compras (Proveedores)</h1>
    <a href="index.php?controller=compra&action=crear">Nueva Compra</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID Compra</th>
                <th>Proveedor</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($compras as $co): ?>
            <tr>
                <td><?= $co['id'] ?></td>
                <td><?= $co['empresa'] ?></td>
                <td><?= $co['fecha'] ?></td>
                <td>$<?= number_format($co['total'], 2) ?></td>
                <td>
                    <a href="index.php?controller=compra&action=ver&id=<?= $co['id'] ?>">Ver Detalle</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br><a href="index.php">Volver al inicio</a>
</body>
</html>