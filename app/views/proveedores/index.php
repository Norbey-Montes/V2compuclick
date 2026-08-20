<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Proveedores - V2compuclick</title>
</head>
<body>
    <h1>Gestión de Proveedores</h1>
    <a href="index.php?controller=proveedor&action=crear">Nuevo Proveedor</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID Proveedor</th>
                <th>Empresa</th>
                <th>Representante</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($proveedores as $pr): ?>
            <tr>
                <td><?= $pr['proveedor_id'] ?></td>
                <td><?= $pr['empresa'] ?></td>
                <td><?= $pr['nombres'] . ' ' . $pr['apellidos'] ?></td>
                <td><?= $pr['telefono'] ?></td>
                <td>
                    <a href="index.php?controller=proveedor&action=editar&id=<?= $pr['proveedor_id'] ?>">Editar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br><a href="index.php">Volver al inicio</a>
</body>
</html>