<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial de Compras - V2compuclick</title>
</head>
<body>
    <h1>Gestión de Compras</h1>

    <!-- Alerta de éxito sin diseño -->
    <?php if (isset($_GET['exito']) && $_GET['exito'] == 'registrado'): ?>
        <p><b>¡Registrado con éxito!</b> La compra se ha guardado correctamente.</p>
    <?php endif; ?>

    <a href="/compras/crear"><button>Nueva Compra</button></a>
    <br><br>
    <?php if (!empty($compras)) { ?>
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
                    <a href="/compras/ver?id=<?= $co['id'] ?>">Ver Detalle</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php } else { ?>
    <p>No hay compras para mostrar.</p>
    <?php } ?>
    <br><a href="/computadores">Volver al inicio</a>
</body>
</html>