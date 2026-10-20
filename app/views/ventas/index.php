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
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Procesador</th>
                    <th>RAM</th>
                    <th>Almacenamiento</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Tipo Pago</th>
                    <th>Fecha</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ventas as $ven): ?>
                <tr>
                    <td><?= $ven['venta_id'] ?? $ven['id'] ?></td>
                    <td><?= $ven['cliente'] ?? 'Sin Cliente' ?></td>
                    <td><?= $ven['marca'] ?? 'N/A' ?></td>
                    <td><?= $ven['modelo'] ?? 'N/A' ?></td>
                    <td><?= $ven['procesador'] ?? 'N/A' ?></td>
                    <td><?= $ven['ram'] ?? 'N/A' ?></td>
                    <td><?= $ven['almacenamiento'] ?? 'N/A' ?></td>
                    <td><?= $ven['cantidad'] ?? '1' ?></td>
                    <td>$<?= number_format($ven['precio_unitario'] ?? 0, 2) ?></td>
                    <td><?= $ven['tipo_pago'] ?? 'Sin Tipo' ?></td>
                    <td><?= $ven['fecha'] ?? '' ?></td>
                    <td>$<?= number_format($ven['total'] ?? 0, 2) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>No hay ventas para mostrar.</p>
    <?php } ?>

</body>
</html>