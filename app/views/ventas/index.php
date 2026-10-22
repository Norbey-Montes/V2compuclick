<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Ventas - V2compuclick</title>
</head>
<body>
    <h1>Listado de Ventas</h1>

    <!-- Alerta de éxito sin diseño -->
    <?php if (isset($_GET['exito']) && $_GET['exito'] == 'registrado'): ?>
        <p><b>¡Registrado con éxito!</b> La venta se ha guardado correctamente.</p>
    <?php endif; ?>

    <a href="/ventas/crear"><button>Crear Venta</button></a>
    <br><br>
    <?php if (!empty($ventas)) { ?>
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
            <?php foreach ($ventas as $ven): ?>
            <tr>
                <td><?= $ven['venta_id'] ?></td>
                <td><?= $ven['cliente'] ?? 'Sin Cliente' ?></td>
                <td><?= $ven['tipo_pago'] ?? 'Sin Tipo' ?></td>
                <td><?= $ven['fecha'] ?></td>
                <td>$<?= number_format($ven['total'], 2) ?></td>
                <td>
                    <a href="/ventas/ver?id=<?= $ven['venta_id'] ?>">Ver Detalle</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php } else { ?>
    <p>No hay ventas para mostrar.</p>
    <?php } ?>
    <br><a href="/computadores">Volver al inicio</a>
</body>
</html>