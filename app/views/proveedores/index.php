<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Proveedores</title>
</head>
<body>

    <h1>Listado Proveedores</h1>

    <?php if (!empty($proveedores)) { ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Empresa</th>
                    <th>Representante</th>
                    <th>Teléfono</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($proveedores as $prov): ?>
                <tr>
                    <td><?= $prov['proveedor_id'] ?></td>
                    <td><?= $prov['empresa'] ?></td>
                    <td><?= $prov['representante'] ?? 'Sin Representante' ?></td>
                    <td><?= $prov['telefono'] ?? 'Sin Teléfono' ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>No hay proveedores para mostrar.</p>
    <?php } ?>

</body>
</html>