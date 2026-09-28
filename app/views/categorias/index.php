<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Categorías</title>
</head>
<body>

    <h1>Listado Categorías</h1>

    <a href="/categorias/crear">Crear Nueva Categoría</a>
    <br><br>

    <?php if (!empty($categorias)) { ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categorias as $cat): ?>
                <tr>
                    <td><?= $cat['id'] ?></td>
                    <td><?= $cat['nombre'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>No hay categorías para mostrar.</p>
    <?php } ?>

    <br><br>

    <h1>Categoría Consultada</h1>

    <?php if (!empty($categoriaConsultada)) { ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categoriaConsultada as $cat): ?>
                <tr>
                    <td><?= $cat['id'] ?></td>
                    <td><?= $cat['nombre'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>No hay información de la categoría consultada para mostrar.</p>
    <?php } ?>

</body>
</html>