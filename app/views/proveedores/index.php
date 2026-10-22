<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Proveedores</title>
</head>
<body>
    <h1>Listado de Proveedores</h1>

    <!-- Alerta de éxito sin diseño -->
    <?php if (isset($_GET['exito']) && $_GET['exito'] == 'actualizado'): ?>
        <p><b>¡Actualizado con éxito!</b> El proveedor se ha modificado correctamente.</p>
    <?php endif; ?>

    <a href="/proveedores/crear">Crear Proveedor</a>
    <br><br>
    <?php if (!empty($proveedores)) { ?>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Empresa</th>
                <th>Representante</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($proveedores as $prov): ?>
            <tr>
                <td><?= $prov['proveedor_id'] ?></td>
                <td><?= $prov['empresa'] ?></td>
                <td><?= $prov['representante'] ?></td>
                <td><?= $prov['telefono'] ?? 'Sin Teléfono' ?></td>
                <td>
                    <a href="/proveedores/editar?id=<?= $prov['proveedor_id'] ?>">Editar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php } else { ?>
    <p>No hay proveedores para mostrar.</p>
    <?php } ?>
    <br><a href="/computadores">Volver al inicio</a>
</body>
</html>