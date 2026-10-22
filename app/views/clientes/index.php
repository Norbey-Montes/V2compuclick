<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Clientes</title>
</head>
<body>
    <h1>Listado de Clientes</h1>

    <!-- Alerta de éxito sin diseño -->
    <?php if (isset($_GET['exito']) && $_GET['exito'] == 'actualizado'): ?>
        <p><b>¡Actualizado con éxito!</b> El cliente se ha modificado correctamente.</p>
    <?php endif; ?>

    <a href="/clientes/crear">Crear Cliente</a>
    <br><br>
    <?php if (!empty($clientes)) { ?>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Completo</th>
                <th>Documento</th>
                <th>Teléfono</th>
                <th>Correo Electrónico</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cli): ?>
            <tr>
                <td><?= $cli['cliente_id'] ?></td>
                <td><?= $cli['nombre_completo'] ?></td>
                <td><?= $cli['documento'] ?></td>
                <td><?= $cli['telefono'] ?></td>
                <td><?= $cli['email'] ?></td>
                <td><?= $cli['direccion'] ?></td>
                <td>
                    <a href="/clientes/editar?id=<?= $cli['cliente_id'] ?>">Editar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php } else { ?>
    <p>No hay clientes registrados para mostrar.</p>
    <?php } ?>
    <br><a href="/computadores">Volver al inicio</a>
</body>
</html>