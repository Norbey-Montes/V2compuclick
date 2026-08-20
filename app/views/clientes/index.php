<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Clientes - V2compuclick</title>
</head>
<body>
    <h1>Gestión de Clientes</h1>
    <a href="index.php?controller=cliente&action=crear">Nuevo Cliente</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID Cliente</th>
                <th>Documento</th>
                <th>Nombre Completo</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $c): ?>
            <tr>
                <td><?= $c['cliente_id'] ?></td>
                <td><?= $c['documento'] ?></td>
                <td><?= $c['nombres'] . ' ' . $c['apellidos'] ?></td>
                <td><?= $c['telefono'] ?></td>
                <td>
                    <a href="index.php?controller=cliente&action=editar&id=<?= $c['cliente_id'] ?>">Editar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br><a href="index.php">Volver al inicio</a>
</body>
</html>