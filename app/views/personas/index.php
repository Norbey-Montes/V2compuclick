<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Personas - V2compuclick</title>
</head>
<body>
    <h1>Gestión de Personas</h1>

    <!-- Alerta de éxito sin diseño -->
    <?php if (isset($_GET['exito']) && $_GET['exito'] == 'actualizado'): ?>
        <p><b>¡Actualizado con éxito!</b> La persona se ha modificado correctamente.</p>
    <?php endif; ?>

    <a href="/personas/crear">Nueva Persona</a>
    <br><br>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo Doc</th>
                <th>Documento</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($personas as $p): ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= $p['tipodoc'] ?></td>
                <td><?= $p['documento'] ?></td>
                <td><?= $p['nombres'] ?></td>
                <td><?= $p['apellidos'] ?></td>
                <td><?= $p['telefono'] ?></td>
                <td><?= $p['email'] ?></td>
                <td>
                    <a href="/personas/editar?id=<?= $p['id'] ?>">Editar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br><a href="/computadores">Volver al inicio</a>
</body>
</html>