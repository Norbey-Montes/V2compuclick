<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Categorías - V2compuclick</title>
</head>
<body>
    <h1>Listado de Categorías</h1>

    <!-- Alertas de éxito sin diseño -->
    <?php if (isset($_GET['exito']) && $_GET['exito'] == 'actualizado'): ?>
        <p><b>¡Actualizado con éxito!</b> La categoría se ha modificado correctamente.</p>
    <?php endif; ?>

    <?php if (isset($_GET['exito']) && $_GET['exito'] == 'guardado'): ?>
        <p><b>¡Registrado con éxito!</b> La categoría se ha guardado correctamente.</p>
    <?php endif; ?>

    <a href="/categorias/crear">Crear Nueva Categoría</a>
    <br><br>

    <?php if (!empty($categorias)) { ?>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $cat): ?>
            <tr>
                <td><?= $cat['id'] ?></td>
                <td><?= $cat['nombre'] ?></td>
                <td>
                    <a href="/categorias/editar?id=<?= $cat['id'] ?>">Editar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php } else { ?>
    <p>No hay categorías para mostrar.</p>
    <?php } ?>

    <br><a href="/computadores">Volver al inicio</a>
</body>
</html>