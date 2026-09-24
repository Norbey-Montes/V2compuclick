<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Computadores</title>
</head>
<body>

    <h1>Listado Computadores</h1>

    <?php if (!empty($computadores)) { ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Procesador</th>
                    <th>RAM</th>
                    <th>Almacenamiento</th>
                    <th>Precio Compra</th>
                    <th>Precio Venta</th>
                    <th>Proveedor</th>
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
                    <td>$<?= number_format($comp['preciocompra'], 2) ?></td>
                    <td>$<?= number_format($comp['precioventa'], 2) ?></td>
                    <td><?= $comp['proveedor'] ?? 'Sin Proveedor' ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>No hay computadores para mostrar.</p>
    <?php } ?>

    <br><br>

    <h1>Computador Consultado</h1>

    <?php if (!empty($computadorConsultado)) { ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Modelo</th>
                    <th>Procesador</th>
                    <th>RAM</th>
                    <th>Almacenamiento</th>
                    <th>Precio Compra</th>
                    <th>Precio Venta</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($computadorConsultado as $comp): ?>
                <tr>
                    <td><?= $comp['id'] ?></td>
                    <td><?= $comp['modelo'] ?></td>
                    <td><?= $comp['procesador'] ?></td>
                    <td><?= $comp['ram'] ?></td>
                    <td><?= $comp['almacenamiento'] ?></td>
                    <td>$<?= number_format($comp['preciocompra'], 2) ?></td>
                    <td>$<?= number_format($comp['precioventa'], 2) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>No hay información del computador consultado para mostrar.</p>
    <?php } ?>

</body>
</html>