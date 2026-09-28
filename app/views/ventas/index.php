<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Ventas</title>
</head>
<body>

    <h1>Listado Ventas</h1>

    <?php if (!empty($ventas)) { ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID Venta</th>
                    <th>Cliente</th>
                    <th>Tipo Pago</th>
                    <th>Fecha</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ventas as $ven): ?>
                <tr>
                    <td><?= $ven['id'] ?? $ven['venta_id'] ?></td>
                    <td><?= $ven['cliente'] ?? $ven['cliente_id'] ?? 'Sin Cliente' ?></td>
                    <td><?= $ven['tipo_pago'] ?? 'Sin Tipo' ?></td>
                    <td><?= $ven['fecha'] ?? '' ?></td>
                    <td><?= $ven['total'] ?? '0' ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>No hay ventas para mostrar.</p>
    <?php } ?>

</body>
</html>