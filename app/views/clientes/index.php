<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inventario de Computadores</title>
</head>
<body>

    <h1>Listado Productos</h1>

    <?php if (!empty($computadores)) { ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre (Marca)</th>
                    <th>Modelo</th>
                    <th>Procesador</th>
                    <th>RAM</th>
                    <th>Almacenamiento</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($computadores as $comp): ?>
                <tr>
                    <td><?= $comp['id'] ?></td>
                    <td><?= $comp['marca'] ?? 'Sin Marca' ?></td>
                    <td><?= $comp['modelo'] ?></td>
                    <td><?= $comp['procesador'] ?></td>
                    <td><?= $comp['ram'] ?></td>
                    <td><?= $comp['almacenamiento'] ?></td>
                    <td>$<?= number_format($comp['precio'], 2) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>No hay productos para mostrar.</p>
    <?php } ?>

    <br><br>

    <h1>Producto Consultado (ID: 5)</h1>

    <?php if (!empty($computadorConsultado)) { ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Marca</th>
                    <th>Modelo</th>
                    <th>Procesador</th>
                    <th>RAM</th>
                    <th>Almacenamiento</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($computadorConsultado as $comp): ?>
                <tr>
                    <td><?= $comp['id'] ?></td>
                    <td><?= $comp['marca_id'] ?></td>
                    <td><?= $comp['modelo'] ?></td>
                    <td><?= $comp['procesador'] ?></td>
                    <td><?= $comp['ram'] ?></td>
                    <td><?= $comp['almacenamiento'] ?></td>
                    <td>$<?= number_format($comp['precio'], 2) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>No hay información de producto consultado para mostrar.</p>
    <?php } ?>

</body>
</html>