<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inventario de Computadores - V2compuclick</title>
</head>
<body>
    <h1>Inventario de Equipos</h1>
    <a href="index.php?controller=computador&action=crear">Nuevo Computador</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Procesador</th>
                <th>RAM</th>
                <th>Almacenamiento</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($computadores as $comp): ?>
            <tr>
                <td><?= $comp['id'] ?></td>
                <td><?= $comp['marca'] ?></td>
                <td><?= $comp['modelo'] ?></td>
                <td><?= $comp['procesador'] ?></td>
                <td><?= $comp['ram'] ?></td>
                <td><?= $comp['almacenamiento'] ?></td>
                <td>$<?= number_format($comp['precio'], 2) ?></td>
                <td><?= $comp['stock'] ?></td>
                <td>
                    <a href="index.php?controller=computador&action=editar&id=<?= $comp['id'] ?>">Editar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br><a href="index.php">Volver al inicio</a>
</body>
</html>