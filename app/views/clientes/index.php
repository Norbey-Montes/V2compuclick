<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Clientes</title>
</head>
<body>

    <h1>Listado de Clientes</h1>

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
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>No hay clientes registrados para mostrar.</p>
    <?php } ?>

</body>
</html>