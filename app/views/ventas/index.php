<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial de Ventas - V2compuclick</title>
</head>
<body>
    <h1>Gestión de Ventas</h1>
    <a href="index.php?controller=venta&action=crear">Nueva Venta</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID Venta</th>
                <th>Cliente</th>
                <th>Tipo Pago</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ventas as $v): ?>
            <tr>
                <td><?= $v['id'] ?></td>
                <td><?= $v['cliente'] ?></td>
                <td><?= $v['tipopago'] ?></td>
                <td><?= $v['fecha'] ?></td>
                <td>$<?= number_format($v['total'], 2) ?></td>
                <td>
                    <a href="index.php?controller=venta&action=ver&id=<?= $v['id'] ?>">Ver Detalle</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br><a href="index.php">Volver al inicio</a>
</body>
</html>